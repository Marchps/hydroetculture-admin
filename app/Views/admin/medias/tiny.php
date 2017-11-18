<div class="tabs-left">
                            <ul class="nav nav-tabs">
                                <li class="active"><a data-toggle="tab" href="#lA">Blog</a></li>
                                <li><a data-toggle="tab" href="#lB">Projet</a></li>
                                
                               <li><a data-toggle="tab" href="#lC">Article</a></li>
                            </ul>
                            <div class="tab-content">
                                <div id="lA" class="tab-pane active">
<table>
                    <thead>
                        <tr>
                          <th style="width:25%">
                           Images
                          </th>
                          <th style="width:25%">
                            Noms
                          </th>
                          <th style="width:50%">
                            Catégorie
                          </th>
                          <th style="width:25%">
                            Action
                          </th>
                         
                        </tr>
                      </thead>
    <tbody>
        <?php foreach ($images as $k => $v): 
        if($v->genre == 'blog' || $v->genre == 'post' ){;?>

            <tr>
                <td>
                    <a href="#" onclick="top.tinymce.activeEditor.windowManager.getParams().oninsert('<?= Core\Router::webimg($v->file); ?>');">
                        <img src="<?= '../../../'.$v->rep.$v->thumb; ?>" height="50">
                    </a>
                </td>
                <td><?php echo $v->name; ?></td>
                <td><?= 'Blog';?></td>
                <td>
                    <a onclick="return confirm('Voulez vous vraiment supprimer cette image'); " href="">Supprimer</a>
                </td>
            </tr>
        <?php } endforeach ?>    
    </tbody>
</table>
                                </div>
                                <div id="lB" class="tab-pane">
                                    <table>
        <thead>
                        <tr>
                          <th style="width:25%">
                           Images
                          </th>
                          <th style="width:25%">
                            Noms
                          </th>
                          <th style="width:50%">
                            Catégorie
                          </th>
                          <th style="width:25%">
                            Action
                          </th>
                         
                        </tr>
                      </thead>                                
    <tbody>
        <?php foreach ($images as $k1 => $v1): 
        if($v1->genre == 'projets' ){;?>

            <tr>
                <td>
                    <a href="#" onclick="top.tinymce.activeEditor.windowManager.getParams().oninsert('<?= Core\Router::webimg($v1->file); ?>');">
                        <img src="<?= '../../../'.$v1->rep.$v1->thumb; ?>" height="50">
                    </a>
                </td>
                <td><?php echo $v1->name; ?></td>
                <td><?= 'projets';?></td>
                <td>
                    <a onclick="return confirm('Voulez vous vraiment supprimer cette image'); " href="">Supprimer</a>
                </td>
            </tr>
        <?php } endforeach ?>    
    </tbody>
</table>
                                </div>
                                <div id="lC" class="tab-pane">
                                    <table>
     <thead>
                        <tr>
                          <th style="width:25%">
                           Images
                          </th>
                          <th style="width:25%">
                            Noms
                          </th>
                          <th style="width:50%">
                            Catégorie
                          </th>
                          <th style="width:25%">
                            Action
                          </th>
                         
                        </tr>
                      </thead>                                   
    <tbody>
        <?php foreach ($images as $k2 => $v2): 
        if($v2->genre == 'pages' ){;?>

            <tr>
                <td>
                    <a href="#" onclick="top.tinymce.activeEditor.windowManager.getParams().oninsert('<?= Core\Router::webimg($v2->file); ?>');">
                        <img src="<?= '../../../'.$v2->rep.$v2->thumb; ?>" height="50">
                    </a>
                </td>
                <td><?php echo $v2->name; ?></td>
                <td><?= 'Article';?></td>
                <td>
                    <a onclick="return confirm('Voulez vous vraiment supprimer cette image'); " href="">Supprimer</a>
                </td>
            </tr>
        <?php } endforeach ?>    
    </tbody>
</table>
                                </div>
                            </div><!--tab-content-->
                        </div>


                            