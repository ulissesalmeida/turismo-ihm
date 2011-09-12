<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>

<?php if ($tour): ?>
	<h1>Editando passeio </h1>
	<form method="post" action="/admin/tours/update">
		
		<input name="id" type="hidden" value="<?=set_value('id',$tour->id)?>">
	
		<label for="local">Local<?=$tour->local_id?></label>
		<?=form_dropdown('local',$places_options,$tour->local_id)?>
	
		<label for="name">Nome</label>
		<input name="name" type="text" value="<?=set_value('name',$tour->name)?>" />
	
		<label for="price_adult">Unitário adulto</label>
		<input name="price_adult" type="text" value="<?=set_value('name',$tour->price_adult)?>" />
	
		<label for="price_children">Unitário criança</label>
		<input name="price_children" type="text" value="<?=set_value('name',$tour->price_children)?>" />		
	
		<label for="description">Descrição</label>
		<textarea name="description" ><?=set_value('name',$tour->description)?></textarea>
	
		<input type="submit" />
	</form>
<?php else: ?>
	<p>Esse passeio não existe </p>
<?php endif; ?>
