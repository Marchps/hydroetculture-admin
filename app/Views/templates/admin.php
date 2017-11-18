<?php
//array_filter($boutiques);
if($_SESSION)
{
?>

<!DOCTYPE html>
<html lang="fr">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title> Gestion Les Jardiniers Modernes </title>
<link rel="stylesheet" href="<?= BASE_URL ?>css/style.default.css" type="text/css" />
<link rel="icon" type="image/x-icon" href="favicon.ico" />
<div id="fb-root"></div>
</head>

<body>
<div class="mainwrapper">
    <div class="header">
        <div class="logo">
            <a href="<?= BASE_URL ?>index.php/boutiques/dashboard"><img src="<?= URL_IMAGE_BOUTIQUE ?>/JMlogo-invert.png"/></a>
        </div>
        <div class="headerinner">
            <ul class="headmenu">
                <!--<li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <?php if(count($messages_non_lu)>0){?><span class="count" style="color: white!important;opacity: 1;width: 12px;text-align: center;">
                            <?= count($messages_non_lu) ?></span><?php }?>
                        <span class="head-icon head-message"></span>
                        <span class="headmenu-label">Messages</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Messages</li>
                        <?php if(count($messages_non_lu)>0){echo "<li style='text-align:center;'><a style='color:red;font-weight:bold;' href='". BASE_LINK ."/messages/index'>".count($messages_non_lu)." NOUVEAUX MESSAGES </a></li>";}else{echo "<a href='". BASE_LINK ."/messages/index'><li style='text-align:center;'>PAS DE NOUVEAUX MESSAGES</a></li>";} ?>
                        <?php foreach ($messages_non_lu as $message) {?>
                            <li><a href="<?= BASE_LINK ?>/messages/index"><span class="icon-envelope"></span> 
                                Nouveau message de <strong><?= $message->prenom ." ". $message->nom ?> </strong> 
                                <small class="muted"> - reçu le <?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></small></a></li>               
                        <?php } ?>

                        <li class="viewmore"><a href="<?= BASE_LINK ?>/messages/index"><span class="icon-inbox"></span> Boite de réception</a></li>
                    </ul>
                </li>-->
                <li>
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="head-icon head-download"></span>
                        <span class="headmenu-label">Aide à la vente</span>
                    </a>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Derniers fichiers ajoutés</li>
                        <?php foreach ($last_downloads as $last_d) {?>
                            <li><a href="<?= BASE_LINK ?>/downloads/index""><span class="icon-download-alt"></span> 
                                <strong><?= $last_d->name ?> </strong> 
                                <small class="muted"> - déposé le <?= $last_d->date_add ?></small></a></li>               
                        <?php } ?>

                        <li class="viewmore"><a href="<?= BASE_LINK ?>/downloads/index"><span class="icon-list"></span> Voir tous les documents</a></li>
                    </ul>
                </li>
				<?php if(!empty($boutiques)){ ?>
                 <li class="odd">
                    <a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="count"></span>
                    <!--<span class="head-icon head-eye"></span>-->
					<span class="head-icon head-shop"></span>
                    <span class="headmenu-label">Commandes retrait</span>
                    </a>
                    <style>
                    .icon-align-left {
                   background-position: -95px -120px!important;}
                    </style>
                    <ul class="dropdown-menu">
                        <li class="nav-header">Voir : </li>
                        <li><a href="<?= BASE_LINK ?>/boutiques/orders"><span class="icon-align-left"></span> Voir la liste des commandes</strong> <small class="muted"></small></a></li>
                    </ul>
                </li>
				<?php } ?>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" data-target="#">
                    <span class="head-icon"><img src="<?= URL_IMAGE_BOUTIQUE ?>/icons/facebook.png"/></span>
					<span class="headmenu-label">Actualités</span>
					</a>
					<ul class="dropdown-menu">
                        <li class="nav-header">
							<div class="fb-page" data-href="https://www.facebook.com/LesJardiniersModernes/" data-tabs="timeline,events,messages" data-height="520" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LesJardiniersModernes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LesJardiniersModernes/">Les Jardiniers Modernes</a></blockquote></div>
						</li>
                    </ul>
				</li>
				<li class="odd">
					<a href="<?= BASE_LINK ?>/downloads/cloud" data-target="#">
                    <span class="head-icon"><i class="fa fa-cloud fa-4x" aria-hidden="true"></i></span>
					<span class="headmenu-label">Cloud</span>
					</a>
				</li>
				<li>
					<a href="<?= BASE_LINK ?>/manufacturers/liste" data-target="#">
                    <span class="head-icon"><i class="fa fa-industry fa-3x" aria-hidden="true"></i></span>
					<span class="headmenu-label">Nos Fournisseurs</span>
					</a>
				</li>
				<li>
					<a href="<?= BASE_LINK ?>/manufacturers/mama" data-target="#">
                    <span class="head-icon"><img src="<?= URL_IMAGE_BOUTIQUE ?>/mama-editions.png"/></span>
					<span class="headmenu-label">Mama Edition</span>
					</a>
				</li>
                
                <li class="right">
                    <div class="userloggedinfo">
                        <img src="<?= URL_IMAGE_BOUTIQUE . $_SESSION['photo']?>" alt="" />
                        <div class="userinfo">						
                            <h5><?= $user->prenom." ". $user->nom ?> - <?= $user->poste ?></h5>
                            <h6><small><?= $user->mail?></small></h6>
                            <ul>
                                <li><a href="<?= BASE_LINK ?>/users/data">Paramètres du compte</a></li>
                                <li><a href="<?= BASE_LINK ?>/users/disconnect">Se déconnecter</a></li>
                            </ul>
                        </div>
                    </div>
                </li>
            </ul><!--headmenu-->
        </div>
    </div>
    
    <div class="leftpanel">
        
        <div class="leftmenu">        
            <ul class="nav nav-tabs nav-stacked">
				<?php if(!empty($boutiques)){ ?>
          	
				<?php if($user->cloud_vip==1){ ?>
				<li class="nav-header"><a href="<?= BASE_LINK ?>/downloads/cloud">ACCES CLOUD VIP</a></li>
                <li> Serveur :  81.80.110.205 </li>
                <li> Nom d'utilisateur : userljm </li>
                <li> Mot de passe : Pji14pmy26 </li>
				<?php } ?>
				
				<?php if($user->login=='demo'){?>
				<li class="nav-header">Gestion des commandes</li>
                <li><a href="<?= BASE_LINK ?>/boutiques/orders"><span class=" iconfa-truck"></span> Les commandes </a></li>
				<?php } ?>
				<li class="nav-header">Gestion de boutique</li>
                <li><a href="<?= BASE_LINK ?>/boutiques/index"><span class=" iconfa-pencil"></span> Contenus </a></li>
                <li><a href="<?= BASE_LINK ?>/promos/index"><span class=" iconfa-flag"></span> Promo </a></li>
                <li><a href="<?= BASE_LINK ?>/medias/index"><span class=" iconfa-picture"></span> Images </a></li>
				<li class="dropdown"><a href="#"><span class="iconfa-eye-open"></span> Voir ma page </a>
                	<ul style="display: none;">
					    <?php foreach ($boutiques as $boutique): ?>
							<li><a href="https://www.hydroetculture.com/boutique/<?= $boutique->id_boutique .'-'. $boutique->slug.'.html' ?>" target="_blank" ><?=$boutique->nom?> <strong><?=$boutique->ville?></strong> <small class="muted"></small></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>
				
                <!--<li><a href="<?= BASE_LINK ?>/boutiques/map"><span class=" iconfa-map-marker"></span> Carte </a></li>-->
				<?php } ?>
                <?php if($user->id_droit<3) { ?>
				<li class="nav-header">Gestion de page fournisseur</li>
                <li><a href="<?= BASE_LINK ?>/manufacturers/edit"><span class=" iconfa-truck"></span> Données fournisseurs </a></li>
                <li class="nav-header">Gestion LJM</li>
                <li><a href="<?= BASE_LINK ?>/boutiques/index_admin"><span class=" iconfa-pencil"></span> Gérer les boutiques </a></li>
                <li><a href="<?= BASE_LINK ?>/boutiques/coord"><span class=" iconfa-flag"></span> Gérer les coordonnées GPS </a></li>
                <li><a href="<?= BASE_LINK ?>/downloads/index_admin"><span class="  iconfa-folder-open"></span> Gérer les documents partagés </a></li>
                <li><a href="<?= BASE_LINK ?>/users/index_admin"><span class=" iconfa-flag"></span> Gérer les utilisateurs </a></li>
				<!--<li><a href="<?= BASE_LINK ?>/medias/index_admin"><span class=" iconfa-picture"></span> Gérer les images </a></li>
                <li><a href="<?= BASE_LINK ?>/facilites/index_admin"><span class=" iconfa-map-marker"></span> Gérer les facilites </a></li>-->
                <?php if($user->id_droit==1) { ?>
				<li><a href="<?= BASE_LINK ?>/users/role"><span class="  iconfa-user"></span> Gérer les droits </a></li>
				<li><a href="<?= BASE_LINK ?>/sessions/index"><span class="  iconfa-user"></span> Sessions utilisateurs </a></li>
				
				<li class="nav-header">Gestion des commandes</li>
                <li><a href="<?= BASE_LINK ?>/boutiques/orders"><span class=" iconfa-truck"></span> Les commandes </a></li>
				<?php } ?>
                <?php } ?>
            </ul>
        </div><!--leftmenu-->
        
    </div><!-- leftpanel -->
    
    <div class="rightpanel">
        
        <ul class="breadcrumbs">
            <li><a href="#"><i class="iconfa-home"></i></a> <span class="separator"></span></li>
            <li><a href="#">Boutique</a> <span class="separator"></span></li>
            <li>Ma boutique</li>
        </ul>

				<div id="ajaxBox"></div>

                <!-- Le contenu -->
                <?= $content ?>

                    <div class="footer">
                        <div class="footer-left">
                            <span>&copy; 2017. Les Jardiniers Modernes. All Rights Reserved.</span><?= $user->id_droit ?>
                        </div>
                    </div><!--footer-->
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->
        
    </div><!--rightpanel-->
    
</div><!--mainwrapper-->

<!-- Librairies JS -->
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery-migrate-1.1.1.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery-ui-1.9.2.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/modernizr.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.cookie.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/custom.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.alerts.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/prettify/prettify.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/bootstrap-timepicker.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.validate.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.jgrowl.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/forms.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/charCount.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/jquery.autogrow-textarea.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/pace.min.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/elements.js"></script>



<!-- SCRIPT JS PERSO -->
<script type="text/javascript" src="<?= BASE_URL ?>js/get_tab_active.js"></script>
<!--<script type="text/javascript" src="<?= BASE_URL ?>js/apercu_promo.js"></script>-->
<script type="text/javascript" src="<?= BASE_URL ?>js/mailbox.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/manage_user.js"></script>
<script type="text/javascript" src="<?= BASE_URL ?>js/manage_medias.js"></script>

<!-- Librairies Externe CDN -->
<script src="https://use.fontawesome.com/18222b7f49.js"></script>


<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v2.8&appId=488777421312651";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

</script>

<script type="text/javascript">
jQuery(document).ready(function(){
	
	
	jQuery('#chkbx_6').click(function(){
			jPrompt('<b>Date d\'obtention de l\'agrément :</b>', 'JJ/MM/AAAA', 'Date d\'agrément', function(r) {
				console.log(r);
				
				if( r == "JJ/MM/AAAA" || r == null || r == "" || r == " " ) {
					alert('veuillez saisir une date valide');
					jQuery('#uniform-chkbx_6 > span').removeClass( "checked" );
					jQuery('#agrement').hide();
				}
								
				if( r != "JJ/MM/AAAA"){
					jQuery('#uniform-chkbx_6 > span').addClass( "checked" );
					jQuery('#agrement').show();
					jQuery('#date_ag').val(r);
				}
		});
		
		jQuery('#popup_cancel').click(function(){
			jQuery('#uniform-chkbx_6 > span').removeClass( "checked" );
			jQuery('#agrement').hide();
		});
	});
	
	jQuery('.taglist .close').click(function(){
		jQuery(this).parent().remove();
		return false;
	});	
	
	jQuery('#doc_part').dataTable({
		  "sPaginationType": "full_numbers",
		  "pageLength": 50,
		  "bSort" : false,
		  "language": {
				"sProcessing":     "Traitement en cours...",
				"sSearch":         "Rechercher&nbsp;:",
				"sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
				"sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
				"sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
				"sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
				"sInfoPostFix":    "",
				"sLoadingRecords": "Chargement en cours...",
				"sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
				"sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
				"oPaginate": {
					"sFirst":      "Premier",
					"sPrevious":   "Pr&eacute;c&eacute;dent",
					"sNext":       "Suivant",
					"sLast":       "Dernier"
				},
				"oAria": {
					"sSortAscending":  ": activer pour trier la colonne par ordre croissant",
					"sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
				}
			},
		  "ordering": false
	});
	
	jQuery('#dyntable').dataTable({
		"sPaginationType": "full_numbers",
		"aaSorting": [[0,'asc']],
		"fnDrawCallback": function(oSettings) {
			jQuery.uniform.update();
		}
	});
});
</script>
<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',
    plugins: [
    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
  ],

  toolbar1: " bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect | cut copy paste | bullist numlist | blockquote | undo redo ",
  toolbar2: " link unlink anchor image media code | insertdatetime preview | forecolor backcolor | table | charmap emoticons | print fullscreen",
  toolbar3: "",

  menubar: false,
  toolbar_items_size: 'small',

  style_formats: [{
    title: 'Bold text',
    inline: 'b'
  }, {
    title: 'Red text',
    inline: 'span',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Red header',
    block: 'h1',
    styles: {
      color: '#ff0000'
    }
  }, {
    title: 'Example 1',
    inline: 'span',
    classes: 'example1'
  }, {
    title: 'Example 2',
    inline: 'span',
    classes: 'example2'
  }, {
    title: 'Table styles'
  }, {
    title: 'Table row 1',
    selector: 'tr',
    classes: 'tablerow1'
  }],

  templates: [{
    title: 'Test template 1',
    content: 'Test 1'
  }, {
    title: 'Test template 2',
    content: 'Test 2'
  }]
});
</script>

</body>
</html>
<?php
}else{
    header('Location: '. BASE_LINK .'/boutiques/expir');
}
?>