<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-shipping-fast fa-lg icon"></i>
            <p>Transportadoras <i class="fas fa-angle-right fa-xs"></i> Adicionar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>shippingcompany"><i class="fas fa-angle-double-left"></i> Voltar</a>
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
                <label for="name_shipping_co">Nome Fantasia</label>
                <input class="w-100" type="text" name="name_shipping_co" id="name_shipping_co" required autofocus>
            </div>
            <div class="w-50 my-s">
                <label for="social_reason">Razão Social</label>
                <input class="w-100" type="text" name="social_reason" id="social_reason" autocomplete="off">
            </div>
        </div>

        <!-- Documentos (Documents) -->
        <div class="fb-100">
            <div class="w-25 my-s mr-m">
                <label for="cnpj">CNPJ</label>
                <input class="w-100" type="text" name="cnpj" id="cnpj" autocomplete="off">
            </div>
            <div class="w-25 my-s mr-m">
                <label for="state_registration">Inscrição Estadual</label>
                <input class="w-100" type="text" name="state_registration" id="state_registration" autocomplete="off">
            </div>
            <div class="w-25 my-s mr-m">
                <label for="phone">Telefone</label>
                <input class="w-100" type="text" name="phone" id="phone" autocomplete="off">
            </div>
            <div class="w-25 my-s">
                <label for="whatsapp">Whatsapp</label>
                <input class="w-100" type="text" name="whatsapp" id="whatsapp" autocomplete="off">
            </div>
        </div>

        <!-- Informações Adicionais (Aditionals Info) -->
        <div class="fb-100">
            <div class="w-35 my-s mr-m">
                <label for="contact_name">Contato</label>
                <input class="w-100" type="text" name="contact_name" id="contact_name" autocomplete="off">
            </div>
            <div class="w-35 my-s mr-m">
                <label for="email">E-mail</label>
                <input class="w-100" type="text" name="email" id="email" autocomplete="off">
            </div>
            <div class="w-30 my-s">
                <label for="website">Website</label>
                <input class="w-100" type="text" name="website" id="website" autocomplete="off">
            </div>
        </div>
        <div class="w-100">
            <label for="">Informações Adicionais</label><br>
            <textarea name="aditional_info" id="aditional_info" class="w-100"></textarea>
        </div>

        <!-- Endereço (Adress) -->
        <h2 class="spt my-s">Endereço</h2>
        <div class="fb-100">
            <div class="w-25 my-s mr-m">
                <label for="">CEP</label>
                <input type="text" class="w-100" name="address_zipcode" id="address_zipcode" onblur="pesquisacep(this.value);" autocomplete="off">
            </div>
            <div class="w-50 my-s mr-m">
                <label for="">Endereço</label>
                <input class="w-100" type="text" name="address" id="address" autocomplete="off">
            </div>
            <div class="w-25 my-s">
                <label for="">Número</label>
                <input class="w-100" type="text" name="address_number" id="address_number" autocomplete="off">
            </div>
        </div>
        <div class="fb-100">
            <div class="w-35 my-s mr-m">
                <label for="">Complemento</label>
                <input type="text" class="w-100" name="address2" id="address2" autocomplete="off">
            </div>
            <div class="w-25 my-s mr-m">
                <label for="">Bairro</label>
                <input type="text" class="w-100" name="address_neighb" id="address_neighb" autocomplete="off">
            </div>
            <div class="w-25 my-s mr-m">
                <label for="">Cidade</label>
                <input type="text" class="w-100" name="address_city" id="address_city" autocomplete="off">
            </div>
            <div class="w-15 my-s">
                <label for="">Estado</label>
                <input type="text" class="w-100" name="address_state" maxlength="2" id="address_state" autocomplete="off">
            </div>
        </div>

        <!-- Botões (Button) -->
        <div class="w-100 txt-center my-el">
            <button type="submit">
                Adicionar Transportadora
            </button>
        </div>
    </form>
</div>

<!-- SCRIPTS JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/cep.js"></script>