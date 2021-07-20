<html>
	<body>
		<div class="container">
			<!--search box-->
			<form action="" method="post" style="margin-left:880px;margin-top:6px;float:left">
				<input type="text" name="search" placeholder="Search" id="search" style="border-radius:15px;padding:3px 15px;outline:none;border:1px solid #990000;" formaction="tim_kiem.php"/>
			<!--icon search-->
			<svg style="margin-left:-30px;font-size:14px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
				<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
				<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
			</svg>
			<p style="clear:both;"></p>
			</form>
			<!--Tìm kiếm-->
			<?php
				require("connect.php");
				$sql = "";
				if(isset($_POST["search"])) {
					$title = $_POST["search"];
					echo "Kết quả tìm kiếm sản phẩm: " .$title;
					echo "<hr>";
					$sql = "select * from tbl_sp where Ten_SP like '%$title%'";
				} else {
					echo "Tất cả sản phẩm:";
					echo "<hr>";
					$sql = "select * from tbl_sp";
				}
				$result = mysqli_query($conn,$sql);
				if (mysqli_num_rows($result) > 0) {
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
					echo "0 results";
				}	
			?>
		</div>
	</body>
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</html>