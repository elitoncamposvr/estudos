<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div>
			<i class="fas fa-wrench fa-lg icon"></i>
			<p>Serviços</p>
		</div>
        <span>
        <a class="btn" href="<?php echo BASE_URL; ?>services"><i class="fas fa-angle-double-left"></i> Voltar</a>
    </span>
	</div>

	<!-- Botões -->
	<div class="menu_data">
		<a class="btn" href="<?php echo BASE_URL; ?>services/add">NOVO SERVIÇO</a>
		<span class="w-30">
			<form action="<?php echo BASE_URL; ?>services/search">
				<input type="text" class="w-100" name="sp" id="sp" placeholder="Pesquisar Serviço" required>
			</form>
		</span>
	</div>

	<!-- Cabeçalho Tabela (Table Header) -->
	<?php if ($services_list) : ?>
		<div class="table_header">
			<div class="w-70">Nome</div>
			<div class="w-20 txt-center">Valor</div>
			<div class="w-10 txt-center">Ações</div>
		</div>

		<!-- Dados da Tabela (Data Table)-->
		<?php foreach ($services_list as $services) : ?>
			<div class="table_data">
				<div class="w-70"><?php echo $services['name_service']; ?></div>
				<div class="w-20 txt-center">R$ <?php echo number_format($services['standard_value'], 2, ',', '.'); ?></div>
				<div class="w-10 txt-center">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">

							<ul>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>services/edit/<?php echo $services['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>services/delete/<?php echo $services['id']; ?>" onclick="return confirm('Deseja realmente excuir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
							</ul>

						</div>
					</div>
				</div>
			</div>
		<?php endforeach; ?>
</div>

<!-- Paginação (Pagination) -->
<!-- <?php if ($p_count > 1) { ?>
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>services?p=1">Primeira</a>
		<?php
			for ($q = $p - 5; $q <= $p - 1; $q++) {
				if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>services?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			} ?>
		<div class="pag_item pag_active"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
				if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>services?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
			}
		?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>services?p=<?php echo $p_count; ?>">Última</a>
	</div>
<?php } ?> -->

<?php else : ?>
	<div class="flash_info my-3">
		<p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
	</div>
    <div class="search_inventory">
            <form class="w-100" action="<?php echo BASE_URL; ?>services/search">
                <p class="mb-l">Refaça sua pesquisa</p>
                <span class="mb-2"><input type="text" class="w-30 txt-center" name="sp" id="sp" placeholder="Pesquisar Serviço" required></span>
                <span><button type="submit"><i class="fas fa-search"></i> Pesquisar</button></span>
            </form>
        </div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>