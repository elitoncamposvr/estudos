<h2><i class="fas fa-cogs fa-lg icon"></i> Configurações <i class="fas fa-angle-right fa-xs"></i> Métodos de Pagamentos <i class="fas fa-angle-right fa-xs"></i> Editar</h2>
<br>

<!-- Formulário de Edição (Edit Form)-->
<form method="POST">
	<div class="line">
		<label class="col100" for="method">Método de Pagamento</label>
		<input type="text" name="method" id="method" value="<?php echo $payment_method_info['method'];?>" required>
	</div>
	<div class="line spt">
		<label class="col100" for="type_method">Tipo de Método</label>
		<select name="type_method" id="type_method" class="w50">
		<option value="1" <?php echo ($payment_method_info['type_method']=='1')?'selected="selected"':'';?>>À Vista</option>
		<option value="2" <?php echo ($payment_method_info['type_method']=='2')?'selected="selected"':'';?>>A Prazo</option>
	</select>
	</div>

    
    <!-- Botão (Button) -->
    <button class="btn mgt-30" type="submit">
	Editar
	</button>
</form>