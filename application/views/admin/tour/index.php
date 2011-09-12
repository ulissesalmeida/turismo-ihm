

<h1> Passeios </h1>
<p><a href="/admin/tours/new" > Novo passeio </a></p>
<?php if($tours && count($tours) > 0):?>
<ul>
	<?php foreach ($tours as $tour):?>
	
		<li><?=$tour->name?>
			<a href="/admin/tours/edit/<?=$tour->id?>">Editar</a>
			<a href="/admin/tours/delete/<?=$tour->id?>">Excluir</a>
		</li>
	<?php endforeach;?>
</ul>
<?php else :?>
	 <p> Não há passeios cadastrados </p>
<?php endif; ?>
