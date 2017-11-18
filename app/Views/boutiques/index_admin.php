<div class="pageheader">
            <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>admin</h5>
                <h1>Les boutiques</h1>
            </div>
        </div><!--pageheader-->
        		
		
		
        <div class="maincontent">
            <div class="maincontentinner">
				
				<button type="submit" onclick="window.location.href='<?= BASE_LINK ?>/boutiques/nouveau'" class="btn btn-primary">AJOUTER UNE NOUVELLE BOUTIQUE</button>
			
                <h4 class="widgettitle">Tableau de données</h4>
                <table id="dyntable" class="table table-bordered">
                    <colgroup>
                        <col class="con0" style="align: center; width: 30%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Boutiques</th>
                            <th class="head0">Active</th>
                            <th class="head1">Enseigne</th>
                            <th class="head0">Ville</th>
                            <th class="head0">Aperçu</th>
                            <th class="head0">Gestionnaires</th>
                            <th class="head1" style="text-align:center;">Infos boutiques / Facilités / Activation</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($boutiques_admin as $boutique):?>
						<tr class="gradeX">
                            <td><?= $boutique->nom ?></td>
                            <td><?= $boutique->active ?></td>
                            <td><?= $boutique->enseigne ?></td>
                            <td><?= $boutique->ville ?></td>
                            <td><?php if($boutique->active==1){ ?><a href="#" target="_blank">Voir la page</a><?php } ?></td>
							
							<style>
							.red{
								background:red!important;
							}
							
							</style>
                            <td class="center">
								<button id="edit" data-id="<?= $boutique->id_boutique ?>" data-toggle="modal" data-target="div#modalEdit<?= $boutique->id_boutique ?>" href="#" class="btn btn-info" alt="Modifier"><i class="iconfa-pencil"></i></button>
								<button id="facil" data-id="<?= $boutique->id_boutique ?>" data-toggle="modal" data-target="div#modalFac<?= $boutique->id_boutique ?>" href="#" class="btn btn-info" alt="Pictos facilités"><i class="iconfa-list-ol"></i></button>
								<button id="del" data-id="<?= $boutique->id_boutique ?>" data-toggle="modal" data-target="div#modalDel<?= $boutique->id_boutique ?>" href="#" class="<?php if($boutique->active==1){ ?>red<?php } ?> btn btn-info" alt="Désactiver"><i class="iconfa-off"></i></button>
								<button id="suppr" data-id="<?= $boutique->id_boutique ?>" data-toggle="modal" data-target="div#modalSuppr<?= $boutique->id_boutique ?>" href="#" class="btn btn-info" alt="Supprimer"><i class="iconfa-trash"></i></button>
							</td>
                        </tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
		
<?php foreach($boutiques_admin as $boutique):?>
<!-- Modal EDIT -->
<style>
.modal{
	width:900px!important;
}
</style>

