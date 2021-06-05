<!-- Breadcrumbs -->
<div class="breadcrumb">
    <div><i class="fas fa-dolly-flatbed fa-lg icon"></i>
        <p>Fornecedores <i class="fas fa-angle-right fa-xs"></i> Adicionar</p>
    </div>
    <span>
        <a class="btn" href="<?php echo BASE_URL; ?>provider"><i class="fas fa-angle-double-left"></i> Voltar</a>
    </span>
</div>

<!-- Message Error (Mensagem de Erro) -->
<?php if (isset($error_msg) && !empty($error_msg)) : ?>
    <div class="warning"><?php echo $error_msg; ?></div>
<?php endif; ?>

<!-- Formulário - Dados Pessoais (Form - Personal Data) -->
<form method="POST">
    <div class="fb-100">
        <div class="w-50 my-s mr-m">
            <label for="">Nome Fantasia</label>
            <input class="w-100" type="text" name="name_provider" id="name_provider" value="<?php echo $provider_info['name_provider']; ?>">
        </div>
        <div class="w-50 my-s">
            <label for="social_reason">Razão Social</label>
            <input class="w-100" type="text" name="social_reason" id="social_reason" value="<?php echo $provider_info['social_reason']; ?>">
        </div>
    </div>

    <!-- Documentos (Documents) -->
    <div class="fb-100">
        <div class="w-35 my-s mr-m">
            <label for="">CNPJ</label>
            <input class="w-100" type="text" name="cnpj" id="cnpj" value="<?php echo $provider_info['cnpj']; ?>">
        </div>
        <div class="w-35 my-s mr-m">
            <label for="">Inscrição Estadual</label>
            <input class="w-100" type="text" name="state_registration" id="state_registration" value="<?php echo $provider_info['state_registration']; ?>">
        </div>
        <div class="w-30 my-s">
            <label for="">Telefone</label>
            <input class="w-100" type="text" name="phone" id="phone" value="<?php echo $provider_info['phone']; ?>">
        </div>
    </div>

    <!-- Informações Adicionais (Aditionals Info) -->
    <div class="fb-100">
        <div class="w-35 my-s mr-m">
            <label for="">Contato</label>
            <input class="w-100" type="text" name="contact_name" id="contact_name" value="<?php echo $provider_info['contact_name']; ?>">
        </div>
        <div class="w-35 my-s mr-m">
            <label for="">E-mail</label>
            <input class="w-100" type="text" name="email" id="email" value="<?php echo $provider_info['email']; ?>">
        </div>
        <div class="w-30 my-s">
            <label for="">Website</label>
            <input class="w-100" type="text" name="site" id="site" value="<?php echo $provider_info['site']; ?>">
        </div>
    </div>
    <div class="w-100">
        <label for="">Informações Adicionais</label><br>
        <textarea name="aditional_info" id="aditional_info" class="w-100"><?php echo $provider_info['aditional_info']; ?></textarea>
    </div>

    <!-- Endereço (Adress) -->
    <h2 class="spt my-s">Endereço</h2>
    <div class="fb-100">
        <div class="w-25 my-s mr-m">
            <label for="">CEP</label>
            <input type="text" class="w-100" name="address_zipcode" id="address_zipcode" onblur="pesquisacep(this.value);" value="<?php echo $provider_info['address_zipcode']; ?>">
        </div>
        <div class="w-50 my-s mr-m">
            <label for="">Endereço</label>
            <input class="w-100" type="text" name="address" id="address" value="<?php echo $provider_info['address']; ?>">
        </div>
        <div class="w-25 my-s">
            <label for="">Número</label>
            <input class="w-100" type="text" name="address_number" id="address_number" value="<?php echo $provider_info['address_number']; ?>">
        </div>
    </div>
    <div class="fb-100">
        <div class="w-35 my-s mr-m">
            <label for="">Complemento</label>
            <input type="text" class="w-100" name="address2" id="address2" value="<?php echo $provider_info['address2']; ?>">
        </div>
        <div class="w-25 my-s mr-m">
            <label for="">Bairro</label>
            <input type="text" class="w-100" name="address_neighb" id="address_neighb" value="<?php echo $provider_info['address_neighb']; ?>">
        </div>
        <div class="w-25 my-s mr-m">
            <label for="">Cidade</label>
            <input type="text" class="w-100" name="address_city" id="address_city" value="<?php echo $provider_info['address_city']; ?>">
        </div>
        <div class="w-15 my-s">
            <label for="">Estado</label>
            <input type="text" class="w-100" name="address_state" maxlength="2" id="address_state" value="<?php echo $provider_info['address_state']; ?>">
        </div>
    </div>

     <!-- Botões (Button) -->
	<div class="w-100 txt-center my-el">
		<button class="btn" type="submit">
			Editar Fornecedor
		</button>
	</div>
</form>

<!-- SCRIPTS JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cep.js"></script>