<div class="content">

	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações <i class="fas fa-angle-right fa-xs"></i> Marca de Produtos</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>settings"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>


	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>inventory/addbrand">Adicionar Marca</a>
		</p>
		<p>
			<input type="text" id="busca" data-type="search_inventory_brand" placeholder="Pesquisar Marca">
		</p>
	</div>

	<!-- Cabeçalho Tabela (Table Header) -->
	<?php if ($brand_list) : ?>
		<div class="table_header">
			<div class="w-80 txt-up">Nome da Marca</div>
			<div class="w-20 txt-center">Ações</div>
		</div>


		<!-- Dados Tabela (Table Data) -->
		<?php foreach ($brand_list as $bl) : ?>
			<div class="table_data">
				<div class="w-80"><?php echo $bl['name_product']; ?></div>
				<div class="w-20 txt-center">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/edit_brand/<?php echo $bl['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>inventory/delete_brand/<?php echo $bl['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
								</ul>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
</div>


<!-- Paginação (Pagination) -->
<div class="pagination">
	<a class="pag_item" href="<?php echo BASE_URL; ?>inventory/brand?p=1">Primeira</a>
	<?php
		for ($q = $p - 5; $q <= $p - 1; $q++) {
			if ($q >= 1) { ?>
			<a class="pag_item" href="<?php echo BASE_URL; ?>inventory/brand?p=<?php echo $q; ?>"><?php echo $q; ?></a>
	<?php }
		} ?>
	<div class="pag_item pag_active"><?php echo "$q"; ?></div>
	<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
			if ($q <= $p_count) { ?>
			<a class="pag_item" href="<?php echo BASE_URL; ?>inventory/brand?p=<?php echo $q; ?>"><?php echo $q; ?></a>
	<?php }
		}
	?>
	<a class="pag_item" href="<?php echo BASE_URL; ?>inventory/brand?p=<?php echo $p_count; ?>">Última</a>
</div>

<?php else : ?>
	<div class="flash_info my-x">
		<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>