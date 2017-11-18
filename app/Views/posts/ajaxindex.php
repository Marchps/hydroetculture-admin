<script>
    function searchPostByCat(cat){
        new_xhr_object();
        //alert(cat);
        var fic= "http://localhost/mvcbachelor3/web/index.php/posts/ajaxSearchCat/"+cat;
        xhr_object.open('POST', fic, true);
        xhr_object.onreadystatechange = function()
        {
            if(xhr_object.readyState == 4)
            {
                document.getElementById('response').innerHTML = xhr_object.responseText;
            }
        }
        xhr_object.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        var donnees = "id" + cat;
        xhr_object.send(donnees);
    }
    function searchPostByCatJQuery(cat){
        $.ajax({
            type: 'GET',
            url: "http://localhost/mvcbachelor3/web/index.php/posts/ajaxSearchCat/"+cat,
            beforeSend: function(){
                //Loader d attente de chargement possible
            },
            success: function(code_html){
                $('#response').html(code_html);
            }

        });
    }
</script>
<div class="row">
    <div id="response" class="col-sm-8">
        <?php foreach ($posts as $post): ?>

            <h2><a href="<?= $post->url ?>"><?= $post->titre; ?></a></h2>
            <p><em><?= $post->categorie; ?></em></p>
            <p><?= $post->extrait; ?></p>

        <?php endforeach; ?>

    </div>

    <div class="col-sm-4">
        <ul>
        <?php foreach($categories as $categorie): ?>
            <li><a href="#" onclick="searchPostByCatJQuery('<?= $categorie->id; ?>')"><?= $categorie->titre; ?></a></li>
        <?php endforeach; ?>
        </ul>
      
    </div>

</div>