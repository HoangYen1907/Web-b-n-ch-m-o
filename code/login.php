<?php
    require "connect.php";
    session_start();
	
	//đăng xuất
    if(isset($_GET["task"])&&$_GET["task"]=="logout")
    {
        session_unset();
    }
	//Đăng nhập
	if(isset($_POST["login"]))
	{
        $us = $_POST["us"];
        $pa = $_POST["pa"];
        $sql = "select * from tbl_user where Ten_ND = '$us' and Mat_Khau = '$pa'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
		if($us=='admin')
		{
			$_SESSION["username"] = $us;
			header("location:admin.php");
		}
		else if(mysqli_num_rows($result)>0)
        {
            $_SESSION["username"] = $us;
            header("location:index.php");
        }
        else
        {
            echo "<p style='font-weight:bold;color:red'>Sai username hoặc password</p>";
        }
	}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
		<style>
			body
			{
				color: #000;
				border-radius:10px;
				font-family: time new roman;
			}
			input {
				border-radius:5px;
				box-sizing: border-box;
			}
		</style>
	</head>
    <body>
        <div class="container" style="margin-top:50px;">
            <h2><strong>Đăng Nhập</strong></h2>
			<form action="login.php" method="post">
				<strong>Tên đăng nhập:*</strong><br>
				<input type="text" name="us" style="width:100%;border:2px solid #990000;margin-top:5px;"><br>
				<strong>Mật khẩu:*</strong><br>
				<input type="password" name="pa" style="width:100%;border:2px solid #990000;margin-top:5px;"><br>
				<input type="submit" name="login" class="btn btn-primary" value="Đăng Nhập" style="margin:10px 0px 5px;background-color:#990000;border:none;"><br>
				<a href="dang_ky.php">Đăng ký tài khoản</a>|<a href="#">Quên mật khẩu?</a>
			</form>
        </div>      
    </body>
</html>