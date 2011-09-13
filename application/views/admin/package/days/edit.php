<?php 

	$rooms_options = array();
	
	if($rooms && count($rooms) > 0){
		foreach ($rooms as $room){
			$rooms_options[$room->id] =  $room->get_room_summary();
		}
	}

?>

<?php if ($package_day): ?>

<h1>Editando diária</h1>
<form method="post" action="/admin/packagedays/update">

	<input type="hidden" name="tour_package" value="<?=set_value('tour_package',$package_day->tour_package)?>" />
	<input type="hidden" name="id" value="<?=set_value('id',$package_day->id)?>" />
		
	<label for="date">Data:</label>
	<input type="date" name="date" value="<?=set_value('date',$package_day->date_br())?>"></input>
	
	<label for="rooms[]">Selecione o quarto</label>
	<?=form_dropdown('rooms[]',$rooms_options, $package_day->rooms_first()->id)?>
		
	<input type="submit" />
</form>
<?php else: ?>
 <p> Diária não existe </p>
<?php endif; ?>
