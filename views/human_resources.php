<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos</p>
        </div>
    </div>

    <!-- CARD PRINCIPAL (MAIN CARD) -->
    <div class="fb-100">
        <div class="main_card">
            <p><?php echo $employee_active; ?></p>
            <span>Funcionários Ativos</span>
        </div>
    </div>

    <!-- CARDS SECUNDÁRIOS (SECONDARY CARDS) -->
    <div class="flex wrap w-100 mt-3 btw">
        <a class="card mr-3" href="<?php echo BASE_URL; ?>humanresources/employee">
            <i class="fas fa-id-card-alt fa-3x icon_card"></i>
            <span>Funcionários</span>
        </a>

        <a class="card mr-3" href="#">
            <i class="fas fa-list-alt fa-3x icon_card"></i>
            <span>Ocorrências Funcionais</span>
        </a>
        <a class="card mr-3" href="worthemployee">
            <i class="fas fa-dollar-sign fa-3x icon_card"></i>
            <span>Vales</span>
        </a>
        <a class="card mr-3" href="#">
            <i class="fas fa-file-invoice-dollar fa-3x icon_card"></i>
            <span>Holerites</span>
        </a>
        <a class="card mr-3" href="#">
            <i class="fas fa-file-alt fa-3x icon_card"></i>
            <span>Relatórios</span>
        </a>
        <a class="card mr-3" href="#">
            <i class="fas fa-cogs fa-3x icon_card"></i>
            <span>Configurações</span>
        </a>
    </div>
</div>