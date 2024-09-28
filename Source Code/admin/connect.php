<?php
require 'vendor/autoload.php'; // include Composer's autoloader

// Specify your MongoDB connection string
$uri = "mongodb://localhost:27017";

// Create a MongoDB client
$client = new MongoDB\Client($uri);

// Select a database
$database = $client->my_database;

// Select a collection
$collection = $database->my_collection;

// Insert a document
$result = $collection->insertOne([
    'name' => 'John Doe',
    'email' => 'john.doe@example.com',
    'age' => 28,
]);

echo "Inserted with Object ID '{$result->getInsertedId()}'";

// Find a document
$document = $collection->findOne(['name' => 'John Doe']);
echo "Found document: " . json_encode($document);

// Update a document
$updateResult = $collection->updateOne(
    ['name' => 'John Doe'],
    ['$set' => ['age' => 29]]
);

echo "Matched {$updateResult->getMatchedCount()} document(s) and modified {$updateResult->getModifiedCount()} document(s)";

// Delete a document
$deleteResult = $collection->deleteOne(['name' => 'John Doe']);
echo "Deleted {$deleteResult->getDeletedCount()} document(s)";
?>
