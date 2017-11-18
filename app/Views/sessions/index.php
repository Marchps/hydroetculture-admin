 <div class="pageheader">
            <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>admin</h5>
                <h1>Les sessions</h1>
            </div>
        </div><!--pageheader-->
        				
        <div class="maincontent">
            <div class="maincontentinner">
							
                <h4 class="widgettitle">Tableau de données</h4>
                <table id="dyntable" class="TabSession table table-bordered">
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
                            <th class="head0">ID</th>
                            <th class="head0">Utilisateur</th>
                            <th class="head1">Date de connexion</th>
                            <th class="head0">IP</th>
                            <th class="head1" style="text-align:center;">Géolocaliser </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($sessions as $session):?>
						<tr class="gradeX">
                            <td><?= $session->id_session ?></td>
                            <td><?= $session->login .' - '.$session->prenom.' '.$session->nom ?></td>
							
							<?php $dateVisite = new DateTime($session->date);?>
                            <td><?= $dateVisite->format('d/m/Y à H:i:s') ?></td>
                            <td><?= $session->ip ?></td>
                            <td class="center">
								<a id="geoloc" data-ip="<?= $session->ip ?>" href="http://ip-api.com/#<?= $session->ip ?>" target="_BLANK" class="btn btn-info" alt="Géolocaliser"><i class="iconfa-eye-open"></i></a>
							</td>
                        </tr>
						<?php endforeach; ?>
                    </tbody>
                </table>
			</div>
		</div>
		
<script type="text/javascript">
	jQuery(document).ready(function(){
			jQuery('#dyntable').dataTable({
				"sPaginationType": "full_numbers",
				"aaSorting": [[0,'desc']],
				"fnDrawCallback": function(oSettings) {
					jQuery.uniform.update();
				}
			});
	});
</script>