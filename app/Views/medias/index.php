<div class="pageheader">
            <div class="pageicon"><span class="iconfa-picture"></span></div>
            <div class="pagetitle">
                <h5>Gestion de <?php $txt=($count_btq[0]->cpt==1) ? 'ma boutique' : 'mes boutiques'; echo $txt; ?></h5>
                <h1>Gestion des images</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">

        <div class="tabbable">
                    <ul class="nav nav-tabs buttons-icons">
                        <?php foreach ($boutiques as $boutique): ?>
                            <li class="<?php if($count_btq[0]->cpt==1){echo'active';}?>"><a data-toggle="tab" href="#<?=$boutique->id_boutique?>"><?=$boutique->nom?> - <?=$boutique->ville?> <i style="color:white;" class="iconfa-share-alt fa-1x"></i></a></li>
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
                                    <h4 class="widgettitle">Mes images</h4>
                                    <div class="widgetcontent">
									
									 <div class="widgetbox tags">
                                    <h4 class="widgettitle">Ajouter une image</h4>
                                    <div class="widgetcontent">

                                    <form action="<?= BASE_LINK ?>/medias/add" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="ville" value="<?= $boutique->ville ?>">
                                        <input type="hidden" name="nom" value="<?= $boutique->nom ?>">
 
                                        <div style="width:50%;float:left;height: 70px;" class="par">
                                            <label>Ajouter une image :</label>
                                            <input type="file" name="file">
                                        </div>

										<div style="width:50%;float:right;" class="droit_image">
										Le droit à l'image est un droit exclusif que vous avez sur votre image et l'utilisation qui en est faite. Les images peuvent être des photos ou vidéos sur lesquelles vous apparaissez et êtes reconnaissable, quel que soit le contexte : vacances, événement familial, manifestation culturelle ou religieuse, etc.<br />
										Certaines images ne nécessitent pas d'autorisation des personnes concernées, sous réserve de ne pas porter atteinte à la dignité de la personne représentée. Il s'agit par exemple :<br />
										d'images d’événements d'actualité qui peuvent être publiées sans l'autorisation des participants au nom du droit à l'information ou de création artistique ;<br />
										d'images de personnalités publiques dans l'exercice de leur fonction (élus par exemple) à condition de les utiliser à des fins d'information ;<br />
										d'images illustrant un sujet historique.
										</div>

                                        <p>
                                            <label>Galerie :</label>
                                            <select name="galerie">
                                             <?php foreach ($galeries as $galerie): ?>
                                             <?php if($galerie->id_boutique==$boutique->id_boutique){?>
                                              <option value="<?= $galerie->id_galerie ?>"><?= $galerie->libelle ?></option>
                                              <?php } ?>
                                             <?php endforeach; ?>
                                            </select>
                                        </p>

                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                    </div>

                            </div>
									
                                    <table class="table table-bordered responsive">
                                        <colgroup>
                                            <col class="con0">
                                            <col class="con1">
                                            <col class="con0">
                                            <col class="con1">
                                        </colgroup>
                                        <thead>
                                            <tr>
                                                <th>Identifiant</th>
                                                <th>Nom de l'image</th>
                                                <th>chemin</th>
                                                <th>Galerie associée</th>
                                                <th>Supprimer</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($medias as $media): ?>
                                            <?php if($media->id_boutique==$boutique->id_boutique){?>
                                                <tr id="<?=$media->id_image?>">
                                                    <td><?=$media->id_image?></td>
                                                    <td><?=$media->path_image?></td>
                                                    <td><?=$media->path_image?></td>
                                                    <td><?=$media->libelle?></td>
                                                    <td><button class="del" data-btq-id="<?= $boutique->id_boutique ?>" data-media-id="<?=$media->id_image?>">Supprimer</button></td>
                                                </tr>
                                            <?php
                                            } 
                                            ?>
                                        <?php endforeach;?>
                                    
                                        </tbody>
                                    </table>                           
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        </div><!--tab-pane-->
                        <?php endforeach; ?>
                    </div><!--tabcontent-->
               </div><!--tabbable-->

