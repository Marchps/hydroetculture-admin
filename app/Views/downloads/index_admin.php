<div class="span12">
<div class="widgetbox personal-information">
		<h4 class="widgettitle">Les documents partagés</h4>
		<div class="widgetcontent">
		
		 <div class="widgetbox tags">
		<h4 class="widgettitle">Ajouter un fichier</h4>
		<div class="widgetcontent">

		<form action="<?= BASE_LINK ?>/downloads/add" method="POST" enctype="multipart/form-data">
			
			<div class="par">
				<label>Ajouter une image :</label>
				<input type="file" name="fileToUpload">
			</div>

			<label>Catégorie : </label>
			<select name="id_type" style="text-transform: capitalize;">
				<?php foreach($types as $type): ?>
					<option style="text-transform: capitalize;" value="<?= $type->id_type ?>"><?= $type->libelle ?></option>
				<?php endforeach; ?>
			</select>
			
			<button name="submit" type="submit" class="btn btn-primary">Enregistrer</button>
		</form>
		</div>

</div>
		
		<table class="table table-bordered responsive">
			<colgroup>
				<col class="con0">
				<col class="con1">
				<col class="con0">
				<col class="con1">
			</colgroup>
			<thead>
				<tr>
					<th>Nom</th>
					<th>Type</th>
					<th>Date d'ajout</th>
					<th>Supprimer</th>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($downloads as $media): ?>
					<tr id="<?=$media->id_downloads?>">
						<td><?=$media->name?></td>
						<td><?=$media->type?></td>
						<td><?=$media->date_add?></td>
						<td><button class="del_dwn" data-nom="<?=$media->name?>" data-downloads-id="<?=$media->id_downloads?>">Supprimer</button></td>
					</tr>
			<?php endforeach;?>
		
			</tbody>
		</table>                           
		</div>
	</div>
</div>