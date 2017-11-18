<div class="pageheader">
            <div class="pageicon"><span class=" iconfa-user"></span></div>
            <div class="pagetitle">
                <h5>admin</h5>
                <h1>Les rôles utilisateurs</h1>
            </div>
        </div><!--pageheader-->
        		
        <div class="maincontent">
            <div class="maincontentinner">
            
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
                        <col class="con1" />
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head1">Utilisateur</th>
                            <th class="head0">Prénom</th>
                            <th class="head1">Nom</th>
                            <th class="head0">Mail</th>
                            <th class="head1">Niveau d'accès</th>
                            <th class="head0">Rôle</th>
                            <th class="head1">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($droit_user as $user_):?>
						<tr class="gradeX">
                            <td><?= $user_->login ?></td>
                            <td><?= $user_->nom ?></td>
                            <td><?= $user_->prenom ?></td>
                            <td><?= $user_->mail ?></td>
                            <td><?= $user_->level ?></td>
                            <td>
							<?= $user_->libelle ?>
							</td>
                            <td class="center">
								<form method="POST" action="<?= BASE_LINK ?>/users/update_role">
								<input type="hidden" value="<?= $user_->id_user ?>" name="id_user">
								<select name="new_level">
			                        <?php foreach($droits as $droit):?>
										<option  <?php if($user_->level==$droit->id_droit){echo "selected='selected'";} ?> value="<?= $droit->id_droit ?>"><?= $droit->libelle . " (niveau d'accès " . $droit->level . ")"?></option>
									<?php endforeach; ?>
								</select>
								<button type="submit" href="#" class="btn btn-info" alt="Désactiver"><i class=" iconfa-hand-left"></i></button>
								</form>
							</td>
                        </tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
