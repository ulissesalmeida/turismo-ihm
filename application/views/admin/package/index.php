<h1> Pacotes </h1>
<p><a href="/admin/packages/new" > Novo pacote turístico </a></p>
<?php if($packages && count($packages) > 0):?>
<ul class="list">
	<?php foreach ($packages as $package):?>
	
		<li><p>
				Pacote ID: <?=$package->id?> - 
				Preço adulto: <?=$package->passage_price_adult?> 
				Preço criança: - <?=$package->passage_price_children?>
			</p>
			<p>
				Crianças: <?=$package->estimated_adult?> 
				Adultos: <?=$package->estimated_children?> 
			</p>
			<p class="command-links">
				<a href="/admin/packages/edit/<?=$package->id?>">Editar</a> |
				<a href="/admin/packages/delete/<?=$package->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há pacotes cadastrados </p>
<?php endif; ?>
