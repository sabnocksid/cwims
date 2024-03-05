



    <!-- Your PHP-generated table goes here -->
    <?php
    // F<?php
    include 'php/config.php'; // Include the database connection file

    // Fetch data from the users table
    $query = "SELECT * FROM suppliers"; // Replace 'users' with your actual table name
    $result = mysqli_query($con, $query);
    
    if (mysqli_num_rows($result) > 0) {
        
        echo '<table border="1">';
        echo '<tr class="fixed-table"><th>Product ID</th><th>Name</th><th>Address</th><th>Contact</th></tr>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr class="scrollable-table">';
            echo '<td>' . $row['supplier_id'] . '</td>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['address'] . '</td>';
            echo '<td>' . $row['contact'] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
    } else {
        echo 'No records found.';
    }

    mysqli_close($con)
    ?>
   

<style>
.scrollable-table {
    height: 100px; /* Set your desired height */
    overflow: auto; 
    
}
.fixed-table{
    position: fixed;
}
th{
    width: 100px; 
}
td{
    width: 90px;
}
::-webkit-scrollbar {
    width: 10px; /* Customize scrollbar width */
}

::-webkit-scrollbar-thumb {
    background-color: #888; /* Customize scrollbar thumb color */
}
</style>