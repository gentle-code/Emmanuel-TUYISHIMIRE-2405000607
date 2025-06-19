<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login Form</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            background-color: #4A90E2;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-container {
            padding: 30px;
        }
        .cart-icon {
            text-align: center;
            margin-bottom: 20px;
        }
        
        .cart-icon i {
            font-size: 60px;
            color: white;
        }
        
        h2 {
            font-weight: bold;
            text-align: center;
            margin-top: 0;
            color: white;
        }
        form {
            width: 300px;
        }
        label {
            display: block;
            margin-top: 10px;
            color: white;
        }
        
        .forget-label {
            text-align: right;
            margin-top: 15px;
            cursor: pointer;
            font-size: 14px;
        }
        
        .forget-label:hover {
            text-decoration: underline;
        }
        
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 6px;
            margin-top: 5px;
            box-sizing: border-box;
            background-color: transparent;
            border: 2px solid white;
            color: white;
        }
        input[type="text"]::placeholder,
        input[type="password"]::placeholder {
            color: rgba(255,255,255,0.7);
        }
        input[type="submit"] {
            margin-top: 15px;
            padding: 6px 12px;
            background-color: white;
            color: #4A90E2;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        
        input[type="submit"]:hover {
            background-color: rgba(255,255,255,0.9);
        }
        
        p {
            color: white;
        }
    </style>
</head>
<body>

<div class="login-container">
    <div class="cart-icon">
        <i class="fas fa-shopping-cart"></i>
    </div>
    
<form method="post" action="login.php">
    
    <input type="text" id="username" placeholder="Username" name="username">
    <input type="password" id="password" placeholder="Password" name="password">

    <input type="submit" value="Login">
    <label class="forget-label">Forget Password</label>
</form>
</div>
<?php
// Database connection setup
$servername = "localhost";
$dbUsername = "root";       // default for XAMPP
$dbPassword = "root";           // leave empty for XAMPP
$dbName     = "db_emmanuel";  // replace with your DB name

// Create connection
$conn = new mysqli($servername, $dbUsername, $dbPassword, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle POST login submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user = $_POST['username'] ?? '';
    $pass = $_POST['password'] ?? '';

    // Sanitize input
    $user = $conn->real_escape_string($user);
    $pass = $conn->real_escape_string($pass);

    // SQL query to check credentials
    $sql = "SELECT * FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result && $result->num_rows === 1) {
        echo "<p><strong>Login successful!</strong> Welcome, $user.</p>";
    } else {
        echo "<p><strong>Login failed!</strong> Invalid username or password.</p>";
    }
}
?>


</body>
</html>

<!-- // Check if the request method is POST (i.e., a form submitted using method="post")
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the 'username' field from the POST request if it exists, otherwise default to empty string
    $user = $_POST['username'] ?? '';
    
    // Get the 'password' field from the POST request if it exists, otherwise default to empty string
    $pass = $_POST['password'] ?? '';

    // Display the submitted username and password using HTML <p> tag
    echo "<p><strong>POST Submitted:</strong><br>Username: $user<br>Password: $pass</p>";

// Check if the request method is GET (e.g., form submitted with method="get")
// AND ensure that 'username' is included in the query string
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['username'])) {
    // Get the 'username' from the GET request if it exists, otherwise default to empty string
    $user = $_GET['username'] ?? '';
    
    // Get the 'password' from the GET request if it exists, otherwise default to empty string
    $pass = $_GET['password'] ?? '';

    // Display the submitted username and password using HTML <p> tag
    echo "<p><strong>GET Submitted:</strong><br>Username: $user<br>Password: $pass</p>";
} -->



<!-- CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);


INSERT INTO users (username, password) VALUES ('admin', 'admin123'); -->