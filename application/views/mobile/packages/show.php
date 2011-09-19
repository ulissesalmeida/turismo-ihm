<?php 
	$days = $package->get_package_days();
	$room = $days[0]->rooms_first();
	$rooms_message = "";
	if($room->single_beds && $room->double_beds)
		$rooms_message = "Quarto com {$room->single_beds} cama(s) de solteiro e {$room->double_beds} de casal";
	else if($room->single_beds)
		$rooms_message = "Quarto com {$room->single_beds} cama(s) de solteiro";
	else if($room->double_beds)
		$rooms_message = "Quarto com {$room->double_beds} cama(s) de casal";
	
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
		<strong>Hotel:</strong> 
		<?=$rooms_message?> <br/>
		<em><?=$room->description?></em>
	</li>
</ul>

<h2> Diárias </h2>

<form>
<ul class="list">
<?php foreach($days as $day): ?>
	<li>
		<p>
			Selecione o passeio para o dia<strong> <?=$day->date_br()?></strong> <br/>
			<select></select>
		</p>
	</li>
<?php endforeach; ?>
</ul>
</form>

