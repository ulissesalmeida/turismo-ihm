<h2> Quartos </h2>
<p><a href="/admin/hostels/<?=$hostel->id?>/rooms/new" > Novo quarto </a></p>
<?php if(count($rooms) > 0):?>
<ul>
	<?php foreach ($rooms as $room):?>
	
		<li><?=$room->get_description()?>
			<a href="/admin/rooms/edit/<?=$room->id?>">Editar</a>
			<a href="/admin/rooms/delete/<?=$room->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há quartos cadastrados </p>
<?php endif; ?>
