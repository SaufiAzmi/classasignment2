<?php
    $name = $_POST["name"];
    $matricNo = $_POST["matricNo"];
    $currentAddress = $_POST["currentAddress"];
    $homeAddress = $_POST["homeAddress"];
    $email = $_POST["email"];
    $mobilePhone = $_POST["mobilePhone"];
    $homePhone = $_POST["homePhone"];

    // Regular expressions for validation
    $nameRegex = '/^[a-zA-Z\s]+$/';
    $matricNoRegex = '/^[0-9]{7}$/';
    $addressRegex = '/^[a-zA-Z0-9\s,\'-]*$/';
    $emailRegex = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';
    $phoneRegex = '/^[0-9]{3}-[0-9]{8}$/';

    // Validate name
    if (!preg_match($nameRegex, $name)) {
        echo "Please enter a valid name.";
    }

    // Validate matric number
    if (!preg_match($matricNoRegex, $matricNo)) {
        echo "Please enter a valid matric number (7 digits).";
    }

    // Validate current address
    if (!preg_match($addressRegex, $currentAddress)) {
        echo "Please enter a valid current address.";
    }

    // Validate home address
    if (!preg_match($addressRegex, $homeAddress)) {
        echo "Please enter a valid home address.";
    }

    // Validate email
    if (!preg_match($emailRegex, $email)) {
        echo "Please enter a valid email address.";
    }

    // Validate mobile phone number
    if (!preg_match($phoneRegex, $mobilePhone)) {
        echo "Please enter a valid mobile phone number (e.g. 123-45678901).";
    }

    // Validate home phone number
    if (!preg_match($phoneRegex, $homePhone)) {
        echo "Please enter a valid home phone number (e.g. 123-45678901).";
    }

    // Database connection details
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "classasignment";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

       // Create table
       $sql = "CREATE TABLE classasignment (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(30) NOT NULL,
        matricNo VARCHAR(30) NOT NULL,
        currentAddress VARCHAR(50),
        homeAddress VARCHAR(50),
        email VARCHAR(50),
        mobilePhone VARCHAR(15),
        homePhone VARCHAR(15)
    )";

    // Execute query
    if ($conn->query($sql) === TRUE) {
        echo "Table classasignment created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Insert data into the database
    $sql = "INSERT INTO classasignment (name, matricNo, currentAddress, homeAddress, email, mobilePhone, homePhone)
            VALUES ('$name', '$matricNo', '$currentAddress', '$homeAddress', '$email', '$mobilePhone', '$homePhone')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
?>