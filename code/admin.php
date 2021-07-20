<?php
	session_start();
    if(!$_SESSION["username"] || $_SESSION["username"] != 'admin')
    {
        header("location:login.php");
    }
    echo " <a href='login.php?task=logout'>Đăng xuất</a> ";
    echo "Xin chào: " . $_SESSION["username"] ."<br>";
	echo "<h2>Trang quản trị sản phẩm</h2>";
    require("connect.php");
	//thêm sản phẩm
	if(isset($_POST["insert"]))
	{
		$title = $_POST["title"];
		$gia = $_POST["gia"];
		$loai = $_POST["loai"];
		$dong = $_POST["dong"];
		
		$target_dir = "images/";
		$target_file = $target_dir . basename($_FILES["image"]["name"]);
        // Lấy kiểu file
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"&& $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }
		else if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file))
		{
			$sql = "INSERT INTO tbl_sp(Ten_SP, Hinh_anh, Gia, Loai, Dong) VALUES (N'$title', '$target_file', $gia, N'$loai', N'$dong')";
			if (mysqli_query($conn,$sql)) {
			  echo "New record created successfully";
			  //điều hướng trang tránh insert cùng 1 giá trị nhiêu lần khi F5 website
			  header("Location:admin.php");
			} else {
			  echo "Error: " . $sql . "<br>" . $conn->error;
			}
		} 
		else {
			echo "Sorry, there was an error uploading your file.";
		}
	}
	//xoá dữ liệu
    if(isset($_GET["task"]) && $_GET["task"]=="delete")
    {
        $ma_sp = $_GET["id"];
        $sql_delete = "delete from tbl_sp where ID_SP = ". $ma_sp;
        if(mysqli_query($conn,$sql_delete))
        {
            echo "Xoá thành công ". $ma_sp;
        }
        else
            echo "Xoá dữ liệu thất bại" . mysqli_error($conn);
    }
    //cập nhật dữ liệu
    if(isset($_POST["update"]))
    {
        $ma_sp = $_POST["ma_ud"];
		$sql_update = "update tbl_sp set Ten_SP = N'".$_POST["update_ten"]."', Gia=".$_POST["update_gia"].", Loai=N'".$_POST["update_loai"]."', Dong=N'".$_POST["update_dong"]."'   where ID_SP = ". $ma_sp;
        if(mysqli_query($conn,$sql_update))
        {
            echo "Sửa thành công sản phẩm ". $ma_sp;
        }
        else
            echo "Sửa dữ liệu thất bại" . mysqli_error($conn);
    }
?>
<html>
	<form action="admin.php" method="post" enctype="multipart/form-data">
		Tên sản phẩm:
		<input type="text" name="title">
		Chọn hình ảnh:
		<input type="file" name="image">
		<br><br>Giá:
		<input type="text" name="gia">
		Loại:
		<input type="text" name="loai">
		Dòng:
		<input type="text" name="dong">
		<input type="submit" value="Thêm mới" name="insert">
	</form>
	<hr>
	<div class="container">
	<div class="row">
        <table class="table table-striped">
            <?php
				//khởi tạo biến truy vấn csdl
				$sql_select = "SELECT * FROM tbl_sp";
				//đổ dữ liệu vào biến kết quả
				$ketqua = mysqli_query($conn,$sql_select);
				//kiểm tra xem dữ liệu có trống hay không
				if(mysqli_num_rows($ketqua)>0)
				{
					echo '<tr>
						<th>Mã sản phẩm</th>
						<th>Tên sản phẩm</th>
						<th>URL hình ảnh</th>
						<th>Gia</th>
						<th>Loại</th>
						<th>Dòng</th>
						</tr>';
					//sử dụng vòng lặp while để duyệt mảng kết quả
					while($row = mysqli_fetch_assoc($ketqua))
					{
						echo "<tr>";
						echo "<td>".$row["ID_SP"]."</td>";
						//kiểm tra update
						if(isset($_GET["task"]) && $_GET["task"]=="update")
						{
							if($_GET["id"]==$row["ID_SP"])
							{
								echo "<form method='post' action='admin.php'><td>";
								echo "<input type='text' name='update_ten' value='".$row["Ten_SP"]."'>";
								echo "</td>";
								echo "<td>".$row["Hinh_anh"]."</td>";
								echo "<td>";
								echo "<input type='text' name='update_gia' value='".$row["Gia"]."'>";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' name='update_loai' value='".$row["Loai"]."'>";
								echo "</td>";
								echo "<td>";
								echo "<input type='text' name='update_dong' value='".$row["Dong"]."'>";
								echo "</td>";
								echo "<input type='hidden' name='ma_ud' value='".$row["ID_SP"]."'>";
								echo "<td>";
								echo "<input type='submit' class='btn btn-primary' value='Cập nhật' name='update'>";
								echo "</td></form>";
							}
							else
							{
								echo "<td>".$row["Ten_SP"]."</td>";
								echo "<td>".$row["Hinh_anh"]."</td>";
								echo "<td>".$row["Gia"]."</td>";
								echo "<td>".$row["Loai"]."</td>";
								echo "<td>".$row["Dong"]."</td>";
								echo "<td>";
								echo "<a href='admin.php?task=update&id=".$row["ID_SP"]."' class='btn btn-warning'>Cập nhật</a>";
								echo "<a href='admin.php?task=delete&id=".$row["ID_SP"]."' class='btn btn-danger'>Xoá</a>";
								echo "</td>";
							}
						}
						else
						{
							echo "<td>".$row["Ten_SP"]."</td>";
							echo "<td>".$row["Hinh_anh"]."</td>";
							echo "<td>".$row["Gia"]."</td>";
							echo "<td>".$row["Loai"]."</td>";
							echo "<td>".$row["Dong"]."</td>";
							echo "<td>";
							echo "<a href='admin.php?task=update&id=".$row["ID_SP"]."' class='btn btn-warning'>Cập nhật</a>";
							echo "<a href='admin.php?task=delete&id=".$row["ID_SP"]."' class='btn btn-danger'>Xoá</a>";
							echo "</td>";
						}
						echo "</tr>";
					}
				}
				else
					echo "Chưa có sản phầm nào";
			?>
		</table>
	</div>
	</div>
</html>
