<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos<i class="fas fa-angle-right fa-xs"></i>Funcionários<i class="fas fa-angle-right fa-xs"></i>Vales<i class="fas fa-angle-right fa-xs"></i>Visualizar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>worthemployee"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Botões (Buttons) -->
    <div class="menu_data">
        <p>
            <?php if ($edit_permission) : ?>
                <a class="btn" href="<?php echo BASE_URL; ?>worthemployee/edit/<?php echo $worth_view['id']; ?>">Editar Vale</a>
            <?php endif; ?>
        </p>
        <p>
            <a href="#" class="btn mobile-hidden" onclick="PrintDiv()"><i class="fas fa-print"></i></a>
        </p>
    </div>


    <div id="printarea" class="txt-up">
        <h1 class="w-100 mb-2">Vale Funcionário nº <?php echo $worth_view['id']; ?></h1>
        <div class="w-50 py-s">
            <label for="name" class="mr-el bold">Nome</label>
            <?php echo $worth_view['name_employee']; ?>
        </div>
        <div class="w-50 py-s">
            <label for="advance_amount" class="mr-el bold">Data</label>
            R$ <?php echo number_format($worth_view['advance_amount'], 2, ',', '.'); ?>
        </div>
        <div class="w-50 py-s">
            <label for="date_worth" class="bold">Data</label>
            <?php echo date('d/m/Y', strtotime($worth_view['date_worth'])); ?>
        </div>
        <div class="w-50 py-s">
            <label for="aditional_info" class="bold">Observações</label>
            </label><?php echo $worth_view['aditional_info']; ?>
        </div>


        <!-- Linha Assinatura (Signature Line) -->
        <div class="signature_line mt-5"></div>
        <div class="w-100 txt-center">
            <?php echo $worth_view['name_employee']; ?>
        </div>
    </div>

</div>

<!--Script Impressão (Print)  -->
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>Impressão de Vale</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css" /><style>body{display:block;}.display_print{display:block;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>