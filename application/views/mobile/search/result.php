<?php

if(isset($back_to_home)){ 
	$this->load->view('mobile/common/menu');
}
else{
	$items['mobile/search'] = "Voltar";
	$data['items'] = $items;
	$this->load->view('mobile/common/menu',$data);
} 

?>

<h1> Pacotes encontrados </h1>
<?php if($packages): ?>
	<ul class="list">
		<?php foreach($packages as $package): ?>
			<li>
				<p>
					<strong><?=$package->state?> - <?=$package->city?></strong> 
					Tipo: <strong><?=$package->get_transport_type_str()?></strong>
				</p>
				<p>
					<strong> <?=$package->date_br('begin_date')?> </strong> até <strong> <?=$package->date_br('end_date')?> </strong>
					 A partir de <strong> R$ <?=$package->min_price?>  </strong>
				</p>
				<p>			
					<strong> Adultos: </strong> <?=$package->estimated_adult?>
					<strong> Crianças: </strong> <?=$package->estimated_children?>
				</p>
				<p class="command-links">
					<a href="/mobile/packages/show/<?=$package->id?>">Detalhes</a>
				</p>
			</li>
		<?php endforeach; ?>
</ul>
<?php else: ?>
	<p> Não foi encontrado nenhum pacote turístico </p>
<?php endif; ?>
