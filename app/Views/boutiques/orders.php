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
background-color: rgba(0, 0, 0, 0.7);;
color:#fff;
font-weight:none;
padding:5px;
margin-left: 400px;
z-index: 2;
}
</style>

<div class="pageheader">
            <div class="pageicon"><span class="iconfa-shopping-cart"></span></div>
            <div class="pagetitle">
                <h5>Gestion de <?php $txt=($count_btq[0]->cpt==1) ? 'ma boutique' : 'mes boutiques'; echo $txt; ?></h5>
                <h1>Gestion des commandes</h1>
            </div>
        </div><!--pageheader-->
        <div class="maincontent">
            <div class="maincontentinner">

        <div class="tabbable">
                    <ul class="nav nav-tabs buttons-icons">
                        <?php foreach ($boutiques as $boutique): ?>
                            <li data-id="<?=$boutique->id_boutique?>" class="<?php if($count_btq[0]->cpt==1){echo'active ';}?>class<?=$boutique->id_boutique?>"><a data-toggle="tab" href="#<?=$boutique->id_boutique?>"><?=$boutique->nom?> - <?=$boutique->ville?> <i style="color:white;" class="iconfa-share-alt fa-1x"></i></a></li>
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
						
						 <h4 class="widgettitle">Mes commandes - <?=$boutique->nom." ".$boutique->ville?></h4>
							<table id="ordertable" class="table table-bordered">
								<colgroup>
									<col class="con0" />
									<col class="con1" />
									<col class="con0" />
									<col class="con1" />
									<col class="con0" />
									<col class="con0" />
									<col class="con1" />
								</colgroup>
								<thead>
									<tr>
										<th class="head0">ID Commande</th>
										<th class="head0">Référence</th>
										<th class="head1">Client</th>
										<th class="head0">Montant total</th>
										<th class="head0">Paiement</th>
										<th class="head1">Date</th>
										<th class="head0" style="text-align:center;">Commander les produits</th>
										<th class="head0" style="text-align:center;">Validation</th>
									</tr>
								</thead>
								<tbody>
								
									<?php foreach ($orders as $order): ?>
										<?php if($boutique->id_address == $order->id_address_delivery){?>
										<tr>
											<td><button id="edit" data-id="" data-toggle="modal" data-target="div#modalProducts<?= $order->id_order ?>" href="#" class="btn btn-info" alt="Modifier"><i class="iconfa-eye-open"></i></button> Commande N°<?= $order->id_order ?></td>
											<td><?= $order->reference ?></td>
											<td><?= $order->firstname.' '.$order->lastname ?></td>
											<td><?= money_format('%.2n', $order->total_paid )?> €</td>
											<td><?php if($order->valid==1){ echo "<i class='iconfa-ok'></i> Payée en ligne."; }else{ echo "Le client paye en boutique."; } ?></td>
											<td><?php $date = date_create($order->date_commande); echo date_format($date, 'd/m/Y H:i:s'); ?></td>
											<td class="center"><a target=_BLANK href="http://commande.highproshop.fr"><button class="btn btn-info"> Commander les produits manquants </button></a></td>
											<td class="center">
												<!-- Si la commande a été validé et se trouve dans jm_orders -->
												<?php $validee='';?>
												<?php foreach($valid_orders as $valid_order): ?>
												<?php if($order->id_order==$valid_order->id_prstshp_order){?>
													<?php $date = date_create($valid_order->validate); ?>
													<b>Validée le <?= date_format($date, 'd/m/Y H:i:s'); ?></b><br /> par <?= $user->prenom .' '.$user->nom ?>
													<?php $validee='ok' ?>
												<?php }?>
												<?php endforeach; ?>
												<?php if($validee==''){ ?>
													<form method="POST" action="<?= BASE_LINK ?>/orders/nouveau">
														<input name="id_prstshp_order" type="hidden" value="<?= $order->id_order ?>">
														<input name="id_boutique" type="hidden" value="<?= $boutique->id_boutique ?>">
														<input name="id_user" type="hidden" value="<?= $user->id_user ?>">
														<input type="submit" class="btn btn-info" alt="Valider"/>
													</form>
												<?php } ?>
												
											</td>
										</tr>
										<?php } ?>
										
									<?php endforeach; ?>
								</tbody>
							</table>						
						</div>
                        <?php endforeach; ?>
                    </div><!--tabcontent-->
               </div><!--tabbable-->
			
               
			</div>
		</div>
		
	<!-- boite de dialogue qui s'ouvre -->
						
		<?php foreach ($orders as $order): ?>
			<div id="modalProducts<?= $order->id_order ?>" class="modal fade" role="dialog">
			  <div class="modal-dialog">

				<!-- Modal content-->
				<div class="modal-content">
				  <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Commande <?= $order->id_order ?> - <?= $order->firstname .' '.$order->lastname?> - <?php $date = date_create($order->date_commande); echo date_format($date, 'd/m/Y H:i:s'); ?> </h4>
				  </div>
				  <div class="modal-body">

					<table id="ordertable" class="table table-bordered">
					<colgroup>
						<col class="con0" />
						<col class="con1" />
						<col class="con0" />
						<col class="con1" />
						<col class="con0" />
					</colgroup>
					<thead>
						<tr>
							<th class="head0">Référence</th>
							<th class="head0">Nom</th>
							<th class="head1">quantité</th>
							<th class="head0">Prix unitaire</th>
							<th class="head1">Prix</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach($products as $product): ?>
						<?php if($product->id_order==$order->id_order){?>
					
						<tr class="gradeX">
							<td><?= $product->product_reference ?></td>
							<td><?= $product->product_name ?></td>
							<td><?= $product->product_quantity ?></td>
							<td><?= money_format('%.2n', $product->unit_price_tax_incl) ?> €</td>
							<td><?= money_format('%.2n', $product->total_price_tax_incl) ?> €</td>
						</tr>							
						<?php } ?>
					<?php endforeach; ?>
						
					</tbody>
					</table>
					<p>Montant total de la commande : <b><?= money_format('%.2n', $order->total_paid ) ?>€</b></p><br /> 
					<p><b><?php if($order->valid==1){echo "<i class='iconfa-ok'></i> Paiement en ligne effectué !";}else{echo "Paiement en boutique au retrait de la commande";} ?></b></p>
					<p>Retrait de la commande en boutique : <b> <?=$boutique->nom ?> - <?=$boutique->adresse . ' '.$boutique->cp. ' ' . $boutique->ville?></b></p>

				  </div>
				  <div class="modal-footer">
					<button id="print5005" type="button" onclick="printDiv5005()" class="btn btn-default" data-dismiss="modal">Imprimer</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
				  </div>
				</div>

			  </div>
			</div>
		<?php endforeach; ?>

<!-- Modal facilites -->

<style>
.modal{
	width:700px!important;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript">
//$( document ).ready(function() {
	
	function printDiv5005() 
	{
	  var divToPrint=document.getElementById('modalProducts5005');
	  var newWin=window.open('','Print-Window');
	  newWin.document.open();
	  newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');
	  newWin.document.close();
	  setTimeout(function(){newWin.close();},10);
	}
	
	/*$("#print5005").click(function () {
		$("#modalProducts5005").print();
	});*/
//});
</script>

		

