

<h1> Locais </h1>
<p><a href="/admin/places/new" > Novo local </a></p>
<?php if($places && count($places) > 0):?>
<ul class="list">
	<?php foreach ($places as $local):?>
	
		<li><p><?=$local->get_description()?></p>
			<p class="command-links">
				<a href="/admin/places/edit/<?=$local->id?>">Editar</a> |
				<a href="/admin/places/delete/<?=$local->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há locais cadastrados </p>
<?php endif; ?>
