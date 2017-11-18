<script type="text/javascript" src="/mvcbachelor/web/js/tinymce/tinymce.min.js"></script>
   <script type="text/javascript">
tinymce.init({
    selector: "textarea",
    language : "fr_FR",
    relative_urls : false,
    plugins: [
        "advlist autolink lists link image charmap print preview anchor textcolor colorpicker",
        "searchreplace visualblocks code fullscreen",
        "insertdatetime media table contextmenu paste"
    ],
    toolbar: "insertfile undo redo | styleselect | fontselect | forecolor backcolor | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image ",
    file_browser_callback: function(field_name, url, type, win) {
        if( type == 'file'){
               var explorer = 'http://localhost/mvcbachelor/web/index.php/cockpit/medias/tiny';
        }else{
              var explorer =  'http://localhost/mvcbachelor/web/index.php/cockpit/medias/tiny';
        }
      tinymce.activeEditor.windowManager.open({
                        title: "Gallerie",
                        url: explorer,
                        width: 800,
                        height: 600
                    }, {
                        oninsert: function(url) {
                            win.document.getElementById(field_name).value = url;
                            top.tinymce.activeEditor.windowManager.close();
                        }
                    });
       return false;
    }
});

</script>
<form method="post" enctype="multipart/form-data">
    <?= $form->input('titre', 'Titre de l\'article',null/*,['onblur' => 'verifNom(this)']*/); ?>
    <?= $form->input('contenu', 'Contenu'/*, ['type' => 'textarea']*/); ?>
    <?= $form->select('category_id', 'Catégorie', $categories); ?>
    <?= $form->input('thumb', ' ', ['type' => 'file']) ;?>
   <!-- <input type="file" name="thumb" /> -->
    <button class="btn btn-primary">Sauvegarder</button>
</form>

