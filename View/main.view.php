<?php require_once "init.php"; ?>
<!DOCTYPE html>

<html lang="en">
<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Aplikacja rezerwacyjna dla klientów świadczących usługi w rozmaitych dziedzinach.">
  <meta name="author" content="Robert Bajorek - Rbcode.pl">

  <title>Reservo - zarezerwuj wizytę już dziś!</title>

   <!-- Bootstrap core CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- Custom styles for this template -->
  <link href="css/business-frontpage.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
<div class="header-wrapper">
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Reservo</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="?task=home">STRONA GŁÓWNA
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?task=o-aplikacji">O APLIKACJI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="?task=oferta">OFERTA</a>
          </li>
		  <!-- Elementy menu które zależą od tego czy użytkownik jest zalogowany  czy nie-->
			<?php if(!isset($_SESSION['LogedIn'])) { echo '<li class="nav-item">
            <a class="nav-link" href="#" role="button" data-toggle="modal" data-target="#modalRegister">REJESTRACJA</a>
			</li>'; } else {
				echo '<li class="nav-item">
            <a class="nav-link" href="?task=dashboard">MOJE KONTO</a>
			</li>';
			}
		  ?>
        </ul>
      </div>
    </div>
  </nav>
  <!--Modal registration form-->
	<!-- Modal -->
<div class="modal fade" id="modalRegister" tabindex="-1" role="dialog" aria-labelledby="modalRegisterTittle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="col-12 text-center modal-title" id="modalRegisterTittle">REJESTRACJA</h5>
      </div>
      <div class="modal-body">
        <form method="post" action="?task=register">
				<label for="Company Name" style="">Nazwa firmy</label>
				<input type="text" name="company_name" style="" placeholder="Nazwa Firmy"></br>	
				<label for="User Name" style="">Imię</label>
				<input type="text" name="user_name" style="" placeholder="Imię"></br>
				<label for="User Surname" style="">Nazwisko</label>
				<input type="text" name="user_surname" style="" placeholder="Nazwisko"></br>
				<label for="User email" style="">E-mail</label>
				<input type="text" name="user_email" style="" placeholder="E-mail"></br>
				<label for="User Password" style="">Hasło</label>
				<input type="password" name="user_password" style="" placeholder="Hasło"></br>
				<label for="User Re-password" style="">Powtórz hasło</label>
				<input type="password" name="user_re_password" style="" placeholder="Powtórz hasło"></br>
				<input type="text" name="token" value="<?php echo Token::generate(); ?>"></br>				
					
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
        <button type="submitbutton" class="btn btn-dark">Zarejestruj się</button>
		</form>
      </div>
    </div>
  </div>
