



<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "table";
$conn = new mysqli($servername, $username, $password,$dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$enrollment=$_POST["name"];
$password=$_POST["email"];
echo "Connected successfully";
$sql = "INSERT INTO ww (enroll,pass)
VALUES ('$enrollment','$password')";
if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}$conn->close();
?>