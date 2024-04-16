<?php

session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

//Database connection
$conn = new mysqli('localhost','root','','classassignment2');
if ($conn->connect_error){
    die('Connection Failed : '.$conn->connect_error);
}

// Validate inputs
if (!preg_match($regexUsername, $username)) {
    echo 'Invalid name. Please use only letters and spaces.';
}
if (!preg_match($regexPassword, $password)) {
    echo 'Invalid password';
}

//validate
$query = "SELECT * FROM login WHERE username='$username'";

$result = $conn->query($query);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Store username in session
        $_SESSION['username'] = $username;
        header("Location: classasignment.html");
    } else {
        echo 'Login failed';
    }
} else {
    echo 'Login failed';
}

?>