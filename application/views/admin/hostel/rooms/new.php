<h1>Novo quarto</h1>
<form method="post" action="/admin/rooms/create">

	<input type="hidden" name="hostel_id" value="<?=$hostel->id?>" />
	<p>	
		<label for="single_beds">Camas de solteiro</label>
		<input type="number" name="single_beds"></input>
	</p>
	<p>
		<label for="double_beds">Camas de casado</label>
		<input type="number" name="double_beds"></input>
	</p>
	<p>
		<label for="price">Preço</label>
		<input type="text" name="price"></input>
	</p>
	<p>
		<label for="name">Descrição</label><br/>
		<textarea name="description"></textarea>
	</p>
	<p>	
		<input class="button" type="submit" value="Salvar" />
	</p>
</form>
