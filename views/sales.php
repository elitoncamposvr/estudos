<h2><i class="fas fa-shopping-cart fa-lg icon"></i> Vendas</h2>
<br>

<!-- Botões -->
<div class="menu-data">
	<a class="btn" href="<?php echo BASE_URL; ?>sales/add">ADICIONAR VENDA</a>
	<input type="text" name="search" id="search" placeholder="Pesquisa">
</div>

<!-- Tabela -->
<table class="data-table">
	<thead>
		<tr>
			<th>Nome do Cliente</th>
			<th>Data Venda</th>
			<th>Status</th>
			<th>Valor Venda</th>
			<th>Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($sales_list as $sale_item) : ?>
			<tr>
				<td><?php echo $sale_item['name']; ?></td>
				<td><?php echo date('d/m/Y', strtotime($sale_item['date_sale'])); ?></td>
				<td><?php echo $statuses[$sale_item['status']]; ?></td>
				<td><?php echo number_format($sale_item['total_price'], 2, ',', '.'); ?></td>
				<td>
					<div class="button button_small"><a href="<?php echo BASE_URL; ?>sales/edit/<?php echo $sale_item['id']; ?>">Editar</a></div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>