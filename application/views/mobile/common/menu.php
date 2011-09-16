


<nav id="navigation">
	<ul>
		<?php if(isset($items) && count($items) > 0): ?>
			<?php foreach($items as $key => $value): ?>
				<li>
					<a href="<?=$key?>" title="<?=$value?>"> <?=$value?> </a>
				</li>
			<?endforeach; ?>
		<?php else: ?>
				<li>
					<a href="/" title="Voltar"> Voltar </a>
				</li>
		<?php endif; ?>
	</ul>
</nav>
