<?php
$dbUser = 'root';
$dbPassword = '';
$databaseName = 'test';

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$userName = $_POST["userName"];
$phone = $_POST["phone"];
$email = $_POST["email"];
$address = $_POST["address"];
$city = $_POST["city"];
$state = $_POST["state"];
$country = $_POST["country"];
$zipCode = $_POST["zipCode"];
$password = $_POST["password"];
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(password_verify($password, $hashed_password)) {
    echo "Welcome";
}else {
    echo "Access Denied";
} 

//Build Connection (host, user, pass, database)
$dbConnection = mysqli_connect('localhost', $dbUser, $dbPassword, $databaseName) or die ('Connection Failed!');
//Build Query
// test.admin = database.table
$myQuery = "INSERT INTO test.admin (firstName, lastName, userName, phone, email, address, city, state, country, zipCode, hashed_password) VALUES ('$firstName', '$lastName', '$userName', '$phone', '$email', '$address', '$city', '$state', '$country', '$zipCode', '$hashed_password')";

//execute connection
$result = mysqli_query($dbConnection, $myQuery) or die ('Query Failed!!!!');
//close connection
$result = mysqli_close($dbConnection);
?>