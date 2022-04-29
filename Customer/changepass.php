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

include("connection.php");

if(isset($_POST['update']))
{
$id=$_POST['Id'];
$bookid=$_POST['Password'];
$sprice=$_POST['sprice'];

if($sprice>0)
{
$query="update sign_up set Password='$sprice' where Password='$bookid'AND Library_Id ='$id'";
}
if(mysqli_query($conn,$query))
{
echo " <h3>Successfully updated password !</h3>";
}
else
{
echo "error!".mysqli_error($conn);
}
}
?>
</body>
</html>



 
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="style.css">
    <title>E BookStore</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        .header-2 li:hover{
    background-color: #373d3d;;
    
}
.prod{
    box-shadow: 10px 10px 10px 10px gray;
    width: 500px;
    height: 450px;
    margin-left: 300px;
}
        li{
            
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
               <li><a href="changepass.php">Change Password</a></li> 
                <!-- <a href="#featured">featured</a>
                <a href="#arrivals">arrivals</a>
                <a href="#reviews">reviews</a>
                <a href="#blogs">blogs</a> -->
            </ul>
            </nav>
        </div>
  
</div>

<div  style="height:500px;width:550px;margin-right:200px" class="prod">
   
    <form action="changepass.php" method="post">
<div class= "row">
<hr/>
<br><br>
<div class="col-25">
    <h3 style="margin-left: 30px; margin-bottom: 30px;">change Password </h3>
<label  style="height:43px;width:200px; margin-left:30px ;" for="bookid" ><b>Your Id: </b></label>
</div>
<div class="col-75">
<input type="text"  style="height:43px;width:300px; margin-left:30px ;" name="Id" placeholder="user id">
</input>
<br>
<br>
<label  style="height:43px;width:200px; margin-left:30px ;" for="bookid" ><b>Current Password: </b></label>
</div>
<div class="col-75">
<input type="password"  style="height:43px;width:300px; margin-left:30px ;" name="Password" placeholder="Old Password...">

</input>

</div>
</div>
<div style="height:50px;width:400px; "class="row">
<div class="col-25">
    <br>
</div>
<label style="height:43px;width:200px; margin-left:30px ;" for="sprice"><b>New Password</b></label>
</div>
<div class="col-75">
<input  style="height:43px;width:300px; margin-left:30px ;" type="password" id="sprice" name="sprice" placeholder="New Password">
</div>

<input style="margin-top: px;margin-left: 172px; background-color: #4CAF50; color: white;padding: 15px 32px;text-align: center" type="submit" class="button" value="Reset Password" name="update">
</div>
</div>
</form>
</div>
</div>
</div>

