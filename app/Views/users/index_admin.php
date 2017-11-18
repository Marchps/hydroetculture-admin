<div class="pageheader">
            <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>admin</h5>
                <h1>Les utilisateurs</h1>
            </div>
        </div><!--pageheader-->
        		
        <div class="maincontent">
            <div class="maincontentinner">
				
				<button class="btn btn-info" href="#modalAdd" data-toggle="modal"> Ajouter un utilisateur </button>
				
                <h4 class="widgettitle">Tableau de données</h4>
                <table id="dyntable" class="table table-bordered">
                    <colgroup>
                        <col class="con0" style="align: center; width: 30%" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                        <col class="con1" />
                        <col class="con0" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Utilisateur</th>
                            <th class="head0">Prénom</th>
                            <th class="head1">Nom</th>
                            <th class="head0">Mail</th>
                            <th class="head1">Boutique(s) managée(s)</th>
                            <th class="head0">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($users as $user_):?>
						<tr class="gradeX">
                            <td><?= $user_->login ?></td>
                            <td><?= $user_->nom ?></td>
                            <td><?= $user_->prenom ?></td>
                            <td><?= $user_->mail ?></td>
                            <td>
							<?php 
							foreach($users_btq as $userb):
								if($userb->id_user==$user_->id_user){
									echo $userb->nom." ".$userb->ville ."<br />";
								}
							endforeach; 
							?>
							</td>
                            <td class="center">
								<button id="edit" data-id="<?= $user_->id_user ?>" data-toggle="modal" data-target="div#modalEdit<?= $user_->id_user ?>" href="#" class="btn btn-info" alt="Désactiver"><i class="iconfa-pencil"></i></button>
							</td>
                        </tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
		
<?php foreach($users as $user_):?>
<div id="modalEdit<?= $user_->id_user ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un utilisateur </h4>
      </div>
      <div class="modal-body">
        <!-- DEBUT -->
		<!--<div class="profile-left">-->
				<form action="<?= BASE_LINK ?>/users/user_updt" method="POST">
					<p>
						<label>Login de connexion :</label>
						<input type="text" name="login" class="input-xlarge" value="<?= $user_->login ?>" required />
					</p>
					<p>
						<label>Mot de passe :</label>
						<input type="text" name="password" class="input-xlarge" value="<?= $user_->password ?>" required />
					</p>
					<p>
						<label>Prénom :</label>
						<input type="text" name="prenom" class="input-xlarge" value="<?= $user_->prenom ?>" />
					</p>
					<p>
						<label>Nom :</label>
						<input type="text" name="nom" class="input-xlarge" value="<?= $user_->nom ?>" />
					</p>
					<p>
						<label>Mail :</label>
						<input type="text" name="mail" class="input-xlarge" value="<?= $user_->mail ?>" required />
					</p>
					<p>
						<label>Poste dans son entreprise :</label>
						<input type="text" name="job" class="input-xlarge" value="<?= $user_->poste ?>" required />
					</p>					
					<p>
						<label>Accès CLOUD VIP</label>
						<input type="checkbox" name="cloud_vip" class="input-xlarge" value="<?= $user_->cloud_vip ?>" />
					</p>
					
					<br />
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
<?php endforeach; ?>
	
	
<div id="modalAdd" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Ajout d'un utilisateur </h4>
      </div>
      <div class="modal-body">
        <!-- DEBUT -->
		<!--<div class="profile-left">-->
				<form action="<?= BASE_LINK ?>/users/user_add" method="POST">
					<p>
						<label>Login de connexion :</label>
						<input type="text" name="login" class="input-xlarge" value="" required />
					</p>
					<p>
						<label>Mot de passe :</label>
						<input type="text" name="password" class="input-xlarge" value="" required />
					</p>
					<p>
						<label>Prénom :</label>
						<input type="text" name="prenom" class="input-xlarge" value="" />
					</p>
					<p>
						<label>Nom :</label>
						<input type="text" name="nom" class="input-xlarge" value="" />
					</p>
					<p>
						<label>Mail :</label>
						<input type="text" name="mail" class="input-xlarge" value="" required />
					</p>
					<p>
						<label>Poste dans son entreprise :</label>
						<input type="text" name="job" class="input-xlarge" value="" required />
					</p>
					<p>
						<label>Droit : </label>
						<select name="droit">
							<?php foreach($droits as $droit): ?>
								<option value=" <?= $droit->id_droit ?>"> <?= $droit->libelle ?></option>
							<?php endforeach; ?>
						</select>
					</p>
					
					<p>
						<label>Boutique(s) managée(s) :</label>
						<?php foreach($all_btq as $boutique):?>
							<input type="checkbox" name="boutique[]" class="input-xlarge" value="<?= $boutique->id_boutique ?>" /> <?= $boutique->nom . ' - ' . $boutique->ville ?><br />
						<?php endforeach; ?>
					</p><br />
					<p>
						<label>Accès CLOUD VIP</label>
						<input type="checkbox" name="cloud_vip" class="input-xlarge" value="1" />
					</p>
					
					<br />
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
