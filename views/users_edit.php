<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div><i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Usuários<i class="fas fa-angle-right fa-xs"></i>Editar</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>users"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Mensagem de Erro (Error Message) -->
	<?php if (isset($error_msg) && !empty($error_msg)) : ?>
		<div class="flash_warning"><?php echo $error_msg; ?></div>
	<?php endif; ?>

	<div class="data_info">
		<p><span class="bold">Usuário: </span><?php echo $user_info['email']; ?></p>
	</div>

	<!-- Formulário de Adição (Add Form) -->
	<form method="post">
		<div class="w-50 my-s">
			<label for="password">Senha</label>
			<input type="password" name="password" id="password" required class="w-100">
		</div>
		<div class="w-50 my-s">
			<label for="group">Grupo de Permissões</label>
			<select name="group" id="group" class="txt-up w-100">
				<?php foreach ($group_list as $g) : ?>
					<option value="<?php echo $g['id']; ?>" <?php echo ($g['id'] == $user_info['id_group']) ? 'selected="selected"' : ''; ?>><?php echo $g['name']; ?></option>
				<?php endforeach; ?>
			</select>
		</div>

		<!-- Botão (Button) -->
		<button type="submit" class="my-el">
			Editar Usuário
		</button>
	</form>
</div>