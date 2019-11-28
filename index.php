<!DOCTYPE html>
<html>
<head>
	<title>SPORTWEARS</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script language="javascript"></script>

	<link rel="stylesheet" type="text/css" href="./css/style.css">
	<link rel="stylesheet" type="text/css" href="./code/sport.css">
	
</head>
<body>
	<?php session_start(); ?>
	<div class="page-header">
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="text-left">
				Địa chỉ:101B-Lê Hưu Trác-Sơn Trà-Đà Nẵng

			</div>
		</div>
		<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
			<div class="text-right">
				<?php
				echo "Chào "; 
				print_r($_SESSION["username"]);?>
				<a href="./shopping_cart/displayCart.php">
				<img width="20px" height="20px"  src="shopping_cart/cart-icon.png" />Giỏ hàng
				<span><?php echo $cart_count; ?></span>
				</a>
				
			</div>				
		</div>
	</div>
	<div class="logo">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-3">
			<a href="web.php"><img class="polo" src="./Image/logo.JPG" width="230" height="125"></a>
		</div>
		<div class="col-xs-3 col-sm-3 col-md-6 col-lg-3">
			<img class="picture" src="./Image/uytin.jpg" width="230" height="125">
		</div>		
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<img class="picture" src="./Image/giaohang.jpg" width="230" height="125">
		</div>		
		<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
			<img class="picture" src="./Image/phone.jpg" width="230" height="125">
		</div>		
	</div>

	


	<div class="container">
		<div class="menu">
			<div class="topnav" id="myTopnav">
			    <a href="web.php"><span class="glyphicon glyphicon-home"></span>TRANG CHỦ</a>
			    <a href="code/gioithieu.php">GIỚI THIỆU</a>
			    <a href="code/Allproducts.php">SẢN PHẨM</a>
			    <a href="./code/thanhtoan.html">THANH TOÁN</a>
			    <a href="./code/lienhe.html">LIÊN HỆ</a>
			    <form action="./products/searchProduct.php" class="navbar-form navbar-left" method="POST">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search..." name="search">
						<div class="input-group-btn">
							<button href = "./products/searchProduct.php" class="btn btn-default" type="submit">
								<i class="glyphicon glyphicon-search"></i>
							</button>
						</div>
					</div>
				</form>
					<form class="navbar-form navbar-right">
					<a href="user/xacnhan.php"><button type="button" class="btn btn-primary">Đăng nhập</button></a>
					<a href="user/signup.php"><button type="button"  class="btn btn-primary">Đăng ký</button></a>
					<a href="user/logout.php"><button type="button"  class="btn btn-primary">Đăng Xuất</button></a>
				</form>
			    <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a>
  			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div id="danhmuc">
					DANH MỤC SẢN PHẨM
				</div>

				<div id="mainnav">
				  	<ul>
					    <?php 

						require_once("connect.php");
				        $sql = "SELECT * FROM `categories` ORDER BY date_sold DESC limit 6";
				        $linkImage = 'Image/';
				        $result = mysqli_query($link,$sql);
				        if($result)
				        {
				          while($row = mysqli_fetch_assoc($result))
					          {?>

					          	<li><a href="#"><img width = 30px height =30px  src="<?php echo $linkImage.$row['icon']; ?>" >
					          		<label style="margin-left: 10px"><?php echo $row['name']; ?></label></a>
							    
							</li>
						
					<?php }} ?>
					</ul>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
				<div id="carousel-id" class="carousel slide" data-ride="carousel" style="padding-left: 4%;" >
					<ol class="carousel-indicators">
						<li data-target="#carousel-id" data-slide-to="0" class=""></li>
						<li data-target="#carousel-id" data-slide-to="1" class=""></li>
						<li data-target="#carousel-id" data-slide-to="2" class="active"></li>
					</ol>
					<div class="carousel-inner">
						<div class="item">
							<img src="./Image/donam.jpg"  width="480"> 
						</div>
						<div class="item">
							<img src="./Image/donam.jpg"  width="480">
						</div>
						<div class="item active">
							<img src="./Image/nam.jpg" width="480">
						</div>
					</div>
					<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
					<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
				</div>
			</div>
			<div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
				<div class="lienhe">
					HỖ TRỢ TRỰC TUYẾN
					<img class="ll" src="./Image/nghe.jpg" width="295" height="250">
					<h4>0347.248.085</h4>
					<a href="#">Email: minhthuy1234@gmail.com</a><br>
					<b>Kết bạn Facebook: <a href="https://www.facebook.com/ho.tao32">CaoThiThuy</a></b>
				</div>
			</div>

			<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label style="color: red ;"><h1> SẢN PHẨM MỚI NHẤT</h1></label>
		</div>
		
		<div class="">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="row">
			<?php 

			require_once("connect.php");
		    $sql = "SELECT * FROM products ORDER BY date_sold DESC limit 4";
		    $linkImage = 'Image/';
		    $result = mysqli_query($link,$sql);
		    if($result)
		    {
		      while($row = mysqli_fetch_assoc($result))
		      {?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="thumbnail"  style="margin-left: 30px">
								<div class="image-effect">
								</br><a href="products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;"  src="<?php echo $linkImage.$row['Images']; ?>" ></a>
								</div>
							<div >
								</br><p>
									<label><?php echo $row['name']; ?> </label>
								</p>
								
								<p>
									<label><?php echo $row['price']; ?>.000 vnđ</label>
								</p>
								<p>
									<a href="products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>

									
								</p>
								
						
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php }} ?>
		</div>	
		</div>





