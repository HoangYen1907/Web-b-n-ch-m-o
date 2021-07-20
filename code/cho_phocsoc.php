<html>
	<body>
		<div class="container">
			<?php
				require("connect.php");
				$sql = "";
				$sql = "select * from tbl_sp where Dong = N'Chó Phốc Sóc'";
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0) {
					echo "<h2>Chó Phốc Sóc</h2><hr>";
					while($row = mysqli_fetch_assoc($result)) {
						echo '<div class="row">';
						echo '<div class="col-2">';
						echo '<a href="#"><img src="' .$row["Hinh_anh"]. '" style="height:200px;width:150px;"/></a>';
						echo '</div>';
						echo '<div class="col-10">';
						echo "<br>Tên sản phẩm: ".$row["Ten_SP"]."<br>";
						echo "Giá: ".$row["Gia"]."đ<br>";
						echo "Loại: ".$row["Loai"]."<br>";
						echo "Dòng: ".$row["Dong"]."<br>";
						echo '<div style="border:2px solid #330000;border-radius:10px;width:150px;">
								<form action="index.php" method="post">
									<input type="hidden" name="id_sp" value="'.$row["ID_SP"].'">
									<input type="hidden" name="gia" value="'.$row["Gia"].'">
									<input style="border:none;background-color:#fff;font-weight:bold;margin-top:4px;margin-left:8px;" type="submit" name="insert" value="Thêm vào giỏ">
									<svg  width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
									</svg>
								</form>
							</div>';
						echo '</div>';
						echo '</div>';
						echo "<hr>";
					}
				} else {
					echo "Tạm thời chưa có sản phẩm";
				}
			?>
		</div>
	</body>
</html>