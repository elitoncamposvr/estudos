<h2><i class="fas fa-dollar-sign fa-lg icon"></i> Financeiro <i class="fas fa-angle-right fa-xs"></i> Vale de Funcionários <i class="fas fa-angle-right fa-xs"></i> Visualizar</h2>
<br>

<div id="printarea">
    <div class="single_receipt txt-up">
        <H1 class="gray">RECIBO Nº <?php echo $singlereceipt_info['id']; ?></H1>
        <div class="line spt">
            <label for="name" class="table-data-view">Nome</label><?php echo $singlereceipt_info['name']; ?>
        </div>
        <div class="line spt">
            <label for="receipt_amount" class="table-data-view">Valor</label>R$ <?php echo number_format($singlereceipt_info['receipt_amount'], 2, ',', '.'); ?>
        </div>
        <div class="line spt">
            <label for="date_receipt" class="table-data-view">Data</label><?php echo date('d/m/Y', strtotime($singlereceipt_info['date_receipt'])); ?>
        </div>
        <div class="line spt">
            <label for="cpf" class="table-data-view">CPF</label><?php echo $singlereceipt_info['cpf']; ?>
        </div>
        <div class="line spt">
            <label for="identity" class="table-data-view">Identidade (RG)</label><?php echo $singlereceipt_info['identity']; ?>
        </div>
        <div class="line spt">
            <label for="regarding" class="table-data-view">Referente à</label><?php echo $singlereceipt_info['regarding'];?>
        </div>

<!-- Linha Assinatura (Signature Line) -->
        <div class="border mgt-50"></div>
        <div class="line spt txt-c">
            <?php echo $singlereceipt_info['name']; ?>
        </div>
    </div>
</div>

<!-- Botão de Impressão (Print Button) -->
<div class="line mgt-30 txt-c">
        <a id="btnprint" class="btn mobile-hidden" href="#" onclick="PrintDiv()">imprimir dados</a>
    </div>

    <!--Script Impressão (Print)  -->
    <script type="text/javascript">
        function PrintDiv() {
            var divToPrint = document.getElementById('printarea');
            var popupWin = window.open('', '_blank');
            popupWin.document.open();
            popupWin.document.write('<html><head><title>Impressão de Vale</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/template.css" /></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
            popupWin.document.close();
        }
    </script>