<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div><i class="fas fa-dolly-flatbed fa-lg icon"></i>
            <p>Fornecedores <i class="fas fa-angle-right fa-xs"></i> Visualizar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>provider"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <div class="data_info my-m">
        <p>
            <?php echo $provider_info['name_provider']; ?> - (<?php echo $provider_info['social_reason']; ?>)
        </p>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>provider_extract">Extrato Financeiro</a>
            <a class="btn" href="<?php echo BASE_URL; ?>purchases">Compras/Pedidos</a>
        </span>
    </div>

    <div class="title_list">
        <p>Últimos Pedidos</p>
    </div>
    <p class="my-8 txt-center">Lista de todos os pedidos</p>

    <div class="title_list">
        <p>Faturas</p>
    </div>
    <p class="my-8 txt-center">Lista de todos os boletos em aberto</p>

</div>