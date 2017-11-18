
<form method="post" enctype="multipart/form-data">
    <?= $form->input('username', 'Pseudo'); ?>
    <?= $form->input('postalcode', 'CP',null,['onblur'=>'searchVille(this.value)']); ?>
    <?= $form->input('ville', 'Ville'); ?>
    <button class="btn btn-primary">Sauvegarder</button>
</form>
<script>
    function searchVille(cp){  
        new_xhr_object();
        var fic = "http://localhost/mvcbachelor3/web/index.php/cockpit/users/ajaxville/"+cp;
        xhr_object.open('GET',fic,true);
        xhr_object.onreadystatechange = function(){
            if(xhr_object.readyState == 4 ){
                var data=eval("(" + xhr_object.responseText + ")");
                if(undefined != data.ville_nom){
                    document.getElementById('ville').value = data.ville_nom;
                }else{
                    document.getElementById('ville').value = "pas de réponse";
                }               
            }
        };
        xhr_object.setRequestHeader("X-Requested-With", "XMLHttpRequest");
        // var donnees = "cp="+cp;
        xhr_object.send(null);
    }
</script>