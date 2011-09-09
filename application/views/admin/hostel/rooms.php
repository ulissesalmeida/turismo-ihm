<h1> Quartos </h1>
<p><a href="/admin/hostel/<?=$hostel->id?>/rooms/new" > Novo quarto </a></p>
<?php if(count($rooms) > 0):?>
<ul>
	<?php foreach ($rooms as $room):?>
	
		<li><?=$room->description?>
			<a href="/admin/hostels/edit/<?=$room->id?>">Editar</a>
			<a href="/admin/hostels/delete/<?=$room->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há quartos cadastrados </p>
<?php endif; ?>
