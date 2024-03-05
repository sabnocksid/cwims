<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<div class="dis_play">
<div class="tableFixHead">
<input type="text" id="search" placeholder="&#xF002; Search" style="font-family: Arial, FontAwesome;">

<table id="myTable">
    
        <thead>
                <th>Sales Id</th>
                <th>Product</th>
                <th>Costumer</th>
                <th>Quantity</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
                
        </thead>
        <tbody>
   
        <?php
include 'php/config.php';
$query = "SELECT sales.id, sales.quantity, sales.amount, sales.date_added, 
          product.name AS product_name, costumers.name AS costumer_name         
          FROM sales
          LEFT JOIN product ON sales.product_id = product.product_id
          LEFT JOIN costumers ON sales.costumers_id = costumers.costumers_id";

$result = mysqli_query($con, $query);

if ($result && mysqli_num_rows($result) > 0) {
    
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>';
        echo '<td>' . $row['id'] . '</td>';
        echo '<td>' . $row['product_name'] . '</td>';
        echo '<td>' . $row['costumer_name'] . '</td>';
        echo '<td>' . $row['quantity'] . '</td>';
        echo '<td> Rs' . $row['amount'] . '/-</td>';
        echo '<td>' . $row['date_added'] . '</td>';

        echo '<td><a href="update.purchase.php?id='. $row['id'] . '" id="pencil"><i class="fa fa-pencil"></i></a><a href="delete.purchase.php?id=' . $row['id'] . '"><i class="fa fa-trash" id="trash"></i></a></td>';
        echo '</tr>';
    }
    echo '</table>';
} else {
    echo 'No records found.';
}

mysqli_close($con);
?>


</div>

<div class="added">
   
<?php include 'add.sales.php';?>
</div>
</div>
<style>
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





