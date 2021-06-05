<h2><i class="fas fa-cogs fa-lg icon"></i> Configurações <i class="fas fa-angle-right fa-xs"></i> Dados da Empresa <i class="fas fa-angle-right fa-xs"></i> Editar</h2>
<br>

<!-- Formulário -->
<form method="POST">
    <div class="line">
        <label class="col50" for="name">Nome da Empresa</label>
        <label class="col50" for="social_reason">Razão Social</label>
    </div>
    <div class="line">
        <div class="col50">
            <input type="text" class="w100" name="name" id="name" value="<?php echo $viewData['company_name']; ?>" required>
        </div>
        <div class="col50">
            <input type="text" class="w100" name="social_reason" id="social_reason" value="<?php echo $companies_info['social_reason']; ?>">
        </div>
    </div>
    <div class="line spt">
        <label class="col50" for="cnpj">CNPJ</label>
        <label class="col50" for="state_registration">Inscrição Estadual</label>
    </div>
    <div class="line">
        <div class="col50">
            <input type="text" class="w100" name="cnpj" id="cnpj" value="<?php echo $companies_info['cnpj']; ?>" required>
        </div>
        <div class="col50">
            <input type="text" class="w100" name="state_registration" id="state_registration" value="<?php echo $companies_info['state_registration']; ?>">
        </div>
    </div>
    <div class="line spt">
        <label class="col50" for="email">Email</label>
        <label class="col50" for="site">Website</label>
    </div>
    <div class="line">
        <div class="col50">
            <input type="text" class="w100" name="email" id="email" value="<?php echo $companies_info['email']; ?>" required>
        </div>
        <div class="col50">
            <input type="text" class="w100" name="site" id="site" value="<?php echo $companies_info['site']; ?>">
        </div>
    </div>
    <div class="line spt">
        <label class="col100" for="phone">Telefone</label>
    </div>
    <div class="line">
        <input type="text" class="w50" name="phone" id="phone" value="<?php echo $companies_info['phone']; ?>">
    </div>

    <!-- Endereço (Adress) -->
	<h2 class="spt">Endereço</h2>
	<div class="line spt">
		<div class="col25">
			<label for="cpf">CEP</label>
		</div>
		<div class="col50">
			<label for="rg">Rua</label>
		</div>
		<div class="col25">
			<label for="address_number">Número</label>
		</div>
	</div>
	<div class="line">
		<div class="col25">
			<input type="text" class="w100" name="address_zipcode" id="address_zipcode" onblur="pesquisacep(this.value);" value="<?php echo $companies_info['address_zipcode']; ?>">
		</div>
		<div class="col50">
			<input class="w100" type="text" name="address" id="address" value="<?php echo $companies_info['address']; ?>">
		</div>
		<div class="col25">
			<input class="w100" type="text" name="address_number" id="address_number" value="<?php echo $companies_info['address_zipcode']; ?>">
		</div>
	</div>

	<div class="line spt">
		<div class="col35">
			<label for="address2">Complemento</label>
		</div>
		<div class="col25">
			<label for="address_neighb">Bairro</label>
		</div>
		<div class="col25">
			<label for="address_city">Cidade</label>
		</div>
		<div class="col15">
			<label for="address_state">Estado</label>
		</div>
	</div>
	<div class="line">
		<div class="col35">
			<input type="text" class="w100" name="address2" id="address2" value="<?php echo $companies_info['address2']; ?>">
		</div>
		<div class="col25">
			<input type="text" class="w100" name="address_neighb" id="address_neighb" value="<?php echo $companies_info['address_neighb']; ?>">
		</div>
		<div class="col25">
			<input type="text" class="w100" name="address_city" id="address_city" value="<?php echo $companies_info['address_city']; ?>">
		</div>
		<div class="col15">
			<input type="text" class="w100" name="address_state" maxlength="2" id="address_state" value="<?php echo $companies_info['address_state']; ?>">
		</div>
	</div>

    <!-- Botão (Button) -->
    <button class="btn mgt-20" type="submit">
        Editar
    </button>
</form>