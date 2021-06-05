<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div><i class="fas fa-dolly-flatbed fa-lg icon"></i>
            <p>Fornecedores <i class="fas fa-angle-right fa-xs"></i> Resultados de Pesquisa</p>
        </div>
        <span>
        <a class="btn" href="<?php echo BASE_URL; ?>provider"><i class="fas fa-angle-double-left"></i> Voltar</a>
    </span>
    </div>

    <!-- Botões (Buttons) -->
    <div class="menu_data">
        <p>
            <?php if ($edit_permission) : ?>
                <a class="btn" href="<?php echo BASE_URL; ?>provider/add">Novo Fornecedor</a>
            <?php endif; ?>
        </p>
        <span class="w-30">
            <form action="<?php echo BASE_URL; ?>provider/search">
                <span class="mb-2"><input type="text" class="w-100" name="sp" id="sp" placeholder="Pesquisar Fornecedor" required></span>
            </form>
        </span>
    </div>

    <!-- Cabeçalho da Tabela (Table Header)-->
    <?php if ($provider_list) : ?>
        <div class="table_header">
            <div class="w-50">Nome</div>
            <div class="w-20">Telefone</div>
            <div class="w-20">Contato</div>
            <div class="w-10"></div>
        </div>

        <!-- Dados da Tabela (Data Table)-->
        <?php foreach ($provider_list as $pd) : ?>
            <div class="table_data">
                <div class="w-50"><?php echo $pd['name_provider']; ?> - (<?php echo $pd['social_reason']; ?>)</div>
                <div class="w-20"><?php echo $pd['phone']; ?></div>
                <div class="w-20"><?php echo $pd['contact_name']; ?></div>
                <div class="w-10">
                    <div class="dropdown">
                        <i class="fas fa-ellipsis-h dropbtn btn-awesome" onclick="myFunction(this);"></i>
                        <div id="myDropdown1" class="dropdown-content">
                            <?php if ($edit_permission) : ?>
                                <ul>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>provider/edit/<?php echo  $pd['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>provider/delete/<?php echo  $pd['id']; ?>" onclick="return confirm('Deseja realmente excuir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>provider/view/<?php echo  $pd['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                </ul>
                            <?php else : ?>
                                <ul>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>provider/view/<?php echo  $pd['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Paginação (Pagination) -->
        <!-- <?php if ($p >= 10) { ?>
			<div class="pagination">
				<a class="pag_item" href="<?php echo BASE_URL; ?>provider?p=1">Primeira</a>
				<?php
                    for ($q = $p - 5; $q <= $p - 1; $q++) {
                        if ($q >= 1) { ?>
						<a class="pag_item" href="<?php echo BASE_URL; ?>provider?p=<?php echo $q; ?>"><?php echo $q; ?></a>
				<?php }
                    } ?>
				<div class="pag_item pag_ative"><?php echo "$q"; ?></div>
				<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
                        if ($q <= $p_count) { ?>
						<a class="pag_item" href="<?php echo BASE_URL; ?>provider?p=<?php echo $q; ?>"><?php echo $q; ?></a>
				<?php }
                    }
                ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>provider?p=<?php echo $p_count; ?>">Última</a>
			</div>
</div>
<?php } ?> -->


    <?php else : ?>
        <div class="flash_info my-2">
            <p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
        </div>
        <div class="search_inventory">
            <form class="w-100" action="<?php echo BASE_URL; ?>provider/search">
                <p class="mb-l">Refaça sua pesquisa</p>
                <span class="mb-2"><input type="text" class="w-30 txt-center" name="sp" id="sp" placeholder="Pesquisar Fornecedor" required></span>
                <span><button type="submit"><i class="fas fa-search"></i> Pesquisar</button></span>
            </form>
        </div>
    <?php endif; ?>

    <!-- Script Dropdown Itens -->
    <script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>