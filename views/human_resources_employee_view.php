<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos <i class="fas fa-angle-right fa-xs"></i> Funcionários <i class="fas fa-angle-right fa-xs"></i> Visualizar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>humanresources/employee"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Botões de Navegação (Navigation Buttons) -->
    <div class="data_info my-m">
        <p>
            <?php echo $employee_info['name_employee']; ?>
        </p>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>humanrsources/employeeextract">Extrato</a>
        </span>
    </div>

    <div class="title_list">
        <p>Últimos Descontos</p>
        <a class="btn" href="<?php echo BASE_URL; ?>humanresources/worthemployee">Ver Todos</a>
    </div>
    
    <p class="my-8 txt-center">Lista dos últimos descontos</p>
</div>