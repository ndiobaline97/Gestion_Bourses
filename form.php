<?php
 require("class/Autoloader.php");
 Autoloader::register();
?>
<html lang="fr">
<head> 
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width">
   <link rel="stylesheet" href="forme.css">
   <!--<script type="text/javaScript" src="form.js"></script>-->
        <title>Formulaire</title>
</head> 
<body>
<h2>SA University #Coding For better life</h2>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
			<!--
			<h1>inscrire un Etudiant</h1>
			
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
			-->
			<!--<span>or use your email for registration</span>
			<span>or use your account</span>-->
			<input type="matricule" placeholder="matricule" />
			<input type="nom" placeholder="nom" />
			<input type="prenom" placeholder="prenom" />
			<input type="date_nais" placeholder="date_nais" />
			<input type="phone" placeholder="phone" />
			<input type="email" placeholder="Email" />
			<input type="Id_pension" placeholder="Id_pension" />
			<input type="Idloge" placeholder="Idloge" />
			<input type="id_chbre" placeholder="id_chbre" />
			<div class="form-check">
			<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
				<label class="form-check-label" for="exampleRadios1">
				Boursie
				</label>
			</div>
				<div class="form-check">
			<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
				<label class="form-check-label" for="exampleRadios2">
				Non Boursie
				</label>
			</div>

			<button>Annuler</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#">
			<h1>INSCRIPTION</h1>
			<!--
			<div class="social-container">
				<a href="#" class="social"><i class="fab fa-facebook-f"></i></a>
				<a href="#" class="social"><i class="fab fa-google-plus-g"></i></a>
				<a href="#" class="social"><i class="fab fa-linkedin-in"></i></a>
			</div>
            
			<span>or use your account</span>-->
			<input type="matricule" placeholder="matricule" />
			<input type="nom" placeholder="nom" />
			<input type="prenom" placeholder="prenom" />
			<input type="date_nais" placeholder="date_nais" />
			<input type="phone" placeholder="phone" />
			<input type="email" placeholder="email" />
			<input type="adresse" placeholder="adresse" />
			<input type="Id_pension" placeholder="Id_pension" />
			<input type="Idloge" placeholder="Idloge" />
			<input type="id_chbre" placeholder="id_chbre" />
			<button>Inscrire</button>
		</form>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Welcome Back!</h1>
				<p>To keep connected with us please login with your personal info</p>
				<button class="ghost" id="signIn">Sign In</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Hello, Friend!</h1>
				<p>Enter your personal details and start journey with us</p>
				<button class="ghost" id="signUp">Sign Up</button>
			</div>
		</div>
	</div>
</div>
<!--
<footer>
	<p>
		Created with <i class="fa fa-heart"></i> by
		<a target="_blank" href="https://florin-pop.com">Florin Pop</a>
		- Read how I created this and how you can join the challenge
		<a target="_blank" href="https://www.florin-pop.com/blog/2019/03/double-slider-sign-in-up-form/">here</a>.
	</p>
</footer>
-->

<?php
if(isset ($_POST ['inserer']))
{
  $matricule=$_POST['matricule'];
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $date_nais=$_POST['date_nais'];
  $telephone=$_POST['phone'];
  $email=$_POST['email'];
  $adresse=$_POST['adresse'];
  $Id_pension=$_POST['Id_pension'];
  $Idloge=$_POST['Idloge'];
  $id_chbre=$_POST['id_chbre'];
  
  $db = new PDO("mysql:host=localhost;dbname=Gestion_Bourses;charset=utf8", 'root', 'thiat97');

  /*$etudiant=new NonBoursie($matricule,$nom,$prenom,$date_nais,$telephone,$email,$adresse);
  $etudiant=new Boursie($matricule,$nom,$prenom,$date_nais,$telephone,$email,$Id_pension);*/
  $objet1=new EtudiantService($db);
  //$objet=new Loge();
  $objet->Add($etudiant);
}
?>
<script>
	const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});
</script>
</body>
</html>