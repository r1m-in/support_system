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
}