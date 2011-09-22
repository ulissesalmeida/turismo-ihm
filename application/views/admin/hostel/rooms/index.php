<h2> Quartos </h2>
<p><a href="/admin/hostels/<?=$hostel->id?>/rooms/new" > Novo quarto </a></p>
<?php if(count($rooms) > 0):?>
<ul class="list">
	<?php foreach ($rooms as $room):?>
	
		<li><p><?=$room->get_description()?></p>
			<p><em><?=$room->description?></em></p>
			<p class="command-links">
				<a href="/admin/rooms/edit/<?=$room->id?>">Editar</a> |
				<a href="/admin/rooms/delete/<?=$room->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há quartos cadastrados </p>
<?php endif; ?>
