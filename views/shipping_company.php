<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-shipping-fast fa-lg icon"></i>
			<p>Transportadoras</p>
		</div>
	</div>

	<!-- Botões -->
	<div class="menu_data">
		<p>
			<?php if ($edit_permission) : ?>
				<a class="btn" href="<?php echo BASE_URL; ?>shippingcompany/add">Nova Transportadora</a>
			<?php endif; ?>
		</p>
		<span class="w-30">
			<form action="<?php echo BASE_URL; ?>shippingcompany/search">
				<input type="text" class="w-100" name="sp" id="sp" placeholder="Pesquisar Transportadora" required>
			</form>
		</span>
	</div>
	<!-- Cabeçalho da Tabela (Table Header) -->
	<?php if ($shipping_company_list) : ?>
		<div class="table_header">
			<div class="w-50">Nome</div>
			<div class="w-20">CNPJ</div>
			<div class="w-20">Telefone</div>
			<div class="w-10"></div>
		</div>
		<!-- Dados da Tabela (Table Data) -->
		<?php foreach ($shipping_company_list as $scl) : ?>
			<div class="table_data">
				<div class="flex w-50">
					<div class="bold"><?php echo $scl['name_shipping_co']; ?></div> - (<?php echo $scl['social_reason']; ?>)
				</div>
				<div class="w-20"><?php echo $scl['contact_name']; ?></div>
				<div class="w-20"><?php echo $scl['phone']; ?></div>
				<div class="w-10">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<?php if ($edit_permission) : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>shippingcompany/edit/<?php echo $scl['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>shippingcompany/delete/<?php echo $scl['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>shippingcompany/view/<?php echo $scl['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
								</ul>
							<?php else : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>shippingcompany/view/<?php echo $scl['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
								</ul>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
</div>

<!-- Paginação (Pagination) -->
<?php if ($p_count > 1) { ?>
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>clients?p=1">Primeira</a>
		<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>clients?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			} ?>
		<div class="pag_item pag_active"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>clients?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			}
		?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>clients?p=<?php echo $p_count; ?>">Última</a>
	</div>
<?php } ?>

<?php else : ?>
	<div class="flash_info my-x">
		<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
	</div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>