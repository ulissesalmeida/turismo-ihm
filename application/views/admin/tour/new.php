<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>

<h1>Novo passeio</h1>
<form method="post" action="/admin/tours/create">
	
	<label for="local">Local</label>
	<?=form_dropdown('local',$places_options)?>
	
	<label for="name">Nome</label>
	<input name="name" type="text" />
	
	<label for="price_adult">Unitário adulto</label>
	<input name="price_adult" type="text" />
	
	<label for="price_children">Unitário criança</label>
	<input name="price_children" type="text" />		
	
	<label for="description">Descrição</label>
	<textarea name="description" ></textarea>
	
	<input type="submit" />
</form>
