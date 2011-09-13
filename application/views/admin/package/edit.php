<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>

<?php if ($package): ?>
	<h1>Editando pacote turístico </h1>
	<form method="post" action="/admin/packages/update">
		
		<input name="id" type="hidden" value="<?=set_value('id',$package->id)?>">
	
		<label for="local">Destino</label>
		<?=form_dropdown('local',$places_options,$package->destination_id)?>
	
		<label for="transport">Tipo de transporte</label>
		<?=form_dropdown('transport',$transport_types, $package->transport_type)?>
	
		<label for="passage_price_adult">Preço da passagem unitária adulto</label>
		<input name="passage_price_adult" type="text" value="<?=set_value('passage_price_adult',$package->passage_price_adult)?>" />
	
		<label for="passage_price_children">Preço da passagem unitária criança</label>
		<input name="passage_price_children" type="text" value="<?=set_value('passage_price_children',$package->passage_price_children)?>" />
	
		<label for="estimated_adult">Número de adultos estimadas</label>
		<input name="estimated_adult" type="number" value="<?=set_value('estimated_adult',$package->estimated_adult)?>" />
	
		<label for="estimated_children">Número de crianças estimadas</label>
		<input name="estimated_children" type="number" value="<?=set_value('estimated_children',$package->estimated_children)?>" />	
	
		<input type="submit" />
	</form>
	
	<?php $data['package_days'] = $package->get_package_days();
	      $data['package'] = $package; 
	      $this->load->view('admin/package/days/index',$data); 
	?>
<?php else: ?>
	<p>Esse passeio não existe </p>
<?php endif; ?>
