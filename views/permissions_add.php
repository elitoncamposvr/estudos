<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div><i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Usuários<i class="fas fa-angle-right fa-xs"></i>Permissões<i class="fas fa-angle-right fa-xs"></i>Adicionar</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>users/permissions"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Formulário de Adição (Add Form) -->
	<form method="POST">
		<div class="w-50 my-s">
			<label for="name">Nome da Permissão</label>
			<input type="text" name="name" id="name" class="w-100" required>
		</div>
		<div class="w-50 my-s">
			<label for="permission_title">Título da Permissão</label>
			<input type="text" name="permission_title" id="permission_title" class="w-100">
		</div>

		<!-- Botões (Button) -->
		<div class="w-100 my-el">
			<button type="submit">
				Adicionar Permissão
			</button>
		</div>
	</form>

</div>