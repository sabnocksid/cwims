<?php
include("php/config.php");
if(isset($_POST['submit'])){
    
    $productID = $_POST['productID'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $amount = $quantity * $price;
    $date = date('Y-m-d ');
  

        

    $pid = mysqli_query($con, "SELECT product_id FROM product WHERE product_id = '$productID'");
    while ($row = mysqli_fetch_assoc($pid)) {
        $newQuantity = $quantity; 
        mysqli_query($con, "UPDATE inventory SET quantity = quantity + $newQuantity WHERE product_id = '{$row['product_id']}'")
            or die("Error occurred while updating inventory.");
    }
     
        $pid = mysqli_query($con,"SELECT product_id FROM product WHERE product_id='$productID' ");
        while ($row=mysqli_fetch_assoc($pid)) {
          mysqli_query($con,"INSERT INTO purchase(product_id,quantity,amount,date_added) VALUES('{$row['product_id']}','$quantity','$amount','$date')  ") 
          
          or die("Error Occured"); 
          
        }  

    
           
        
    }

?>
<div class="boxedform">

<form action="" method="post" id="my-form">
<table id="bulbul">
    <tr>
<td>
<select name="productID" id="products">
        <option value="">Product</option>
        <?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';




$conn = new mysqli($host, $user, $pass, $db);


if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT * FROM product ";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
        
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<option value="' . $row['product_id'] . '" data-price="' . $row['price'] . '">'
                . htmlspecialchars( $row['name']) . '</option>';
        }
        }
        ?>
    </select>
</td>
        <td><input type="text" name="price" id="priceInput" placeholder="Price" value=""></td>  
         <td><input type="text" name="quantity" placeholder="Quantity"></td>

        <td><input type="submit" id="submmt" name="submit" value="Add" onclick="submitForm()"></td>
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
</style>



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    
    
    
    <script>
        $(function() {
            $('#products').change(function() {
                // Get selected option's data-price attribute
                var selectedPrice = $('#products option:selected').data('price');
                // Update price input field
                $('#priceInput').val(selectedPrice);
            });
        });
    </script>
</body>
</html>
<script>
    function submitForm() {
        // Prevent the form from submitting (optional)
        e.preventDefault();

        // Reset the form fields using jQuery
        $('#my-form')[0].reset();
    }
</script>