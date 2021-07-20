<?php 
	require("connect.php");

	if(isset($_POST['submit']))
	{
		
		$user=$_POST['user'];
		$pass=$_POST['pass'];
		$email=$_POST['email'];
		$dienthoai=$_POST['dienthoai'];
		
		$insert="INSERT INTO tbl_user VALUES('', '$user', '$pass', '$email','$dienthoai')";
		$query=mysqli_query($conn,$insert);
		$select = "select * from tbl_user where Ten_ND = '$user'";
		$result = mysqli_query($conn,$select);
		if(mysqli_num_rows($result)>0) {
			echo "Tên đăng nhập đã tồn tại. Vui lòng chọn tên đăng nhập khác.";
		}
		if($query) {
			 header ("Location:index.php");
		}
	}
?>

<form action="" method="post" name="frm" onsubmit="return dangky()">
	<div class="dangky" style="margin:30px 30px;">
		<h2>Đăng ký</h2>
		<table>
			<tr>
				<td>Tên đăng nhập  <font color="red">*</font> </td><td class="input"> <input type="text" name="user" size="40"></td>
			</tr>
			<tr>
				<td>Mật khẩu <font color="red">*</font> </td><td class="input"><input type="password" name="pass" size="40" ></td>
			</tr>
			<tr>
				<td>Nhập lại mật khẩu <font color="red">*</font> </td><td class="input"><input type="password" name="pass1" size="40" ></td>
			</tr>
			<tr>
				<td>Email <font color="red">*</font> </td><td class="input"><input type="text" name="email" size="40"></td>
			</tr>
			<tr>
				<td>Điện thoại <font color="red">*</font> </td><td class="input"><input type="text" name="dienthoai" size="40"></td>
			</tr>
			<td colspan=2 class="btndangky">
				<button type="submit" name="submit">Đăng ký</button>
				<button type="reset">Hủy</button>
			</td>
		</table>
		<a href="login.php">Quay lại trang đăng nhập</a>
	</div>
</form>

<script language="javascript">
 	function  dangky()
	{
	    if(frm.user.value=="")
		{
			alert("Bạn chưa nhập tên. Vui lòng kiểm tra lại.");
			frm.user.focus();
			return false;
		}
		if(frm.pass.value=="")
		{
			alert("Bạn chưa nhập password. Vui lòng kiểm tra lại.");	
			frm.pass.focus();
			return false;
		}
		if(frm.pass.value.length<6)
		{
			alert("Mật khẩu phải từ 6 ký tự trở lên");	
			frm.pass.focus();
			return false;
		}
		dt=/^[0-9]+$/;
		dienthoai=frm.dienthoai.value;
		if(!dt.test(dienthoai))
		{
		    alert("Bạn chưa nhập số điện thoại. Vui lòng kiểm tra lại.");
		    frm.dienthoai.focus();
		    return false;
		}
	   	dd=frm.dienthoai.value;
		if(dd.length!=10)
		{
			alert("Số điện thoại không đúng. Vui lòng nhập lại");
			frm.dienthoai.focus();
			return false;	
		}
		if(frm.email.value=="")
		{
			alert("Bạn chưa nhập email.  Vui lòng kiểm tra lại.");	
			frm.email.focus();
			return false;
		}
		mail=frm.email.value;
		m=/^([A-z0-9])+[@][a-z]+[.][a-z]+[.]*([a-z]+)*$/;
		if(!m.test(mail))
		{
			alert("Bạn nhập sai email. Vui lòng kiểm tra lại.");	
			frm.email.focus();
			return false;
		}
		if(frm.pass1.value=="")
		{
			alert("Bạn chưa nhập lại password. Vui lòng kiểm tra lại.");	
			frm.pass1.focus();
			return false;
		}
		mk=frm.pass.value;
		mk1=frm.pass1.value;
		if(pass!=pass1)
		{
			alert("Password chưa đúng. Vui lòng kiểm tra lại.");	
			frm.pass1.focus();
			return false;
		}
	}
 </script>