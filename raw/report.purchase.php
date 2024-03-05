<style>
@media print {
   .sidebar{
    margin-left: -250px;
   } 
   .navbar{
    display: none;
    margin-top: -400px;
   }
   .maintop{
    color: white;
    margin-top: -200px;
   }

   #nameD{
    margin-top:-200px;
   }
   #nameP{
   display: none;
   }
   #printer{
    display: none;
   }
   .dis_play{
    position: fixed;
    margin-top: 10px;
    top: 0;
    left: 0;
    overflow: visible;
   }
   #tabbble{
    width: 100%;
    height: auto;
    border-right: 1px solid black;
   }
   th{
    border-bottom: 1px solid black;
   }
  
   .tableFixHead {
    overflow: visible;
       min-width: 800px;
      min-height: 600px;
}
 
}
#printer{
    color: #26577C;
    font-size: 20px;
    cursor: pointer;
    margin-left: 450px;
}
</style>

<button onclick="window.print()" id="printer"><i class="fa fa-print"></i></button>
<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'cwims';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT SUM(amount) AS total_amount FROM purchase";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_amount = $row['total_amount'];
} else {
    $total_amount = 0;
}

$conn->close();
?>



<style>
   
    #ment{
        border-right: 1px solid black;
    }
    #totot{
        color:white ;
        background: #000;
    }
</style>
<div class="dis_play">
<div class="tableFixHead">
<table id="myTable">
 
        <thead>
        <th>Date</th>
        <th>Particulars</th>
        <th>Purchase Id</th>
        <th>Details</th>
        <th>Total</th>   
        </thead>
        <tbody>
   
        <?php
include 'php/config.php';

$query = "SELECT purchase.id, purchase.quantity, purchase.amount, purchase.date_added,
          product.name AS product_name, suppliers.name AS supplier_name,product.price AS product_price
          FROM purchase
          LEFT JOIN product ON purchase.product_id = product.product_id
          LEFT JOIN suppliers ON product.supplier_id = suppliers.supplier_id";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['date_added'] . '</td>';
        echo '<td>' . $row['quantity'] .str_repeat(' ', 5) . $row['product_name'] .str_repeat(' ', 5)  .'@'.str_repeat(' ', 5) .'Rs'. $row['product_price'] .str_repeat(' ', 5). 'from'.str_repeat(' ', 5). $row['supplier_name'] .'</td>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td id="ment"> Rs' . $row['amount'] . '/-</td>';
        ?>
       
        <?php
        echo '</tr>';
    }
    
} else {
    echo 'No records found.';
}

mysqli_close($con);
?>
<tr>
    <td colspan="4" id="bigg" >Total Purchase Amount of CWIMS as on <a id="current_date"></a></td>
 <?php
       echo '<td id="totot">' .'Rs'.str_repeat(' ', 5) .$total_amount. '</td>';
        ?>
</tr>


</div>

</div>
<style>
    @media print
{
.body {display:none;}
#myTable{
     width: 100%;
}
}

   
#current_date{
    color: #26577C;
}
	.attr{
		height: 20px;
		width: 100%;
		background: #26577C;
		
	}
   
    .tableFixHead {
        overflow: auto;
        height: 100px; 
        margin-left: 10px;
        background: #d8d8d8;
       
    }
    .tableFixHead thead th {
        position: sticky;
        top: 0;
        z-index: 1;
    }
    /* Common table styling */
    table {
        border-collapse: collapse;
        width: 100%;
        font-size: 15px;
       
    }
    th, td {
        padding: 8px 16px;
    }
    th {
        background: #eee;
    }

    .tableFixHead {
        overflow: auto;
        height: 400px; 
        width: 950px; 
    }
    .tableFixHead thead th {
        position: sticky;
        top: 0;
        z-index: 1;
    }
    .tableFixHead tbody th {
        position: sticky;
        left: 0;
    }
    /* Common table styling */
    table {
        border-collapse: collapse;
        width: 100%;
    }
    th, td {
        padding: 8px 16px;
        white-space: nowrap; 
        height: 50px;
    }
    th {
        background: #26577C;
        color: #eee;
    }
</style>


<style>
    /* Borders (if needed) */
    .tableFixHead,
    .tableFixHead td {
        box-shadow: inset 1px -1px #000;
    }
    .tableFixHead th {
        box-shadow: inset 1px 1px #000, 0 1px #000;
    }
    #submtt{
        height: 30px;
        width: 60px;
        color: #26577C;
        background: #eee;
        border-radius: 10px;
        border: none;
        
    }
	#fixedfoof td{
		
	    border:2px solid black ;
		padding: 8px 16px;
        white-space: nowrap; 
        height: 50px;
	}

    
    .dis_play{
        display: block;
    }
   
    .added{
		margin-left: 10px;
        height: 50px;
        width: 950px;
        background: #26577C;
        
    }
	
    #top_ic{
        text-align: center;
        color: #26577C;
        margin-top: 15px;
    }
    #search{
        width: 300px;
        height: 30px;
        margin-bottom: 8px;
        margin-right: 12px;
        float: right;
        outline: #26577C;
        border-radius: 5px;
        background: #eee;
        color: #26577C;
        font-size: 20px;
    }
    #toperer{
       display: none;
    }
   
    #butt{
        float: right;
        margin-top: -15px;
        margin-right: 7px;
        height: 18px;
        width: 18px;
        border-radius: 50%;
        background: red;
        color: #eee;
        border: none;
        cursor: pointer;
    }
    #pencil{
     color: #26577C;
     margin-right: 10px;
     margin-left: 10px;
    }
    #trash{
      color: red;
    }
::-webkit-scrollbar {
    width: 5px;

}


::-webkit-scrollbar-track {
    background: #f1f1f1;
}


::-webkit-scrollbar-thumb {
    background: #26577C;
    border-radius: 5px;
    
}


::-webkit-scrollbar-thumb:hover {
    background: #555;
}
</style>


    
    
<script>
        const searchInput = document.getElementById('search');
        const tableRows = document.querySelectorAll('#myTable tbody tr'); 

        searchInput.addEventListener('keyup', function() {
            const searchTerm = this.value.toLowerCase();
            tableRows.forEach(row => {
                const rowData = row.textContent.toLowerCase();
                row.style.display = rowData.includes(searchTerm) ? 'table-row' : 'none';
            });
        });
    </script>
</html>

<script>
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
    </script>


