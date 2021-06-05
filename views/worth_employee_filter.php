<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos<i class="fas fa-angle-right fa-xs"></i>Funcionários<i class="fas fa-angle-right fa-xs"></i>Vales</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>worthemployee"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Botões -->
    <div class="menu_data">
        <a class="btn" href="<?php echo BASE_URL; ?>worthemployee/add">Adicionar Vale</a>
        <span class="w-30 txt-right">
            <a href="#" class="btn" onclick="PrintDiv()"><i class="fas fa-print"></i></a>
            <a href="#" class="btn" onclick="itemShow()"><i class="fas fa-filter"></i> Filtrar</a>
        </span>
    </div>
    <div class="menu_data-filter flex" id="item_toggle">
        <form action="<?php echo BASE_URL; ?>worthemployee/filter" method="get" class="fb-100">
            <p class="w-30 mr-el">
                <select name="name_employee" id="name_employee" class="w-100">
                    <?php foreach ($employee_list as $e_list) : ?>
                        <option value="<?php echo $e_list['id']; ?>"><?php echo $e_list['name_employee']; ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p class="w-50 txt-center">
                Período <input type="date" name="period1" id="period1" value="<?php echo date('Y-m-01'); ?>">
                até <input type="date" name="period2" id="period2" value="<?php echo date('Y-m-d'); ?>">
            </p>
            <p class=" w-15 txt-center">
                <input type="submit" value="Filtrar">
            </p>
        </form>
    </div>
    <!-- Cabeçalho Tabela -->
    <?php if ($filter_list) : ?>
        <div id="printarea">
            <h2 class="display_print txt-center">Vales no período de <?php echo date('d/m/Y', strtotime($_GET['period1'])); ?> à <?php echo date('d/m/Y', strtotime($_GET['period2'])); ?></h2>
            <div class="table_header">
                <div class="w-40">Nome</div>
                <div class="w-25">Valor</div>
                <div class="w-25">Data</div>
                <div class="w-10"></div>
            </div>

            <!-- Dados Tabela -->
            <?php foreach ($filter_list as $we) : ?>
                <div class="table_data">
                    <div class="w-40"><?php echo $we['name_employee']; ?></div>
                    <div class="w-25">R$ <?php echo number_format($we['advance_amount'], 2, ',', '.'); ?></div>
                    <div class="w-25"><?php echo date('d/m/Y', strtotime($we['date_worth'])); ?></div>
                    <div class="w-10">
                        <div class="dropdown">
                            <i class="fas fa-ellipsis-h dropbtn" onclick="myFunction(this);"></i>
                            <div id="myDropdown1" class="dropdown-content">
                                <?php if ($edit_permission) : ?>
                                    <ul>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>worthemployee/edit/<?php echo $we['id']; ?>"><i class="fas fa-edit"></i> Editar</a></li>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>worthemployee/delete/<?php echo $we['id']; ?>" onclick="return confirm('Deseja realmente excluir?')"><i class="fas fa-trash-alt"></i> Deletar</a></li>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>worthemployee/view/<?php echo $we['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                    </ul>
                                <?php else : ?>
                                    <ul>
                                        <li><a class="dropdown-item" href="<?php echo BASE_URL; ?>worthemployee/view/<?php echo $we['id']; ?>"><i class="fas fa-eye"></i> Visualizar</a></li>
                                    </ul>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
</div>

<?php else : ?>
    <div class="flash_info my-x">
        <p><i class="fas fa-exclamation-circle fa-2x px"></i></p><span>Nenhum registro encontrado!</span>
    </div>
<?php endif; ?>

<!-- Script Dropdown Itens -->
<script src="<?php echo BASE_URL; ?>assets/js/dropdown_itens.js"></script>
<script src="<?php echo BASE_URL; ?>assets/js/functions.js"></script>

<!--Script Impressão (Print)  -->
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>Lista de Vales</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css" /><style>body{display:block;}.display_print{display:block;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>