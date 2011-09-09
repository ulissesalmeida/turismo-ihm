<?php if ($room): ?>

<h1>Editando o quarto</h1>
<form method="post" action="/admin/rooms/update">

	<input type="hidden" name="id" value="<?=set_value('id',$room->id)?>" />
	<input type="hidden" name="hostel_id" value="<?=set_value('hostel_id',$room->hostel_id)?>" />
	
		
	<label for="single_beds">Camas de solteiro</label>
	<input type="number" name="single_beds"  value="<?=set_value('single_beds',$room->single_beds)?>"></input>
	
	<label for="double_beds">Camas de casado</label>
	<input type="number" name="double_beds"  value="<?=set_value('double_beds',$room->double_beds)?>"></input>
	
	<label for="price">Preço</label>
	<input type="text" name="price" value="<?=set_value('price',$room->price)?>"></input>
	
	<label for="name">Descrição</label>
	<textarea name="description"><?=set_value('description',$room->description)?></textarea>
		
	<input type="submit" />
</form>

<?php else:?>
	<p> Quarto não existe </p>
<?php endif;?>
