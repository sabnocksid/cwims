<?php
include("php/config.php");
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
   
    $verify_query = mysqli_query($con,"SELECT name FROM costumers WHERE name='$name' ");
    


    if(mysqli_num_rows($verify_query) != 0 ){
        echo "<div class='message'>
                  <p>costumer already exists</p>
              </div> <br>";
        echo "<a href='javascript:self.history.back()'><button class='btn'>Go Back</button>";
     }
     else{

        
        mysqli_query($con,"INSERT INTO costumers(name,address,contact) VALUES('$name','$address','$contact')") 
         or die("Error Occured");

    }
}
?>
<div class="boxedform">

<form action="" method="post">
<table id="bulbul">
    <tr>
        <td><input type="text" name="name" placeholder="Name" ></td>
         <td><input type="text" name="address" placeholder="Address"></td>
         <td><input type="text" name="contact" placeholder="Contact" ></td>
        <td colspan="2"><input type="submit" id="submmt" name="submit" value="Add"></td>
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

