<div class="pageheader">
            <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>admin</h5>
                <h1>GPS pour la carte interactive</h1>
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
                    </colgroup>
                    <thead>
                        <tr>
                            <th class="head0">Boutiques</th>
                            <th class="head1">Latitude</th>
                            <th class="head0">Longitude</th>
                            <th class="head1">Modifier</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($boutiques_admin as $boutique):?>
						<tr class="gradeX">
                            <td><?= $boutique->nom ?> <?= $boutique->ville ?></td>
                            <td><?= $boutique->latitude ?></td>
                            <td><?= $boutique->longitude ?></td>
                            <td><a class="btn btn-primary" href="#myModal<?= $boutique->id_boutique ?>" data-toggle="modal">Modifier</a></td>
							
							<style>
							.red{
								background:red!important;
							}
							
							</style>
                        </tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
		
<?php foreach($boutiques_admin as $boutique):?>
<div id="myModal<?= $boutique->id_boutique ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Coordonnées GPS - <?= $boutique->nom ?> - <?= $boutique->ville ?></h4>
      </div>
      <div class="modal-body">
			<form method="POST" action="<?= BASE_LINK ?>/boutiques/update_map">
				<input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
				<input type="text" name="latitude" value="<?= $boutique->latitude ?>">
				<input type="text" name="longitude" value="<?= $boutique->longitude ?>">
				<br />

      </div>
      <div class="modal-footer">
	  				<button type="submit" class="btn btn-primary">Enregistrer</button>
			</form>
      </div>
    </div>
  </div>
</div>
<?php endforeach; ?>