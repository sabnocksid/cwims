
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
      min-height: 1100px;
}
 
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

$sql = "SELECT SUM(quantity) AS total_amount FROM inventory";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_inv = $row['total_amount'];
} else {
    $total_amount = 0;
}

$conn->close();
?>

<div class="dis_play">
<div class="tableFixHead">
<table id="myTable">
    <div class="howdey">

</table>
<table id="tabbble">
<thead>
    <th>Product</th>
    <th>Balance</th>
</thead>
<?php
include 'php/config.php';

$query = "SELECT inventory.quantity AS quantity, product.name AS product_name
FROM inventory
LEFT JOIN product ON inventory.product_id = product.product_id";

$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        
        echo '<td>'. $row['product_name']  .'</td>';
        echo '<td>' . $row['quantity'] .'</td>';
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
 <td colspan="1" id="bigg" >Closing Inventory of CWIMS as on <a id="current_date"></a></td>
 <?php
       echo '<td id="totot">' .str_repeat(' ', 5) .$total_inv. 'Units</td>';
        ?>
</tr>

</table>
</div>
</table>
<style>
  
</style>


<style>
    @media print
{
.body {display:none;}
#myTable{
     width: 90%;
     margin-left: auto !important;
      margin-right:auto !important;
   font-size: 7px;
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
    #logoprint{
        display: none;
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
#printer{
    color: #26577C;
    font-size: 20px;
    cursor: pointer;
    margin-left: 450px;
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

