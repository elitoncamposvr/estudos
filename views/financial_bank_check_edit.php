<h2>Cheque Bancário <i class="fas fa-angle-right fa-xs"></i> Editar</h2>
<br>

<!-- Formulário -->
<form method="POST">
<input type="hidden" id="type_check" name="type_check" value="1"> <!-- Code check receipt single -->
<input type="hidden" id="in_box" name="in_box" value="1"> <!-- Code check in box -->
<label for="name" class="w100 inline-block">Nome do Titular</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="name" id="name" value="<?php echo $check_info['name'];?>" required>
</div>
<br><br>
<label for="bank" class="w100 inline-block">Nome do Banco</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="bank" id="bank" value="<?php echo $check_info['bank'];?>" required>
</div>
<br><br>
<label for="agency" class="w100 inline-block">Agência</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="agency" id="agency" value="<?php echo $check_info['agency'];?>" required>
</div>
<br><br>
<label for="bank_account" class="w100 inline-block">Número da Conta</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="bank_account" id="bank_account" value="<?php echo $check_info['bank_account'];?>" required>
</div>
<br><br>
<label for="check_number" class="w100 inline-block">Número do Cheque</label>
<div class="w50 inline-block">
    <input type="number" class="w100" name="check_number" id="check_number" value="<?php echo $check_info['check_number'];?>" required>
</div>
<br><br>
<label for="value_check" class="w100 inline-block">Valor do Cheque</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="value_check" id="value_check" value="<?php echo number_format($check_info['value_check'], 2, ',', '.'); ?>" required>
</div>
<br><br>
<label for="issuance_date" class="w100 inline-block">Emissão do Cheque</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="issuance_date" id="issuance_date" value="<?php echo date('d/m/Y', strtotime($check_info['issuance_date'])); ?>">
</div>
<br><br>
<label for="due_date" class="w100 inline-block">Vencimento do Cheque</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="due_date" id="due_date" value="<?php echo date('d/m/Y', strtotime($check_info['due_date'])); ?>">
</div>
<br><br>
<label for="check_destiny" class="w100 inline-block">Destino do Cheque</label>
<div class="w50 inline-block">
    <input type="text" class="w100" name="check_destiny" id="check_destiny" value="<?php echo $check_info['check_destiny'];?>">
</div>
<br><br>
    
    <!-- Botão -->
    <br><br>
    <button type="submit">
	<i class="fas fa-plus-circle fa-lg"></i> &nbsp;
	alterar
	</button>
</form>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_bank.js"></script>