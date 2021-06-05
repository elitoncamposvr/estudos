<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-boxes fa-lg icon"></i>
			<p>Estoque <i class="fas fa-angle-right fa-xs"></i> Adicionar Produto</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>inventory"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Mensagem de Erro (Error Message) -->
	<?php if (isset($error_msg) && !empty($error_msg)) : ?>
		<div class="flash_warning"><?php echo $error_msg; ?></div>
	<?php endif; ?>

	<!-- Formulário Adicionar (Add Form) -->
	<form method="POST">
		<div class="fb-100">
			<div class="w-40 my-s mr-m">
				<label for="name_product">Nome do Produto</label>
				<input type="text" class="w-100" name="name_product" id="name_product" required autofocus>
			</div>
			<div class="w-30 my-s mr-m">
				<label for="product_code">Código do Produto</label>
				<input type="text" class="w-100" name="product_code" id="product_code" required>
			</div>
			<div class="w-30 my-s">
				<label for="original_code">Código Original/OEM</label>
				<input type="text" class="w-100" name="original_code" id="original_code">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-50 my-s mr-m">
				<label for="id_brand">Marca</label>
				<select name="id_brand" id="id_brand" class="w-100">
					<option value="">Marca</option>
					<?php foreach ($brand_list2 as $b_list) : ?>
						<option value="<?php echo $b_list['id']; ?>"><?php echo $b_list['name_product']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="w-50 my-s">
				<label for="id_provider">Fornecedor</label>
				<select name="id_provider" id="id_provider" class="w-100">
					<?php foreach ($provider_list as $pd) : ?>
						<option value="<?php echo $pd['id']; ?>"><?php echo $pd['social_reason']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="purchase_price">Preço de Compra</label>
				<input type="text" class="w-100" name="purchase_price" id="purchase_price" onblur="profitCalcSale()">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="profit">Lucro %</label>
				<input type="text" class="w-100" name="profit" id="profit" onblur="valueCalcSale()">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="price">Preço de Venda</label>
				<input type="text" class="w-100" name="price" id="price" required onblur="profitCalc()">
			</div>
			<div class="w-25 my-s">
				<label for="min_price">Preço Mínimo</label>
				<input type="text" class="w-100" name="min_price" id="min_price">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="quant">Quantidade</label>
				<input type="text" class="w-100" name="quant" id="quant">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="ideal_quant">Quantidade Ideal</label>
				<input type="text" class="w-100" name="ideal_quant" id="ideal_quant">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="min_quant">Quantidade Mínima</label>
				<input type="text" class="w-100" name="min_quant" id="min_quant">
			</div>
			<div class="w-25 my-s">
				<label for="unity">Unidade</label>
				<select class="w-100" name="unity" id="unity">
					<option value="UN">UN - UNIDADE</option>
					<option value="PC">PC - PEÇA</option>
					<option value="KT">KT - KIT</option>
					<option value="JG">JG - JOGO</option>
					<option value="KG">KG - KILO</option>
					<option value="CM">CM - CENTÍMETRO</option>
					<option value="MT">MT - METRO</option>
					<option value="LT">LT - LITRO</option>
					<option value="LT">BD - BALDE</option>
					<option value="LT">CT - CENTO</option>
					<option value="LT">DZ - DÚZIA</option>
					<option value="LT">FD - FARDO</option>
					<option value="LT">PCT - PACOTE</option>
					<option value="LT">PAR - PARES</option>
					<option value="LT">TON - TONELADA</option>
				</select>
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="location">Localização</label>
				<input type="text" class="w-100" name="location" id="location">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="drawer">Gaveta/Caixa</label>
				<input type="text" class="w-100" name="drawer" id="drawer">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="bar-code">Código de Barras</label>
				<input type="text" class="w-100" name="bar_code" id="bar_code">
			</div>
			<div class="w-25 my-s"></div>
		</div>
		<div class="w-100">
			<label class="w-100" for="product_info">Informações Adicionais</label>
			<textarea class="w-100" name="product_info" id="product_info" class="product_info"></textarea>
		</div>

		<!-- Botões (Button) -->
		<div class="w-100 txt-center my-el">
			<button type="submit">
				Adicionar Produto
			</button>
		</div>

	</form>
</div>

<!-- Scripts JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>