<style>
a.infobulle{
/*position:relative;*/
/*z-index:24;*/
color:#fff;
text-decoration:none;
-webkit-transition: all .6s ease-in;
-moz-transition: all .6s ease-in;
-o-transition: all .6s ease-in;
transition: all .6s ease-in;
}

a.infobulle:hover{
/*z-index:25;*/

}

a.infobulle span{
display: none;
-webkit-transition: all .6s ease-in;
-moz-transition: all .6s ease-in;
-o-transition: all .6s ease-in;
transition: all .6s ease-in;
}

a.infobulle:hover span{
display:block;
position:absolute;
width:30em;
border:1px solid #000;
background-color: rgba(0, 0, 0, 0.7);
color:#fff;
font-weight:none;
padding:5px;
margin-left: 400px;
z-index: 2;
}
</style>

<div class="pageheader">
            <div class="pageicon"><span class="iconfa-laptop"></span></div>
            <div class="pagetitle">
                <h5>Gestion de <?php $txt=($count_btq[0]->cpt==1) ? 'ma boutique' : 'mes boutiques'; echo $txt; ?></h5>
                <h1>Gestion du texte</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">


        <!--<a class="btn confirmbutton"><small>Confirm Box</small></a> &nbsp;-->


        <div class="tabbable">

                    <ul class="nav nav-tabs buttons-icons">
                        <?php foreach ($boutiques as $boutique): ?>
                            <li data-id="<?=$boutique->id_boutique?>" class="<?php if($count_btq[0]->cpt==1){echo'active ';}?>class<?=$boutique->id_boutique?>"><a data-toggle="tab" href="#<?=$boutique->id_boutique?>"><?=$boutique->nom?> - <?=$boutique->ville?> <i style="color:white;" class="iconfa-share-alt fa-1x"></i> </a></li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="tab-content">

                    <?php
                    if(!isset($_GET['idb'])){
                    ?>
                    <div id="0" class="tab-pane active">
                        Veuillez choisir une boutique.
                    </div>
                    <?php
                    }
                    ?>

                        <?php foreach ($boutiques as $boutique): ?>
                        <div id="<?=$boutique->id_boutique;?>" class="tab-active-get-<?=$boutique->id_boutique;?> tab-pane <?php if($count_btq[0]->cpt==1){echo'active';}?>">
                        <div class="row-fluid">
                        <div class="span4 profile-left">
                            <div class="widgetbox tags">
                                    <h4 class="widgettitle">Heures d'ouvertures  <a class="infobulle"><i style="float:right;" class="iconfa-info-sign"></i>
                                        <span><b><u>Explications à propos des heures d'ouvertures et de fermetures:</u><br />
                                            Vous pouvez modidifier les heures d'ouvertures et de fermetures de votre boutique, le tableau des heures se présente de cette façon sur le site :</b>
                                            <img src="<?= URL_IMAGE_BOUTIQUE ?>horaires.PNG"/>
                                         </span></a></h4>
                                    <div class="widgetcontent">
                                    <form action="<?= BASE_LINK ?>/boutiques/update_houres" method="POST">
                                        <input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
                                    <p>
                                        <label style="width:20%;float:left">Lundi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_lundi" value="<?=$boutique->h_lundi?>" class="input-small" placeholder="heures"></span><br />
                                        <small class="desc">exemple :  10h à 12h30 et de 13h30 à 19h</small>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Mardi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_mardi" value="<?=$boutique->h_mardi?>" class="input-small" placeholder="heures"></span>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Mercredi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_mercredi" value="<?=$boutique->h_mercredi?>" class="input-small" placeholder="heures"></span>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Jeudi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_jeudi" value="<?=$boutique->h_jeudi?>" class="input-small" placeholder="heures"></span>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Vendredi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_vendredi" value="<?=$boutique->h_vendredi?>" class="input-small" placeholder="heures"></span>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Samedi</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_samedi" value="<?=$boutique->h_samedi?>" class="input-small" placeholder="heures"></span>
                                    </p>
                                    <p>
                                        <label style="width:20%;float:left">Dimanche</label>
                                        <span class="field"><input style="width:250px;" type="text" name="h_dimanche" value="<?=$boutique->h_dimanche?>" class="input-small" placeholder="fermé ?"></span>
                                    </p>
                                    <p>
                                        <label>Information supplémentaires (Vacances, jours fériés...) :</label> </p>
                                        <textarea name="h_a_savoir" class="span8"><?=$boutique->h_a_savoir;?></textarea><br />


                                    <button type="submit" class="btn btn-primary">Enregistrer</button>

                                    </form>
                                    </div>
                            </div>

                            <div class="widgetbox tags">
                                    <h4 class="widgettitle">Affichage des pictos facilités <a class="infobulle"><i style="float:right;" class="iconfa-info-sign"></i>
                                        <span><b><u>Explications à propos des pictogrammes :</u><br />
                                            Vous pouvez choisir les picto à afficher ou non sur votre page, le tableau des pictogrammes se présente de cette façon sur le site :</b>
                                            <img src="<?= URL_IMAGE_BOUTIQUE ?>facilites.PNG"/>
                                         </span></a></h4>
                                    <div class="widgetcontent">
                                    <form method="POST" action="<?= BASE_LINK ?>/boutiques/update_facilites">
                                        <?php foreach ($facilites as $facilite): ?>
                                            <?php $checked=""; ?>
                                            <?php foreach ($facilites_btq as $facilite_btq): ?>
                                                <?php if($boutique->id_boutique==$facilite_btq->id_boutique){
                                                    if($facilite_btq->id_facilites==$facilite->id_facilites){
                                                        $checked="checked";
                                                    }
                                                }?>
                                            <?php endforeach;?>
                                        <input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
                                            <div class="checkbox">
                                                <label><input id="chkbx_<?= $facilite->id_facilites ?>" name="facilites_<?= $facilite->id_facilites ?>" type="checkbox" value="<?= $facilite->id_facilites ?>" <?= $checked?>> <?= $facilite->libelle ?></label>
                                            </div>

                                        <?php endforeach;?>

										<div id="agrement" style="display:none;">
											<label>Date de l'agrément (obligatoire et visible sur le site) : </label>
											<input id='date_ag' name="date_ag" type="text" value="">
										</div>

                                        <br />
                                        <button type="submit" class="btn btn-primary">Enregistrer</button>
                                    </form>
                                    </div>
                            </div>
                        </div>
                        <div class="span8">
                            <div class="widgetbox personal-information">
                                    <h4 class="widgettitle">Informations boutiques</h4>
                                    <div class="widgetcontent">
                                    <form action="<?= BASE_LINK ?>/boutiques/update" method="POST">
                                        <input type="hidden" name="id_btq" value="<?= $boutique->id_boutique ?>">
                                        <p>
                                            <label>Dénomination sociale :</label>
                                            <input type="text" name="nom_boutique" class="input-xlarge" value="<?=$boutique->nom;?>" />
                                        </p>
                                        <p>
                                            <label>Slogan :</label>
                                            <textarea name="slogan_boutique" class="span8"><?=$boutique->desc_courte;?></textarea>
                                        </p>
                                        <p>
                                            <label>Adresse :</label>
                                            <input type="text" name="adresse_boutique" class="input-xlarge" value="<?=$boutique->adresse;?>" />
                                        </p>
                                        <p>
                                            <label>Code postal :</label>
                                            <input type="text" name="cp_boutique" class="input-xlarge" value="<?=$boutique->cp;?>" />
                                        </p>
                                        <p>
                                            <label>Ville :</label>
                                            <input type="text" name="ville_boutique" class="input-xlarge" value="<?=$boutique->ville;?>" />
                                        </p>
                                        <p>
                                            <label>Téléphone :</label>
                                            <input type="text" name="tel_boutique" class="input-xlarge" value="<?=$boutique->tel;?>" />
                                        </p>
                                        <p>
                                            <label>Mail pour les visiteurs :</label>
                                            <input type="text" name="mail_boutique" class="input-xlarge" value="<?=$boutique->mail;?>" />
                                        </p>
                                        <p>
                                            <label>Lien du compte Facebook :</label>
                                            <input type="text" name="facebook_boutique" class="input-xlarge" value="<?=$boutique->facebook;?>" />
                                        </p>
                                        <p>
                                            <label>Lien du compte twitter :</label>
                                            <input type="text" name="twitter_boutique" class="input-xlarge" value="<?=$boutique->twitter;?>" />
                                        </p>
                                        <p>
                                            <label>Compte Skype :</label>
                                            <input type="text" name="skype_boutique" class="input-xlarge" value="<?=$boutique->skype;?>" />
                                        </p>
                                        <p>
                                            <label>Description de la boutique :</label>
                                            <textarea name="description" class="span8">
                                                <?=$boutique->boutique_description;?>
                                            </textarea>
                                        </p>
                                        <!--<div class="widgetbox profile-notifications">
                                            <h4 class="widgettitle">Notifications</h4>
                                            <div class="widgetcontent">
                                                <p>
                                                    <input name="recall" type="checkbox" value="1" checked> Recevoir par mail les demandes de rappels téléphones visiteurs.<br />
                                                </p>
                                            </div>
                                        </div>-->
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
