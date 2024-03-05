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
    <title>Purchase Report</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />
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
        
            <?php include 'raw/report.purchase.php';?>
        
        </div>
          
    </main>
  </body>
</html>
<style>
   
@import url("https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap");
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
  overflow: hidden;
}
#img2233{
    width: 40%;
    margin-left: 55px;
}
.sidebar {
  position: fixed;
  height: 100%;
  width: 260px;
  background: #000;
  padding: 15px;
  z-index: 99;
}
#menu-title{
    color:#E55604;
}
#menlogo{
    color:#E55604;
    font-size: 18px; 
}
.logo {
  font-size: 25px;
  padding: 0 15px;
}
.sidebar a {
  color: #fff;
  text-decoration: none;
}
.menu-content {
  position: relative;
  height: 100%;
  width: 100%;
  margin-top: 40px;
  overflow-y: scroll;
}
.menu-content::-webkit-scrollbar {
  display: none;
}
.menu-items {
  height: 100%;
  width: 100%;
  list-style: none;
  transition: all 0.4s ease;
}
.submenu-active .menu-items {
  transform: translateX(-56%);
}
.menu-title {
  color: #fff;
  font-size: 14px;
  padding: 15px 20px;
}
.item a,
.submenu-item {
  padding: 16px;
  display: inline-block;
  width: 100%;
  border-radius: 12px;
}
.item i {
  font-size: 12px;
}
.item a:hover,
.submenu-item:hover,
.submenu .menu-title:hover {
  background: rgba(255, 255, 255, 0.1);
}
.submenu-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  color: #fff;
  cursor: pointer;
}
.submenu {
  position: absolute;
  height: 100%;
  width: 100%;
  top: 0;
  right: calc(-100% - 26px);
  height: calc(100% + 100vh);
  background: #000;
  display: none;
}
.show-submenu ~ .submenu {
  display: block;
}
.submenu .menu-title {
  border-radius: 12px;
  cursor: pointer;
}
.submenu .menu-title i {
  margin-right: 10px;
}
.navbar,
.main {
  left: 260px;
  width: calc(100% - 260px);
  transition: all 0.5s ease;
  z-index: 1000;
}
.sidebar.close ~ .navbar,
.sidebar.close ~ .main {
  left: 0;
  width: 100%;
}
.navbar {
  position: fixed;
  background: #D8D8D8;
  font-size: 25px;
  color: #26577C;
  cursor: pointer; 
  height: 80px;
}
.navbar #sidebar-close {
  cursor: pointer;
  padding: 18px;
}
.main {
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  z-index: 100;
  background: #fff;
}
.main h1 {
  color: #11101d;
  font-size: 40px;
  text-align: center;
}
</style>
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
<style>

   
* {
  margin: 0;
  padding: 0;
  border: 0;
}


.img__wrap {
  position: relative;
 margin-left: 310px;
 margin-top: -30px;
  height: 200px;
  width: 257px;
}

.img__description {
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  text-align: center;
  background: #000;
  color: #fff;
  visibility: hidden;
  opacity: 0;
  border-radius: 50%;
  height: 47.5px;
  width: 47.5px;

  transition: opacity .2s, visibility .2s;
}

.img__wrap:hover .img__description {
  visibility: visible;
  opacity: 1;
}
#avtr{
    width: 47px;
}
#hovtxt{
    color: #E55604;
   margin-top: 14px;
}
.namecont{
    background: #D8D8D8;
    width: 395px;
    float: right;
    margin-top: -21px;
    height: 100px;
}

#name1{
    margin-top: 50px;
    margin-left: 120px;
    font-size: 14px;
}
.maintop{
    width: 100%;
    height: 160px;
    background: #26577C;
    margin-top: -430px;
}
.pageinfo{
    display: flex;
    padding: 40px;
    color: #fff;

}
#nameP{
    margin-left: 5px;
    margin-top: 5px;
    font-size: 15px;
    color: #E55604;
}
#nameW{
    margin-left: 15px;
    margin-top: 25px;
    font-size: 18px;
    color: #E55604;
}
.mainmid{
    width: 100%;
    margin-left: 10%;
    margin-top: 6%;
    position: absolute;
}
.centbox{
    background: #d8d8d8;
    margin-top: 30px;
    width: 100%;
}
.details{
    margin-left: 250px;
    margin-top: 310px;
    height: 300px;
    width: 100%;
    position: absolute;
    display: flex;
}
.box{
    margin-top: 50px;
    width: 200px;
    height: 160px;
    background: #26577C;
    margin-left: 50px;
    border-radius: 20px;
    display: flex;
}
#infor{
    color: #D8D8D8;
    margin-top: 60px;
    margin-left:30px ;
    font-size: 55px;
}
#boxedinf{
    color:aliceblue;
    font-size: 10px;
    margin-left: 20px;
    margin-top: 95px;
}
#bottom{
    color: #D8D8D8;
    font-size: 20px;
}

</style>