<div id="modalEdit<?= $boutique->id_boutique ?>" class="modal fade" style="display:none;" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edition de la boutique <?= $boutique->nom ?> - <?= $boutique->ville ?></h4>
      </div>
      <div class="modal-body">
        <!-- DEBUT -->
		<!--<div class="profile-left">-->
				<form action="<?= BASE_LINK ?>/boutiques/update" method="POST">
					<input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
					<p>
						<label>Nom de la boutique :</label>
						<input type="text" name="nom_boutique" class="input-xlarge" value="<?=$boutique->nom;?>" />
					</p>
					<p>
						<label>Enseigne de la boutique :</label>
						<input type="text" name="enseigne" class="input-xlarge" value="<?=$boutique->enseigne;?>" />
					</p>
					<p>
						<label>Slogan :</label>
						<textarea name="slogan_boutique" class="span8"><?=$boutique->slogan;?></textarea>
					</p>
					<p>
						<label>Adresse :</label>
						<input type="text" name="adresse_boutique" class="input-xlarge" value="<?=$boutique->adresse;?>" />
					</p>
					<p>
						<label>Code postal :</label>
						<input type="text" name="cp_boutique" class="input-xlarge" value="<?=$boutique->cp;?>" />
					</p>
					<p>
						<label>Ville :</label>
						<input type="text" name="ville_boutique" class="input-xlarge" value="<?=$boutique->ville;?>" />
					</p>
					<p>
						<label>Téléphone :</label>
						<input type="text" name="tel_boutique" class="input-xlarge" value="<?=$boutique->tel;?>" />
					</p>
					<p>
						<label>Mail pour les visiteurs :</label>
						<input type="text" name="mail_boutique" class="input-xlarge" value="<?=$boutique->mail;?>" />
					</p>
					<p>
						<label>Lien du compte Facebook :</label>
						<input type="text" name="facebook_boutique" class="input-xlarge" value="<?=$boutique->facebook;?>" />
					</p>
					<p>
						<label>Lien du compte twitter :</label>
						<input type="text" name="twitter_boutique" class="input-xlarge" value="<?=$boutique->twitter;?>" />
					</p>
					<p>
						<label>Compte Skype :</label>
						<input type="text" name="skype_boutique" class="input-xlarge" value="<?=$boutique->skype;?>" />
					</p>
					<p>
						<label>Description de la boutique :</label>
						<textarea name="description" class="span8">
							<?=$boutique->boutique_description;?>
						</textarea>
					</p>
					<!--<div class="widgetbox profile-notifications">
						<h4 class="widgettitle">Notifications</h4>
						<div class="widgetcontent">
							<p>
								<input name="recall" type="checkbox" value="1" checked> Recevoir par mail les demandes de rappels téléphones visiteurs.<br />
							</p>
						</div>
					</div>-->
					<button type="submit" class="btn btn-primary">Enregistrer</button>
				</form>
				
				 <form action="<?= BASE_LINK ?>/boutiques/update_houres" method="POST">
					<input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
				<p>
					<label style="width:20%;float:left">Lundi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_lundi" value="<?=$boutique->h_lundi?>" class="input-small" placeholder="heures"></span><br />
					<small class="desc">exemple :  10h à 12h30 et de 13h30 à 19h</small>
				</p>
				<p>
					<label style="width:20%;float:left">Mardi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_mardi" value="<?=$boutique->h_mardi?>" class="input-small" placeholder="heures"></span>
				</p>
				<p>
					<label style="width:20%;float:left">Mercredi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_mercredi" value="<?=$boutique->h_mercredi?>" class="input-small" placeholder="heures"></span>
				</p>
				<p>
					<label style="width:20%;float:left">Jeudi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_jeudi" value="<?=$boutique->h_jeudi?>" class="input-small" placeholder="heures"></span>
				</p>
				<p>
					<label style="width:20%;float:left">Vendredi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_vendredi" value="<?=$boutique->h_vendredi?>" class="input-small" placeholder="heures"></span>
				</p>
				<p>
					<label style="width:20%;float:left">Samedi</label>
					<span class="field"><input style="width:250px;" type="text" name="h_samedi" value="<?=$boutique->h_samedi?>" class="input-small" placeholder="heures"></span>
				</p>
				<p>
					<label style="width:20%;float:left">Dimanche</label>
					<span class="field"><input style="width:250px;" type="text" name="h_dimanche" value="<?=$boutique->h_dimanche?>" class="input-small" placeholder="fermé ?"></span>
				</p>
				<p>
					<label>Information supplémentaires (Vacances, jours fériés...) :</label> </p>
					<textarea name="h_a_savoir" class="span8"><?=$boutique->h_a_savoir;?></textarea><br />
			   

				<button type="submit" class="btn btn-primary">Enregistrer</button>
				
				</form>

		    </div>
	<!-- FIN -->
      <!--</div>-->
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Désactivation -->
<div id="modalDel<?= $boutique->id_boutique ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php if($boutique->active==1){?> Désactivation <?php }else{?> Activation <?php } ?> de la boutique <?= $boutique->nom ?> - <?= $boutique->ville ?></h4>
      </div>
      <div class="modal-body">
        <p>Voulez vous vraiment <?php if($boutique->active==1){ ?> désactiver <?php } else {?> activer <?php } ?> cette boutique ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal Suppression -->
<div id="modalSuppr<?= $boutique->id_boutique ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Suppression de la boutique <?= $boutique->nom ?> - <?= $boutique->ville ?></h4>
      </div>
      <div class="modal-body">
        <p>Voulez vous vraiment supprimer cette boutique ?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>

<!-- Modal facilites -->
<div id="modalFac<?= $boutique->id_boutique ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gestion des facilités de la boutique <?= $boutique->nom ?> - <?= $boutique->ville ?></h4>
      </div>
      <div class="modal-body">
			<form method="POST" action="<?= BASE_LINK ?>/boutiques/update_facilites">
				<?php foreach ($facilites as $facilite): ?>
					<?php $checked=""; ?>
					<?php foreach ($facilites_btq as $facilite_btq): ?>
						<?php if($boutique->id_boutique==$facilite_btq->id_boutique){
							if($facilite_btq->id_facilites==$facilite->id_facilites){
								$checked="checked";
							}
						}?>
					<?php endforeach;?>
				<input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
					<div class="checkbox">
						<label><input name="facilites_<?= $facilite->id_facilites ?>" type="checkbox" value="<?= $facilite->id_facilites ?>" <?= $checked?>> <?= $facilite->libelle ?></label>
					</div>
				<?php endforeach;?>
				<br />
				<button type="submit" class="btn btn-primary">Enregistrer</button>
			</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
      </div>
    </div>

  </div>
</div>
<?php endforeach; ?>
