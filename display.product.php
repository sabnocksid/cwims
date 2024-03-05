<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
<div class="dis_play">
<div class="tableFixHead">
<input type="text" id="search" placeholder="&#xF002; Search" style="font-family: Arial, FontAwesome;">

<table id="myTable">
    
        <thead>
                <th>Product Id</th>
                <th>Name</th>
                <th>price</th>
                <th>Supplier Id</th>
                <th>Action</th>
                
        </thead>
        <tbody>
        <?php
    
    include 'php/config.php'; 

    $query = "SELECT * FROM product";
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        echo '<tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['product_id'] .'</div>'. '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td> Rs' . $row['price'] . '/- </td>';
            echo '<td> '  . $row['supplier_id'] . '</td>';
            ?>
            <?php
                $sid = $row['supplier_id'] 
            ?>
         
            <?php
            echo '<td><a href="update.product.php?id='. $row['product_id'] . '" id="pencil"><i class="fa fa-pencil"></i></a><a href="delete.product.php?id=' . $row['product_id'] . '"><i class="fa fa-trash" id="trash"></i></a></td>';
            echo '</tr>';
        }
      
    } else {
        echo 'No records found.';
    }

    mysqli_close($con)
    ?>
          </tr>
        </tbody>
		
    </table>

</div>

<div class="added">
   
<?php include 'addproduct.php';?>
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



