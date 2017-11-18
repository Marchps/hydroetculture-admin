jQuery(document).ready(function(){
	
	jQuery('div.mail_recus_affiche').hide();
	jQuery('div.mail_env_affiche').hide();
	jQuery('div.mail_sup_affiche').hide();
	jQuery('div.new_msg').hide();

	jQuery('ul.msglist_rec').show();
	jQuery('ul.msglist_env').hide();
	jQuery('ul.msglist_sup').hide();


	jQuery('div.msgreply').hide();

	//clique sur le bouton "nouveau message"
	jQuery('#nouveau_message').click(function(){
		jQuery('.new_msg').toggle('slow');
        jQuery('#nouveau_message').html(jQuery('#nouveau_message').html() == '<span class="iconfa-remove"></span> Fermer' ? '<span class="iconfa-pencil"></span> Ecrire un nouveau message' : '<span class="iconfa-remove"></span> Fermer');
	});

	//on clique sur un des message recu
	jQuery('li.message_rec').click(function() {
		var id_current_mail=(jQuery( this ).val());
		var id_current_recept=jQuery( "#id_recept" ).val();
		var id_current_exped=jQuery( "#id_exped" ).val();

		jQuery('div.mail_sup_affiche').hide();
		jQuery('div.mail_recus_affiche').hide();
		jQuery('div.mail_affiche_accueil').hide();
		jQuery('div#mail_'+id_current_mail).show();
		jQuery('div.msgreply').show();

		jQuery('input#recept').val(id_current_recept);
		jQuery('input#exped').val(id_current_exped);
		jQuery('input#current_message').val(id_current_mail);

		//Sélection d'un mail
		jQuery( "li.message_rec" ).removeClass( "selected" );
	  	jQuery( this ).addClass( "selected" );
	});

//on clique sur un des messages envoyés
jQuery('li.message_env').click(function() {
		var id_current_mail=(jQuery( this ).val());

		jQuery('div.mail_env_affiche').hide();
		jQuery('div.mail_sup_affiche').hide();
		jQuery('div.mail_recus_affiche').hide();
		jQuery('div.mail_affiche_accueil').hide();
		jQuery('div#mail_'+id_current_mail).show();
		jQuery('div.msgreply').hide();

		//Sélection d'un mail
		jQuery( "li.message_env" ).removeClass( "selected" );
	  	jQuery( this ).addClass( "selected" );
	});

//On clique sur un des messgaes supprimés dans la liste
jQuery('li.message_sup').click(function() {
		var id_current_mail=(jQuery( this ).val());

		jQuery('div.mail_sup_affiche').hide();
		jQuery('div.mail_env_affiche').hide();
		jQuery('div.mail_recus_affiche').hide();
		jQuery('div.mail_affiche_accueil').hide();
		jQuery('div#mail_'+id_current_mail).show();
		jQuery('div.msgreply').hide();

		//Sélection d'un mail
		jQuery( "li.message_sup" ).removeClass( "selected" );
	  	jQuery( this ).addClass( "selected" );
	});

	//Quand on clique sur un des onglets "RECUS" / "ENVOYES" / "CORBEILLE"
	jQuery('li#boite').click(function() {
		jQuery('div.mail_recus_affiche').hide();
		jQuery('div.mail_env_affiche').hide();
		jQuery('div.mail_sup_affiche').hide();

		//on vide la zone liste des messages
		jQuery( ".msglist" ).hide();
		//cacher la zone de mail et la zone de réponse
		jQuery('div.mail_affiche').hide();
		jQuery('div.msgreply').hide();
		//On met le focus
		jQuery( "li#boite" ).removeClass( "active" );
	  	jQuery( this ).addClass( "active" );
	});

	//on clique sur la liste des messages envoyés  
	jQuery('ul.msglist_env').click(function() {
	  		jQuery( ".msgreply" ).hide();
	  	});

	//En fonctio du bouton on remplit avec la bonne liste
	jQuery('li.rec').click(function() {
	  		jQuery( ".msglist_rec" ).show();
	  		jQuery( ".messageview" ).css("height","350px");	  		
	  	});
	jQuery('li.env').click(function() {
	  		jQuery( ".msglist_env" ).show();
	  		jQuery( ".messageview" ).css("height","700px");
	  	});
	jQuery('li.sup').click(function() {
	  		jQuery( ".msglist_sup" ).show();
	  		jQuery( ".messageview" ).css("height","700px");
	  	});

	//AJAX MAJ message lu non lu
	jQuery("li.message_rec").click(function(){
		var id_current_mail = (jQuery( this ).val());
		console.log(id_current_mail);
	    jQuery.ajax({
	    	url: "update_lu", 
	    	type: "POST",
	    	data:{ id:id_current_mail}, 
	    	dataType: "html",
	    	success: function(){
	    	//alert("message lu");
	        jQuery("#lu_"+id_current_mail).hide();

	    }});
	});

	//AJAX MAJ message archive_time
	jQuery(".delete_msg").click(function(){
		var id_current_mail = (jQuery( ".selected" ).val());
	    jQuery.ajax({
	    	url: "delete_msg", 
	    	type: "POST",
	    	data:{ id:id_current_mail}, 
	    	dataType: "html",
	    	success: function(){
	    		//alert("message delete");
	        	jQuery( ".selected" ).hide();
	        	jQuery("#mail_"+id_current_mail).hide();
	    }});
	});
});