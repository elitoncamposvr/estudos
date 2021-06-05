<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos <i class="fas fa-angle-right fa-xs"></i> Funcionários <i class="fas fa-angle-right fa-xs"></i> Resultado da Pesquisa</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>humanresources/employee"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Botões (Buttons) -->
    <div class="menu_data">
        <p>
            <a class="btn" href="<?php echo BASE_URL; ?>humanresources/employee_add">Novo Funcionário</a>
        </p>
        <span class="w-30">
            <form action="<?php echo BASE_URL; ?>humanresources/employeesearch">
                <span class="mb-2"><input type="text" class="w-100" name="sp" id="sp" placeholder="Pesquisar Funcionário" required></span>
            </form>
        </span>
    </div>

    <!--Cabeçalho da Tabela-->
    <?php if ($employee_list) : ?>
        <div class="table_header">
            <div class="w-40">Nome</div>
            <div class="w-15">Apelido</div>
            <div class="w-20">Celular</div>
            <div class="w-15 txt-center">Situação</div>
            <div class="w-10 txt-center"></div>
        </div>

        <!--Dados da Tabela-->
        <?php foreach ($employee_list as $e) : ?>
            <div class="table_data">
                <div class="w-40 txt-up"><?php echo $e['name_employee']; ?></div>
                <div class="w-15 txt-up"><?php echo $e['nickname']; ?></div>
                <div class="w-20"><?php echo $e['cellphone']; ?></div>
                <div class="w-15 txt-center"><?php if ($e['status'] == 1) {
                                                    echo '<span class="info">Ativo</span>';
                                                } else {
                                                    echo '<span class="info_danger">Inativo</span>';
                                                } ?></div>
                <div class="w-10 txt-center">
                    <div class="dropdown">
                        <i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
                        <div id="myDropdown1" class="dropdown-content">
                            <?php if ($edit_permission) : ?>
                                <ul>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>humanresources/employee_edit/<?php echo $e['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>humanresources/employee_delete/<?php echo $e['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>humanresources/employee_view/<?php echo $e['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                </ul>
                            <?php else : ?>
                                <ul>
                                    <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>humanresources/employee_view/<?php echo $e['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
</div>

<!--Paginação-->
<!-- <?php if ($p_count > 1) { ?>
	<div class="pagination">
		<a class="pag_item" href="<?php echo BASE_URL; ?>humanresources/employee?p=1">Primeira</a>
		<?php
            for ($q = $p - 5; $q <= $p - 1; $q++) {
                if ($q >= 1) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>humanresources/employee?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
            } ?>
		<div class="pag_item pag_ative"><?php echo "$q"; ?></div>
		<?php for ($q = $p + 1; $q <= $p + 5; $q++) {
                if ($q <= $p_count) { ?>
				<a class="pag_item" href="<?php echo BASE_URL; ?>humanresources/employee?p=<?php echo $q; ?>"><?php echo $q; ?></a>
		<?php }
            }
        ?>
		<a class="pag_item" href="<?php echo BASE_URL; ?>humanresources/employee?p=<?php echo $p_count; ?>">Última</a>
	</div>
<?php } ?> -->

<?php else : ?>
    <div class="txt-center mg-top-50"><i class="fas fa-exclamation-circle fa-lg warning"></i> Nenhum registro encontrado!</div>
    <div class="search_inventory">
        <form class="w-100" action="<?php echo BASE_URL; ?>humanresources/employeesearch">
            <p class="mb-l">Refaça sua pesquisa</p>
            <span class="mb-2"><input type="text" class="w-30 txt-center" name="sp" id="sp" placeholder="Pesquisar Funcionário" required></span>
            <span><button type="submit"><i class="fas fa-search"></i> Pesquisar</button></span>
        </form>
    </div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>