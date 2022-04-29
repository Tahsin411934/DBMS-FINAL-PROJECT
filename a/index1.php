
<?php
include("connection1.php");
if(isset($_POST['submit'])){
  $id1=rand(10000,100000000);
	$Library_Id="A-".$id1;
  
	$Name=$_POST['name'];
	$Email=$_POST['email'];
	$Phone=$_POST['pn'];
    $Date_of_birth=$_POST['dob'];
	$Gender=$_POST['gen'];
    // $Card_Type=$_POST['tocr'];
    $Password=$_POST['pass'];
	// $Image=$_POST['pic1'];

    $ext=explode(".",$_FILES['pic']['name']);
    $c=count($ext);
    $ext=$ext[$c-1];

     $date=date("D:M:Y");
     $time=date("h:i:s");
    $image_name=md5($date.$time.$Library_Id);
    $Image=$image_name.".".$ext;
    // $file_name=$_FILES['img'] []



$qrl1="INSERT INTO sign_up VALUES('$Library_Id','$Name','$Email',$Phone,'$Date_of_birth','$Gender','$Password','$Image')";
if(mysqli_query($conn,$qrl1))
{ 
    
  echo"<h1>Created signup account </h1>  "; 
  echo"<h1>Your account no is A-$id1 . log in with account no and password </h1> ";
  

  if($Image !=null){
      move_uploaded_file($_FILES['pic']['tmp_name'],"uploading/$Image");
  }
  
}else{
  echo"not inserted".mysqli_error($conn);
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="resister.css">
    <p4 style="margin-left: 100px;margin-top: 20px; font-size: 20px; "> <a href="login.php" >Log IN</a></p4>
    <title>Create Account</title>
</head>
<body>
    <p class="p1">ELECTRONIC LIBRARY</p>
    <section>
       
        <p class="p0">Create Account</p>
    </section>
    <section class="sec1">
        <p class="p2">You can create an account in <br>
            one minute!</p>
            <form action="index.php" method="POST" enctype="multipart/form-data">  
        <label style=" ;" for="#">Name</label> 
        <input style="width: 77%;" type="text" name="name" placeholder="tom roy" require> <br>

        <label for="#">Email</label>
        <input style="width: 77%;" type="text" name="email" placeholder="abcde@gmail.com" require> <br>

        <label for="#">Phone Number</label>
        <input style="width: 65%;" type="number" required name="pn"> <br>

        <label for="#">Date of Birth</label>
        <input style="width: 67%;" type="date" name="dob"><br>

        <label for="#">Gender</label>
        <select id="cars" name="gen">
            <option value="Male">Male</option>
            <option value="Female">Female</option>
            <option value="Other">Other</option>
          </select> <br>
          <label for="#">Password</label>
          <input style="width: 75%;" type="password" name="pass"><br>

        <!-- <label for="#">Type of card Registration</label>
        <input style="width: 60%; "type="text" placeholder="Master card,visa card or other" name="tocr"> -->

        <label>Select file to upload:</label>  
     <input style="margin-top: 10px; margin-left: 50px;" type="file" name="pic"> <br> 
     
     <input class="aa" style="padding: 10px; font-size: 17px;margin-top: 40px; width: 50%;text-align: center;margin-left: 147px;background-color: seagreen;" type="submit" value="Submit" name="submit">
     </form>
     <p4 style="margin-left: 100px;margin-top: 20px; font-size: 20px;color: black;">Have an account? <a href="login.php">Log IN</a></p4>
    
    </section>
    
</body>
</html>