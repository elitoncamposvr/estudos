<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div><i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Usuários</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>settings/users"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>
	
	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>users/add">Novo Usuário</a>
		</p>
	</div>

	<!-- Cabeçalho da Tabela (Table Header) -->
	<div class="table_header">
		<div class="w-50">Email/Login</div>
		<div class="w-40 txt-center">Grupo de Permissões</div>
		<div class="w-10"></div>
	</div>

	<!-- Dados da Tabela (Table Data) -->
	<?php foreach ($users_list as $us) : ?>
		<div class="table_data">
			<div class="w-50 my-s mr-m"><?php echo $us['email']; ?></div>
			<div class="w-40 my-s mr-m txt-center"><?php echo $us['name']; ?></div>
			<div class="w-10 my-s">
			<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<ul>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>users/edit/<?php echo $us['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>users/delete/<?php echo $us['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
							</ul>
						</div>
					</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>