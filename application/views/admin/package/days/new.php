<?php 

	$rooms_options = array();
	
	if($rooms && count($rooms) > 0){
		foreach ($rooms as $room){
			$rooms_options[$room->id] =  $room->get_room_summary();
		}
	}

?>

<h1>Nova diária</h1>
<form method="post" action="/admin/packagedays/create">

	<input type="hidden" name="tour_package" value="<?=$package->id?>" />
		
	<label for="date">Data:</label>
	<input type="date" name="date"></input>
	
	<label for="rooms[]">Selecione o quarto</label>
	<?=form_dropdown('rooms[]',$rooms_options)?>
		
	<input type="submit" />
</form>
