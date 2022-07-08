<?php 
include('includes/dbconnection.php');
session_start();
error_reporting(0);
if(isset($_POST['submit']))
{

	$name=$_POST['name'];
	$email=$_POST['email'];
	$services=$_POST['services'];
	$adate=$_POST['adate'];
	$atime=$_POST['atime'];
	$phone=$_POST['phone'];
	$aptnumber = mt_rand(100000000, 999999999);

	$query=mysqli_query($con,"insert into tblappointment(AptNumber,Name,Email,PhoneNumber,AptDate,AptTime,Services) value('$aptnumber','$name','$email','$phone','$adate','$atime','$services')");
	if ($query) 
	{
		echo "<script>alert('Thank you for booking, your appointment number is $aptnumber, we will give you phone call shortly.');</script>";  		
		echo "<script>window.location.href='index.php'</script>";	
	}
	else
	{
		echo "<script>alert('Something Went Wrong. Please try again.');</script>";  	 	
	}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>AFROdite - Sistema de Gerenciamento</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/animate.css">
	
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">
	<link rel="stylesheet" href="css/magnific-popup.css">

	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<link rel="stylesheet" href="css/jquery.timepicker.css">

	
	<link rel="stylesheet" href="css/flaticon.css">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<?php include('includes/header.php') ?>
	
	<!-- END nav -->
	
	<section class="hero-wrap">
		<div class="home-slider owl-carousel js-fullheight">
			<div class="slider-item js-fullheight" style="background-image:url(images/home-page.png);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">AFROdite</span>
								<h2 style="color: #ffffff; font-size: 70px;">Servindo a você desde 2022</h2>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="slider-item js-fullheight" style="background-image:url(images/tranca2.jpg);">
				<div class="overlay"></div>
				<div class="container">
					<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
						<div class="col-md-12 ftco-animate">
							<div class="text w-100 mt-5 text-center">
								<span class="subheading">AFROdite - Salão Afro</h2></span>
								<h2 style="color: #ffffff; font-size: 70px;">As melhores tranças</h2>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	

	<section class="ftco-section ftco-wrap-about ftco-no-pb ftco-no-pt">
		<div class="container">
			<div class="row no-gutters">
				<div class="col-sm-4 p-4 p-md-5 d-flex align-items-center justify-content-center bg-primary">
					<form action="#" method="post" class="appointment-form">
						<h3 class="mb-3">Reserve seu horário</h3>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group">
									<input type="name" name="name" class="form-control" placeholder="Nome"required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Email"required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Telefone"required>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-calendar"></span></div>
										<input type="text" name="adate" class="form-control book_date" placeholder="Data"required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="input-wrap">
										<div class="icon"><span class="fa fa-clock-o"></span></div>
										<input type="text" name="atime" class="form-control book_time" placeholder="Horário"required>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<div class="form-field">
										<div class="select-wrap">
											<div class="icon"><span class="fa fa-chevron-down"></span></div>
											<select name="services" id="services" class="form-control"required>
												<option value="">Selecione o Serviço</option>
												<?php $query=mysqli_query($con,"select * from tblservices");
												while($row=mysqli_fetch_array($query))
												{
													?>
													<option style="color: red;" value="<?php echo $row['ServiceName'];?>" ><?php echo $row['ServiceName'];?></option>
													<?php
												} ?> 
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
									<input type="submit" name="submit" value="Reservar" class="btn btn-white py-3 px-4">
								</div>
							</div>
						</div>
					</form>
				</div>
				<div class="col-sm-8 wrap-about py-5 ftco-animate img" style="background-image: url(images/1112.jpg);">
					<div class="row pb-5 pb-md-0">
						<div class="col-md-12 col-lg-7">
							<div class="heading-section mt-5 mb-4">
								<div class="pl-lg-3 ml-md-5">
									<span class="subheading">BEM-VINDO A AFRODITE!</span>
									<h2 class="mt-4"></h2>
								</div>
							</div>
							<div class="pl-lg-4 ml-md-5">
								<p>O melhor salão de Beleza especializado em tranças da Bahia!</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-intro" style="background-image: url(images/888.jpg);">
		<div class="overlay"></div>
		<div class="container">
			<div class="row">
				<div class="col-md-12 text-center">
					<span>DE MULHER PARA MULHER</span>
					<h2>Lindas tranças, se empodere!</h2>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb">
		<div class="container">
			<div class="row d-flex">
				<div class="col-md-6 d-flex">
					<div class="img img-2 w-100 mr-md-2" style="background-image: url(images/tranca3.jpg);">
						
					</div>
				</div>
				<div class="col-md-6 ftco-animate makereservation p-4 p-md-5">
					<div class="heading-section ftco-animate mb-5">
						<span class="subheading">Esse é o nosso segredo</span>
						<h2 class="mb-4">Emponderamento!
						</h2>
						<p>Apesar de 54% dos brasileiros serem negros e negras, de acordo com o Instituto Brasileiro de Geografia e Estatística (IBGE), até pouco tempo atrás eram escassos os produtos e tratamentos específicos para cabelos cacheados e crespos, bem como para a pele negra. Nos últimos anos, porém, um forte ânimo nos movimentos de luta por igualdade racial expandiu, entre outros fatores, os padrões de beleza, levando a um aumento na procura e na oferta de opções para quem quer expressar a identidade negra também nos cabelos e nos cuidados com a pele. Esse cenário tornou-se solo fértil para o desenvolvimento de salões de beleza e estética segmentadas para o público negro.
						</p>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section bg-light">
		<div class="container">
			<div class="row justify-content-center mb-5 pb-2">
				<div class="col-md-7 text-center heading-section ftco-animate">
					<span class="subheading">Escolha o seu</span>
					<h2 class="mb-4">Tipo de Trança</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/boxbraids.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/trancatwist.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/trancastitch.jpg');">
						</a>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/trancanago.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/trancaboxeadora.jpg');">
						</a>
					</div>
				</div>
				<div class="col-md-4 ftco-animate">
					<div class="blog-entry">
						<a href="#" class="block-20" style="background-image: url('images/trancafulani.jpg');">
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section class="ftco-section ftco-no-pt ftco-no-pb ftco-intro bg-primary">
		<div class="container py-5">
			<div class="row py-2">
				<div class="col-md-12 text-center">
					<h2>RESSALTE SUA BELEZA AFRO, SE EMPODERE!</h2>
					<a href="services.php" class="btn btn-white btn-outline-white">AGENDE SEU HORÁRIO AQUI!</a>
				</div>
			</div>
		</div>
	</section>

	<?php include('includes/footer.php') ?>

	<!-- loader -->
	<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


	<script src="js/jquery.min.js"></script>
	<script src="js/jquery-migrate-3.0.1.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.easing.1.3.js"></script>
	<script src="js/jquery.waypoints.min.js"></script>
	<script src="js/jquery.stellar.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/jquery.animateNumber.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/jquery.timepicker.min.js"></script>
	<script src="js/scrollax.min.js"></script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
	<script src="js/google-map.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>