<h2> Diárias </h2>
<p><a href="/admin/packages/<?=$package->id?>/days/new" > Novo dia </a></p>
<?php if(count($package_days) > 0):?>

<ul class="list">
	<?php foreach ($package_days as $package_day):?>
	<?php $room = $package_day->rooms_first(); ?>
		
		<li>
			<p>Data:<?=$package_day->date?> - Hospedagem: <?=$room->name?></p>
			<p>
				<?=$room->get_beds_description()?>
			</p>
			<p>
				<em><?=$room->description?></em>
			</p>
			<p class="command-links">
				<a href="/admin/packagedays/edit/<?=$package_day->id?>">Editar</a>
				<a href="/admin/packagedays/delete/<?=$package_day->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há diárias cadastrados </p>
<?php endif; ?>
