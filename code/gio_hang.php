<?php
	include("connect.php");
	
	//lấy Ma_ND
	if(!isset($_SESSION)) 
    { 
        session_start();
    }
	$us = $_SESSION["username"];
	$sql = "select * from tbl_user where Ten_ND = '$us'";
	$result = mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($result);
	$ma_nd = $row["Ma_ND"];
	
	//xoá sản phẩm ra khỏi giỏ hàng
    if(isset($_GET["task"]) && $_GET["task"]=="delete")
    {
        $ma_sp = $_GET["id"];
        $sql_delete = "delete from tbl_giohang where ID_SP = $ma_sp and Ma_ND = $ma_nd";
        if(mysqli_query($conn,$sql_delete))
        {
            echo "Xoá sản phẩm thành công";
			//header("location:");
        }
        else
            echo "Xoá sản phẩm thất bại" . mysqli_error($conn);
    }
    //cập nhật số lượng
    if(isset($_POST["update"]))
    {
        $ma_sp = $_POST["ma_ud"];
		$sql_update = "update tbl_giohang set So_luong = ".$_POST["update_sl"].", Thanh_tien=".$_POST["update_sl"]."*Gia_SP where ID_SP = $ma_sp and Ma_ND=$ma_nd";
        if(mysqli_query($conn,$sql_update))
        {
            echo "Sửa dữ liệu thành công";
        }
        else
            echo "Sửa dữ liệu thất bại" . mysqli_error($conn);
    }
?>
<html>
	<head>
		
	</head>
	<body>
		<div class="container">
			<h2 style="color:#990000;">Giỏ hàng</h2><br>
			<!--show data-->
						<?php
							//khởi tạo biến truy vấn csdl
							$sql_select = "SELECT * FROM tbl_sp S, tbl_giohang G WHERE S.ID_SP=G.ID_SP AND Ma_ND=$ma_nd";
							//đổ dữ liệu vào biến kết quả
							$ketqua = mysqli_query($conn,$sql_select);
							//kiểm tra xem dữ liệu có trống hay không
							if(mysqli_num_rows($ketqua)>0)
							{
								//sử dụng vòng lặp while để duyệt mảng kết quả
								while($row = mysqli_fetch_assoc($ketqua))
								{
									//kiểm tra update
									if(isset($_GET["task"]) && $_GET["task"]=="update")
									{
										if($_GET["id"]==$row["ID_SP"])
										{
											echo '<div class="row">';
											echo '<div class="col-2">';
											echo '<img src="' .$row["Hinh_anh"]. '" style="height:200px;width:150px;"/>';
											echo '</div>';
											echo '<div class="col-10">';
											echo "<br>Tên sản phẩm: ".$row["Ten_SP"]."<br>";
											echo "<form method='post' action='index.php'>";
											echo "Số lượng: ";
											echo "<input type='text' name='update_sl' value='".$row["So_luong"]."'>";
											echo "<br>Đơn giá: ".$row["Gia"]."đ<br>";
											echo "Thành tiền: ".$row["Thanh_tien"]."đ<br>";
											echo "<input type='hidden' name='ma_ud' value='".$row["ID_SP"]."'>";
											echo "<input type='submit' class='btn btn-primary' value='Cập nhật' name='update'>";
											echo "</form>";
											echo '</div>';
											echo '</div>';
											echo "<hr>";
										}
										else
										{
											echo '<div class="row">';
											echo '<div class="col-2">';
											echo '<img src="' .$row["Hinh_anh"]. '" style="height:200px;width:150px;"/>';
											echo '</div>';
											echo '<div class="col-10">';
											echo "<br>Tên sản phẩm: ".$row["Ten_SP"]."<br>";
											echo "Số lượng: ".$row["So_luong"]."<br>";
											echo "Đơn giá: ".$row["Gia"]."đ<br>";
											echo "Thành tiền: ".$row["Thanh_tien"]."đ<br>";
											echo "<a href='gio_hang.php?task=update&id=".$row["ID_SP"]."' class='btn btn-warning'>Cập nhật</a>";
											echo "<a href='index.php?task=delete&id=".$row["ID_SP"]."' class='btn btn-danger'>Xoá</a><br>";
											echo '</div>';
											echo '</div>';
											echo "<hr>";
										}
									}
									else
									{
										echo '<div class="row">';
										echo '<div class="col-2">';
										echo '<a href="#"><img src="' .$row["Hinh_anh"]. '" style="height:200px;width:150px;"/></a>';
										echo '</div>';
										echo '<div class="col-10">';
										echo "<br>Tên sản phẩm: ".$row["Ten_SP"]."<br>";
										echo "Số lượng: ".$row["So_luong"]."<br>";
										echo "Đơn giá: ".$row["Gia"]."đ<br>";
										echo "Thành tiền: ".$row["Thanh_tien"]."đ<br>";
										echo "<a href='gio_hang.php?task=update&id=".$row["ID_SP"]."' class='btn btn-warning'>Cập nhật</a>";
										echo "<a href='index.php?task=delete&id=".$row["ID_SP"]."' class='btn btn-danger'>Xoá</a><br>";
										echo '</div>';
										echo '</div>';
										echo "<hr>";
									}
								}
							}
							else
								echo "Giỏ hàng trống";
						?>
					
				<div class="row" style="width:110px;height:40px;border:2px solid #990000;border-radius:5px;margin-left:1000px;margin-bottom:5px;">
					<p style ="margin-top:6px;margin-left:17px;font-weight:bold;"><a href="#" style="color:#990000;">Mua hàng</a></p>
				</div>
				<?php
					$sql = "SELECT SUM(Thanh_tien) AS T FROM tbl_giohang";
					$result = mysqli_query($conn, $sql);
					$r = mysqli_fetch_assoc($result);
					echo "Tổng số tiền phải thanh toán: ".$r["T"]."đ";
				?>
		</div>
	</body>
</html>