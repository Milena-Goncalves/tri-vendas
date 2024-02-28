
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Tri-Vendas</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->

			<link rel="stylesheet" href="../../css/linearicons.css">
			<link rel="stylesheet" href="../../css/font-awesome.min.css">
			<link rel="stylesheet" href="../../css/bootstrap.css">
			<link rel="stylesheet" href="../../css/magnific-popup.css">
			<link rel="stylesheet" href="../../css/nice-select.css">					
			<link rel="stylesheet" href="../../css/animate.min.css">
			<link rel="stylesheet" href="../../css/owl.carousel.css">
			<link rel="stylesheet" href="../../css/main.css">
			<link rel="stylesheet" href="../../css/login.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

		</head>
		<body>
    <header id="header" id="home">
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="../../index.php"><img src="../../img/logo.png" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="../../pages/index.php">Home</a></li>
				          <li><a href="about-us.php">About Us</a></li>
				          <li><a href="category.php">Category</a></li>
				          <li><a href="contact.php">Contact</a></li>
				          <li class="menu-has-children"><a href="">Pages</a>
				            <ul>
								<li><a href="elements.html">elements</a></li>
								<li><a href="search.html">search</a></li>
								<li><a href="single.html">single</a></li>
				            </ul>
				          </li>
				          <?php if ($isUserLoggedIn): ?>
                        <li><a class="ticker-btn" href="create_ad.php">Criar Anúncio</a></li> 
				          <li><a class="ticker-btn" href="../../logout.php">Logout</a></li>
				          <li><a class="ticker-btn" href="my_account.php">Minha Conta</a></li>			         				          
				          <?php else: ?>
				          <li><a class="ticker-btn" href="register.php">Registrar</a></li>
				          <li><a class="ticker-btn" href="../../pages/login.php">Login</a></li>
				          <?php endif; ?>
				        </ul>
				      </nav>		    		
			    	</div>
			    </div>
			  </header>