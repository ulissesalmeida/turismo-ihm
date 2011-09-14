<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>
<?php if ($hostel): ?>
	<h1>Editando a hospedagem</h1>	
	<?=form_open('/admin/hostels/update')?>
		<input type="hidden" name="id" value="<?=set_value('id',$hostel->id)?>" />
		<p>
			<label for="name">Nome</label>
			<input name="name" type="text" value="<?=set_value('name',$hostel->name)?>" />
		</p>
		<p>
			<label for="local">Local</label>
			<?=form_dropdown('local',$places_options,$hostel->local_id)?>
		</p>
				
		<input class="button" type="submit" value="Salvar" />
	<?=form_close()?>
	<?php $data['rooms'] = $hostel->get_rooms();
	      $data['hostel'] = $hostel; 
	      $this->load->view('admin/hostel/rooms/index',$data); 
	?>
<?php else:?>
	<p> Hospedagem não existe </p>
<?php endif;?>
