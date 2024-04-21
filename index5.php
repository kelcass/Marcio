<?php
	session_start();
?>
<!DOCTYPE html>
<html lang="pt">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
       <link rel="shortcut icon" href="pics/Logotipo.png"type="image/x-icon">
<title>Escola Secundaria 12 de outubro</title>
        <meta name="description" content="Login" />
        <meta name="keywords" content="Login" />
        <meta name="author" content="Haggy Tomas Manjolo" />
        
		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="bootstrap/css/theme.css" rel="stylesheet">
	<link href="bootstrap/manjolo.css" rel="stylesheet">
    <script src="bootstrap/js/ie-emulation-modes-warning.js"></script>
    <link rel="stylesheet" type="text/css" href="sign-in.css">

        <script src="js/modernizr.custom.63321.js"></script>
		<style>
		</style>
    </head>












    <link href="../assets/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      .b-example-divider {
        width: 100%;
        height: 3rem;
        background-color: rgba(0, 0, 0, .1);
        border: solid rgba(0, 0, 0, .15);
        border-width: 1px 0;
        box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
      }

      .b-example-vr {
        flex-shrink: 0;
        width: 1.5rem;
        height: 100vh;
      }

      .bi {
        vertical-align: -.125em;
        fill: currentColor;
      }

      .nav-scroller {
        position: relative;
        z-index: 2;
        height: 2.75rem;
        overflow-y: hidden;
      }

      .nav-scroller .nav {
        display: flex;
        flex-wrap: nowrap;
        padding-bottom: 1rem;
        margin-top: -1px;
        overflow-x: auto;
        text-align: center;
        white-space: nowrap;
        -webkit-overflow-scrolling: touch;
      }

      .btn-bd-primary {
        --bd-violet-bg: #712cf9;
        --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

        --bs-btn-font-weight: 600;
        --bs-btn-color: var(--bs-white);
        --bs-btn-bg: var(--bd-violet-bg);
        --bs-btn-border-color: var(--bd-violet-bg);
        --bs-btn-hover-color: var(--bs-white);
        --bs-btn-hover-bg: #6528e0;
        --bs-btn-hover-border-color: #6528e0;
        --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
        --bs-btn-active-color: var(--bs-btn-hover-color);
        --bs-btn-active-bg: #5a23c8;
        --bs-btn-active-border-color: #5a23c8;
      }

      .bd-mode-toggle {
        z-index: 1500;
      }

      .bd-mode-toggle .dropdown-menu .active .bi {
        display: block !important;
      }
    </style>
    <body style="background-color: whitesmoke;">
        <div class="container">
			
  
   <!-- coluna de Espacamento  a esquerda-->
 
   
	    
        <div class="col-xs-12  col-lg-4 col-lg-offset-4 col-md-4 col-md-offset-4  col-sm-6 col-sm-offset-3" >
			<br>
			
			<section class="main"> 
				<form class="form-2" method="post" action="valida-login.php">
				 	<div class="panel panel-table">
				 		<p class="clearfix">	
							<div class="panel-primary panel-heading text-center">
						</p>

					</div>
					 <h1 class="h3 mb-3 fw-normal" style="text-align: center;">SIGE </h1>
					  <h5 class="h5 mb-5 fw-normal" style="text-align: center;">Sistema de Gestao Escolar </h5>


					<div class="panel-body"> 
					<div align="center">
					<p class="clearfix">
						 <img class="mb-4" src="pics/Logotipo.png" alt="" width="300" height="300">
					</p>
					</div>
					<p class="clearfix" style="color: red">
					<?php
                        if(isset($_SESSION['loginErro'])){
                            echo $_SESSION['loginErro'];
                            unset($_SESSION['loginErro']);
                        }
                    ?>
                   
                    </p>
					<div class="form-floating">
						
						<input requires autofocus name="usuario" type="imputuser" class="form-control" class="td" size="50" maxlength="26"id="username" placeholder="ID "/>
						 <label for="floatingInput">
					</div>
					
					<div class="form-floating">
						
						<td><input name="senha" type="password" class="form-control" class="td" size="70" maxlength="26"placeholder=" Password"/>
					</div>
					<br>
					<p class="clearfix">   
						 
						
					</p>

					<div class="d-grid gap-2 col-6 mx-auto" style="text-align:center;">

  <button class="btn btn-primary" type="submit">Entrar</button>
</div>




					<p	class="clearfix">
 <div class="row">
                                                <div class="col-lg-12" style="text-align:center;">
                                                    <div class="forgot-password">
                                                       

                                                    </div>
                                                                                 

                                                </div>
                                            </div>
                                             
                                        </div>
                                    </div>
                                   
                                        <div class="col-lg-12">
                                            
                                           
                                        </div>
					</p>
					</div>
				</form>​​
			</section>
			</div>
			</div>
			</div>
        </div>
		
    </body>
</html>





