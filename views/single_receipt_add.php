<h2><i class="fas fa-dollar-sign fa-lg icon"></i> Financeiro <i class="fas fa-angle-right fa-xs"></i> Recibo Avulso <i class="fas fa-angle-right fa-xs"></i> Adicionar</h2>
<br>

<!-- Formulário -->
<form method="POST">
    <div class="line spt">
        <label for="name">Nome</label>
    </div>
    <div class="line spt">
        <input type="text" class="w50" name="name" id="name" required autofocus>
    </div>
    <div class="line spt">
        <label for="receipt_amount">Valor</label>
        <div class="col100">
            <input class="w50" type="text" name="receipt_amount" id="receipt_amount" required>
        </div>
    </div>
    <div class="line spt">
        <label for="cpf">CPF</label>
        <div class="col100">
            <input class="w50" type="text" name="cpf" id="cpf">
        </div>
    </div>
    <div class="line spt">
        <label for="identity">Identidade (RG)</label>
        <div class="col100">
            <input class="w50" type="text" name="identity" id="identity">
        </div>
    </div>
    <div class="line spt">
        <label for="regarding">Referente à</label>
        <div class="col100">
            <textarea name="regarding" id="regarding" class="w50"></textarea>
        </div>
    </div>

    <!-- Botão (Button) -->
    <button class="btn mgt-30" type="submit">
        Adicionar Transportadora
    </button>
</form>

<!-- Scripts JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/general_mask.js"></script>