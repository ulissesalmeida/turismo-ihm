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
	<p>
		<label for="local">Local</label>
		<?=form_dropdown('local',$places_options)?>
	</p>	
	<p>
		<label for="name">Nome</label>
		<input name="name" type="text" />
	</p>
	<p>
		<label for="price_adult">Preço Unitário adulto</label>
		<input name="price_adult" type="text" />
	</p>
	<p>
		<label for="price_children">Preço Unitário criança</label>
		<input name="price_children" type="text" />		
	</p>
	<p>
		<label for="description">Descrição</label> <br/>
		<textarea name="description" ></textarea>
	</p>
	<input class="button" type="submit" value="Salvar" />
</form>
