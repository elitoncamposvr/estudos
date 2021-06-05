<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-users fa-lg icon"></i>
			<p>Clientes</p>
		</div>
	</div>

	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<?php if ($edit_permission) : ?>
				<a class="btn" href="<?php echo BASE_URL; ?>clients/add">Novo Cliente</a>
			<?php endif; ?>
		</p>
		<p>
			<a class="btn" href="#">Busca Avançada</a>
			<input type="text" id="busca" data-type="search_clients" placeholder="Pesquisar Clientes">
		</p>
	</div>

	<!-- Cabeçalho da Tabela (Table Header) -->
	<?php if ($clients_list) : ?>
		<div class="table_header">
			<div class="w-30">Nome</div>
			<div class="w-20">CPF/CNPJ</div>
			<div class="w-20">Telefone</div>
			<div class="w-20">Celular</div>
			<div class="w-10"></div>
		</div>


		<!-- Dados da Tabela (Table Data) -->
		<?php foreach ($clients_list as $c) : ?>
			<div class="table_data">
				<div class="w-30"><?php echo $c['name']; ?></div>
				<div class="w-20"><?php echo $c['cpf'];
									echo $c['cnpj']; ?></div>
				<div class="w-20"><?php echo $c['phone']; ?></div>
				<div class="w-20"><?php echo $c['cellphone']; ?></div>
				<div class="w-10">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<?php if ($edit_permission) : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>clients/edit/<?php echo $c['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>clients/delete/<?php echo $c['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>clients/view/<?php echo $c['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
								</ul>
							<?php else : ?>
								<ul>
									<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>clients/view/<?php echo $c['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
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