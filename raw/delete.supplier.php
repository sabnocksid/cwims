
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cwims";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$id = $_GET['id'];

$sql = "DELETE FROM suppliers WHERE supplier_id=$id";

header('location: display.product.php');
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Record delteted sucessfully ');</script>";
    header("location:table.php");
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>


   
   