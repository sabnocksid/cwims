<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $product_name = $_POST['name'];
    $supplier_id = $_POST['suppliers'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $id = $_GET['id'];
    $amount = $rate * $quantity;
    
    $verify_query = mysqli_query($con,"SELECT product_id FROM product, purchase, inventory WHERE product_id='$id' ");
    
    mysqli_query($con,"UPDATE product SET product_name='$product_name', supplier_id ='$supplier_id', price='$rate' WHERE product_id='$id'")
         or die(mysqli_error($con));

        $pid = mysqli_query($con,"SELECT product_id FROM product WHERE product_id='$id' ");
        while ($row=mysqli_fetch_assoc($pid)) {
            mysqli_query($con,"UPDATE inventory SET quantity='$quantity'  WHERE product_id='".$row['product_id']."' ")
            or die(mysqli_error($con));
        } 
        $pid = mysqli_query($con,"SELECT product_id FROM product WHERE product_id='$id' ");
        while ($row=mysqli_fetch_assoc($pid)) {
            mysqli_query($con,"UPDATE purchase SET quantity='$quantity', amount='$amount'  WHERE product_id='".$row['product_id']."' ")
          or die(mysqli_error($con)); 
        }  
}
?>

<div class="boxedform">

<form action="" method="post">
<table>
  <th colspan="2">Update Product</th>
    <tr>
    
    <td><label for="">Product Name</label> <br>
    <?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';




$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM product";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {

    echo "<input type='text' name='name' value=".$row['product_name'].">" ;
      $sup = $row['supplier_id'];
      echo "</td>";
      echo "<td>"; 
      echo"<label>" ;
     echo 'Rate'; echo '<br>';

      echo '</label>';
      echo "<input type='number' name='rate' value=".$row['price']. ">";
      
  }
} else {
  echo "0 results";
}

$conn->close();
?>
</td><tr>
    <td><label for="">Quantity</label> <br>
    <?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';




$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {

    echo "<input type='text' name='quantity' value=".$row['quantity'].">" ;
      
     
  }
} else {
  echo "0 results";
}

$conn->close();
?>
</td>

<td>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';




$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM suppliers WHERE supplier_id  ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo"<label>Supplier</label>";
    echo"<br>";
echo"<select name='suppliers'>";
while($row = $result->fetch_assoc()) {
echo"<option value=".$row["supplier_id"]." name='suppliers'>" .$row["name"]."</option>";
}
echo "</select>";
} else {
echo "0 results";
}

$conn->close();
?>
</td>   
</tr>   
    <tr>
        <td colspan="2"><input type="submit" id="submmt" name="submit" value="Update"></td>
    </tr>
</table>
</form>
</div>



   
<style>
  .boxedform{
    background: #fdfdfd;
    height: 300px;
    width: 350px;
    display: flex;
    flex-direction: column;
    padding: 25px 25px;
    border-radius: 20px;
    box-shadow: 0 0 128px 0 rgba(0,0,0,0.1),
                0 32px 64px -48px rgba(0,0,0,0.5);
                margin-left:35% ;
                margin-top:200px ;
  }
  form{
    height: 600px;
    width: 370px;
  }
  #submmt{
    width: 60px;
    height: 30px;
    border: none;
    outline: none;
    background: #26577C;
    color: #fdfdfd;
    margin-top: 70px;
    margin-left: 140px;
  }
  input{

  }
</style>