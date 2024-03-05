<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $id = $_GET['id'];
    
    
    $verify_query = mysqli_query($con,"SELECT supplier_id FROM suppliers WHERE supplier_id='$id' ");
    
    mysqli_query($con,"UPDATE suppliers SET name='$name', address ='$address', contact='$contact' WHERE psupplier_id='$id'")
         or die(mysqli_error($con));

        
}
?>



<form action="" method="post">
<table>
    <tr>
    
    <td><label for="">Supplier Name</label> <br>
    <?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';
$id =$_GET['id'];



$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM suppliers where supplier_id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {

    echo "<input type='text' name='name' value=".$row['name'].">" ;
      $sup = $row['supplier_id'];
      echo "</td>";
      echo "<td>"; 
      echo"<label>" ;
     echo 'Address'; echo '<br>';

      echo '</label>';
      echo "<input type='text' name='address' value=".$row['address']. ">";
      echo 'contact'; echo '<br>';
      echo "<input type='number' name='contact' value=".$row['contact']. ">";

      echo '</label>';
  }
} else {
  echo "0 results";
}

$conn->close();
?>
</td>

</tr>   
    <tr>
        <td colspan="2"><input type="submit" name="submit" value="Update"></td>
    </tr>
</table>
</form>


<tr>
   
   