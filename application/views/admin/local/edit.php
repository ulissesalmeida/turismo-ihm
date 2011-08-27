<?php if ($local): ?>
	<h1>Editar local</h1>	
	<?=form_open('/admin/places/update')?>
		<input type="hidden" name="id" value="<?=set_value('id',$local->id)?>" />
		<label for="country">País</label>
		<input name="country" type="text" value="<?=set_value('country',$local->country)?>" />
		
		<label for="state">Estado</label>
		<input name="state" type="text" value="<?=set_value('state',$local->state)?>"/>	
		
		<label for="city">Cidade</label>
		<input name="city" type="text" value="<?=set_value('city',$local->city)?>"/>
		
		<input type="submit" />
	<?=form_close()?>
<?php else:?>
	<p> Local não existe </p>
<?php endif;?>