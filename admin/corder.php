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
   <link rel="stylesheet" href="styleforsp.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>ADD BOOKS</title>
    <style>
        td a{
            color:black;
        }
        th{
            background-color:Aqua;width:200px;
        }
        input{
            padding: 10px;
            width: 450px;
            margin-bottom: 30px;
            border-radius: 10px;

        }
        label{
            margin-right: 20px;
        }
        #cars{
            padding: 10px;
            width: 450px;
            margin-bottom: 30px;
            border-radius: 10px;
            margin-left: 10px;
            
        }
        .crea{
            /* box-shadow: 10px 10px 10px 10px grey; */
            width: 50%;
            margin-left: 150px;
            margin-top: 0px;
        }
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
      <li><a href="add.php">Add New Book</a></li> 
      <li><a href="corder.php">order</a></li> 
      <li><a href="last.php">Update</a></li>
      <li><a href="productshow.php">Show All Books</a></li> 
      <li style="margin-left:200px;" class="lo"><a href="?sign=out">Logout</a></li> 
      <li><a href="changepass.php">Change Password</a></li> 
       
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
                <li><a class="ab" href="Add.php">Order</a></li>
                <li><a class="ab" href="#home">Create post</a></li>
                <li><a class="ab" href="#home">Delevary</a></li>
                <li><a class="ab" href="#">Contact</a></li>
            </ul>
        </div>
    </header>
    <table  style="width:800px; line-height:50px;margin-left:100px;margin-top:50px;align=center border=1px"> 
    <div class="row">
        <div class="container">
        <h2 style= "text-align:center;margin-bottom:-40px;padding:20px">All Customer orders</h2>
        <div class="row">
        <?php
        include("connection.php");
        $sql="select * from customer_order where status=0";
        $r=mysqli_query($conn, $sql);
        echo "<table id='customers'>";
        echo "<tr>
        <th>Order ID</th>
        <th>Customer ID</th>
        <th>Order Date</th>
        <th>Action</th>
        </tr>";
    
        while ($row=mysqli_fetch_array($r))
        {
            
        $oid=$row['Order_Id'];
        $cid=$row['cus_id'];
        $odate=$row['Date'];
    
        echo "<tr>
        <td>$oid</td>
        <td>$cid</td>
        <td>$odate</td>
        <td><a href='corder.php?action=show&id=$oid'>Show Details</a></td>
        </tr>";
        }
        
        echo "</table>";
        ?>
        </div>
        </div>
        <div class="container">
        <?php
        include("connection.php");
        echo "<hr/>";
        echo "<h2>Order Details</h2>";
        if (isset($_GET['action']) and $_GET['action']== 'show'){

       
        $oid=$_GET['id'];
        $_SESSION ['orderid']=$oid;
        $sql="select * from order_line where order_Id='$oid'";
        $r=mysqli_query($conn, $sql);
        echo "<table id='customers'>";
        echo "<tr>
        <th>Product ID</th>
        <th>Quantity</th>
        <th>Total Price</th>
        </tr>";
        $gtotal=0;
        while ($row=mysqli_fetch_array($r))
        {

            $pid=$row['p_id'];
            $q=$row['quantity'];
            $total=$row['total'];
        echo "<tr>
        <td>$pid</td><td>$q</td><td>$total</td>
        </tr>";
        $gtotal=$gtotal+$total;
        }
        echo "<tr><td colspan='2' align='right'>Grand Total</td>
        <td>$gtotal</td></tr>";
        echo "</table>";
    }
    ?>
    

    </div>
<form action='corder.php' method="post">
<div class="row">
<input style="font-size:21px;margin-left: 172px; background-color: #4CAF50; color: white;padding: 10px 12px;text-align: center" type="submit" value="Confirm Order" name="corder"">

</div>
</form>
<?php
include("connection.php");
if (isset($_POST['corder']))
$oid=$_SESSION ['orderid'];
$sql="select * from order_line where order_Id='$oid'";
$r=mysqli_query($conn, $sql);
while ($row=mysqli_fetch_array($r))
{
$pid=$row['p_id'];
$q=$row ['quantity'];
$sqlupdate="update add_books set Quantity=Quantity-$q where Product_Id='$pid'";
mysqli_query($conn, $sqlupdate);
}
$sqlorderupdate="update customer_order set status=1 where order_Id='$oid'";
mysqli_query($conn, $sqlorderupdate);
echo "order confirmed!";

?>
</div>
</body>
</html>
<?php 