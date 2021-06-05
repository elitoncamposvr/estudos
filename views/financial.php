<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-dollar-sign fa-lg"></i>
			<p>Financeiro</p>
		</div>
	</div>

	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<a class="btn_succes" href="<?php echo BASE_URL; ?>financial/accounts_receivable">Contas a Receber</a>
			<a class="btn_warning" href="<?php echo BASE_URL; ?>financial/accounts_payable">Contas a Pagar</a>
			<a class="btn_info" href="<?php echo BASE_URL; ?>financial/bankcheck">Cheques</a>
		</p>
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>financial/reports">Relatórios</a>
		</p>
	</div>

	<div class="title_list my-3">
		<p title_list>Últimos Lançamentos</p>
		<span><a class="btn" href="<?php echo BASE_URL; ?>financial/bills_add">Adicionar Lançamento</a></span>
	</div>
	
	
	<?php if ($bills_list) : ?>
		<?php foreach ($bills_list as $bl) : ?>
			<div class="table_data">
				<div class="w-5 txt-center"><?php if ($bl['account_type'] == '1') {
												echo '<i class="fas fa-minus c_danger"></i>';
											} else {
												echo '<i class="fas fa-plus c_success"></i>';
											} ?></div>
				<div class="w-45 txt-up"><?php echo $bl['description']; ?></div>
				<div class="w-15 txt-up"><?php echo $bl['carrier']; ?></div>
				<div class="w-15 txt-up"><?php if ($bl['payment_situation'] == '2') {
												echo date('d/m/Y', strtotime($bl['payday']));
											} else {
												echo 'Aberto';
											} ?></div>
				<div class="w-15 txt-up">R$ <?php echo number_format($bl['bill_amount'], 2, ',', '.'); ?></div>
				<div class="w-5 txt-center">
					<a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/bills_view/<?php echo $bl['id']; ?>"><i class="fas fa-eye"></i></a>
				</div>
			</div>
		<?php endforeach; ?>
	<?php else : ?>
		<div class="flash_info my-x">
			<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
		</div>
	<?php endif; ?>
</div>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>