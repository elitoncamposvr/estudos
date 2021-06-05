<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-boxes fa-lg icon"></i>
            <p>Estoque <i class="fas fa-angle-right fa-xs"></i> Resultados de Pesquisa</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>inventory"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
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
            <a class="btn" href="<?php echo BASE_URL; ?>inventory">Nova Pesquisa</a>
        </p>
    </div>

    <!-- Cabeçalho da Tabela (Table Header) -->
	<?php if ($inventory_list) : ?>
		<div class="table_header">
			<div class="w-30">Nome</div>
			<div class="w-15">Código</div>
			<div class="w-15">Cód. Original</div>
			<div class="w-10">Preço</div>
			<div class="w-10">Localização</div>
			<div class="w-10">Quant.</div>
			<div class="w-10"></div>
		</div>

		<!-- Dados da Tabela (Table Data) -->
		<?php foreach ($inventory_list as $product) : ?>
			<div class="table_data">
				<div class="w-30 txt-up"><?php echo $product['name_product']; ?></div>
				<div class="w-15 txt-up"><?php echo $product['product_code']; ?></div>
				<div class="w-15 txt-up"><?php echo $product['original_code']; ?></div>
				<div class="w-10">R$ <?php echo number_format($product['price'], 2, ',', '.'); ?></div>
				<div class="w-10 txt-up"><?php echo $product['drawer']; ?></div>
				<div class="w-10"><?php echo $product['quant']; ?></div>
				<div class="w-10">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<?php if ($edit_permission) : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/edit/<?php echo $product['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/delete/<?php echo $product['id']; ?>" onclick="return confirm('Deseja realmente excuir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
								</ul>
							<?php else : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/view/<?php echo $product['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>

        <!-- Paginação (Pagination) -->
        <!-- <div class="pagination">
			<a class="pag_item" href="<?php echo BASE_URL; ?>search?p=1">Primeira</a>
			<?php
            for ($q = $p - 5; $q <= $p - 1; $q++) {
                if ($q >= 1) { ?>
					<a class="pag_item" href="<?php echo BASE_URL; ?>search?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
            } ?>
			<div class="pag_item pag_active"><?php echo "$q"; ?></div>
			<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
                if ($q <= $p_count) { ?>
					<a class="pag_item" href="<?php echo BASE_URL; ?>search?p=<?php echo $q; ?>"><?php echo $q; ?></a>
			<?php }
            }
            ?>
			<a class="pag_item" href="<?php echo BASE_URL; ?>search?p=<?php echo $p_count; ?>">Última</a>
		</div> -->

    <?php else : ?>
        <div class="flash_info my-el">
            <p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
        </div>
        <div class="search_inventory">
            <form action="<?php echo BASE_URL; ?>inventory/search">
                <p class="mb-s">Faça sua pesquisa dos produtos cadastrados</p>
                <pre class="mb-el">* Pesquise por nome de produto, código ou código original</pre>
                <span class="mb-2"><input type="text" class="search_products" name="sp" id="sp" placeholder="Pesquisa de Produtos" required></span>
                <span><button type="submit"><i class="fas fa-search"></i> Pesquisar</button></span>
            </form>
        </div>
    <?php endif; ?>
</div>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>