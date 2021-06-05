<h2><i class="fas fa-dollar-sign fa-lg icon"></i> Financeiro <i class="fas fa-angle-right fa-xs"></i> Recibo Avulso</h2>
<br>


<!-- Botão Adicionar -->
<div class="line spt">
	<a class="btn" href="<?php echo BASE_URL; ?>singlereceipt/add">adicionar</a>
</div>


<!-- Cabeçalho Tabela -->
<?php if ($single_receipt_list) : ?>
	<table class="data-table">
		<thead>
			<tr>
				<th>Nome</th>
				<th>Valor</th>
				<th class="w15">Data</th>
				<th class="w15">Ações</th>
			</tr>
		</thead>

		<!-- Dados Tabela -->
		<tbody>
			<?php foreach ($single_receipt_list as $sr) : ?>
				<tr>
					<td class="txt-up"><?php echo $sr['name']; ?></td>
					<td>R$ <?php echo number_format($sr['receipt_amount'], 2, ',', '.'); ?></td>
					<td><?php echo date('d/m/Y', strtotime($sr['date_receipt'])); ?></td>
					<td><div class="awesome">
							<a href="<?php echo BASE_URL; ?>singlereceipt/edit/<?php echo $sr['id']; ?>" title="Editar"><i class="fas fa-pencil-alt fa-lg"></i></a>
						</div>
						<div class="awesome">
							<a href="<?php echo BASE_URL; ?>singlereceipt/view/<?php echo $sr['id']; ?>" title="Visualizar"><i class="fas fa-eye fa-lg"></i></a>
						</div>
						<div class="awesome">
							<a href="<?php echo BASE_URL; ?>singlereceipt/delete/<?php echo $sr['id']; ?>" onclick="return confirm('Deseja realmente excuir?')"><i class="fas fa-trash-alt fa-lg"></i></a>
						</div></td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>

	<!-- Paginação (Pagination) -->
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>worthemployee?p=1">Primeira</a>
		<?php
		for ($q = $p - 5; $q <= $p - 1; $q++) {
			if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>worthemployee?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
		} ?>
		<div class="pag_item pag_ative"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
			if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>worthemployee?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
		}
		?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>worthemployee?p=<?php echo $p_count; ?>">Última</a>
	</div>

<?php else : ?>
	<div class="line mgt-50 txt-c"><i class="fas fa-exclamation-circle fa-lg warning"></i> Nenhum registro encontrado!</div>
<?php endif; ?>