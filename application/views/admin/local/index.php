

<h1> Locais </h1>
<p><a href="/admin/places/new" > Novo local </a></p>
<?php if($places && count($places) > 0):?>
<ul>
	<?php foreach ($places as $local):?>
	
		<li><?=$local->city.' - '.$local->state.' - '.$local->country?>
			<a href="/admin/places/edit/<?=$local->id?>">Editar</a>
			<a href="/admin/places/delete/<?=$local->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> </p><
<?php endif; ?>