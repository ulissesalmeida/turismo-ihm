

<h1> Hospedagens </h1>
<p><a href="/admin/hostels/new" > Nova hospedagem </a></p>
<?php if($hostels && count($hostels) > 0):?>
<ul>
	<?php foreach ($hostels as $hostel):?>
	
		<li><?=$hostel->name?>
			<a href="/admin/hostels/edit/<?=$hostel->id?>">Editar</a>
			<a href="/admin/hostels/delete/<?=$hostel->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há hospedagens cadastradas </p>
<?php endif; ?>
