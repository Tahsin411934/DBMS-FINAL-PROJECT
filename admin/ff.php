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
<html> 



	<head> 
	<link rel="stylesheet" href="styleforsp.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
		<title> All Product Record </title> 
	</head> 
	<body> 
 
	
       <div class="header-2">
       <nav class="navbar">
       <ul>
      <li><a href="index.php">Home</a></li> 
      <li><a href="add.php">Add Book</a></li> 
      <li><a href="add_sta.php">order</a></li> 
      <li><a href="#home">Create Post</a></li>
      <li><a href="showproduct.php">Show Product</a></li> 
      <li style="margin-left:200px;" class="lo"><a href="?sign=out">Logout</a></li> 
      <li><a href="changepass.php">Change Password</a></li> 
       
   </ul>
   </nav>
</div>


<div class="prod">
   
    <form action="productshow.php" method="post">
<div class= "row">
<hr/>
<br><br>
<div class="col-25">
    <h3 style="margin-left: 30px; margin-bottom: 30px;">Update Book Price</h3>
<label  style="height:43px;width:200px; margin-left:30px ;" for="bookid" ><b>Book Id: </b></label>
</div>
<div class="col-75">
<select style="height:43px;width:200px; margin-left:30px ;" name="Book_Nmae">
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
</div>
</div>
<div style="height:50px;width:400px; class="row">
<div class="col-25">
<label style="margin-left: 30px; " for="sprice"><b>Updated price</b></label>
</div>
<div class="col-75">
<input style="margin-left: 30px; height: 30px;" type="text" id="sprice" name="sprice" placeholder="Insert selling price...">
</div>
</div>
<input style="margin-left: 30px; background-color: #4CAF50; color: white;padding: 15px 32px;text-align: center" type="submit" class="button" value="Update" name="update">
</div>
</div>
</form>
</div>
</div>
</div>

<?php

include("connection.php");

if(isset($_POST['update']))
{
$bookid=$_POST['Product_Id'];
$sprice=$_POST['sprice'];

if($sprice>0)
{
$query="update add_books set Price=$sprice where Product_Id='$bookid'";
}
if(mysqli_query($conn,$query))
{
echo "Successfully updated!";
}
else
{
echo "error!".mysqli_error($conn);
}
}
?>
</body>
</html>


