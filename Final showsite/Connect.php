<?php

$FirstName = $_POST["First Name"];
$LastName = $_POST["Last Name"];
$SEX = $_POST["SEX"];
$GENDER = $_POST["GENDER"];
$Email = $_POST["E-mail"];
$City = $_POST["City"];
$Country = $_POST["Country"];
$Telephone = $_POST["Telephone#"]; 

//Database Connection
$conn = new mysqli('localhost','root','','registration form tdr');
if($conn->connect_error)
{
    die('-----------------CONNECTION FAILED--------------------- :' .$conn->connect_error);
}else
{
    $stmt = $conn->prepare("insert into registrations(FirstName, LastName, SEX, GENDER, Email, City, Country, Telephone)
    values(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssi" ,$FirstName, $LastName, $SEX, $GENDER, $Email, $City, $Country, $Telephone);
    $stmt->execute();
    echo "REGISTRATION --------------------SUCCESSFULLY----------------------- COMPLETED";
    $stmt->close();
    $conn->close();
}
?>