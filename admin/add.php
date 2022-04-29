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
<?php
include("connection.php");
if(isset($_POST['submit'])){
  $id1=rand(10000,100000000);
	$Library_Id="A-".$id1;
  
	$Name=$_POST['name'];
	$Email=$_POST['email'];
    $Date_of_birth=$_POST['dob'];
	$Gender=$_POST['gen'];
    $Quantity=$_POST['gen1'];
    // $Card_Type=$_POST['tocr'];

    $ext=explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];

     $date=date("D:M:Y");
     $time=date("h:i:s");
    $image_name=md5($date.$time.$Library_Id);
    $Image=$image_name.".".$ext;
    // $file_name=$_FILES['img'] []



$qrl="INSERT INTO add_books VALUES('$Library_Id',$Name,'$Email','$Date_of_birth','$Gender',$Quantity,'$Image')";
if(mysqli_query($conn,$qrl))
{ 
    
  echo"inserted  "; 
  echo"Data inserted product-id is A-$id1";
  if($Image !=null){
      move_uploaded_file($_FILES['pic']['tmp_name'],"imgbook/$Image");
  }
  
}else{
  echo"not inserted".mysqli_error($conn);
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <link rel="stylesheet" href="styl.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>ADD BOOKS</title>
    <style>
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
                <li><a class="ab" href="Add_book.php">Order</a></li>
                <li><a class="ab" href="#home">Create post</a></li>
                <li><a class="ab" href="#home">Delevary</a></li>
                <li><a class="ab" href="#">Contact</a></li>
            </ul>
        </div>
    </header>
    <div class="crea">
    <h2 style="text-align: center;margin-top: 20px;padding: 40px;">Post New Book</h2>
    <div  class="post" style="margin-left: 50px;">
            <form action="add.php" method="POST" enctype="multipart/form-data">  
        <label style=" ;" for="#">Buying Price</label> 
        <input style="" type="number" name="name" placeholder="120/=" require> <br>

        <label for="#">Book name</label>
        <input style="" type="text" name="email" placeholder="Paradoxical Sajid" require> <br>

        <label for="#">Writer Name</label>
        <input style="" type="TEXT" name="dob"><br>

        <label for="#">Catagories   &nbsp;&nbsp;</label>
        <input style="" type="TEXT" name="gen"><br>
        <label for="#">Quentity    &nbsp;&nbsp;</label>
        <input style="" type="number" name="gen1"><br>
         

        <!-- <label for="#">Type of card Registration</label>
        <input style="width: 60%; "type="text" placeholder="Master card,visa card or other" name="tocr"> -->

        <label> <b>Select Books Cover page:</b> </label>  
     <input style="margin-top: 10px; margin-left: 50px;" type="file" name="pic">
     
     <input class="aa" style="padding: 10px; font-size: 17px;margin-top: -10px; width: 15%;text-align: center;margin-left: 80%;background-color: seagreen;" type="submit" value="ADD" name="submit">
     </div>
    
</body>
</html>