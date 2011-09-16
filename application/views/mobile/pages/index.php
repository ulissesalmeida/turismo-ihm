<nav id="places">
				<ul>
					<li><a><img src="img/mobile/br.jpg" /></a></li>
					<li><a><img src="img/mobile/eu.jpg"></a></li>
					<li><a><img src="img/mobile/eua.jpg"></a></li>
				</ul>
</nav>

<?php 

	$items['/mobile/search'] = 'Buscar pacote turístico';
	$items['/mobile/client/cart'] = 'Meu carrinho';
	$items['/mobile/pages/about'] = 'Sobre a PVC Turismo';
	$data['items'] = $items;
	$this->load->view('mobile/common/menu',$data); 

?>


