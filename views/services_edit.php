<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-wrench fa-lg icon"></i>
            <p>Serviços <i class="fas fa-angle-right fa-xs"></i> Editar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>services"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Formulário (Add Form) -->
    <form method="POST">
    <div class="fb-100 wrap">
            <div class="w-100 my-s">
                <label for="name_service" class="fb-100">Nome do Serviço</label>
                <input class="w-50" type="text" name="name_service" id="name_service" value="<?php echo $services_info['name_service']; ?>" autofocus required>
            </div>
            <div class="w-100 my-s">
                <label class="fb-100" for="standard_value">Valor Padrão</label>
                <input class="w-50" type="text" name="standard_value" id="standard_value" value="<?php echo number_format($services_info['standard_value'], 2, ',', '.'); ?>" required>
            </div>
        </div>

        <!-- Botão (Button) -->
        <button class="my-el" type="submit">
            Editar Serviço
        </button>
    </form>
</div>

<!-- SCRIPTS JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>