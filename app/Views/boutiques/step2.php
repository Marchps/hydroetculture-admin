<div class="pageheader">
	<div class="pageicon"><span class="iconfa-laptop"></span></div>
	<div class="pagetitle">
		<h5>Les pictos facilites</h5>
		<h1>Nouvelle boutique : étape 2</h1>
	</div>
</div><!--pageheader-->
<div class="maincontent">
<div class="maincontentinner">
<div class="row-fluid"> 

<form method="POST">

<div class="widgetbox tags">
<h4 class="widgettitle">Affichage des pictos facilités</h4>
<div class="widgetcontent">
	<input type="hidden" name="id_btq" value="<?= $boutiques_last_btq[0]->id_boutique ?>">
	<?php foreach ($facilites as $facilite): ?>
		<div class="checkbox">
			<label><input checked name="facilites_<?= $facilite->id_facilites ?>" type="checkbox" value="<?= $facilite->id_facilites ?>"> <?= $facilite->libelle ?></label>
		</div>
	<?php endforeach;?>
</div>
</div>
<button type="submit" class="btn btn-primary">Enregistrer et passer à l'étape 3</button>

</form>

</div>
</div>
</div>