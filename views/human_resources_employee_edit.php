<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-id-card-alt fa-lg icon"></i>
			<p>Recursos Humanos <i class="fas fa-angle-right fa-xs"></i> Funcionários <i class="fas fa-angle-right fa-xs"></i> Editar</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>humanresources/employee"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<div class="data_info my-m">
		<?php if ($employee_info['status'] == '1') {
			echo '<div class="info">Funcionário Ativo</div>';
		} else {
			echo '<div class="info_danger">Funcionário Desligado</div>';
		} ?>
	</div>

	<!-- Formulário (Add Form) -->
	<form method="POST">
		<input type="hidden" name="status" id="status" value="<?php echo $employee_info['status']; ?>">
		<div class="fb-100">
			<div class="w-50 my-s mr-m">
				<label for="name_employee">Nome</label>
				<input type="text" name="name_employee" id="name_employee" class="w-100" value="<?php echo $employee_info['name_employee']; ?>" autofocus>
			</div>
			<div class="w-50 my-s">
				<label for="nickname">Apelido</label>
				<input type="text" name="nickname" id="nickname" class="w-100" value="<?php echo $employee_info['nickname']; ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="phone">Telefone</label>
				<input type="text" name="phone" id="phone" class="w-100" value="<?php echo $employee_info['phone']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="cellphone">Celular</label>
				<input type="text" name="cellphone" id="cellphone" class="w-100" value="<?php echo $employee_info['cellphone']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="birthdate">Data de Nascimento</label>
				<input type="text" name="birth_date" id="birth_date" value="<?php echo date('d/m/Y', strtotime($employee_info['birth_date'])); ?>" class="w-100">
			</div>
			<div class="w-25 my-s">
				<label for="marital_status">Estado Civil</label>
				<select name="marital_status" id="marital_status" class="w-100">
					<option value="nao_informado" <?php echo ($employee_info['marital_status'] == 'nao_informado') ? 'selected="selected"' : ''; ?>>Não Informado</option>
					<option value="solteiro"<?php echo ($employee_info['marital_status'] == 'solteiro') ? 'selected="selected"' : ''; ?>>Solteiro(a)</option>
					<option value="casado" <?php echo ($employee_info['marital_status'] == 'casado') ? 'selected="selected"' : ''; ?>>Casado(a)</option>
					<option value="divorciado" <?php echo ($employee_info['marital_status'] == 'divorciado') ? 'selected="selected"' : ''; ?>>Divorciado(a)</option>
					<option value="viuvo" <?php echo ($employee_info['marital_status'] == 'viuvo') ? 'selected="selected"' : ''; ?>>Viúvo(a)</option>
				</select>
			</div>
		</div>
		<div class="fb-100">
			<div class="w-50 my-s mr-m">
				<label for="father_name">Nome do Pai</label>
				<input type="text" name="father_name" id="father_name" class="w-100" value="<?php echo $employee_info['father_name']; ?>">
			</div>
			<div class="w-50 my-s">
				<label for="mother_name">Nome da Mãe</label>
				<input type="text" name="mother_name" id="mother_name" class="w-100" value="<?php echo $employee_info['mother_name']; ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="cpf">CPF</label>
				<input type="text" name="cpf" id="cpf" class="w-100" value="<?php echo $employee_info['cpf']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="identity">Identidade</label>
				<input type="text" name="identity" id="identity" class="w-100" value="<?php echo $employee_info['identity']; ?>">
			</div>
			<div class="w-20 my-s mr-m">
				<label for="ctps">Carterira de Trabalho</label>
				<input type="text" name="ctps" id="ctps" class="w-100" value="<?php echo $employee_info['ctps']; ?>">
			</div>
			<div class="w-20 my-s mr-m">
				<label for="cnh">CNH</label>
				<input type="text" name="cnh" id="cnh" class="w-100" value="<?php echo $employee_info['cnh']; ?>">
			</div>
			<div class="w-10 my-s">
				<label for="cnh_cat">Cat. CNH</label>
				<input type="text" name="cnh_cat" id="cnh_cat" class="w-100" pattern="[A-Za-z ]+$" value="<?php echo $employee_info['cnh_cat']; ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-20 my-s mr-m">
				<label for="occupation">Cargo</label>
				<input type="text" name="occupation" id="occupation" class="w-100" value="<?php echo $employee_info['occupation']; ?>">
			</div>
			<div class="w-20 my-s mr-m">
				<label for="admission_date">Data de Admissão</label>
				<input type="text" name="admission_date" id="admission_date" class="w-100" value="<?php echo date('d/m/Y', strtotime($employee_info['admission_date'])); ?>">
			</div>
			<div class="w-15 my-s mr-m">
				<label for="wage">Salário</label>
				<input type="text" name="wage" id="wage" class="w-100" value="<?php echo number_format($employee_info['wage'], 2, ',', '.'); ?>">
			</div>
			<div class="w-20 my-s mr-m">
				<label for="bank">Banco</label>
				<input type="text" name="bank" id="bank" class="w-100" value="<?php echo $employee_info['bank']; ?>">
			</div>
			<div class="w-15 my-s mr-m">
				<label for="agency">Agência</label>
				<input type="text" name="agency" id="agency" class="w-100" value="<?php echo $employee_info['agency']; ?>">
			</div>
			<div class="w-10 my-s">
				<label for="bank_account">Conta</label>
				<input type="text" name="bank_account" id="bank_account" class="w-100" value="<?php echo $employee_info['bank_account']; ?>">
			</div>
		</div>
		<div class="w-100 my-s">
			<textarea name="aditional_info" id="aditional_info" class="w-100"><?php echo $employee_info['aditional_info']; ?></textarea>
		</div>

		<!-- Endereço (Adress) -->
		<h2 class="w-100 spt my-l">Endereço</h2>
		<div class="fb-100">
			<div class="w-25 my-s mr-m">
				<label for="address_zipcode">CEP</label>
				<input type="text" class="w-100" name="address_zipcode" id="address_zipcode" value="<?php echo $employee_info['address_zipcode']; ?>" onblur="pesquisacep(this.value);">
			</div>
			<div class="w-50 my-s mr-m">
				<label for="address">Rua</label>
				<input type="text" name="address" id="address" class="w-100" value="<?php echo $employee_info['address']; ?>">
			</div>
			<div class="w-25 my-s">
				<label for="adress_number">Número</label>
				<input type="text" name="address_number" id="address_number" class="w-100" value="<?php echo $employee_info['address_number']; ?>">
			</div>
		</div>
		<div class="fb-100">
			<div class="w-35 my-s mr-m">
				<label for="address2">Complemento</label>
				<input type="text" name="address2" id="address2" class="w-100" value="<?php echo $employee_info['address2']; ?>">
			</div>
			<div class="w-25 my-s mr-m">
				<label for="address_neighb">Bairro</label>
				<input type="text" name="address_neighb" id="address_neighb" class="w-100" value="<?php echo $employee_info['address_neighb']; ?>">

			</div>
			<div class="w-25 my-s mr-m">
				<label for="address_city">Cidade</label>
				<input type="text" name="address_city" id="address_city" class="w-100" value="<?php echo $employee_info['address_city']; ?>">
			</div>
			<div class="w-15 my-s mr-m">
				<label for="address_state">Estado</label>
				<input type="text" name="address_state" id="address_state" class="w-100" value="<?php echo $employee_info['address_state']; ?>">
			</div>
		</div>

		<!-- Botões (Button) -->
		<div class="w-100 txt-center my-el">
			<button type="submit">
				Editar Funcionário
			</button>
		</div>
	</form>
</div>

<!-- SCRIPTS JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/change_items.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cep.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>