<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Interface d'administration</title>
<link rel="stylesheet" href="web/css/style.default.css" type="text/css" />
<link rel="stylesheet" href="web/css/style.shinyblue.css" type="text/css" />

<script type="text/javascript" src="web/js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="web/js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="web/js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="web/js/modernizr.min.js"></script>
<script type="text/javascript" src="web/js/bootstrap.min.js"></script>
<script type="text/javascript" src="web/js/jquery.cookie.js"></script>
<script type="text/javascript" src="web/js/custom.js"></script>
<script type="text/javascript">
    jQuery.noConflict();
    jQuery(document).ready(function() {
		
    // Lorsque je soumets le formulaire
    jQuery('#login').on('submit', function(e) {
        e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire
		
        var $this = jQuery(this); // L'objet jQuery du formulaire
 
        // Je récupère les valeurs
        var pseudo = jQuery('#username').val();
        var mail = jQuery('#password').val();
  
  
        // Je vérifie une première fois pour ne pas lancer la requête HTTP
        // si je sais que mon PHP renverra une erreur
        if(pseudo === '' || mail === '') {
            alert('Veuillez renseigner le login et le mot de passe');
        } else {
            // Envoi de la requête HTTP en mode asynchrone
            jQuery.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                dataType: 'json', // JSON
                success: function(json) {
                    if(json.reponse === 'ok') {
                        alert('Tout est bon');
                        window.location.replace("web/index.php");
                    } else {
                        jQuery('.login-alert').fadeIn();
                    }
                }
            });
        }
    });
});

</script>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /></head>

<body class="loginpage">

<style>
.btn_transp{
	background:transparent!important; 
	border:solid white 3px!important;
}

.btn_transp:hover{
	background:white!important;
	color:black!important;
}
</style>

<div class="loginpanel">
    <div class="loginpanelinner">
		<img class="img-responsive" src="web/images/logoLJM.png">
        <div class="logo animate0 bounceIn"><span style="font-size:20px; color:white;"><u>Espace Adhérent</u></span><br /><br />		
        <form id="login" method="post" action="Ad_Login_Exec.php" />
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Mauvais login ou mauvais mot de passe !</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Login" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Mot de passe" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button class="btn_transp" name="submit">Se connecter</button>
            </div>
        </form>
    </div><!--loginpanelinner-->
</div><!--loginpanel-->

<div class="loginfooter">
    <p>&copy; 2017. Les Jardiniers Modernes. All Rights Reserved.</p>
</div>

</body>
</html>