</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<label style="color: red ;"><h1> SẢN PHẨM BÁN CHẠY</h1></label>
		</div>
		
		<div class="">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
			<div class="row">
			<?php 

			require_once("connect.php");
		    $sql = "SELECT * FROM products where comments = 'BC' limit 4";
		    $linkImage = 'Image/';
		    $result = mysqli_query($link,$sql);
		    if($result)
		    {
		      while($row = mysqli_fetch_assoc($result))
		      {?>
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 ">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 ">
							<div class="thumbnail"  style="margin-left: 30px">
								<div class="image-effect">
								</br><a href="products/DetailProduct.php?id=<?php echo $row['id'] ?>"><img style="width: 200px;height: 200px;"  src="<?php echo $linkImage.$row['Images']; ?>" ></a>
								</div>
							<div >
								</br><p>
									<label><?php echo $row['name']; ?> </label>
								</p>
								
								<p>
									<label><?php echo $row['price']; ?>.000 vnđ</label>
								</p>
								<p>
									<a" href="products/DetailProduct.php?id=<?php echo $row['id'] ?>" class="btn btn-primary">Chi Tiết Sản Phẩm</a>

								</p>
								
						
								</div>
							</div>
						</div>
					</div>
				</div>
					<?php }} ?>
		</div>	
		</div>
		</div>
	</div>
	

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<div class="modal-footer">
			<div class="fot">
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
					<br><strong>VỀ CHÚNG TÔI<br><br></strong>
					Giới thiệu về chúng tôi<br>
					Quan điểm kinh doanh<br>
					Cam kết chất lượng<br>
					Tuyển dụng<br>
					Liên hệ
				</div>
			</div>
			<div class="fot">
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
					<br><strong>HƯỚNG DẪN HỖ TRỢ<br><br></strong>
					Hướng dẫn mua hàng<br>
					Hướng dẫn ký gửi<br>
					Phương thức đổi trả hàng<br>
					Hình thức thanh toán<br>
					Phương thức đặt hàng
				</div>
			</div>
			<div class="fot">
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
					<br><strong>CHÍNH SÁCH MUA HÀNG<br><br></strong>
					Phương thức giao hàng<br>
					Chính sách bảo hành<br>
					Dịch vụ sửa chữa<br>
				</div>
			</div>
			<div class="fot">
				<div class="col-xs-6 col-sm-6 col-md-4 col-lg-3">
					<br><strong>KẾT NỐI VỚI CHÚNG TÔI<br><br></strong>
					<a href="https://www.facebook.com/ho.tao32"><i class="fa fa-facebook-square" style="font-size: 50px"></i></a>
					<a href="#"><i class="fa fa-google-plus-square" style="font-size: 50px"></i></a>
					<a href="#"><i class="fa fa-twitter" style="font-size: 50px"></i></a>
				</div>
			</div>
		</div>

		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
			<div class="foot">
					<div class="map-responsive">
					   <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3834.1104354055014!2d108.24145794912455!3d16.059758038832193!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3142177f2ced6d8b%3A0xeac35f2960ca74a4!2zOTkgVMO0IEhp4bq_biBUaMOgbmgsIFBoxrDhu5tjIE3hu7ksIFPGoW4gVHLDoCwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaWV0bmFt!5e0!3m2!1sen!2s!4v1541502751589" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
			</div>
		</div>
			<div class="footer">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div class="text">
						@Web được thiết kế bởi sinh viên của Passerelles Numériques VietNam 2017-2020
					</div>
				</div>
			</div>
		</div>
	
		
</body>
</html>

