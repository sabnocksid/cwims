<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<table id="tabul">
    <thead id="hesd">
      <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>Email</th>        
        <th>Address</th>               
        <th>Action</th>               
    </tr>
</thead>
<tbody>
  <?php
  require("php/config.php");
  $query="SELECT * FROM users ";
  $result = mysqli_query($con, $query)or die(mysqli_error($con));
  while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
  {
    ?>
    
    <tr id="row1">
   
      <td><?php echo $row['Id']; ?></td>
      <td><?php echo $row['Username']; ?></td>
      <td><?php echo $row['Email']; ?></td>
      <td><?php echo $row['Address']; ?></td>
      <td><a href="update.product.php?id=<?php echo $row['Id']; ?>" id="pensil"><i class="fa fa-pencil"></i></a><a href="delete.product.php?id=<?php echo $row['Id']; ?>"><i class="fa fa-trash" id="trash"></i></a></td>
  
  <?php
}
?>
 
</tr>

</tbody>
</table>
<style>
    body{
        padding: 0px;
        margin: 0px;
    }
  #tabul{
    background: #d8d8d8;
    width: 790px;
    min-height:auto;

  }
  #hesd{
    background: #26577C ;
    color: #ffff;
    height: 40px;
  }
  #row1{
    text-align: center;
    color: #26577C;
  
}
td{
    border-bottom:1px solid #26577C; 

}
 

  #pensil{
    padding: 10px;
    color: #26577C;
  }
  #trash{
    padding: 10px;
    color: red;
  }

</style>