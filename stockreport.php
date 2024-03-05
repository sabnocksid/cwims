<?php 
   session_start();

   include("php/config.php");
   if(!isset($_SESSION['valid'])){
    header("Location: index.php");
   }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Stock Report</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
    <link rel="stylesheet" href="style/dashboard.css" >
  </head>
  <body>
  <?php include 'partial/sidenav.php';?>

    <nav class="navbar">
      <i class="fa-solid fa-bars" id="sidebar-close"></i>
      <div class="namecont">
      <h1 id="name1"> <?php echo $_SESSION['username']?>-Admin</h1> 
      <div class="img__wrap">
                 <img class="img__img" src="images/avatar.png" id="avtr" />
                 <p class="img__description"><a href="php/logout.php"><i class="fa fa-sign-out" id="hovtxt"></i></a></p>      
       </div>
      </div>
    </nav>
    
    <main class="main">
       <div class="maintop">
        <div class="pageinfo">
            <h3 id="nameD">Dashboard /</h3><script>
    var title = document.getElementsByTagName("title")[0].innerHTML;
    document.write("<h2 id='nameP'>" + title + "</h2>");
  </script>
        </div>
        <div class="mainmid">
        
            <?php include 'raw/report.stock.php';?>
        
        </div>
          
    </main>
  </body>
</html>

<script>
    const sidebar = document.querySelector(".sidebar");
const sidebarClose = document.querySelector("#sidebar-close");
const menu = document.querySelector(".menu-content");
const menuItems = document.querySelectorAll(".submenu-item");
const subMenuTitles = document.querySelectorAll(".submenu .menu-title");

sidebarClose.addEventListener("click", () => sidebar.classList.toggle("close"));

menuItems.forEach((item, index) => {
  item.addEventListener("click", () => {
    menu.classList.add("submenu-active");
    item.classList.add("show-submenu");
    menuItems.forEach((item2, index2) => {
      if (index !== index2) {
        item2.classList.remove("show-submenu");
      }
    });
  });
});

subMenuTitles.forEach((title) => {
  title.addEventListener("click", () => {
    menu.classList.remove("submenu-active");
  });
});
</script>
