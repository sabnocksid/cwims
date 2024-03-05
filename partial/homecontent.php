
      <?php
                $con=mysqli_connect("localhost","root","","cwims");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                   
                      
                
                      $sql="SELECT * FROM purchase ";

                
                if ($result=mysqli_query($con,$sql))
          
           $result = mysqli_query($con,"SELECT sum(quantity) FROM purchase");
           while($rows = mysqli_fetch_array($result)){?>
             <?php $purchase_no = $rows['sum(quantity)'];?> 
        
            <?php
        }         

     
      ?>
      <?php
                $con=mysqli_connect("localhost","root","","cwims");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                   
                      
                
                      $sql="SELECT * FROM sales ";

                
                if ($result=mysqli_query($con,$sql))
          
           $result = mysqli_query($con,"SELECT sum(quantity) FROM sales");
           while($rows = mysqli_fetch_array($result)){?>
             <?php $sales_no = $rows['sum(quantity)'];?> 
        
            <?php
        }         

     
      ?>
      <?php
                $con=mysqli_connect("localhost","root","","cwims");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                   
                      
                
                      $sql="SELECT * FROM suppliers ";

                
                if ($result=mysqli_query($con,$sql))
          
           $result = mysqli_query($con,"SELECT COUNT(supplier_id) FROM suppliers");
           while($rows = mysqli_fetch_array($result)){?>
             <?php $supplier_no = $rows['COUNT(supplier_id)'];?> 
        
            <?php
        }         

     
      ?>
      <?php
                $con=mysqli_connect("localhost","root","","cwims");
                // Check connection
                if (mysqli_connect_errno())
                  {
                  echo "Failed to connect to MySQL: " . mysqli_connect_error();
                  }
                   
                      
                
                      $sql="SELECT * FROM suppliers ";

                
                if ($result=mysqli_query($con,$sql))
          
           $result = mysqli_query($con,"SELECT COUNT(costumers_id) FROM costumers");
           while($rows = mysqli_fetch_array($result)){  ?>
           <?php $costumer_no =  $rows['COUNT(costumers_id)'];?> 
        
            <?php
        }         

     
      ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
      <div class="container">
        <div class="columns">
          <div class="boxes">
          <div class="falogo"><div class="semicircled"><i class="fa fa-box" id="whitelogo"></i></div><div class="circled"> <i class="fa fa-box" id="infor"></i></div><h3 id="nummmber"><?php echo $purchase_no ?></h3> <h4>Incoming Goods</h4> <div class="liner"> <a href="purchase.php" id="visit2020">View</a></div></div>
          </div>
          <div class="boxes">
          <div class="falogo"><div class="semicircled"><i class="fa fa-box" id="whitelogo"></i></div><div class="circled"> <i class="fa fa-box" id="infor"></i></div><h3 id="nummmber"><?php echo $sales_no ?></h3> <h4>Outgoing Goods</h4> <div class="liner"><a href="sales.php" id="visit2020">View</a></div></div>
          </div>
          <div class="boxes">
          <div class="falogo"><div class="semicircled"> <i class="fa fa-truck" id="whitelogo"></i></div><div class="circled"> <i class="fa fa-truck" id="infor"></i></div><h3 id="nummmber"><?php echo $supplier_no ?></h3> <h4>Suppliers</h4><div class="liner"><a href="supplier.php" id="visit2020">View</a></div></div>
          </div>
          <div class="boxes">
          <div class="falogo"><div class="semicircled"><i class="fa fa-users" id="whitelogo"></i></div><div class="circled"> <i class="fa fa-users" id="infor"></i></div><h3 id="nummmber"><?php echo $costumer_no ?></h3> <h4>Costumers</h4><div class="liner"> <a href="costumers.php" id="visit2020">View</a><div></div>
          </div>
        </div>
      </div>
     
      <style>
        body{
          padding: 0;
          margin: 0;
        }
        .container{
          width: 80%;
          height:300px;
          margin-top: 40px;
          margin-left: 5%;
        }
        .columns{
          width: 100%;
          height: 260px;
          display: flex;
        }
        .boxes{
          width: auto;
          min-width:200px;
          height:240px;
          background:#d8d8d8;
          margin-left: 30px;
          position: relative;
          
        }
        .falogo{
          text-align: center;
          margin-top: 20px;
        }
        .circled{
          border-radius: 50%;
          margin-left: 33%;
          background: black;
          height:70px;
          width:70px;
        }

        #infor{
          font-size:45px;
          margin-top: 10px;
          color:#fff;
        }
        .semicircled{
          border-radius: 0 0 100px 100px;
          background: #26577C;
          width: 200px;
          height: 100px;
          position: absolute;
          margin-top: -19px;
         opacity: 0;
         transition: opacity 0.1s ease;
        }
        #whitelogo{
          color: #E55604;
          font-size: 60px;
          margin-top: 10px;
        }
        .boxes:hover .semicircled{
          opacity:1;
        }
        #nummmber{
          color:#E55604 ;
          margin-top: 15px;
        }
        #visit2020{
          text-decoration: none;
          color: #d8d8d8;
          font-size: 20px;
        }
        .liner{
        background: #26577C;
        height: 20px;
        margin-top: 40px;
        height: 40px;
        }
        .sidebar.close ~ .container {
  margin-left: 10%;
  width: 100%;
}
      </style>
  

