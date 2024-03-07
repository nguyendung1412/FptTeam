<?php  
 session_start();  
 if(isset($_SESSION["user"]))  
 {  
      header("location:home.php");  
 }  
 
 ?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>LUXURY ADMIN</title>
      <link rel="stylesheet" href="css/style.css">
</head>

<body>
  <div id="clouds">
	<div class="cloud x1"></div>
	<!-- Time for multiple clouds to dance around -->
	<div class="cloud x2"></div>
	<div class="cloud x3"></div>
	<div class="cloud x4"></div>
	<div class="cloud x5"></div>
</div>

 <div class="container">

      <div id="login">
        <form method="post">
          <fieldset class="clearfix">
            <p><span class="fontawesome-user"></span><input type="text"  name="user" value="Username" onBlur="if(this.value == '') this.value = 'Username'" onFocus="if(this.value == 'Username') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Username" -->
            <p><span class="fontawesome-lock"></span><input type="password" name="pass"  value="Password" onBlur="if(this.value == '') this.value = 'Password'" onFocus="if(this.value == 'Password') this.value = ''" required></p> <!-- JS because of IE support; better: placeholder="Password" -->
            <p><input type="submit" name="sub"  value="Login"></p>
          </fieldset>
        </form>
      </div> <!-- end login -->

    </div>
    <div class="bottom">  <h3><a href="../index.php">LUXURY HOMEPAGE</a></h3></div>
  
  
</body>
</html>

<?php
   include('db.php');
  
   if ($_SERVER["REQUEST_METHOD"] == "POST") {
      // Lấy tên người dùng và mật khẩu từ biểu mẫu
      $myusername = mysqli_real_escape_string($con, $_POST['user']);
      $mypassword = mysqli_real_escape_string($con, ($_POST['pass'])); 
      
      // Kiểm tra xem tên người dùng và mật khẩu có khớp với bản ghi trong bảng 'login' không
      $sql = "SELECT id FROM login WHERE usname = '$myusername' AND pass = '$mypassword'";
      $result = mysqli_query($con, $sql);
      $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // Nếu tìm thấy bản ghi khớp, thiết lập biến session và chuyển hướng đến 'home.php'
      if ($count == 1) {
         $_SESSION['user'] = $myusername;
         header("location: home.php");
      } else {
         echo '<script>alert("Tên đăng nhập hoặc mật khẩu không hợp lệ")</script>';
      }
   }
?>