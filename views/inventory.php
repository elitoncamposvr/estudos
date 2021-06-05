<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-boxes fa-lg icon"></i>
			<p>Estoque</p>
		</div>
	</div>

	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<?php if ($add_permission) : ?>
				<a class="btn" href="<?php echo BASE_URL; ?>inventory/add">Novo Produto</a>
			<?php endif; ?>
		</p>
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>inventory/products">Listagem de Produtos</a>
			<a class="btn" href="#">Pesquisa Avançada</a>
		</p>
	</div>

	<!-- Pesquisa de Produto (Product Search) -->
	<div class="search_inventory">
		<form action="<?php echo BASE_URL; ?>inventory/search">
			<p class="mb-s">Faça sua pesquisa dos produtos cadastrados</p>
			<pre class="mb-el">* Pesquise por nome de produto, código ou código original</pre>
			<span class="mb-2"><input type="text" class="search_products" name="sp" id="sp" placeholder="Pesquisa de Produtos" required></span>
			<span><button type="submit"><i class="fas fa-search"></i> Pesquisar</button></span>
		</form>
	</div>
</div>