<?php
session_start();
if($_SESSION['admin_login_status']!="log in" and ! isset($_SESSION['id']))
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out") {
    $_SESSION['admin_login_status']="loged out";
    unset($_SESSION['id']);
    header("Location:../index.php");
}
?>




<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="styl.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>ADD BOOKS</title>
    <style>
     
    </style>
</head>
<body>
    <div class="div1">
        <ul>
            <li class="icon"><i style="margin-left: 50px; color: seagreen;" class="fas fa-book"></i> &nbsp E BookStore</li>
            <li class="title1"> <b>Welcome to Admin Pannel</b> </li>
        </ul>
       </div>
       <div class="header-2">
       <nav class="navbar">
       <ul>
      <li><a href="index.php">Home</a></li> 
      <li><a href="add.php">Add Book</a></li> 
      <li><a href="add_sta.php">order</a></li> 
      <li><a href="#home">Create Post</a></li>
      <li><a href="showproduct.php">Show Product</a></li> 
      <li style="margin-left:200px;" class="lo"><a href="?sign=out">Logout</a></li> 
      <li><a href="#">Change Password</a></li> 
       
   </ul>
   </nav>
    </div>
    <header style="width:330px;">
        <h1 style="margin: 30px;">About me</h1>
        <div class="about">
        <?php

    
    ?>
            <img src="a.jpg" alt="">
            <h3 class="name">Abrar Fahim</h3>
            <p class="post">Admin</p>
        </div>
        <div class="navbar">
            <ul>
                <li><a class="ab" href="index.php">Store</a></li>
                <li><a class="ab" href="Add_book.php">Order</a></li>
                <li><a class="ab" href="#home">Create post</a></li>
                <li><a class="ab" href="#home">Delevary</a></li>
                <li><a class="ab" href="#home">Contact</a></li>
            </ul>
        </div>
    </header>

    <?php
include("connection.php");
if(isset($_POST['submit'])){
    $sql="select * from add_books";
    $r=mysqli_query($conn,$sql);
    echo"<table id='customers'>";
    echo"<tr>
     <th>Product id</th>
     <th>Produc id</th>
     <th>Produ id</th>
     <th>Prod id</th>
     <th>Prot id</th>
     <th>Pro id</th>
     </tr>";
    while($row=mysqli_fetch_array($r))
    {
        $id=$row['product_id'];
        $price=$row['Price'];
        $Bname=$row['Book_Nmae'];
        $Wname=$row['Writer_Nmae'];
        $ct=$row['Catagories'];
        $img=$row['Image'];
        echo"<tr>
        <td>$id</td><td>$price</td><td>$Bname</td><td>$Wname</td><td>$ct</td><td>$img</td>
        </tr>";
    }
        echo"</table>";
    }
    ?>
    
    <form action="showproduct.php" method="POST" enctype="multipart/form-data">
     
     <input class="aa" style="padding: 10px; font-size: 17px;margin-top: 10px; width: 10%;text-align: center;margin-left: 50%;background-color: seagreen;" type="submit" value="ADD" name="submit">
    </form> 

    </div>
 
 <form action="SHOWPRODUCT.PHP" method="post">
 
 <div class= "row">
 <hr/>
 <br><br>
 <div class="col-25">
   <label for="bookid" ><b>Book Id: </b></label>
 </div>
 
 <div class="col-75">
      <select style="height:43px;width:1135px;" name="bookid">
   
   <?php
  include("connection.php");
  $sql="select Product_Id from add_books";
  $r=mysqli_query($conn,$sql);
  
   while($row=mysqli_fetch_array($r))
   {
    $id=$row['bookid'];
    echo "<option value= '$id'>$id</option>";
   }
   ?>
   
   </select>
    </div>
 
 </div>
 <div class="row">
  <div class="col-25">
   <label for="quantity"><b>Quantity:</b></label>
  </div>
  <div class="col-75">
   <input type="text" id="quantity" name="quantity" value='0' placeholder="quantity...">
  </div>
 </div>
 <div class="row">
  <div class="col-25">
   <label for="sprice"><b>Selling Price:</b></label>
  </div>
  <div class="col-75">
   <input type="text" id="sprice" name="sprice" value='0' placeholder="Insert selling price...">
  </div>
 </div>
 <div class="row">
  <input type="submit" class="button" value="Add" name="submit">
  <div class="row">
   <input type="submit" class="button" value="Update" name="update">
  </div>
 </div>
 </form>
 
 </div>
 
</div>
</body>
</html>

<?php

include("connection.php");
if(isset($_POST['submit']))
{
 $bookid=$_POST['bookid'];
 $quantity=$_POST['quantity'];
 $sprice=$_POST['sprice'];
 
 $query="insert into store values('$bookid','$sprice','$quantity')";
 if(mysqli_query($conn,$query))
 {
  echo "Successfully inserted!";
 }
 else
 {
  echo "error!".mysqli_error($conn);
 }
}
if(isset($_POST['update']))
{
 $bookid=$_POST['bookid'];
 $quantity=$_POST['quantity'];
 $sprice=$_POST['sprice'];
 
 if($sprice==0)
 {
  $query="update store set quantity=quantity+$quantity where bookid='$bookid'";
 }
 else
 {
  $query="update store set quantity=quantity+$quantity, sellingprice=$sprice where bookid='$bookid'";
 }
 
 if(mysqli_query($con,$query))
 {
  echo "Successfully updated!";
 }
 else
 {
  echo "error!".mysqli_error($con);
 }
}
?>



    
</body>
</html>