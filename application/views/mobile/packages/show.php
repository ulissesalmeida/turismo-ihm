<?php 
	$days = $package->get_package_days();
	$room = $days[0]->rooms_first();
			
	$tours_options = array();
	if(count($tours)){
		foreach($tours as $tour){
			$tours_options[$tour->id] = "{$tour->name} - {$tour->price_total_br($package->estimated_adult, $package->estimated_children)}";
		}
	}
	
	$items['mobile/search'] = "Voltar para busca";
	$data['items'] = $items;
	$this->load->view('mobile/common/menu',$data);	
?>

<h1>Detalhes da viagem</h1>

<ul class="fields-list">
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
</ul>

<h2> Diárias </h2>

<form action="mobile/client/checkout" method="POST">
	
<ul class="list">
	<input name="package_id" type="hidden" value="<?=$package->id?>" />
<?php foreach($days as $day): ?>
	<li>
		<p>
			Selecione o passeio para o dia<strong> <?=$day->date_br()?></strong> <br/>
			<?=form_dropdown('tours[]',$tours_options)?>
		</p>
	</li>
<?php endforeach; ?>
</ul>
	<input type="submit" class="button" value="Calcular o valor total e comprar" />
</form>

