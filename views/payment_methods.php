<h2><i class="fas fa-cogs fa-lg icon"></i> Configurações <i class="fas fa-angle-right fa-xs"></i> Métodos de Pagamentos</h2>
<br>

<!-- Botão Adicionar (Button Add) -->
<a class="btn mgt-20" href="<?php echo BASE_URL; ?>paymentmethods/add">adicionar</a>

<!-- Cabeçalho Tabela -->
<table class="data-table">
	<thead>
		<tr>
			<th>Método</th>
			<th class="w25">Tipo</th>
			<th class="w20">Ações</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($payment_method_list as $pm) : ?>
			<tr>
				<td class="txt-up"><?php echo $pm['method']; ?></td>
				<td><?php
					if ($pm['type_method'] == 1) {
						echo "<p class=blue>À Vista</p>";
					} else {
						echo "<p class=gray>A prazo</p>";
					}
					?></td>
				<td>
					<div class="awesome">
						<a href="<?php echo BASE_URL; ?>paymentmethods/edit/<?php echo $pm['id']; ?>" title="Editar"><i class="fas fa-pencil-alt fa-lg"></i></a>
					</div>
					<div class="awesome">
						<a href="<?php echo BASE_URL; ?>paymentmethods/delete/<?php echo $pm['id']; ?>" onclick="return confirm('Deseja realmente excuir?')"><i class="fas fa-trash-alt fa-lg"></i></a>
					</div>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
