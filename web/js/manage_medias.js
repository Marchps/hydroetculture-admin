jQuery(document).ready(function(){

	jQuery('button.del').click(function(){
		//var btq_id = jQuery( this ).data("btq-id");
		var media_id = jQuery( this ).data("media-id");	
		 jQuery.ajax({
	    	url: "del_medias", 
	    	type: "POST",
	    	//data:{ id_btq:btq_id, id_media:media_id }, 
	    	data:{ id_media:media_id }, 
	    	dataType: "html",
	    	success: function(){
				jQuery.ajax({
					url: "index", 
					type: "POST", 
					dataType: "html",
					success: function(){
						jQuery('#'+media_id).fadeOut( "slow", function(){});
				}});
	    }});
	});
	
	jQuery('button.del_dwn').click(function(){
		//var btq_id = jQuery( this ).data("btq-id");
		var id_downloads = jQuery( this ).data("downloads-id");	
		var nom_fichier = jQuery( this ).data("nom");
		 jQuery.ajax({
	    	url: "del_download", 
	    	type: "POST",
	    	//data:{ id_btq:btq_id, id_media:media_id }, 
	    	data:{ id_downloads:id_downloads, nom:nom_fichier }, 
	    	dataType: "html",
	    	success: function(){
				jQuery.ajax({
					url: "index", 
					type: "POST", 
					dataType: "html",
					success: function(){
						jQuery('#'+id_downloads).fadeOut( "slow", function(){});
				}});
	    }});
	});
});