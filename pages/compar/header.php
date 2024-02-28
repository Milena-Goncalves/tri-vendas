
<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>

		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<link rel="shortcut icon" href="img/fav.png">

		<meta name="author" content="codepixer">

		<meta name="description" content="">

		<meta name="keywords" content="">

		<meta charset="UTF-8">

		<title>Tri-Vendas</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 



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
				        <a href="../../index.php" lass="navbar-brand" class="d-flex">
							<img src="https://imgmilena.s3.eu-north-1.amazonaws.com/logo.png" class="d-flex" style="height: 4rem" />
	<h4 class="d-flex align-items-center" style="
    color: white;
    font-size: 2rem;
	padding-left: 2rem"> TriVendas</h4>
	</a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="../../pages/index.php">Inicio</a></li>
				          <li><a href="about-us.php">Sobre nós</a></li>
				          <li><a href="contact.php">Contact</a></li>
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