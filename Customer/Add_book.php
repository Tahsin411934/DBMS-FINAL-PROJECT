<?php
session_start();
if($_SESSION['customer_login_status']!="log in" and ! isset($_SESSION['id']))
header("Location:../index.php");
if(isset($_GET['sign']) and $_GET['sign']=="out") {
    $_SESSION['admin_login_status']="loged out";
    unset($_SESSION['id']);
    header("Location:../index.php");
}

?>



<?php
if(isset($_POST['submit'])){
    include("connection.php");
  $id1=rand(10000,100000000);
	$Library_Id="A-".$id1;
    $uname=$_SESSION['id'];
    $order_date=date("Y/m/d");
    $name=$_POST['name'];
    $q=$_POST['quantity'];
    $sqlorder="insert into customer_order values('$Library_Id','$uname','$order_date',0)";
    mysqli_query($conn,$sqlorder);
    $query="select Product_Id from add_books where Book_Nmae='$name'";
    $r=mysqli_query($conn,$query);
    $row=mysqli_fetch_assoc($r);
    $bookid=$row['Product_Id'];
    $query1="select Price from add_books where Product_Id='$bookid'";
    $r1=mysqli_query($conn,$query1);
    $row1=mysqli_fetch_assoc($r1);
    $price=$row1['Price'];
    $total=$q*$price;
    $sql="insert into order_line values('$Library_Id', '$bookid', '$q', '$total')";
    mysqli_query($conn,$sql);
    echo "Your order has been successfully submitted.";
    }
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>ADD BOOKS</title>
    <style>
        .header-2 li:hover{
    background-color: #373d3d;;
    
}
select{ width: 450px;
            
        }
        input,select{
            padding: 10px;
            width: 380px;
            margin-bottom: 30px;
            border-radius: 10px;
            margin-left: 12px;

        }
        label{
            margin-right: 20px;
        }
        .crea{
            box-shadow: 10px 10px 10px 10px grey;
            width: 50%;
            margin-left: 300px;
            margin-top: 70px;
        }
    </style>
</head>
<body>
<div class="div1">
        <ul>
            <li class="icon"><i style="margin-left: 50px; color: seagreen;" class="fas fa-book"></i> &nbsp E BookStore</li>
            <input class="search" type="search" placeholder="Serach Here .....">
            <label for="search-box" class="fas fa-search"></label>
            <li style="margin-left: 30px;"><a style="color: darkblue;" href="">Your Profile</a></li>
        </ul>
       </div>
       
        <div class="header-2">
            <nav class="navbar">
                <ul>
                <li><a href="index.php">home </a></li> 
               <li><a href="Add_book.php">Fiction Book</a></li> 
               <li><a href="#home">History Book</a></li>  
               <li><a href="#home">Islamic Book</a></li> 
               <li style="margin-left:200px;" class="lo"><a href="?sign=out">Sign Out</a></li>
               <li><a href="#home">Change Password</a></li> 
                <!-- <a href="#featured">featured</a>
                <a href="#arrivals">arrivals</a>
                <a href="#reviews">reviews</a>
                <a href="#blogs">blogs</a> -->
            </ul>
            </nav>
        </div>
  
</div>

<div class="crea">
    
    
    <h2 style="text-align: center;margin-top: 20px;padding: 40px;">Order Book</h2>
    <div  class="post" style="margin-left: 50px;">
        
    <form action="Add_book.php" method="POST" enctype="multipart/form-data">  
        <label style=" ;" for="#">Select Book</label> 
        <select style=" margin-bottom: 30px;border-radius: 10px;height:43px;width:400px; margin-left:30px ;" name="name"> 
<?php
include("connection.php");
$sql="select Book_Nmae from add_books";
$r=mysqli_query($conn,$sql);
while($row=mysqli_fetch_array($r))
{
$id=$row['Book_Nmae'];
echo "<option value= '$id'>$id</option>";
}
?>
</select>
<br> 

        <label for="#">Book quantity</label>
        <input style="" type="text" name="quantity" placeholder="1" require> <br>
            <input class="aa" style="padding: 10px; font-size: 17px;margin-top: 3px; width: 20%;text-align: center;margin-left: 60%;background-color: seagreen;" type="submit" value="Place Order" name="submit">
        </form>
    </div>
    


    
</body>
</html>
