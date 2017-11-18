<div class="pageheader">
	<div class="pageicon"><span class="iconfa-laptop"></span></div>
	<div class="pagetitle">
		<h5>Ajout d'un utilisateur</h5>
		<h1>Ajout d'un gestionnaire de boutique : étape 3</h1>
	</div>
</div><!--pageheader-->
<div class="maincontent">
<div class="maincontentinner">
<div class="row-fluid"> 

<form method="POST" action="<?= BASE_LINK ?>/boutiques/validate">

<div class="widgetbox tags">
<h4 class="widgettitle">Gestionnaire de boutique</h4>
<div class="widgetcontent">
	<h4 class="widgettitle">Sélectionnez le/les gérant(s) pour cette boutique : <?= $boutiques_last_btq[0]->slug ?></h4>
	<input type="hidden" name="id_btq" value="<?= $boutiques_last_btq[0]->id_boutique ?>">
	<p>Le gestionnaire de cette boutique a déjà un compte utilisateur :</p> 
	<div id="zone_gestionnaire">
	<span id="dualselect" class="dualselect">
		<select class="uniformselect" name="select3" multiple="multiple" size="10">
			<?php foreach ($all_user as $user): ?>
				<option value="<?= $user->id_user ?>"><?= $user->nom .' '. $user->prenom .' - '.$user->mail ?></option>
			<?php endforeach;?>
		</select>
		<span class="ds_arrow">
			<button class="btn ds_prev"><i class="iconfa-chevron-left"></i></button><br />
			<button class="btn ds_next"><i class="iconfa-chevron-right"></i></button>
		</span>
		<select required id="selec_gestionnaire" name="selector[]" multiple="multiple" size="10">
		</select>		
	</span>
	<input required name="gestionnaires" id="gestionnaires" type="hidden" value="">
	
	</div>
	<br />
	SI le gestionnaire n'est pas dans la liste ci-dessus : créer un compte utilisateur : <a class="btn btn-primary" href="#myModal" data-toggle="modal">Créer un compte utilisateur</a>
</div>
</div>
<button type="submit" class="btn btn-primary">Enregistrer et terminer l'ajout</button>

</form>

<!-- Modal de création d'un compte utilisateur -->
<div aria-hidden="false" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" class="modal hide fade in" id="myModal">
    <div class="modal-header">
        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
        <h3 id="myModalLabel">Ajouter un nouvel utilisateur dans l'interface</h3>
    </div>
	<form method="POST" action="<?= BASE_LINK ?>/users/add_user">
    <div class="modal-body">
		<label><b>*</b> Champs obligatoire</label><br />
        <p>
            <label><b>*</b> Nom d'utilisateur / Login :</label>
            <input required type="text" name="username" class="input-xlarge" value="">
        </p>
        <p>
            <label><b>*</b> Email :</label>
            <input required type="text" name="email" class="input-xlarge" value="">
        </p>
        <p>
            <label><b>*</b> Mot de passe :</label>
            <input required type="text" name="password" class="input-xlarge" value="">
        </p>
		<p>
            <label>Accès au cloud VIP :</label>
			
			<div class="radio" id="uniform-undefined"><span class="checked"><input value="1" type="radio" name="cloud_vip" style="opacity: 0;"></span></div> Activé &nbsp; &nbsp;
			<div class="radio" id="uniform-undefined"><span class=""><input value="0" type="radio" name="cloud_vip" checked="checked" style="opacity: 0;"></span></div> Désactivé &nbsp; &nbsp;
			
		</p>
        <p>
            <label>Prénom :</label>
            <input type="text" name="firstname" class="input-xlarge" value="">
        </p>
        <p>
            <label>Nom :</label>
            <input type="text" name="lastname" class="input-xlarge" value="">
        </p>
        <p>
            <label>Poste occupé dans la société :</label>
            <input type="text" name="job" class="input-xlarge" value="">
        </p>
    </div>
    <div class="modal-footer">
        <button data-dismiss="modal" class="btn">Annuler</button>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
    </div>
</form>
</div><!--#myModal-->





</div>
</div>
</div>