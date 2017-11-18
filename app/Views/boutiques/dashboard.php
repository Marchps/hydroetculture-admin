<div class="pageheader">
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>Votre page LJM</h5>
                <h1>Dashboard : Bienvenue <?= $user->prenom ?></h1>
            </div>
        </div>
<div class="maincontentinner">
<div class="span6">
	<h3 style="padding-bottom:20px;">Infos du compte</h3>


		<table class="table table-bordered table-invoice">
			<tbody><tr>
				<td class="width30">Utilisateur:</td>
				<td class="width70">
					<strong><?= $user->prenom ?> <?= $user->nom ?> - <?=$user->login ?></strong> <br>
					<?= $user->libelle ?> <br />
					<?= $user->poste ?> <br />
					Email: <?= $user->mail ?><br />
					Connecté avec l'adresse IP : <?= $_SESSION['ip_client'] ?>
				</td>
			</tr>
		</tbody></table>
		
		<br>  
		
	<h3 style="padding-bottom:20px;">Commandes</h3>

		
		<table class="table table-bordered table-invoice">
			<tbody>
			<?php foreach ($boutiques as $boutique):?>
			<tr>
				<td class="width30"><?= $boutique->nom ?></td>
				<td class="width70">
					<?= $boutique->cp ?> <?= $boutique->ville ?><br />
					<?= $boutique->adresse ?><br /><br />					
				</td>				
				<?php if($user->level<3 || $user->login=='demo'){ ?>
				<td>
				<ul class="shortcuts">
					<li class="products">
						<a href="<?= BASE_LINK.'/boutiques/orders' ?>">
						<style>
						.shortcuts li .shortcuts-icon{
							padding-top:10px!important;
						}
						</style>
						
							<span class="shortcuts-icon iconsi-cart"></span>
							<!--<i class="iconfa-shopping-cart fa-4x"></i>-->
							<span class="shortcuts-label"><b>Commandes en attente : 1</b></span>
						</a>
					</li>
				</ul>
				</td>
				<?php } ?>
			</tr>
			<?php endforeach ?>
		</tbody></table>
		
</div>
<div class="span6">
                        
	<h3>Actualités du réseau</h3>
	<br>
	<div class="fb-page" data-href="https://www.facebook.com/LesJardiniersModernes/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/LesJardiniersModernes/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/LesJardiniersModernes/">Les Jardiniers Modernes</a></blockquote></div>
	<h3><?= $user->prenom ?> ! Votre avis nous intéresse ! </h3>
	<div><iframe frameborder='0' src='https://sondage.fbapp.co/embed/lesjardiniersmodernes?api=3.5.1' width='100%'></iframe><script src="https://code-rubik-cdn.s3.amazonaws.com/iframeresizer/3.5.1/host.js"></script><script type='text/javascript'>iFrameResize({ enablePublicMethods: true, minHeight: 230 })</script></div>
</div>
</div>