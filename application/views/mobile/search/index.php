<?php 

	$countries_options = array();
	
	if($countries && count($countries) > 0){
		foreach ($countries as $local){
			$countries_options[$local->country] =  $local->country;
		}
	}

?>
<?php $this->load->view('mobile/common/menu'); ?>

<h1>Busca </h1>
<form method="post" action="/mobile/search/search_tours">
	<p>
		<label>País</label>
		<br/>
		<?=form_dropdown('country',$countries_options)?>
	</p> 
	<input type="submit" class="button" value="Buscar">
</form>
