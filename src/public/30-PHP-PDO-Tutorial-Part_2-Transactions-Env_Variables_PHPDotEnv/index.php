<?php

/*
//PHP PDO Tutorial Part 2: Transactions and Environment Variables with PHPDotEnv
Transactions: Managing database operations that need to be executed as a single unit of work.
Environment Variables & PHPDotEnv: Securely managing sensitive configuration data (like database credentials) using environment variables and the phpdotenv library

A transaction is a sequence of database operations that are treated as a single unit. 
Transactions ensure data integrity by allowing you to commit (save) or roll back (undo) changes if something goes wrong.

Why Use Transactions?
Atomicity: Ensures that all operations in a transaction are completed successfully. If any operation fails, the entire transaction is rolled back.
Consistency: Maintains the database in a valid state.
Isolation: Ensures that concurrent transactions do not interfere with each other.
Durability: Once a transaction is committed, the changes are permanent.


*/

require __DIR__.'/../../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

// Access environment variables
$host = $_ENV['DB_HOST'];
$dbname = $_ENV['DB_NAME'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD']; 
try {
    // Connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Start the transaction
    $pdo->beginTransaction();

    // Perform database operations
    $stmt1 = $pdo->prepare("UPDATE users SET balance = balance - :amount WHERE id = :source_id");
    $stmt1->execute([
        ':amount' => 100,
        ':source_id' => 1
    ]);

    $stmt2 = $pdo->prepare("UPDATE users SET balance = balance + :amount WHERE id = :dest_id");
    $stmt2->execute([
        ':amount' => 100,
        ':dest_id' => 3
    ]);
 // Check if any rows were updated
 if ($stmt1->rowCount() === 0 || $stmt2->rowCount() === 0) {
    throw new Exception("One or more operations did not affect any rows.");
}
    // Commit the transaction
    $pdo->commit();
    echo "Transaction completed successfully!";
} catch (PDOException $e) {
    // Roll back the transaction if something goes wrong
    if ($pdo->inTransaction()) {
        $pdo->rollBack();
    }
    echo "Transaction failed: " . $e->getMessage();
}