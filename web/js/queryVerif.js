jQuery(document).ready(function(){
	//Verification du champs titre en cas de changement de la valeur
	$('#username').blur( function(){ // toujours sur le onblur qui devient .blur en jquery
		var x = $(this).val().length;
		$("#error").empty().removeClass("error");
		if(x<2 || x>25){
			if(x==0){
				$("#error").append("Le champs 'titre' est vide!").addClass("error");
				$("#username").css({
					borderColor : 'red',
					color : 'red'
				});
			}else if(x > 25){
				$("#error").append("Le champs 'titre' est trop long!").addClass("error");
				$("#username").css({
					borderColor : 'red',
					color : 'red'
				});
			}else{
				$("#error").append("Le champs 'titre' est trop court!").addClass("error");
				$("#username").css({
					borderColor : 'red',
					color : 'red'
				});
			}
		}
	});
});