<h1>Novo quarto</h1>
<form method="post" action="/admin/rooms/create">

	<input type="hidden" name="hostel_id" value="<?=$hostel->id?>" />
		
	<label for="single_beds">Camas de solteiro</label>
	<input type="number" name="single_beds"></input>
	
	<label for="double_beds">Camas de casado</label>
	<input type="number" name="double_beds"></input>
	
	<label for="price">Preço</label>
	<input type="text" name="price"></input>
	
	<label for="name">Descrição</label>
	<textarea name="description"></textarea>
		
	<input type="submit" />
</form>
