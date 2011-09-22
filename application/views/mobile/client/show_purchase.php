<?php
	if($package_sale){
		$package = $package_sale->get_package();
		$tours = $package_sale->get_tours();
		$days = $package->get_package_days();
		$room = $days[0]->rooms_first();
	}
		
	 $this->load->view('mobile/common/menu');
?>
<?php if($package_sale): ?>
<h1> Pedido </h1>
<ul class="fields-list">
	<li> 
		<strong>Status do pedido:</strong>
		<?=$package_sale->get_payment_status_str()?>
	</li>
	<li>
	</li>
		<strong>Código do pedido:</strong>
		<?=$package_sale->sale_code?> <br/>
		<em>Guarde esse código para consultar mais tarde!
			Ou coloque essa <a href="mobile/client/show_purchase/<?=$package_sale->sale_code?>">url</a> 
			em seu favorito.
		 </em>
		 
	<li>
		<strong>País:</strong> <?=$package->country?>
	</li>
	<li>
		<strong>Estado:</strong> <?=$package->state?>
	</li>
	<li>
		<strong>Cidade:</strong> <?=$package->city?>
	</li>
	<li>
		<strong>Transporte:</strong> <?=$package->get_transport_type_str()?>
	</li>
	<li>
		<strong>Preço Inicial:</strong>  R$ <?=$package->min_price?>
	</li>
	<li>
		<strong>Adultos:</strong> <?=$package->estimated_adult?>
	</li>
	<li>
		<strong>Crianças:</strong> <?=$package->estimated_children?>
	</li>
	<li>
		<strong>Hospedagem:</strong>
		<?=$room->name?> - 
		<?=$room->get_beds_description()?> <br/>
		<em><?=$room->description?></em>
	</li>
	<li>
		<strong> Passeios:</strong>
		<ul class="list">
			<?php for ($i = 0; $i < count($tours); $i++): ?>
				<?php $tour = $tours[$i]; ?>
				<li> 
					<p>
					<strong><?=$days[$i]->date_br().' - '.$tour->name?></strong>
					</p>
					<p>
						Criança: <?=$tour->price_br('price_children')?>
						Adulto: <?=$tour->price_br('price_adult')?>
					</p>
					<p>
						<em><?=$tour->description?></em>
					</p>
				</li>
			<?php endfor; ?>
		</ul>
	</li>
	<li>	Preço Total: <strong> R$ <?=$package_sale->price_total?>  </strong></li>
</ul>
<?php else: ?>
<p> Esse pedido não existe </p>
<?php endif; ?>
