<?php
	 $this->load->view('mobile/common/menu');
?>

<h1> Pesquisar pedido </h1>
<form method="POST" action="mobile/client/show_purchase_s">
	<ul class="fields-list">
		<li> 
			<strong>Código do pedido:</strong>
			<input name="sale_code" type="text" />
		</li>
		<li>
			<input type="submit" class="button" />
		</li>
	</ul>
</form>
