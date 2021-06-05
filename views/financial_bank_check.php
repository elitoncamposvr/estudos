<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div><i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Financeiro<i class="fas fa-angle-right fa-xs"></i>Cheques em Caixa</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>financial"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>financial/bankcheck_add">Novo Cheque</a>
			<a class="btn_succes" href="<?php echo BASE_URL; ?>financial/bankcheck_issued">Cheques Emitidos</a>
		</p>
		<p class="w-35 flex btw">
			<a class="btn" href="<?php echo BASE_URL; ?>financial/bankcheck_list">Listagem Completa</a>
			<input type="text" id="busca" data-type="search_bank_check" placeholder="Pesquisar Cheque" class="w-50">
		</p>
	</div>

	<!-- Cabeçalho da Tabela (Table Header) -->
	<div class="table_header">
		<div class="w-30 my-s mr-m">Nome</div>
		<div class="w-20 my-s mr-m">Valor</div>
		<div class="w-20 my-s mr-m">Emissão</div>
		<div class="w-20 my-s mr-m">Vencimento</div>
		<div class="w-10 my-s"></div>
	</div>

	<!-- Dados da Tabela (Table Data) -->
	<?php foreach ($check_list as $bc) : ?>
		<div class="table_data">
			<div class="w-30 my-s mr-m"><?php echo $bc['name']; ?></div>
			<div class="w-20 my-s mr-m">R$ <?php echo number_format($bc['value_check'], 2, ',', '.'); ?></div>
			<div class="w-20 my-s mr-m"><?php echo date('d/m/Y', strtotime($bc['issuance_date'])); ?></div>
			<div class="w-20 my-s mr-m"><?php echo date('d/m/Y', strtotime($bc['due_date'])); ?></div>
			<div class="w-10 my-s">
				<div class="dropdown">
					<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
					<div id="myDropdown1" class="dropdown-content">
						<ul>
							<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/bankcheck_edit/<?php echo $bc['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
							<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/bankcheck_delete/<?php echo $bc['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
							<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/bankcheck_view/<?php echo $bc['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	<?php endforeach; ?>
</div>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>