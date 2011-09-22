

<h1> Passeios </h1>
<p><a href="/admin/tours/new" > Novo passeio </a></p>
<?php if($tours && count($tours) > 0):?>
<ul class="list">
	<?php foreach ($tours as $tour):?>
	
		<li><p><?=$tour->name?></p>
			<p><em><?=$tour->description?></em></p>
			<p class="command-links">
				<a href="/admin/tours/edit/<?=$tour->id?>">Editar</a> |
				<a href="/admin/tours/delete/<?=$tour->id?>">Excluir</a>
			</p>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há passeios cadastrados </p>
<?php endif; ?>
