<?php
/*
PHP PDO Tutorial Part 3 - Models & Refactoring
Models are a key component of the MVC (Model-View-Controller) architecture. They:

Encapsulate database logic: Keep your database interactions in one place.

Promote reusability: Avoid duplicating code across your application.

Improve maintainability: Make it easier to update or debug database-related code.

refactoring our code to make it more organized, maintainable, and scalable. Specifically, we'll:

Introduce Models: Create a Model class to encapsulate database interactions.

Refactor Code: Move database logic into models to adhere to the separation of concerns principle.

Improve Reusability: Make the code reusable and easier to test.

To ensure everything works correctly, you must:Load Environment Variables
*/

//Base Model Class
require __DIR__.'/../../vendor/autoload.php';
use Dotenv\Dotenv;
$dotenv = Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

class Model
{
    protected $pdo;
    protected $table;

    public function __construct()
    {
        // Initialize database connection
        $host = $_ENV['DB_HOST'];
        $dbname = $_ENV['DB_NAME'];
        $username = $_ENV['DB_USER'];
        $password = $_ENV['DB_PASSWORD'];

        $this->pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Find a record by ID
    public function find($id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Fetch all records
    public function all()
    {
        $stmt = $this->pdo->query("SELECT * FROM {$this->table}");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Save a new record
    public function save($data)
    {try{
        $columns = implode(', ', array_keys($data));
        $placeholders = ':' . implode(', :', array_keys($data));

        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data);
    }catch (\PDOException $e) {
        die("Connection failed: " . $e->getMessage());
    }
        
    }

    // Update a record
    public function update($id, $data)
    {
        $set = [];
        foreach ($data as $key => $value) {
            $set[] = "$key = :$key";
        }
        $set = implode(', ', $set);

        $sql = "UPDATE {$this->table} SET $set WHERE id = :id";
        $data['id'] = $id;

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute($data); 
        
    }

    // Delete a record
    public function delete($id)
    {
        $stmt = $this->pdo->prepare("DELETE FROM {$this->table} WHERE id = :id");
        return $stmt->execute([':id' => $id]);
    }
}

//Specific Models(User mode)

class User extends Model
{
    protected $table = 'users';
}

//use the Models in Your Application
//Fetching All Users
$userModel = new User();
$users = $userModel->all();

foreach ($users as $user) {
    echo "User: {$user['name']}<br>";
}
//Finding a User by ID
$user = $userModel->find(1);

if ($user) {
    echo "User found: {$user['name']}";
} else {
    echo "User not found.";
}
//Creating a New User
$data = [
    'name' => 'john_doe',
    'email' => 'john@example.com'
];

if ($userModel->save($data)) {
    echo "User created successfully!";
} else {
    echo "Failed to create user.";
}
//Updating a User
$data = [
    'email' => 'john_new@example.com'
];

if ($userModel->update(1, $data)) {
    echo "User updated successfully!";
} else {
    echo "Failed to update user.";
}
//Deleting a User
if ($userModel->delete(1)) {
    echo "User deleted successfully!";
} else {
    echo "Failed to delete user.";
}

 