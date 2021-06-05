<!-- Breadcrumbs -->
<div class="breadcrumb">
    <div><i class="fas fa-users fa-lg icon"></i>
        <p>Clientes <i class="fas fa-angle-right fa-xs"></i> Visualizar</p>
    </div>
    <span>
        <a class="btn" href="<?php echo BASE_URL; ?>clients"><i class="fas fa-angle-double-left"></i> Voltar</a>
    </span>
</div>

<!-- Botões de Navegação (Navigation Buttons) -->
<div class="fb-100 my-l">
    <a class="btn" href="<?php echo BASE_URL; ?>clients/edit/<?php echo $client_info['id']; ?>">Editar</a>
    <a class="btn mx-s" href="<?php echo BASE_URL; ?>clients/extract/<?php echo $client_info['id']; ?>">Extrato</a>
    <a class="btn mx-s" href="#" id="btn_print" onclick="PrintDiv()">Imprimir</a>
</div>

<!-- Dados do Client (Client's Data) -->
<div id="printarea" class="w-100">
    <h2 class="display_print txt-center">Informações do Cliente</h2>
    <div class="fb-100 py-1 bg_tables">
        <label class="mr-el px-s bold" for="phone">Nome do Cliente</label>
        <p><?php echo $client_info['name']; ?></p>
    </div>
    <div class="fb-100 py-1">
        <div class="fb-33 my-s">
            <label class="mr-el px-s bold" for="phone">Telefone</label>
            <p><?php echo $client_info['phone']; ?></p>
        </div>
        <div class="fb-33 my-s">
            <label class="mr-el bold" for="cellphone">Celular</label>
            <p><?php echo $client_info['cellphone']; ?></p>
        </div>
        <div class="fb-33 my-s">
            <label class="mr-el bold" for="whatsapp">WhatsApp</label>
            <p><?php echo $client_info['whatsapp']; ?></p>
        </div>
    </div>
    <div class="fb-100 py-1 bg_tables">
        <div class="fb-33 my-s">
            <label class="mr-el px-s bold" for="cpf">CPF/CNPJ</label>
            <p>
                <?php echo $client_info['cpf'];
                echo $client_info['cnpj']; ?>
            </p>
        </div>
        <div class="fb-33 my-s">
            <label class="mr-el bold" for="identity">RG</label>
            <p><?php echo $client_info['identity']; ?></p>
        </div>
        <div class="fb-33 my-s">
            <label class="mr-el bold" for="state_registration">Inscrição Estadual</label>
            <p><?php echo $client_info['state_registration']; ?></p>
        </div>
    </div>
    <div class="fb-100 py-1">
        <div class="fb-50 my-s">
            <label for="" class="mr-el px-s bold">Data de Nascimento</label>
            <p><?php echo date('d/m/Y', strtotime($client_info['birth_date'])); ?></p>
        </div>
        <div class="fb-50 my-s">
            <label class="mr-el bold" for="">E-mail</label>
            <p><?php echo $client_info['email']; ?></p>
        </div>
    </div>
    <div class="fb-100 py-1 bg_tables">
        <div class="fb-50 px-s my-s">
            <label class="mr-el bold" for="">Limite de Crédito</label>
            <p><?php echo number_format($client_info['limit_credit'], 2, ',', '.'); ?></p>
        </div>
        <div class="fb-50 my-s">
            <label class="mr-el bold" for="">Limite Disponível</label>
            <p></p>
        </div>
    </div>
    <div class="fb-100 py-1">
        <label class="mr-el px-s bold" for="">Informações Adicionais</label>
        <p><?php echo $client_info['aditional_info']; ?></p>
    </div>

    <!-- Endereço (Address) -->
    <h2 class="spt my-el">Endereço</h2>
    <div class="fb-100 py-1 bg_tables">
        <label class="mr-el px-s bold" for="">Endereço</label>
        <p><?php echo $client_info['address'] . ", " . $client_info['address_number'] . ", " . $client_info['address_neighb'] . ", " . $client_info['address2']; ?></p>
    </div>
    <div class="fb-100 py-1">
        <label for="" class="mr-el px-s bold">Cidade/UF</label>
        <p><?php echo $client_info['address_city'] . " - " . $client_info['address_state']; ?></p>
    </div>
</div>

<!--Script Impressão (Print)  -->
<script type="text/javascript">
    function PrintDiv() {
        var divToPrint = document.getElementById('printarea');
        var popupWin = window.open('', '_blank');
        popupWin.document.open();
        popupWin.document.write('<html><head><title>Informações do Cliente</title><meta name="viewport" content="width=device-width, initial-scale=1.0"><link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css" /><style>body{display:block;}.display_print{display:block;}</style></head><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
        popupWin.document.close();
    }
</script>