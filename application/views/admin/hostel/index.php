

<h1> Hospedagens </h1>
<p><a href="/admin/hostels/new" > Nova hospedagem </a></p>
<?php if($hostels && count($hostels) > 0):?>
<ul class="list">
	<?php foreach ($hostels as $hostel):?>
	
		<li><p><?=$hostel->name?></p>
			<p class="command-links">
			<a href="/admin/hostels/edit/<?=$hostel->id?>">Editar</a> |
			<a href="/admin/hostels/delete/<?=$hostel->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há hospedagens cadastradas </p>
<?php endif; ?>
