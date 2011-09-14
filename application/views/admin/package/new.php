<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>

<h1>Novo pacote turístico</h1>
<form method="post" action="/admin/packages/create">
	<p>
		<label for="local">Destino</label>
		<?=form_dropdown('local',$places_options)?>
		</p>
	<p>
		<label for="transport">Tipo de transporte</label>
		<?=form_dropdown('transport',$transport_types)?>
		</p>
	<p>
		<label for="passage_price_adult">Preço da passagem unitária adulto</label>
		<input name="passage_price_adult" type="text" />
	</p>
	<p>
		<label for="passage_price_children">Preço da passagem unitária criança</label>
		<input name="passage_price_children" type="text" />
	</p>
	<p>
		<label for="estimated_adult">Número máximo de adultos</label>
		<input name="estimated_adult" type="number" />
	</p>
	<p>
		<label for="estimated_children">Número máximo de crianças</label>
		<input name="estimated_children" type="number" />		
	</p>
	<input class="button" type="submit" value="Salvar" />
</form>
