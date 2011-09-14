<h2> Diárias </h2>
<p><a href="/admin/packages/<?=$package->id?>/days/new" > Novo dia </a></p>
<?php if(count($package_days) > 0):?>

<ul>
	<?php foreach ($package_days as $package_day):?>
		
		<li>Data:<?=$package_day->date?>
		<a href="/admin/packagedays/edit/<?=$package_day->id?>">Editar</a>
			<a href="/admin/packagedays/delete/<?=$package_day->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há diárias cadastrados </p>
<?php endif; ?>
