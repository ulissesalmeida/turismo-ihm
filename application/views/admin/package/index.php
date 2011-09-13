<h1> Pacotes </h1>
<p><a href="/admin/packages/new" > Novo pacote turístico </a></p>
<?php if($packages && count($packages) > 0):?>
<ul>
	<?php foreach ($packages as $package):?>
	
		<li>Cód:<?=$package->id?> - <?=$package->destination_id?>
			<a href="/admin/packages/edit/<?=$package->id?>">Editar</a>
			<a href="/admin/packages/delete/<?=$package->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há pacotes cadastrados </p>
<?php endif; ?>
