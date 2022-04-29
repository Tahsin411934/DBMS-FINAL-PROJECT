
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
   <link rel="stylesheet" href="style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Admin Pannel</title>
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
    
    <header>
        <h1 style="margin: 30px;">About me</h1>
        <div class="about">
        <?php
require 'connection.php';
$_SESSION["id"] = 1; // User's session
$sessionId = $_SESSION["id"];
$user = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM tb_user WHERE id = $sessionId"));
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Update Image Profile</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>
    <form class="form" id = "form" action="index.php" enctype="multipart/form-data" method="post">
      <div class="upload">
        <?php
        $id = $user["id"];
        $name = $user["name"];
        $image = $user["image"];
        ?>
        <img src="img/<?php echo $image; ?>" width = 125 height = 125 p title="<?php echo $image; ?>">
        <div class="round">
          <input type="hidden" name="id" value="<?php echo $id; ?>">
          <input type="hidden" name="name" value="<?php echo $name; ?>">
          <input type="file" name="image" id = "image" accept=".jpg, .jpeg, .png">
          <i class = "fa fa-camera" style = "color: #fff;"></i>
        </div>
      </div>
    </form>
    <script type="text/javascript">
      document.getElementById("image").onchange = function(){
          document.getElementById("form").submit();
      };
    </script>
    <?php
    if(isset($_FILES["image"]["name"])){
      $id = $_POST["id"];
      $name = $_POST["name"];

      $imageName = $_FILES["image"]["name"];
      $imageSize = $_FILES["image"]["size"];
      $tmpName = $_FILES["image"]["tmp_name"];

      // Image validation
      $validImageExtension = ['jpg', 'jpeg', 'png'];
      $imageExtension = explode('.', $imageName);
      $imageExtension = strtolower(end($imageExtension));
      if (!in_array($imageExtension, $validImageExtension)){
        echo
        "
  
        ";
      }
      elseif ($imageSize > 1200000){
        echo
        "
    
        ";
      }
      else{
        $newImageName = $name . " - " . date("Y.m.d") . " - " . date("h.i.sa"); // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE tb_user SET image = '$newImageName' WHERE id = $id";
        mysqli_query($conn, $query);
        move_uploaded_file($tmpName, 'img/' . $newImageName);
        echo
        "
        ";
      }
    }
    ?>
  </body>
</html> 
            <p><b>Abrar Fahim</b></p>
            <p class="post">Admin</p>
        </div>
        <div class="navbar">
            <ul>
                <li><a class="ab" href="#home">Store</a></li>
                <li><a class="ab" href="#home">Order</a></li>
                <li><a class="ab" href="#home">Create post</a></li>
                <li><a class="ab" href="#home">Delevary</a></li>
                <li><a class="ab" href="#home">Contact</a></li>
            </ul>
        </div>
    </header>
    <h2 style="text-align: center;margin-top: 10px;padding: 10px;">Book Post</h2>
    <div style="margin-left: 100px; width: 500px;padding: 13px;" class="post">
    <h2>Title:</h2>
        <p>your name.
            </p>
        
        <img style="width: 500px;"  class="pic" src="book-6.jpg" alt="">
        
        <h2>Description:</h2>
        <p>Mitsuha, una ragazza di provincia, e Taki,dalle loro quotidianità, si ritrovano un giorno a vivere in <br> </p>
    </div>



    
</body>
</html>





