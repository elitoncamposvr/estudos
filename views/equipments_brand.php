<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Veículos<i class="fas fa-angle-right fa-xs"></i>Marcas</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>equipments/settings"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Botões (Buttons) -->
	<?php if ($equipments_brands_list) : ?>
		<div class="menu_data">
			<p>
				<a class="btn" href="<?php echo BASE_URL; ?>equipments/add_brand">Nova Marca</a>
			</p>
			<p>
				<a class="btn" href="<?php echo BASE_URL; ?>equipments">Modelos de Veículos</a>
			</p>
		</div>

		<!-- Cabeçalho da Tabela (Table Header) -->
		<div class="table_header">
			<div class="w-90 my-s mr-m">Marca do Veículo</div>
			<div class="w-10 my-s"></div>
		</div>

		<!-- Dados da Tabela (Table Data) -->
		<?php foreach ($equipments_brands_list as $eq_list) : ?>
			<div class="table_data">
				<div class="w-90 txt-up my-s mr-m"><?php echo $eq_list['name_brand']; ?></div>
				<div class="w-10 my-s">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<ul>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>equipments/edit_brand/<?php echo $eq_list['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>equipments/delete_brand/<?php echo $eq_list['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
</div>

<!-- Paginação (Pagination) -->
<?php if ($p_count > 1) { ?>
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>equipments/brands?p=1">Primeira</a>
		<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>equipments/brands?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			} ?>
		<div class="pag_item pag_active"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>equipments/brands?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			}
		?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>equipments/brands?p=<?php echo $p_count; ?>">Última</a>
	</div>
<?php } ?>
<?php else : ?>
	<div class="flash_info my-x">
		<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>