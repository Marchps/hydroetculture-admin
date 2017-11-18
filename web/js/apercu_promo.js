/*Fichier qui mets à jour l'aperçu dans promos/index */
/*Les textes*/
/*jQuery( "#libelle" ).keyup(function() {
	//console.log(jQuery('#apercu_libelle').text(jQuery('#libelle').val()));
});

jQuery( "#contenu" ).keyup(function() {
	//console.log(jQuery('#apercu_contenu').text(jQuery('#contenu').val()));
});

jQuery( "#libelle2" ).keyup(function() {
	//console.log(jQuery('#apercu_libelle2').text(jQuery('#libelle2').val()));
});

jQuery( "#contenu2" ).keyup(function() {
	//console.log(jQuery('#apercu_contenu2').text(jQuery('#contenu2').val()));
});


jQuery( "input" ).on( "click",function() {
	//console.log(jQuery( "input:checked" ).val());
	if(jQuery( "input:checked" ).val()!='none'){
		//on diminu la police de #apercu_contenu et on insère le bon picto
		console.log('afficher picto');
		jQuery('#apercu_contenu').removeClass("apercu_sans_picto");
		jQuery('#apercu_contenu').addClass("apercu_avec_picto");
		jQuery('.picto').show();
		
		switch(jQuery( "input:checked" ).val()){
			case "chambre":
				jQuery('.picto').css('background-image', 'url("../../images/promos/chambre.png")')
				break;
			case "engrais":
				jQuery('.picto').css('background-image', 'url("../../images/promos/engrais.png")')
				break;
			case "ventilation":
				jQuery('.picto').css('background-image', 'url("../../images/promos/ventilation.png")')
				break;
			case "eclairage":
				jQuery('.picto').css('background-image', 'url("../../images/promos/eclairage.png")')
				break;
			case "terreau":
				jQuery('.picto').css('background-image', 'url("../../images/promos/terreaux.png")')
				break;
			case "culture":
				jQuery('.picto').css('background-image', 'url("../../images/promos/culture.png")')
				break;
		}
		
	}else{
		//console.log('NONE');
		jQuery('.picto').hide();
		jQuery('#apercu_contenu').removeClass("apercu_avec_picto");
		jQuery('#apercu_contenu').addClass("apercu_sans_picto");
	}
	
});*/
