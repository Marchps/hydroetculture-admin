<div class="pageheader">
            <div class="pageicon"><span class="iconfa-map-marker"></span></div>
            <div class="pagetitle">
                <h5>Gestion de <?php $txt=($count_btq[0]->cpt==1) ? 'ma boutique' : 'mes boutiques'; echo $txt; ?></h5>
                <h1>Gestion de la carte</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">

        <div class="tabbable">
                    <ul class="nav nav-tabs buttons-icons">
                        <?php foreach ($boutiques as $boutique): ?>
                            <li class="<?php if($count_btq[0]->cpt==1){echo'active';}?>"><a data-toggle="tab" href="#<?=$boutique->id_boutique?>"><?=$boutique->nom?> - <?=$boutique->ville?></a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab-content">

                    <?php
                    if($count_btq[0]->cpt>1){
                    ?>
                    <div id="0" class="tab-pane active">
                        Veuillez choisir une boutique.
                    </div>
                    <?php
                    }
                    ?>

                        <?php foreach ($boutiques as $boutique): ?>
                        <div id="<?=$boutique->id_boutique;?>" class="tab-pane <?php if($count_btq[0]->cpt==1){echo'active';}?>">
                        <div class="row-fluid">    
                        <div class="span12">
                            <div class="widgetbox personal-information">
                                    <h4 class="widgettitle">Coordonnées GPS de la boutique <i style="float:right;" class="iconfa-info-sign"></i></h4>
                                    <div class="widgetcontent">
                                    <form action="<?= BASE_LINK ?>/boutiques/update_map" method="POST">
                                        <input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
                                        <p>Nous avons besoin de cette information, pour le placement du pictogramme sur la carte intéractive de la page d'accueil. Nous vous invitons à aller sur <a target="_blank" href="http://www.coordonnees-gps.fr/">http://www.coordonnees-gps.fr/</a> pour obtenir ces informations.

                                        </p>
                                        <p>
                                            <label>Latitude de la boutique :</label>
                                            <input type="text" name="latitude" class="input-xlarge" value="<?=$boutique->latitude;?>" />
                                        </p>
                                        <p>
                                            <label>Longitude de la boutique :</label>
                                            <input type="text" name="longitude" class="input-xlarge" value="<?=$boutique->longitude;?>" />
                                        </p>
                                       
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div><!--tab-pane-->
                        <?php endforeach; ?>
                    </div><!--tabcontent-->
               </div><!--tabbable-->

