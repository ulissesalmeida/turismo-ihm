<?php 

	$places_options = array();
	
	if($places && count($places) > 0){
		foreach ($places as $local){
			$places_options[$local->id] =  $local->get_description();
		}
	}

?>

<?php if ($hostel): ?>
	<h1>Editar Hospedagem</h1>	
	<?=form_open('/admin/hostels/update')?>
		<input type="hidden" name="id" value="<?=set_value('id',$hostel->id)?>" />
		<label for="name">Nome</label>
		<input name="name" type="text" value="<?=set_value('name',$hostel->name)?>" />
		
		<label for="local">Local</label>
		<?=form_dropdown('local',$places_options,$hostel->local_id)?>
				
		<input type="submit" />
	<?=form_close()?>
	<?php $data['rooms'] = $hostel->get_rooms();
	      $data['hostel'] = $hostel; 
	      $this->load->view('admin/hostel/rooms',$data); 
	?>
<?php else:?>
	<p> Hospedagem não existe </p>
<?php endif;?>
