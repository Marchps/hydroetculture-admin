jQuery(document).ready(function(){

console.log("ok 1");
	jQuery("#geoloc").click(function(){
		
		var ip_current = jQuery(this).dataset.ip;
		
		console.log(ip_current);
		
		jQuery.ajax({
	    	url: "geoloc", 
	    	type: "POST",
	    	data:{ ip:ip_current}, 
	    	dataType: "html",
	    	success: function(){
				//alert("message lu");
				console.log("ok");
				//jQuery("#lu_"+id_current_mail).hide();

	    }});
	});
	
});