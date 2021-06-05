<div class="content">

	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-boxes fa-lg icon"></i>
			<p>Estoque <i class="fas fa-angle-right fa-xs"></i> Editar Produto</p>
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
				<input type="text" class="w-100" name="name_product" id="name_product" required value="<?php echo $inventory_info['name_product']; ?>">
			</div>
			<div class="w-30 my-s mr-m">
				<label for="product_code">Código do Produto</label>
				<input type="text" class="w-100" name="product_code" id="product_code" required value="<?php echo $inventory_info['product_code']; ?>">
			</div>
			<div class="w-30 my-s">
				<label for="original_code">Código Original/OEM</label>
				<input type="text" class="w-100" name="original_code" id="original_code" value="<?php echo $inventory_info['original_code']; ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-50 my-s mr-m">
				<label for="id_brand">Marca</label>
				<select name="id_brand" id="id_brand" class="w-100">
					<option value="">Marca</option>
					<?php foreach ($brand_list2 as $bd) : ?>
						<option value="<?php echo $bd['id']; ?>" <?php if ($inventory_info['id_brand'] == $bd['id']) {
																		echo 'selected="selected"';
																	} else {
																		echo '';
																	} ?>><?php echo $bd['name_product']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="w-50 my-s">
				<label for="id_provider">Fornecedor</label>
				<select name="id_provider" id="id_provider" class="w-100">
					<option value="">Fornecedor</option>
					<?php foreach ($provider_list as $pd) : ?>
						<option value="<?php echo $pd['id']; ?>" <?php if ($inventory_info['id_provider'] == $pd['id']) {
																		echo 'selected="selected"';
																	} else {
																		echo '';
																	} ?>><?php echo $pd['social_reason']; ?></option>
					<?php endforeach; ?>
				</select>
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="purchase_price">Preço de Compra</label>
				<input type="text" class="w-100" name="purchase_price" id="purchase_price" value="<?php echo number_format($inventory_info['purchase_price'], 2, ',', '.'); ?>" onblur="profitCalcSale()">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="profit">Lucro %</label>
				<input type="text" class="w-100" name="profit" id="profit" value="<?php echo $inventory_info['profit']; ?>" onblur="valueCalcSale()">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="price">Preço de Venda</label>
				<input type="text" class="w-100" name="price" id="price" required value="<?php echo number_format($inventory_info['price'], 2, ',', '.'); ?>" onblur="profitCalc()">
			</div>
			<div class="w-25 my-s">
				<label for="min_price">Preço Mínimo</label>
				<input type="text" class="w-100" name="min_price" id="min_price" value="<?php echo number_format($inventory_info['min_price'], 2, ',', '.'); ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="quant">Quantidade</label>
				<input type="text" class="w-100" name="quant" id="quant" value="<?php echo $inventory_info['quant']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="ideal_quant">Quantidade Ideal</label>
				<input type="text" class="w-100" name="ideal_quant" id="ideal_quant" value="<?php echo $inventory_info['ideal_quant']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="min_quant">Quantidade Mínima</label>
				<input type="text" class="w-100" name="min_quant" id="min_quant" value="<?php echo $inventory_info['min_quant']; ?>">
			</div>
			<div class="w-25 my-s">
				<label for="unity">Unidade</label>
				<select class="w-100" name="unity" id="unity">
				<option value="UN" <?php if ($inventory_info['unity'] == 'UN') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>UN - UNIDADE</option>

				<option value="PC" <?php if ($inventory_info['unity'] == 'PC') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>PC - PEÇA</option>
				<option value="KT" <?php if ($inventory_info['unity'] == 'KT') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>KT - KIT</option>
				<option value="JG" <?php if ($inventory_info['unity'] == 'JG') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>JG - JOGO</option>
				<option value="KG" <?php if ($inventory_info['unity'] == 'KG') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>KG - KILO</option>
				<option value="CM" <?php if ($inventory_info['unity'] == 'CM') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>CM - CENTÍMETRO</option>
				<option value="MT" <?php if ($inventory_info['unity'] == 'MT') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>MT - METRO</option>
				<option value="LT" <?php if ($inventory_info['unity'] == 'LT') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>LT - LITRO</option>
				<option value="BD" <?php if ($inventory_info['unity'] == 'BD') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>BD - BALDE</option>
				<option value="CT" <?php if ($inventory_info['unity'] == 'CT') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>CT - CENTO</option>
				<option value="DZ" <?php if ($inventory_info['unity'] == 'DZ') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>DZ - DÚZIA</option>
				<option value="FD" <?php if ($inventory_info['unity'] == 'FD') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>FD - FARDO</option>
				<option value="PCT" <?php if ($inventory_info['unity'] == 'PCT') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>PCT - PACOTE</option>
				<option value="PAR" <?php if ($inventory_info['unity'] == 'PAR') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>PAR - PARES</option>
				<option value="TON" <?php if ($inventory_info['unity'] == 'TON') {
										echo 'selected="selected"';
									} else {
										echo '';
									} ?>>TON - TONELADA</option>
			</select>
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="location">Localização</label>
				<input type="text" class="w-100" name="location" id="location" value="<?php echo $inventory_info['location']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="drawer">Gaveta/Caixa</label>
				<input type="text" class="w-100" name="drawer" id="drawer" value="<?php echo $inventory_info['drawer']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="bar-code">Código de Barras</label>
				<input type="text" class="w-100" name="bar_code" id="bar_code" value="<?php echo $inventory_info['bar_code']; ?>">
			</div>
			<div class="w-25 my-s"></div>
		</div>
		<div class="w-100">
			<label class="w-100" for="product_info">Informações Adicionais</label>
			<textarea class="w-100" name="product_info" id="product_info" class="product_info"><?php echo $inventory_info['product_info']; ?></textarea>
		</div>

		<!-- Botões (Button) -->
		<div class="w-100 txt-center my-el">
			<button type="submit">
				Editar Produto
			</button>
		</div>
	</form>
</div>
<!-- Scripts JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>