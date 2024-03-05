<nav class="sidebar">
     <img src="images/logpcwims.png" id="img2233">

      <div class="menu-content">
        <ul class="menu-items">
          <div class="menu-title" id="menu-title">Main-Menu</div>

          <li class="item">
            <a href="home.php"><i class="fa fa-home" id="menlogo"></i> Home</a>
          </li>

          <li class="item">
          <a href="product.php"><i class="fa fa-list" id="menlogo"></i>Product</a>
          </li>

          <li class="item">
            <div class="submenu-item">
              <span><i class="fa fa-exchange" area-hidden="true" id="menlogo" ></i> Transaction</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                <i class="fa fa-exchange" area-hidden="true" id="menlogo" ></i>
              </div>
              <li class="item">
                <a href="purchase.php">Purchase</a>
              </li>
              <li class="item">
                <a href="sales.php">Sales</a>
              </li>
         
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span><i class="fa fa-bar-chart" area-hidden="true" id="menlogo" ></i> Report</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                <i class="fa fa-bar-chart" area-hidden="true" id="menlogo" ></i>
              </div>
              <li class="item">
                <a href="#">Purchase</a>
              </li>
              <li class="item">
                <a href="#">Sales</a>
              </li>
              <li class="item">
                <a href="#">Stock</a>
              </li>
            </ul>
          </li>
          <li class="item">
            <div class="submenu-item">
              <span><i class="fa fa-server" area-hidden="true" id="menlogo" ></i> Master Lists</span>
              <i class="fa-solid fa-chevron-right"></i>
            </div>

            <ul class="menu-items submenu">
              <div class="menu-title">
                <i class="fa-solid fa-chevron-left"></i>
                <i class="fa fa-server" area-hidden="true" id="menlogo" ></i>
              </div>
              <li class="item">
                <a href="#">Users</a>
              </li>
              <li class="item">
                <a href="supplier.php">Suppliers</a>
              </li>
            </ul>
          </li>
          <?php 
            
            $id = $_SESSION['id'];
            $query = mysqli_query($con,"SELECT*FROM users WHERE Id=$id");

            while($result = mysqli_fetch_assoc($query)){
                $res_Uname = $result['Username'];
                $res_id = $result['Id'];
            }
           " <li class='item'>";
           echo " <i class='fa fa-user-gear' id='menlogo'></i>"; echo "<a href='edit.php?Id=$res_id'> User</a>";
            "</li>"
            ?>
                </ul>
      </div>
      
    </nav>