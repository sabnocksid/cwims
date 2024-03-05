
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

// Delete user row from table based on given id
$sql = "DELETE FROM product WHERE product_id=$id";

header('location: display.product.php');
if ($conn->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $conn->error;
}
$conn->close();
?>


   
   