</div>
  <!-- Header -->
  <header class="pt-5 mb-5">
    <div class="container h-100">
      <div class="row h-100 align-items-center">
        <div class="col-lg-9">
		  <div class="col-12" style="height:50px; padding:45px 0 0 0;"> 
		  <?php
					if (isset($_SESSION['success'])) {
					  echo '<div class="alert alert-success alert-dismissible fade in show" role="alert" >'.$_SESSION['success'].'
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
					  </button></div>';
					  unset($_SESSION['success']);
					} else {
					  if (isset($_SESSION['error'])) {
							echo '<div class="alert alert-danger alert-dismissible fade in show " role="alert">'.$_SESSION['error'].'
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span>
							</button></div>';
						unset($_SESSION['error']);
					  }
					}
					?>
			</div>
          <h1 class="display-4 text-white mt-5 mb-2">Business Name or Tagline</h1>
          <p class="lead mb-5 text-white-50">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non possimus ab labore provident mollitia. Id assumenda voluptate earum corporis facere quibusdam quisquam iste ipsa cumque unde nisi, totam quas ipsam.</p>
        </div>
		<!-- Login form-->
		<?php 
		if(!isset($_SESSION['LogedIn'])) { 
			echo '<div class="col-lg-3">
					<div class="row">
						<h2 class="h2-login mt-2 mb-3"><img class ="img-login" src="Includes/Images/lock-w.png"> LOGOWANIE</h2>
					</div>
					<form method="post" action="?task=login" autocomplete="off">
						<div class="login" style="float:right;">
						<img class="img-input" src="Includes/Images/user-w.png">
						<input type="login" name="login" placeholder="Podaj adres e-mail" ></br>	
						</div>
						<div style="clear:both"></div>
						<div class="login" style="float:right;">
						<img class="img-input" src="Includes/Images/lock-open-w.png">
						<input  type="password" name="password" placeholder="Podaj hasło"></br>
						</div>
						
						<a href="#" style="color:#fff;font-size:0.8em; float:right;" role="button" data-toggle="modal" data-target="#modalForgotPass">Zapomniałem hasła</a>
						
						<div style="clear:both"></div>
						<input type="hidden" name="token" value="'; echo Token::generate(); echo '">
						<button type="submitbutton" class="btn btn-dark mt-2" style="float:right; ">Zaloguj</button>
					</form>		
					</div>'; } else { 
						echo '<div class="col-lg-3">
								<div class="row">
									<h2 class=" text-white mt-2 mb-4 align-right" style="margin-left: auto; padding-right:.5em;">Witaj '.$_SESSION['UserCompany'].'!</h2>
								</div>
							 </div>'; }
		?> 
      </div>
    </div>
	
	<!--Modal reset form-->
	<div class="modal fade " id="modalForgotPass" tabindex="-1" role="dialog" aria-labelledby="modalForgotTittle" aria-hidden="true">
	  <div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
		  <div class="modal-header">
			<h5 class="col-12 text-center modal-title" id="modalRegisterTittle">ZRESETUJ HASŁO</h5>
		  </div>
		  <div class="modal-body">
			<form method="post" action="?task=reset">
					<label for="email" style="">Podaj e-mail</label>
					<input type="text" name="email" style="" placeholder="Nazwa Firmy"></br>	
					<label for="re-email" style="">Powtórz e-mail</label>
					<input type="text" name="re-email" style="" placeholder="Imię"></br>
				
		  </div>
		  <div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Wyjdź</button>
			<button type="submitbutton" class="btn btn-dark">Zresetuj</button>
			</form>
		  </div>
		</div>
	  </div>
	</div>

  </header>
</div>
  <!-- Page Content -->
  <div class="container">

    <div class="row">
      <div class="col-md-8 mb-5">
        <h2>What We Do</h2>
        <hr>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A deserunt neque tempore recusandae animi soluta quasi? Asperiores rem dolore eaque vel, porro, soluta unde debitis aliquam laboriosam. Repellat explicabo, maiores!</p>
        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis optio neque consectetur consequatur magni in nisi, natus beatae quidem quam odit commodi ducimus totam eum, alias, adipisci nesciunt voluptate. Voluptatum.</p>
        <a class="btn btn-primary btn-lg" href="#">Call to Action &raquo;</a>
      </div>
      <div class="col-md-4 mb-5">
        <h2>Contact Us</h2>
        <hr>
        <address>
          <strong>Start Bootstrap</strong>
          <br>3481 Melrose Place
          <br>Beverly Hills, CA 90210
          <br>
        </address>
        <address>
          <abbr title="Phone">P:</abbr>
          (123) 456-7890
          <br>
          <abbr title="Email">E:</abbr>
          <a href="mailto:#">name@example.com</a>
        </address>
      </div>
    </div>
    <!-- /.row -->

    <div class="row">
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque sequi doloribus totam ut praesentium aut.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
      <div class="col-md-4 mb-5">
        <div class="card h-100">
          <img class="card-img-top" src="http://placehold.it/300x200" alt="">
          <div class="card-body">
            <h4 class="card-title">Card title</h4>
            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente esse necessitatibus neque.</p>
          </div>
          <div class="card-footer">
            <a href="#" class="btn btn-primary">Find Out More!</a>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy;Rbcode.pl 2019</p>
    </div>
    <!-- /.container -->
  </footer>


 <!-- Bootstrap core JavaScript -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>

</html>
