<div class="content">
	<!-- Breadcrumbs -->
	<div class="breadcrumb">
		<div><i class="fas fa-cogs fa-lg icon"></i>
			<p>Configurações<i class="fas fa-angle-right fa-xs"></i>Financeiro<i class="fas fa-angle-right fa-xs"></i>Portador/Carteira</p>
		</div>
		<span>
			<a class="btn" href="<?php echo BASE_URL; ?>financial/settings"><i class="fas fa-angle-double-left"></i> Voltar</a>
		</span>
	</div>

	<!-- Botões (Buttons) -->
	<div class="menu_data">
		<p>
			<a class="btn" href="<?php echo BASE_URL; ?>financial/carrieradd">Novo Portador</a>
		</p>
	</div>

	<!-- Cabeçalho da Tabela (Table Header) -->
	<div class="table_header">
		<div class="w-90 my-s mr-m">Nome do Portador</div>
		<div class="w-10 my-s"></div>
	</div>

	<!-- Dados da Table (Table Data) -->
	<?php if ($carrier_list) : ?>
		<?php foreach ($carrier_list as $cl) : ?>
			<div class="table_data">
				<div class="w-90 my-s mr-m txt-up"><?php echo $cl['carrier_title']; ?></div>
				<div class="w-10 my-s">
					<div class="dropdown">
						<i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
						<div id="myDropdown1" class="dropdown-content">
							<ul>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/carrieredit/<?php echo $cl['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
								<li><a class="dropdown-item" href="<?php echo BASE_URL; ?>financial/carrierdelete/<?php echo $cl['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
							</ul>
						</div>
					</div>
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