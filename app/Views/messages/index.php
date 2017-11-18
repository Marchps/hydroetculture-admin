<div class="pageheader">
            <!--<form action="results.html" method="post" class="searchbar" />
                <input type="text" name="keyword" placeholder="To search type and hit enter..." />
            </form>-->
            <div class="pageicon"><span class="iconfa-envelope"></span></div>
            <div class="pagetitle">
                <h5>Gestion des messages</h5>
                <h1>Messages</h1>
            </div>
        </div><!--pageheader-->
        
        <div class="maincontent">
            <div class="maincontentinner">
                <div class="messagepanel">
                    <div class="messagehead">
                        <button id="nouveau_message" class="btn btn-primary btn-large" style="background: #009272!important;"><span class="iconfa-pencil"></span> Ecrire un nouveau message</button>
                    </div><!--messagehead-->
                    <!-- Nouveau message -->
                     <div class="new_msg">
                                <div class="reply">
                                    <form method="POST" action="new_message" >
                                        <input type="hidden" name="exped" id="exped" value="<?= $_SESSION['id_user']?>">
                                        <div class="par">
                                            <label>Objet du message :</label>
                                            <input type="text" name="subject" required>
                                        </div>
                                        <span class="field">
                                            Destinataire :<br />
                                            <select required name="destinataire" class="uniformselect">
                                                <?php foreach ($all_user as $users) {
                                                    if($_SESSION["id_user"]<>$users->id_user){
                                                    echo "</option><option value='".$users->id_user."'>". $users->prenom ." ". $users->nom;
                                                    }
                                                }?>
                                            </select>
                                        </span>

                                        <textarea  name="content" placeholder="Contenu du message..."></textarea><br />
                                        <button type="submit" class="btn btn-primary">Envoyer mon message</button>
                                    </form>
                                </div><!--reply-->
                            </div><!--messagereply-->
                    <!-- /nouveau message -->


                    <div class="messagemenu">
                        <ul>
                            <li id="boite" class="rec active"><a href="#"><span class="iconfa-inbox"></span> Reçus</a></li>
                            <li id="boite" class="env"><a href="#"><span class="iconfa-plane"></span> envoyés</a</li>
                            <li id="boite" class="sup"><a href="#"><span class="iconfa-folder-close"></span> archivés</a></li>
                        </ul>
                    </div>
                    <div class="messagecontent">
                        <div class="messageleft">
                            <!--<form class="messagesearch" />
                                <input type="text" class="input-block-level" placeholder="Search message and hit enter..." />
                            </form>-->

                            <!--Liste des Messages recus-->
                            <ul class="msglist msglist_rec">
                                <?php foreach ($messages as $message){?>
                                <li class="message_rec" value="<?= $message->id_message?>">
                                    <input type="hidden" id="id_recept" value="<?= $message->id_exped?>">
                                    <input type="hidden" id="id_exped" value="<?= $message->id_recept?>">
                                    <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/<?= $message->photo ?>" alt="" /></div>
                                    <div class="summary">
                                        <?php $send = new DateTime($message->send);?>
                                        <span class="date pull-right"><small><?= $send->format('d/m/Y à H:i:s');?></small></span>
                                        <h4>
                                            <?= $message->prenom . " " . $message->nom?><br /> 
                                        <small id="lu_<?= $message->id_message?>"><?php if($message->lu==NULL){echo "<b style='color:red;'>(Non lu )</b>";}?></small>
                                        <?php if(isset($message->respond)){$respond = new DateTime($message->respond); echo '<p style="font-weight:bold;color:#009272;">Répondu le '. $send->format('d/m/Y à H:i:s') .'</p>';}?>

                                        </h4>
                                        <p><strong><?= $message->subject ?></strong> <br /> <?php echo substr(strip_tags($message->content), 0, 40) .'...'; ?></p>
                                    </div>
                                </li></b>
                                <?php } ?>
                            </ul>

                            <!-- Listes des Messages envoyés-->
                            <ul class="msglist msglist_env">
                                <?php foreach ($messages_envoyes as $message){?>
                                <li class="message_env" value="<?= $message->id_message?>">
                                    <input type="hidden" id="id_recept" value="<?= $message->id_exped?>">
                                    <input type="hidden" id="id_exped" value="<?= $message->id_recept?>">
                                    <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/<?= $message->photo ?>" alt="" /></div>
                                    <div class="summary">
                                        <span class="date pull-right"><small><?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></small></span><br />
                                        Envoyé à : <br />
                                        <h4>
                                        <?= $message->prenom . " " . $message->nom?> 
                                        <small><?php if($message->lu==NULL){echo "<b style='color:red;'>(Non lu par le destinataire)</b>";}?></small>
                                        </h4>



                                        <p><strong><?= $message->subject ?></strong> <br /> <?php echo substr(strip_tags($message->content), 0, 40) .'...'; ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>

                            <!-- Liste des Messages supprimés-->
                            <ul class="msglist msglist_sup">
                                <?php foreach ($messages_supprimes as $message){?>
                                <li class="message_sup" value="<?= $message->id_message?>">
                                    <input type="hidden" id="id_recept" value="<?= $message->id_exped?>">
                                    <input type="hidden" id="id_exped" value="<?= $message->id_recept?>">
                                    <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/photos/avatar.jpg" alt="" /></div>
                                    <div class="summary">
                                        <span class="date pull-right"><small><?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></small></span>
                                        <h4><?= $message->prenom . " " . $message->nom?></h4>
                                        <b style="color:red;">Message archivé le <?php $delete_time = new DateTime($message->delete_time);?><?= $delete_time->format('d/m/Y à H:i:s') ?></b>
                                        <p><strong><?= $message->subject ?></strong> <br /> <?php echo substr(strip_tags($message->content), 0, 40) .'...'; ?></p>
                                    </div>
                                </li>
                                <?php } ?>
                            </ul>

                        </div><!--messageleft-->
                        <div class="messageright">
                            <div class="messageview">
                                
                                <div class="mail_affiche_accueil">
                                    <h1 style="text-align: center;margin-top: 150px;">BIENVENUE SUR VOTRE MESSAGERIE LJM...</h1>
                                </div>

                                <!-- Messages reçus -->
                                <?php foreach ($messages as $message){?>
                                <div id="mail_<?= $message->id_message ?>" class="mail_recus_affiche" >
                                <input type="hidden" id="mail_recu" value="<?= $message->id_message ?>">
                                <div class="btn-group pull-right">
                                    <button data-toggle="dropdown" class="btn dropdown-toggle">Actions <span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        <li><a class="delete_msg" href="#">Archiver</a></li>
                                    </ul>
                                </div>
                                    <h1 class="subject"><?= $message->subject ?></h1>
                                    <div class="msgauthor">
                                        <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/<?= $message->photo ?>" alt="" /></div>
                                        <div class="authorinfo">
                                            <span class="date pull-right"><?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></span>
                                            <h5><strong><?= $message->nom ." ". $message->prenom ?> -</strong><span><?=$message->poste ?></span></h5>
                                        </div><!--authorinfo-->
                                    </div><!--msgauthor-->
                                    <div class="msgbody">
                                        <?= $message->content ?>
                                    </div><!--msgbody-->
                                </div>
                                <?php } ?>

                                <!-- Messages envoyés -->
                                <?php foreach ($messages_envoyes as $message){?>
                                <div id="mail_<?= $message->id_message ?>" class="mail_env_affiche" value="<?= $message->id_message ?>">
                                    <h1 class="subject"><?= $message->subject ?></h1>
                                    <div class="msgauthor">
                                        <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/photos/avatar.jpg" alt="" /></div>
                                        <div class="authorinfo">
                                            <span class="date pull-right"><?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></span><br />
                                            <span class="date pull-right"><small><?php if($message->lu==NULL){echo "<b style='color:red;'>Message non lu par le destinataire</b>";}else{echo "Message lu le ".$message->lu;} ?></small></span>
                                            <h5><strong><?= $message->nom ." ". $message->prenom ?></strong> <span>hisemail@hisdomain.com</span></h5>
                                            <span class="to">to me@mydomain.com</span>
                                        </div><!--authorinfo-->
                                    </div><!--msgauthor-->
                                    <div class="msgbody">
                                        <?= $message->content ?>
                                    </div><!--msgbody-->
                                </div>
                                <?php } ?>

                                <!-- Messages supprimés -->
                                <?php foreach ($messages_supprimes as $message){?>
                                <div id="mail_<?= $message->id_message ?>" class="mail_sup_affiche" value="<?= $message->id_message ?>">
                                    <h1 class="subject"><?= $message->subject ?> <b style="color:red;">Message archivé le <?php $delete_time = new DateTime($message->delete_time);?><?= $delete_time->format('d/m/Y à H:i:s') ?></b></h1> 
                                    <div class="msgauthor">
                                        <div class="thumb"><img src="<?= LOGIN_LINK ?>web/images/photos/avatar.jpg" alt="" /></div>
                                        <div class="authorinfo">
                                            <span class="date pull-right"><?php $send = new DateTime($message->send);?><?= $send->format('d/m/Y à H:i:s') ?></span>
                                            <h5><strong><?= $message->nom ." ". $message->prenom ?></strong></h5>
                                        </div><!--authorinfo-->
                                    </div><!--msgauthor-->
                                    <div class="msgbody">
                                        <?= $message->content ?>
                                    </div><!--msgbody-->
                                </div>
                                <?php } ?>                                               
                            
                        </div><!--messageright-->
                            <div class="msgreply">
                                <div class="thumb"><img src="<?= URL_IMAGE_BOUTIQUE . $_SESSION['photo']?>" alt="" /></div>
                                <div class="reply">
                                    <form method="POST" action="new_reply">
                                        <input type="hidden" name="recept" id="recept" value="0">
                                        <input type="hidden" name="exped" id="exped" value="0">
                                        <input type="hidden" name="current_message" id="current_message" value="0">
                                        <div class="par">
                                            <label>Objet de la réponse :</label>
                                            <input type="text" name="subject" required>
                                        </div>
                                        <textarea name="content" placeholder="Type something here to reply"></textarea><br />
                                        <button type="submit" class="btn btn-primary">Envoyer ma réponse</button>
                                    </form>
                                </div><!--reply-->
                            </div><!--messagereply-->
                    </div><!--messagecontent-->
                </div><!--messagepanel-->             
                
            </div><!--maincontentinner-->
        </div><!--maincontent-->