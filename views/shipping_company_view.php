<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-shipping-fast fa-lg icon"></i>
            <p>Transportadoras <i class="fas fa-angle-right fa-xs"></i> Visualizar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>shippingcompany"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>


    <div class="data_info my-m">
        <p>
            <?php echo $shipping_company_info['name_shipping_co'] ?> - (<?php echo $shipping_company_info['social_reason'] ?>)
        </p>
    </div>

    <div class="title_list">
        <p>Últimos Transportes Realizados</p>
        <a class="btn" href="<?php echo BASE_URL; ?>shippingcompany/transportcarriedout">Ver Todos</a>
    </div>

    <p class="my-8 txt-center">Lista dos últimos transportes realizados</p>
</div>