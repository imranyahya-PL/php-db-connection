<?php
require "database.php";
// Create a connection
$conn = OpenCon();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SELECT query
$sql = "SELECT * FROM users";

// Execute the query
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Check if there are any rows returned
    if ($result->num_rows > 0) {
        // Fetch data
        while ($row = $result->fetch_assoc()) {
            // Access the column values
            $id = $row['id'];
            $name = $row['name'];
            $email = $row['email'];
            $phone = $row['phone'];

            // Output the data
            echo "ID: " . $id . "<br>";
            echo "Name: " . $name . "<br>";
            echo "Email: " . $email . "<br>";
            echo "Phone: " . $phone . "<br>";
            echo "<br>";
        }
    } else {
        echo "No data found in the 'users' table.";
    }
} else {
    echo "Error executing query: " . $conn->error;
}

// Close the result set
$result->close();

// Close the connection
$conn->close();
