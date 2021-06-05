<h2><i class="fas fa-cogs fa-lg icon"></i> Configurações <i class="fas fa-angle-right fa-xs"></i> Métodos de Pagamentos <i class="fas fa-angle-right fa-xs"></i> Adicionar</h2>
<br>

<!-- Formulário de Adição (Add Form) -->
<form method="POST">
	<div class="line">
		<label class="col100" for="method">Método de Pagamento</label>
		<input type="text" name="method" id="method" class="w50" required>
	</div>
	<div class="line spt">
		<label class="col100" for="type_method">Tipo do Método</label>
		<select name="type_method" id="type_method" class="w50">
			<option value="1">À Vista</option>
			<option value="2">A Prazo</option>
		</select>
	</div>

	<!-- Botão -->
	<button class="btn mgt-30" type="submit">
		Adicionar
	</button>
</form>