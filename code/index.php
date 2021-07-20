<?php
	session_start();
    if(!$_SESSION["username"])
    {
      header("location:login.php");
    }
	require("connect.php");
	
	//thêm vào giỏ hàng
	if(isset($_POST["insert"]))
	{
		$id = $_POST["id_sp"];
		$g = $_POST["gia"];
		
		$us = $_SESSION["username"];
		$sql = "select * from tbl_user where Ten_ND = '$us'";
        $result = mysqli_query($conn,$sql);
		$row = mysqli_fetch_assoc($result);
		$ma_nd = $row["Ma_ND"];
		
		$sql = "select * from tbl_giohang where Ma_ND = '$ma_nd' and ID_SP = '$id'";
        $result = mysqli_query($conn,$sql);
		if(mysqli_num_rows($result)>0)
		{
			$sql_insert = "update tbl_giohang set So_luong = So_luong+1, Thanh_tien = Gia_SP*So_luong where ID_SP=$id and Ma_ND=$ma_nd";
		} else {
			$sql_insert = "insert into tbl_giohang values ($id,$ma_nd,1,$g,$g)";
		}
        if(mysqli_query($conn,$sql_insert))
        {
            echo "insert dữ liệu thành công";
            //điều hướng trang tránh insert cùng 1 giá trị nhiêu lần khi F5 website
            //header("Location:index.php");
        }
        else
            echo "insert dữ liệu thất bại" . mysqli_error($conn);
    }
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>PET'S SHOP | Cửa hàng bán chó mèo cảnh</title>
		<link rel="shortcut icon" href="images/logo.jpg"/>
		<link rel="stylesheet" href="css/bootstrap.css"/>
		
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script>
			$(document).ready(function(){
				$(".tab11").show();
				$(".tab1").hide();
				$(".tab2").hide();
				$(".tab3").hide();
				$(".tab4").hide();
				$(".tabspmeo1").hide();
				$(".tabspmeo2").hide();
				$(".tabspmeo3").hide();
				$(".tabcho").hide();
				$(".tabcho1").hide();
				$(".tabcho2").hide();
				$(".tabcho3").hide();
				$(".tabcho4").hide();
				$(".tabcho5").hide();
				$(".tabcho6").hide();
				$(".tabcho7").hide();
				$(".tabmeo").hide();
				$(".tabmeo1").hide();
				$(".tabmeo2").hide();
				$(".tabmeo3").hide();
				$(".tabmeo4").hide();
				$(".tabmeo5").hide();
				$(".tabthucan").hide();
				$(".tabthucan1").hide();
				$(".tabthucan2").hide();
				$(".tabpk").hide();
				$(".tabpk1").hide();
				$(".tabpk2").hide();
				$(".menu1").click(function(){
					$(".tab1").show();  //hiện phần trang_chu nếu click vào menu1
					$(".tab11").hide();
					$(".tab2").hide();
					$(".tab3").hide();
					$(".tab4").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".menu2").click(function(){
					$(".tab2").show();  //hiện phần gioi-thieu
					$(".tab11").hide();
					$(".tab1").hide();
					$(".tab3").hide();
					$(".tab4").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".menu3").click(function(){ //lien-he
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".spmeo1").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabspmeo1").show();  //hiện phần meo-anh-long-ngan
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".spmeo2").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo3").hide();
					$(".tabspmeo2").show();  //hiện phần meo-anh-long-ngan-tai-cup
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".spmeo3").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").show();  //hiện phần meo-anh-long-dai
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".giohang").click(function(){
					$(".tab4").hide();
					$(".tab3").show();	//hiện phần gio_hang
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".timkiem").click(function(){
					$(".tab4").show();	//hiện phần tim_kiem
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").show();	//hiện phần cho
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho1").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").show();	//hiện phần cho_shiba
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho2").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").show();	//hiện phần cho_poodle
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho3").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").show();	//hiện phần cho_alaska
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho4").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").show();	//hiện phần cho_husky
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho5").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").show();	//hiện phần cho_corgi
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho6").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").show();	//hiện phần cho_phocsoc
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".cho7").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").show();	//hiện phần cho_bordercollie
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").show();	//hiện phần meo
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo1").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").show();	//hiện phần meo_anh
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo2").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").show();	//hiện phần meo_munchkin
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo3").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").show();	//hiện phần meo_batu
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo4").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").show();	//hiện phần meo_xiem
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".meo5").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").show();	//hiện phần meo_scottish
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".thucan").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").show();	//hiện phần thuc_an
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".thucan1").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").show();	//hiện phần thuc_an_cho_cho
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".thucan2").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").show();	//hiện phần thuc_an_cho_meo
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".pk").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").show();	//hiện phần phu_kien
					$(".tabpk1").hide();
					$(".tabpk2").hide();
				})
				$(".pk1").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").show();	//hiện phần phu_kien_cho_cho
					$(".tabpk2").hide();
				})
				$(".pk2").click(function(){
					$(".tab4").hide();
					$(".tab3").hide();
					$(".tab2").hide();
					$(".tab1").hide();
					$(".tab11").hide();
					$(".tabspmeo1").hide();
					$(".tabspmeo2").hide();
					$(".tabspmeo3").hide();
					$(".tabcho").hide();
					$(".tabcho1").hide();
					$(".tabcho2").hide();
					$(".tabcho3").hide();
					$(".tabcho4").hide();
					$(".tabcho5").hide();
					$(".tabcho6").hide();
					$(".tabcho7").hide();
					$(".tabmeo").hide();
					$(".tabmeo1").hide();
					$(".tabmeo2").hide();
					$(".tabmeo3").hide();
					$(".tabmeo4").hide();
					$(".tabmeo5").hide();
					$(".tabthucan").hide();
					$(".tabthucan1").hide();
					$(".tabthucan2").hide();
					$(".tabpk").hide();
					$(".tabpk1").hide();
					$(".tabpk2").show();	//hiện phần phu_kien_cho_meo
				})
			})
		</script>
		
		<style>
			body
			{
				font-family:time new roman;
			}
			.header a
			{
				color:white;
			}
			a:hover
			{
				color:red;
				text-decoration:none;
			}
			a
			{
				color:black;
			}
			li
			{
				list-style:none;
				margin-top:10px;
			}
			#menu li
			{
				list-style:none;
				float:left;
				padding: 10px 30px 5px 20px;
			}
			#menu ul
			{
				background:white;
				width:100%;
			}
			#menu ul li a
			{
				text-decoration:none; <!--bỏ gạch chân-->
				color:#fff;			<!--màu trắng-->
				font-weight:bold;
			}
			#menu li a:hover
			{
				text-decoration:none;
				color:black;
			}
			#menu ul li::after
			{
				content: '';
				display: block;
				width: 0;
				height: 2px;
				background: #990000;
				transition: width .3s;
			}
			#menu ul li:hover:after
			{
				width: 100%;
			}
			
			<!--style cho drop menu-->
			.dropbtn {
				color: #000;
				font-size: 16px;
				border:none;
				background-color:#fff;
			}
			
			.dropdown {
			  position: relative;
			  display: inline-block;
			}
			.dropdown-content {
			  display: none;
			  position: absolute;
			  background-color: #f1f1f1;
			  min-width: 160px;
			  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
			  z-index: 1;
			}
			.dropdown-content a {
			  color: black;
			  padding: 12px 15px;
			  text-decoration: none;
			  display: block;
			}
			.dropdown-content a:hover {
				margin-left:10px;
			}
			.dropdown:hover .dropdown-content {
				display: block;
			}
			.dropdown:hover .dropbtn {
				background-color: #fff;
			}
			
			.banchay img
			{
				width:100%;
			}
			.banchay h1
			{
				color:#330000;
				font-size:16px;
				text-align:center;
				margin-top:10px;
				font-weight:bold;
			}
			.banchay a
			{
				text-decoration:none;
			}
			.banchay:hover
			{
				border:2px solid #CCCCCC;
				padding:5px;
			}
		</style>
	</head>
	<body>
		
		<div class="fruid-container" id="header">
			<div style="position:fixed; z-index:100000; top:0; width: 100%; height: 35px;"> <!--cố định phần header khi lăn chuột-->
				<!--header-->
				<div class = "row header" style="background:#990000;">
					<div class="col-6">
						<!--icon telephone-->
						<a href = "#" style="float:left; margin:10px 20px 10px 60px;">
							<svg style="font-size:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z"/>
							</svg>
							<span style="margin-left:5px;">0344512909</span>
						</a>
						<!--icoqaaaaan mail-->
						<a href = "#" style="float:left; margin:10px 0px;">
							<svg style="font-size:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-envelope" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z"/>
							</svg>
							<span style="margin-left:5px;">yenxuvyyb@gmail.com</span>
						</a>
					</div>
					<div class="col-6">
						<a class="timkiem" style="float:left; margin:10px 20px 10px 150px;">
							<svg style="font-size:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
							  <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
							  <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
							</svg>
							<span style="margin-left:5px;">Tìm kiếm sản phẩm</span>
						</a>
						<!--log out-->
						<a href="login.php?task=logout" style="float:left;margin:10px 0px;">
							<svg style="font-size:20px;margin-bottom:5px;margin-left:30px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-person-circle" fill="currentColor" xmlns="http://www.w3.org/2000/svg" style="margin-top:-2.5px;margin-right:2px;">
							  <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 0 0 8 15a6.987 6.987 0 0 0 5.468-2.63z"/>
							  <path fill-rule="evenodd" d="M8 9a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
							  <path fill-rule="evenodd" d="M8 1a7 7 0 1 0 0 14A7 7 0 0 0 8 1zM0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8z"/>
							</svg>
							<span style="margin-left:5px;">Đăng xuất</span>
						</a>
						<!--Giỏ hàng-->
						<a class="giohang" style="float:left;margin:10px 0px;">
							<svg style="font-size:20px;margin-bottom:5px;margin-left:20px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-cart4" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path fill-rule="evenodd" d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
							</svg>
							<span style="margin-left:5px;">Giỏ hàng</span>
						</a>
					</div>
				</div>
				<!--menu-->
				<div class="row" id="menu">
					<ul>
						<li style="margin-left:100px;"><a class="menu1">
							<svg style="margin-bottom:5px;margin-right:5px;" width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-house-door-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
								<path d="M6.5 10.995V14.5a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5h-4a.5.5 0 0 1-.5-.5V11c0-.25-.25-.5-.5-.5H7c-.25 0-.5.25-.5.495z"/>
								<path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
							</svg>
							TRANG CHỦ
						</a></li>
						<li><a class="menu2">GIỚI THIỆU</a></li>
						<li><a href="#">
							<div class="dropdown">
							  <a class="dropbtn cho">CHÓ CẢNH</a>
							  <div class="dropdown-content">
								<a class="cho1">Chó Shiba</a>
								<a class="cho2">Chó Poodle</a>
								<a class="cho3">Chó Alaska</a>
								<a class="cho4">Chó Husky</a>
								<a class="cho5">Chó Corgi</a>
								<a class="cho6">Chó Phốc sóc</a>
								<a class="cho7">Chó Border Collie</a>
							  </div>
							</div>
						</a></li>
						<li><a href="#">
							<div class="dropdown">
							  <a class="dropbtn meo">MÈO CẢNH</a>
							  <div class="dropdown-content">
								<a class="meo1">Mèo Anh</a>
								<a class="meo2">Mèo Muchkin</a>
								<a class="meo3">Mèo Ba Tư</a>
								<a class="meo4">Mèo Xiêm</a>
								<a class="meo5">Mèo Scottish</a>
							  </div>
							</div>
						</a></li>
						<li><a href="#">
							<div class="dropdown">
							  <a class="dropbtn thucan">THỨC ĂN CHÓ MÈO</a>
							  <div class="dropdown-content">
								<a class="thucan1">Thức ăn cho chó</a>
								<a class="thucan2">Thức ăn cho mèo</a>
							  </div>
							</div>
						</a></li>
						<li><a href="#">
							<div class="dropdown">
							  <a class="dropbtn pk">PHỤ KIỆN CHÓ MÈO</a>
							  <div class="dropdown-content">
								<a class="pk1">Phụ kiện cho chó</a>
								<a class="pk2">Phụ kiện cho mèo</a>
							  </div>
							</div>
						</a></li>
						<li><a class="menu3">LIÊN HỆ</a></li>
					</ul>
				</div>
				<hr style="border-top:1px solid #d9d9d9;margin-top:-16px;">	
			</div>
		</div>
		<div class="fruid-container" id="content" style="margin-top:120px;">
			<!--<?php echo "Xin chào ".$_SESSION["username"]; ?>-->
			<!--<br><a href="login.php">Đăng nhập</a>-->
			<div class="tab11">
				<?php
					
					if((isset($_GET["task"]) && $_GET["task"]=="delete") || (isset($_POST["update"])) || (isset($_POST["insert"])))
					{
						include("gio_hang.php");
					}
					else
					{
						if(isset($_POST["search"])) {
							include("tim_kiem.php");
						}
						else
						{
							include('trang_chu.html');
						}
					}
				?>
			</div>
			<div class="tab1">
				<?php
					include('trang_chu.html');
					
				?>
			</div>
			<div class="tab2">
				<?php
					include('gioi_thieu.html');
					
				?>
			</div>
			<div class="tabspmeo1">
				<?php
					include('Mèo Anh/meo-anh-long-ngan.html');
				?>
			</div>
			<div class="tabspmeo2">
				<?php
					include('Mèo Anh/meo-anh-long-ngan-tai-cup.html');
				?>
			</div>
			<div class="tabspmeo3">
				<?php
					include('Mèo Anh/meo-anh-long-dai.html');
				?>
			</div>
			<div class="tab3">
				<?php
					include('gio_hang.php');
				?>
			</div>
			<div class="tab4">
				<?php
					include('tim_kiem.php');
				?>
			</div>
			<div class="tabcho">
				<?php
					include('cho.php');
				?>
			</div>
			<div class="tabcho1">
				<?php
					include('cho_shiba.php');
				?>
			</div>
			<div class="tabcho2">
				<?php
					include('cho_poodle.php');
				?>
			</div>
			<div class="tabcho3">
				<?php
					include('cho_alaska.php');
				?>
			</div>
			<div class="tabcho4">
				<?php
					include('cho_husky.php');
				?>
			</div>
			<div class="tabcho5">
				<?php
					include('cho_corgi.php');
				?>
			</div>
			<div class="tabcho6">
				<?php
					include('cho_phocsoc.php');
				?>
			</div>
			<div class="tabcho7">
				<?php
					include('cho_bordercollie.php');
				?>
			</div>
			<div class="tabmeo">
				<?php
					include('meo.php');
				?>
			</div>
			<div class="tabmeo1">
				<?php
					include('meo_anh.php');
				?>
			</div>
			<div class="tabmeo2">
				<?php
					include('meo_munchkin.php');
				?>
			</div>
			<div class="tabmeo3">
				<?php
					include('meo_batu.php');
				?>
			</div>
			<div class="tabmeo4">
				<?php
					include('meo_xiem.php');
				?>
			</div>
			<div class="tabmeo5">
				<?php
					include('meo_scottish.php');
				?>
			</div>
			<div class="tabthucan">
				<?php
					include('thuc_an.php');
				?>
			</div>
			<div class="tabthucan1">
				<?php
					include('thuc_an_cho_cho.php');
				?>
			</div>
			<div class="tabthucan2">
				<?php
					include('thuc_an_cho_meo.php');
				?>
			</div>
			<div class="tabpk">
				<?php
					include('phu_kien.php');
				?>
			</div>
			<div class="tabpk1">
				<?php
					include('phu_kien_cho_cho.php');
				?>
			</div>
			<div class="tabpk2">
				<?php
					include('phu_kien_cho_meo.php');
				?>
			</div>
		</div>
		<hr style="border-top:1px solid #990000;margin-top:30px;"/>
		<div class="fruid-container" id="footer"> 
			<!--Footer liên hệ-->
			<div class="row" style="height:350px;background-color:#000;margin-top:-15px;">
				<div class="col-3" style="margin-top:30px;">
					<img src="images/logo.jpg" style="width:60%; margin-top:5px;margin-left:7px;"/>
					<li ><a href="#"style="color:#fff;">Email: yenxuvyyb@gmail.com</a></li>
					<li><a href="#"style="color:#fff;">Hotline: 0344512909</a></li>
				</div>
				<div class="col-2" style="margin-top:30px;">
					<p style="color:#fff;font-size:25px;">Pet's Shop</p>
					<li style="list-style-type:circle;"><a class="menu2" style="color:#fff;">Giới thiệu</a></li>
					<hr style="border-top:1px solid #222222;margin-top:10px;"/>
					<li style="list-style-type:circle;"><a href="#"style="color:#fff;">Chính sách bảo mật</a></li>
					<hr style="border-top:1px solid #222222;margin-top:10px;"/>
					<li style="list-style-type:circle;"><a href="#"style="color:#fff;">Điều khoản dịch vụ</a></li>
					<hr style="border-top:1px solid #222222;margin-top:10px;"/>
					<li style="list-style-type:circle;"><a class="menu3" style="color:#fff;">Liên hệ</a></li>
					<hr style="border-top:1px solid #222222;margin-top:10px;"/>
				</div>
				<div class="col-3" style="margin-top:30px;">
					<p style="color:#fff;font-size:25px;">Theo dõi chúng tôi tại</p>
					<a href="#"><img src="images/fa.png" style="width:15%;"/></a>
					<a href="#"><img src="images/tw.png" style="width:15%;"></a>
					<a href="#"><img src="images/go.png" style="width:15%;"/></a>
					<a href="#"><img src="images/yo.png" style="width:15%;"/></a>
				</div>
				<div class="col-4" style="margin-top:30px;">
					<p style="color:#fff;font-size:25px;">Bản đồ chỉ dẫn</p>
					<li><a href="#"style="color:#fff;">Số 18 Phố Viên - P.Đức Thắng - Q.Bắc Từ Liêm - Hà Nội</a></li>
					<iframe style="margin-top:25px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.00660049477!2d105.77165101424606!3d21.072398591664538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3134552defbed8e9%3A0x1584f79c805eb017!2zVHLGsOG7nW5nIMSQ4bqhaSBo4buNYyBN4buPIC0gxJDhu4thIGNo4bqldA!5e0!3m2!1svi!2s!4v1599885040391!5m2!1svi!2s" width="220" height="120" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
				</div>
			</div>
			<div class="row" style="height:60px;background-color:#990000;margin-top:1px;">
				<div class="col-12">
					<p style="font-size:19px;margin-top:14px;color:#fff;text-align:center;">Bản quyền thuộc về Petsshop.com.vn @ 2020</p>
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	</body>
</html>