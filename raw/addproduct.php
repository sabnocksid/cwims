<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $product_name = $_POST['name'];
    $supplier_id = $_POST['suppliers'];
    $quantity = $_POST['quantity'];
    $rate = $_POST['rate'];
    $amount= $quantity * $rate;
    $date = date('Y-m-d ');
    $verify_query = mysqli_query($con,"SELECT name FROM product WHERE name='$product_name' ");
    


    if(mysqli_num_rows($verify_query) != 0 ){
        echo "<div class='message'>
                  <p>Product already exists</p>
                  <a href='javascript:self.history.back()'><button class='btn'>Go Back</button>

              </div> <br>";
     }
     else{

        
        mysqli_query($con,"INSERT INTO product(name,supplier_id,price) VALUES('$product_name','$supplier_id','$rate')") 
         or die("Error Occured");

        $pid = mysqli_query($con,"SELECT product_id FROM product WHERE name='$product_name' ");
        while ($row=mysqli_fetch_assoc($pid)) {
            mysqli_query($con,"INSERT INTO inventory(product_id,quantity) VALUES('{$row['product_id']}','$quantity')  ")  
            or die("Error Occured");
        } 
        $pid = mysqli_query($con,"SELECT product_id FROM product WHERE name='$product_name' ");
        while ($row=mysqli_fetch_assoc($pid)) {
          mysqli_query($con,"INSERT INTO purchase(product_id,quantity,amount,date_added) VALUES('{$row['product_id']}','$quantity','$amount','$date')  ") 
          or die("Error Occured"); 
        }  


           
        
    }
}
?>
<div class="boxedform">

<form action="" method="post">
<table id="bulbul">
    <tr>
        <td><input type="text" name="name" placeholder="Product Name"></td>
         <td><input type="text" name="quantity" placeholder="Opening Stock"></td>
<td>
    <select name="suppliers"><?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';




$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM suppliers";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
 
  while($row = $result->fetch_assoc()) {
    echo"<option value=".$row["supplier_id"].">" .$row["supplier_id"]. ")" .$row["name"]."</option>";
  }
  echo "</select>";
} else {
  echo "0 results";
}

$conn->close();
?>
</td>
  <td><input type="number" name="rate" placeholder="Rate"></td>    
        <td><input type="submit" id="submmt" name="submit" value="Add"></td>
    </tr>
</table>
</form>
</div>
<style>
    .boxedform{
       display: flex;
        margin-left: 10px;
        height: 50px;
        width: 950px;
        background: #26577C;
  }

  #submmt{
    width: 60px;
    height: 30px;
    border: none;
    outline: none;
    background: #fdfdfd;
    color:#26577C ;
  }
 
 #bulbul{
  width: 950px;
 }
 .message{
  color: #fdfdfd;
  text-align: center;
  text-decoration: none;
 }
 .btn{
  margin-left: 10px;
  text-decoration: none;
 }
</style>

