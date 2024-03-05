<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
   
    $verify_query = mysqli_query($con,"SELECT name FROM suppliers WHERE name='$name' ");
    
    if(mysqli_num_rows($verify_query) != 0 ){
        $message = 'Record already exists!';
    }
    else{
        mysqli_query($con,"INSERT INTO suppliers(name,address,contact) VALUES('$name','$address','$contact')") 
        or die("Error Occured");

        $message = 'Record added successfully!';  
        header('Location: supplier.php');
        exit;   
            
    }
}
?>


    <?php if(isset($message)): ?>
        <script>alert('<?php echo $message; ?>');</script>
    <?php endif; ?>
   

<div class="boxedform">

<form action="" method="post" id="myForm">
<table>
    <th colspan="2">Add Supplier</th>
    <tr>
        <td><label for="">Supplier Name</label> <br>
         <input type="text" name="name" ></td>
        <td><label for="">Address</label><br>
         <input type="text" name="address" ></td>
        </tr>
    <tr>
        <td><label for="">Contat</label> <br>
         <input type="text" name="contact" ></td>
        </tr>
    
    <tr>
        <td colspan="2"><input type="submit" id="submmt" name="submit" value="Add"></td>
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
 
</style>

<script>
    document.getElementById('myForm').reset();
</script>