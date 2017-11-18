var url = window.location.search;
/([0-9]+)/.exec(url);
id_boutique = RegExp.$1;

jQuery(document).ready(function(){
	
	if(!isNaN(id_boutique)){
		console.log(id_boutique);
		//alert(jQuery('li').data('id'));
		
		/*if( jQuery('li').data('id') === id_boutique ){
			console.log("test ok"+id_boutique);*/
			jQuery('.class'+id_boutique).addClass("active");
			jQuery('.tab-active-get-'+id_boutique).addClass("active");
			if(url.indexOf("success")!='-1'){
				jQuery.jGrowl("Modifications enregistrées !");
			}
	}else{
		console.log("no parameters");
	}

});