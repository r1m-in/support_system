<?php

namespace App\Services;

use Aws\DynamoDb\DynamoDbClient;
use Aws\DynamoDb\Marshaler;

class DynamoDbService
{
   protected $client;
   protected $marshaler;

   public function __construct()
   {
      // 1. Initialize the official AWS DynamoDB Client
      $this->client = new DynamoDbClient([
         'region'  => env('AWS_DynamoDB_REGION', 'us-east-1'),
         'version' => 'latest',
         'credentials' => [
            'key'    => env('AWS_DynamoDB_ACCESS_KEY_ID'),
            'secret' => env('AWS_DynamoDB_SECRET_ACCESS_KEY'),
         ],
      ]);

      // The Marshaler converts JSON/PHP arrays into DynamoDB JSON format automatically
      $this->marshaler = new Marshaler();
   }

   /**
    * Retrieve an item by its primary key
    */
   public function getItem(string $tableName, array $key)
   {
      $json = json_encode($key);

      $result = $this->client->getItem([
         'TableName' => $tableName,
         'Key'       => $this->marshaler->marshalJson($json)
      ]);

      if (isset($result['Item'])) {
         return $this->marshaler->unmarshalItem($result['Item']);
      }

      return null;
   }

   public function driverTranscation(string $tableName, string $driverId)
   {
      $result = $this->client->query([
         'TableName' => $tableName,
         'KeyConditionExpression' => '#pk = :pk_val',
         'ExpressionAttributeNames' => [
            '#pk' => 'driver_id' // Your Partition Key
         ],
         'ExpressionAttributeValues' => [
            ':pk_val' => $this->marshaler->marshalValue($driverId)
         ],
         // ⬇️ THIS LATEST-TO-OLD SORTING MAGIC HAPPENS HERE
         'ScanIndexForward' => false
      ]);

      // Unmarshal the results into clean PHP arrays
      $items = [];
      if (isset($result['Items'])) {
         foreach ($result['Items'] as $item) {
            $items[] = $this->marshaler->unmarshalItem($item);
         }
      }

      return $items;
   }

   public function scanWithPagination(string $tableName, int $limit = 10, ?array $startKey = null)
   {
      $params = [
         'TableName' => $tableName,
         'Limit'     => $limit,
      ];

      // If a pagination cursor is provided, tell DynamoDB where to resume
      if (!empty($startKey)) {
         $params['ExclusiveStartKey'] = $startKey;
      }

      $result = $this->client->scan($params);

      // Unmarshal the items
      $items = [];
      if (isset($result['Items'])) {
         foreach ($result['Items'] as $item) {
            $items[] = $this->marshaler->unmarshalItem($item);
         }
      }

      // Capture the next page token if it exists
      $nextPageKey = null;
      if (isset($result['LastEvaluatedKey'])) {
         // We keep it marshaled because we need to pass it back to AWS on the next call
         $nextPageKey = $result['LastEvaluatedKey'];
      }

      return [
         'items' => $items,
         // Base64 encode the cursor so it can be cleanly sent over URLs/API queries
         'next_page_token' => $nextPageKey ? base64_encode(json_encode($nextPageKey)) : null
      ];
   }
}
