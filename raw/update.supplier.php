<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "cwims";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = $_GET['id'];
$sql = "SELECT * FROM suppliers WHERE supplier_id=$id";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<form action='' method='post'>";
    echo "<label for='name'>Name:</label>";
    echo "<input type='text' id='name' name='name' value='".$row['name']."'><br>";
    echo "<label for='address'>Address:</label>";
    echo "<input type='text' id='address' name='address' value='".$row['address']."'><br>";
    echo "<label for='contact'>Contact:</label>";
    echo "<input type='text' id='contact' name='contact' value='".$row['contact']."'><br>";
    echo "<input type='submit' name='submit' value='Update'>";
    echo "</form>";
  }
} else {
  echo "0 results";
}
if (isset($_POST['submit'])) {
  $name = $_POST['name'];
  $address = $_POST['address'];
  $contact = $_POST['contact'];
  if (empty(trim($name))) {
    echo "Error: Name should not be empty";
  } elseif (!preg_match('/^[a-zA-Z ]+$/', $name)) {
    echo "Error: Name should contain only letters and spaces";
  }
  if (empty(trim($address))) {
    echo "Error: Address should not be empty";
  } elseif (!preg_match('/^[a-zA-Z ]+$/', $address)) {
    echo "Error: Address should contain only letters and spaces";
  }
  if (empty(trim($contact))) {
    echo "Error: Contact should not be empty";
  } elseif (!preg_match('/^[0-9]+$/', $contact)) {
    echo "Error: Contact should contain only numbers";
  }
  if (preg_match('/^[a-zA-Z ]+$/', $name) && preg_match('/^[0-9]+$/', $contact) && preg_match('/^[a-zA-Z ]+$/', $address) ) {
        $sql = "UPDATE suppliers SET name='$name', address='$address', contact='$contact' WHERE supplier_id=$id;";
      
        if ($conn->query($sql) === TRUE) {
          echo '<script>alert("supplier information updated successfully"); window.location.href="../supplier.php";</script>';
        } else {
          echo "Error updating customer information: " . $conn->error;
        }
      }
    }
      $conn->close();
      ?>