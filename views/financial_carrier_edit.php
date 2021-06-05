<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div><i class="fas fa-cogs fa-lg icon"></i>
            <p>Configurações<i class="fas fa-angle-right fa-xs"></i>Financeiro<i class="fas fa-angle-right fa-xs"></i>Portador/Carteira<i class="fas fa-angle-right fa-xs"></i>Editar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>financial/settingscarrier"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Formulário de Adição (Form Add) -->
    <form method="post">
        <div class="w-50 my-s">
            <label for="carrier_title">Nome do Portador</label>
            <input type="text" name="carrier_title" id="carrier_title" class="w-100"  value="<?php echo $carrier_info['carrier_title'];?>" required>
        </div>

        <!-- Botões (Button) -->
        <div class="w-100 my-el">
            <button type="submit">
                Editar Portador
            </button>
        </div>
    </form>
</div>