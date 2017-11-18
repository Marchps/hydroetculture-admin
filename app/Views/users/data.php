<div class="pageheader">
            <div class="pageicon"><span class="iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>Paramètres</h5>
                <h1>Compte utilisateur</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">

<div class="widgetbox login-information">
    <h4 class="widgettitle">Informations utilisateur</h4>
    <div class="widgetcontent">
        <form method="POST" action="<?= BASE_LINK ?>/users/update_user">
        <p>
            <label>Nom d'utilisateur / Login :</label>
            <input type="text" name="username" class="input-xlarge" value="<?=$user->login?>">
        </p>
        <p>
            <label>Email :</label>
            <input type="text" name="email" class="input-xlarge" value="<?=$user->mail?>">
        </p>
        <p>
            <label>Nouveau mot de passe <b>(laisser vide si vous souhaitez garder votre mot de passe actuel)</b> :</label>
            <input type="password" name="password" class="input-xlarge" value="">
        </p>
        <p>
            <label>Prénom :</label>
            <input type="text" name="firstname" class="input-xlarge" value="<?=$user->prenom?>">
        </p>
        <p>
            <label>Nom :</label>
            <input type="text" name="lastname" class="input-xlarge" value="<?=$user->nom?>">
        </p>
        <p>
            <label>Poste occupé dans la société :</label>
            <input type="text" name="job" class="input-xlarge" value="<?=$user->poste?>">
        </p>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</div>