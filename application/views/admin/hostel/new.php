<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>
<h1>Nova hospedagem</h1>
<form method="post" action="/admin/hostels/create">	
	<p>
		<label for="name">Nome</label>
		<input name="name" type="text" />
	</p>
	<p>
		<label for="local">Local</label>
		<?=form_dropdown('local',$places_options)?>
	</p>

	<input class="button" type="submit" value="Salvar" />
</form>
