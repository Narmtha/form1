<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "register";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$firstName = $_POST['firstName'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$languages = implode(', ', $_POST['languages']);
$address = $_POST['address'];

// Insert form data into the database
$sql = "INSERT INTO tb_register (firstName, email, mobile, gender, dob, languages, address)
        VALUES ('$firstName', '$email', '$mobile', '$gender', '$dob', '$languages', '$address')";

if ($conn->query($sql) === TRUE) {
  echo "Registration successful!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
