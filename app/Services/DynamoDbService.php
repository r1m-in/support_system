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
}
