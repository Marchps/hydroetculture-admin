<div class="pageheader">
	<div class="pageicon"><span class="iconfa-laptop"></span></div>
	<div class="pagetitle">
		<h5>Ajout d'une boutique</h5>
		<h1>Nouvelle boutique : étape 1</h1>
	</div>
</div><!--pageheader-->
<div class="maincontent">
<div class="maincontentinner">
<div class="row-fluid">    
<div class="span12">
	<div class="widgetbox personal-information">
			<h4 class="widgettitle">Informations boutiques</h4>
			<div class="widgetcontent">
			<form action="<?= BASE_LINK ?>/boutiques/nouveau" method="POST">
				<input type="hidden" name="id_btq" value="">
				<p>
					<label>Nom de la boutique :</label>
					<input required type="text" name="nom_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Activation (modifiable plus tard) : </label>
					<select name="active" class="uniformselect">
						<option value="1" />Activée
						<option value="0" />Désactivée
					</select>
				</p>
				<p>
					<label>Propriétaire de la boutique :</label>
					<small class="desc">Nom et prénom, à savoir que le propriétaire n'est pas forcément la personne en charge de gérer la boutique sur LJM.</small><br />
					<input type="text" name="" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Slogan :</label>
					<textarea name="slogan_boutique" class="span8"></textarea>
				</p>
				<p>
					<label>Adresse :</label>
					<small class="desc">Rue, lieu dit...</small><br />
					<input required type="text" name="adresse_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Code postal :</label>
					<input required type="text" name="cp_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Ville :</label>
					<input required type="text" name="ville_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Téléphone :</label>
					<small class="desc">Visible sur le site</small><br />
					<input required type="text" name="tel_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Mail pour les visiteurs :</label>
					<input required type="text" name="mail_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Lien du compte Facebook :</label>
					<small class="desc">le nom du compte : https://www.facebook.com/<b>LesJardiniersModernes</b>/ </small><br />
					https://www.facebook.com/<input type="text" name="facebook_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Lien du compte twitter :</label>
					<small class="desc">le nom du compte : https://twitter.com/<b>hydroetculture</b>/ </small><br />
					https://twitter.com/<input type="text" name="twitter_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Compte Skype :</label>
					<small class="desc">le nom du compte skype</b>/ </small> <br />
					<input type="text" name="skype_boutique" class="input-xlarge" value="" />
				</p>
				<p>
					<label>Description de la boutique :</label>
					<textarea name="description" class="span8">
					</textarea>
				</p>
				<!--<div class="widgetbox profile-notifications">
					<h4 class="widgettitle">Notifications</h4>
					<div class="widgetcontent">
						<p>
							<input name="recall" type="checkbox" value="1" checked> Recevoir par mail les demandes de rappels t�l�phones visiteurs.<br />
						</p>
					</div>
				</div>-->
			</div>
		</div>
		<div class="widgetbox tags">
			<h4 class="widgettitle">Heures d'ouvertures</h4>
			<div class="widgetcontent">
				<input type="hidden" name="id_btq" value="">
			<p>
				<label style="width:20%;float:left">Lundi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_lundi" value="" class="input-small" placeholder="heures"></span><br />
				<small class="desc">exemple :  10h à 12h30 et de 13h30 à 19h</small>
			</p>
			<p>
				<label style="width:20%;float:left">Mardi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_mardi" value="" class="input-small" placeholder="heures"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Mercredi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_mercredi" value="" class="input-small" placeholder="heures"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Jeudi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_jeudi" value="" class="input-small" placeholder="heures"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Vendredi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_vendredi" value="" class="input-small" placeholder="heures"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Samedi</label>
				<span class="field"><input style="width:250px;" type="text" name="h_samedi" value="" class="input-small" placeholder="heures"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Dimanche</label>
				<span class="field"><input style="width:250px;" type="text" name="h_dimanche" value="" class="input-small" placeholder="fermé ?"></span>
			</p>
			<p>
				<label>Informations supplémentaires (Vacances, jours fériés...) :</label> </p>
				<textarea name="h_a_savoir" class="span8"></textarea><br />
		   
			</div>
	</div>
	
	<div class="widgetbox tags">
			<h4 class="widgettitle">Coordonnées de la boutique pour l'ajout sur la carte intéractive</h4>
			<div class="widgetcontent">

			<p>
				Rendez vous ici pour déterminer les coordonnées depuis une adressse : <a target="_blank" href="https://www.coordonnees-gps.fr/">https://www.coordonnees-gps.fr/</a>
			</p>
			<p>
				<label style="width:20%;float:left">Latitude</label>
				<span class="field"><input style="width:250px;" type="text" name="latitude" value="" class="input-small"></span>
			</p>
			<p>
				<label style="width:20%;float:left">Longitude</label>
				<span class="field"><input style="width:250px;" type="text" name="longitude" value="" class="input-small"></span>
			</p>
			</div>
	</div>		
		
	</div>
	
	<button type="submit" class="btn btn-primary">Enregistrer et passer à l'étape 2</button>

</form>
</div>

</div>
</div>