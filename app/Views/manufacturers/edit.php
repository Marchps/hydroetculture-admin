<div class="accordion accordion-inverse" role="tablist">
	<?php foreach($manufacturers as $manufacturer): ?>
	<h3 class="ui-accordion-header ui-helper-reset ui-state-default ui-accordion-icons ui-corner-all" role="tab" id="ui-accordion-1-header-0" aria-controls="ui-accordion-1-panel-0" aria-selected="true" tabindex="0"><span class="ui-accordion-header-icon ui-icon ui-icon-triangle-1-s"></span><a href="#"><?= $manufacturer->nom ?></a></h3>
	<div class="ui-accordion-content ui-helper-reset ui-widget-content ui-corner-bottom ui-accordion-content-active" id="ui-accordion-1-panel-0" aria-labelledby="ui-accordion-1-header-0" role="tabpanel" aria-expanded="true" aria-hidden="false" style="display: block;">
		<form method="POST" action="<?= BASE_LINK ?>/manufacturers/update">
			<input type="hidden" name="id_manuf" value="<?= $manufacturer->id_manufacturer ?>">
			
			<label>Site de la marque : </label><input type="text" name="site" value="<?= $manufacturer->site ?>">
			<label>Description : </label><textarea name="description" > <?= $manufacturer->description ?></textarea>
			<label>identifiant prestashop correspondant afin de récupérer le logo de la marque : </label><input type="text" name="id_presta" value="<?= $manufacturer->id_manufacturer_prstshp ?>"> <br />
			<button class="btn btn-primary">Enregistrer</button>
		</form>
	</div>
	<?php endforeach; ?>
</div>