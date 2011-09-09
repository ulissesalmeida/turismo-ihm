<h1> Quartos </h1>
<p><a href="/admin/hostels/<?=$hostel->id?>/rooms/new" > Novo quarto </a></p>
<?php if(count($rooms) > 0):?>
<ul>
	<?php foreach ($rooms as $room):?>
	
		<li>Cód: <?=$room->id?> | Camas[ Solteiro:<?=$room->single_beds?> | Casal: <?=$room->double_beds?> ] | Preço: <?=$room->price?>
			<a href="/admin/rooms/edit/<?=$room->id?>">Editar</a>
			<a href="/admin/rooms/delete/<?=$room->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há quartos cadastrados </p>
<?php endif; ?>
