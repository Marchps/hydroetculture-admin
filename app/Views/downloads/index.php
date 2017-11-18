<div class="pageheader">
	<div class="pageicon"><span class="iconfa-picture"></span></div>
	<div class="pagetitle">
		<h5>Documents</h5>
		<h1>Les documents d'aide à la vente</h1>
	</div>
</div><!--pageheader-->
        		
<div class="maincontent">
	<div class="maincontentinner">	
		<h4 class="widgettitle">Documents d'aide à la vente</h4>		
		<div class="tabs-left">
			<ul class="nav nav-tabs">
				<li class="active"><a data-toggle="tab" href="#lA"><i class="iconfa-folder-open"></i> Documents du mois </a></li>
				<?php foreach($types as $type):?>
					<li class="" style="text-transform:capitalize;"><a data-toggle="tab" href="#tabIdType<?= $type->id_type ?>"><i class="iconfa-folder-open"></i> <?= $type->libelle ?></a></li>
				<?php endforeach; ?>
				<li class=""><a data-toggle="tab" href="#lB"><i class="iconfa-folder-close"></i> Archives</a></li>
			</ul>
			<div class="tab-content">
				<div id="lA" class="tab-pane active">
					<!-- Contenu de la section 1 -->
					<table id="doc_part1" class="table table-bordered">
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
								<th class="head0">Fichier</th>
								<th class="head1">Type</th>
								<th class="head0">Taille</th>
								<th class="head1" style="text-align:center;">VOIR / IMPRIMER </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($downloads as $download):?>
							
							<?php 
							//Calcul du nombre de jours de différence entre aujourd'hui et la date d'ajout du fichier
							$now = date('Y-m-d'); 
							$date_create = $download->date_add;
							
							$now = new DateTime( $now ); 
							$date_create = new DateTime( $date_create ); 

							$interval = date_diff($date_create, $now);

							$nbjours = $interval->days;
							
							if($nbjours<=31){
							?>
							
							<tr class="gradeX">
								<td><?= $download->name ?></td>
								<td><?= $download->type ?></td>
								<td><?= $download->size ?> octets</td>
								<td class="center">
									<a target="_blank" href="<?= URL_DOWNLOADS . $download->name ?>" class="btn btn-info"><i class="iconfa-eye-open"></i></a>
									<!--<a target="_blank" href="javascript: w=window.open('<?= URL_DOWNLOADS . $download->name ?>'); w.print(); w.close();" class="btn btn-info"><i class="iconfa-print"></i></a>-->
									<div style="display:inline;" id="link_print<?= $download->id_downloads ?>"> <a href="" onclick="openWin<?= $download->id_downloads ?>()" class="btn btn-info link_print<?= $download->id_downloads ?>"><i class="iconfa-print"></i></a></div>
									
									<script type="text/javascript">
									
									var chaine = navigator.appVersion;
									var position = chaine.indexOf("Chrome");
									
									if(position!=-1){
										var link = document.getElementById('link_print<?= $download->id_downloads ?>');
										//link.style.display = 'none'; //or
										link.style.visibility = 'hidden';
									}
									
									  function openWin<?= $download->id_downloads ?>()
									  {
										var myWindow=window.open('','','width=600,height=600');
										myWindow.document.write("<img src='<?= URL_DOWNLOADS . $download->name ?>'>");
										
									myWindow.document.close();
									myWindow.focus();
									myWindow.print();
									myWindow.close();
										
									  }
									</script>
								</td>
							</tr>
							<?php } ?>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
				
				
				<div id="lB" class="tab-pane">
				<!-- Documents archivés créé il y a plus de 31 jours -->
				<!-- Contenu de la section 1 -->
					<table id="doc_part" class="table table-bordered">
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
								<th class="head0">Fichier</th>
								<th class="head1">Type</th>
								<th class="head0">Taille</th>
								<th class="head1" style="text-align:center;">VOIR / IMPRIMER </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($downloads as $download):?>
							
							<?php 
							//Calcul du nombre de jours de différence entre aujourd'hui et la date d'ajout du fichier
							$now = date('Y-m-d'); 
							$date_create = $download->date_add;
							
							$now = new DateTime( $now ); 
							$date_create = new DateTime( $date_create ); 

							$interval = date_diff($date_create, $now);

							$nbjours = $interval->days;
							
							if($nbjours>31){
							?>
							
							<tr class="gradeX">
								<td><?= $download->name ?></td>
								<td><?= $download->type ?></td>
								<td><?= $download->size ?> octets</td>
								<td class="center">
									<a target="_blank" href="<?= URL_DOWNLOADS . $download->name ?>" class="btn btn-info"><i class="iconfa-eye-open"></i></a>
									<!--<a target="_blank" href="javascript: w=window.open('<?= URL_DOWNLOADS . $download->name ?>'); w.print(); w.close();" class="btn btn-info"><i class="iconfa-print"></i></a>-->
									<div style="display:inline;" id="link_print<?= $download->id_downloads ?>"> <a href="" onclick="openWin<?= $download->id_downloads ?>()" class="btn btn-info link_print<?= $download->id_downloads ?>"><i class="iconfa-print"></i></a></div>
									
									<script type="text/javascript">
									
									var chaine = navigator.appVersion;
									var position = chaine.indexOf("Chrome");
									
									if(position!=-1){
										var link = document.getElementById('link_print<?= $download->id_downloads ?>');
										//link.style.display = 'none'; //or
										link.style.visibility = 'hidden';
									}
									
									  function openWin<?= $download->id_downloads ?>()
									  {
										var myWindow=window.open('','','width=600,height=600');
										myWindow.document.write("<img src='<?= URL_DOWNLOADS . $download->name ?>'>");
										
									myWindow.document.close();
									myWindow.focus();
									myWindow.print();
									myWindow.close();
										
									  }
									</script>
								</td>
							</tr>
							<?php } ?>
							<?php endforeach; ?>
						</tbody>
					</table>
					
				

				</div>
				
				<?php foreach($types as $type):?>
					<div id="tabIdType<?= $type->id_type ?>" class="tab-pane">
						<table id="doc_part" class="table table-bordered">
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
								<th class="head0">Fichier</th>
								<th class="head1">Type</th>
								<th class="head0">Taille</th>
								<th class="head1" style="text-align:center;">VOIR / IMPRIMER </th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($downloads as $download):?>
							<?php if($download->id_type==$type->id_type){ ?>
							<?php 
							//Calcul du nombre de jours de différence entre aujourd'hui et la date d'ajout du fichier
							$now = date('Y-m-d'); 
							$date_create = $download->date_add;
							
							$now = new DateTime( $now ); 
							$date_create = new DateTime( $date_create ); 

							$interval = date_diff($date_create, $now);

							$nbjours = $interval->days;
							
							if($nbjours<31){
							?>
							
							<tr class="gradeX">
								<td><?= $download->name ?></td>
								<td><?= $download->type ?></td>
								<td><?= $download->size ?> octets</td>
								<td class="center">
									<a target="_blank" href="<?= URL_DOWNLOADS . $download->name ?>" class="btn btn-info"><i class="iconfa-eye-open"></i></a>
									<!--<a target="_blank" href="javascript: w=window.open('<?= URL_DOWNLOADS . $download->name ?>'); w.print(); w.close();" class="btn btn-info"><i class="iconfa-print"></i></a>-->
									<!--<div style="display:inline;" id="link_print<?= $download->id_downloads ?>"> <a href="" onclick="openWin<?= $download->id_downloads ?>()" class="btn btn-info link_print<?= $download->id_downloads ?>"><i class="iconfa-print"></i></a></div>-->
									
									<script type="text/javascript">
									
									var chaine = navigator.appVersion;
									var position = chaine.indexOf("Chrome");
									
									if(position!=-1){
										var link = document.getElementById('link_print<?= $download->id_downloads ?>');
										//link.style.display = 'none'; //or
										link.style.visibility = 'hidden';
									}
									
									  function openWin<?= $download->id_downloads ?>()
									  {
										var myWindow=window.open('','','width=600,height=600');
										myWindow.document.write("<img src='<?= URL_DOWNLOADS . $download->name ?>'>");
										
									myWindow.document.close();
									myWindow.focus();
									myWindow.print();
									myWindow.close();
										
									  }
									</script>
								</td>
							</tr>
							<?php } ?>
							<?php } ?>
							<?php endforeach; ?>
						</tbody>
					</table>
					
					</div>
				<?php endforeach; ?>

				
			</div><!--tab-content-->
		</div>		
	</div>
	
	<p><b>*Pour télécharger un document, cliquez sur <i class="iconfa-eye-open"></i> puis faites un clique droit sur le fichier, puis enregistrer-sous.</b></p>

	 <!--<div class="widgetbox tags">
		<h4 class="widgettitle">Déposer un fichier</h4>
		<div class="widgetcontent">

		<p><i class="iconfa-warning-sign"></i> Pour des raisons de sécurité, le fichier doit être validé auprès de notre équipe avant d'apparaitre dans la liste des fichiers disponibles.</p>
		
		<form action="<?= BASE_LINK ?>/downloads/add" method="POST" enctype="multipart/form-data">
			<input type="hidden" name="creator" value="<?= $_SESSION['login'] ?>">

			<div class="par">
				<label>Déposer un fichier :</label>
				<input type="file" name="file">
			</div>

			<button type="submit" class="btn btn-primary">Enregistrer</button>
		</form>
		</div>
	</div>-->
	
</div>