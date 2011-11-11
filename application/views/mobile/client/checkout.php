<?php
	$items['mobile/packages/show/'.$package->id] = "Voltar";
	$data['items'] = $items;
	$this->load->view('mobile/common/menu',$data);
?>
<h1> Resumo </h1>
<p>
	Viagem para: <strong><?=$package->country?> - <?=$package->state?> - <?=$package->city?></strong> 
</p>
<p>
	Tipo: <strong><?=$package->get_transport_type_str()?></strong>  -
	<strong> <?=$package->date_br('begin_date')?> </strong> até <strong> <?=$package->date_br('end_date')?> </strong>
</p>
<p>			
	<strong> Adultos: </strong> <?=$package->estimated_adult?>
	<strong> Crianças: </strong> <?=$package->estimated_children?>
</p>
<p>	Preço Total: <strong> R$ <?=$total_price?>  </strong> </p>

<h1> O comprovante de sua compra será enviado por e-mail! </h1>

<h2> Dados para compra (Mastercard) </h2>
<form action="mobile/client/buy" method="POST">
	<input name="package_id" type="hidden" value="<?=$package->id?>" />
	<input name="total_price" type="hidden" value="<?=$total_price?>" />
	<?php foreach($tours as $tour_id): ?>
		<input name="tours[]" type="hidden" value="<?=$tour_id?>" />
	<?php endforeach; ?>
	<ul class="fields-list">
		<li>
			<label for="credit_card_number">Número do cartão</label><br/>
			<input name="credit_card_number" type="text" />
		</li>
		<li>
			<label>Vencimento</label><br/>
			<input name="expiration_month" style="width:20px" maxlength="2"  type="text" />
			<input name="expiration_year" style="width:40px" maxlength="4" type="text" />
		</li>
		<li>
			<label for="security_number">Código de segurança</label><br/>
			<input name="security_number" maxlength="3" type="text" />
		</li>
		<li>
			<label for="name">Nome do jeito que está escrito no cartão</label><br/>
			<input name="name" type="text" />
		</li>
		<li>
			<label for="email">E-mail</label><br/>
			<input name="email" type="email" />
		</li>
		<li>
			<p><em>Os dados do seu cartão não serão armazenados </em>
		</li>
		<li>
			<input type="submit" class="button" />
		</li>
	</ul>
</form>
