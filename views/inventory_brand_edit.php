<div class="content">

    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-cogs fa-lg icon"></i>
            <p>Configurações <i class="fas fa-angle-right fa-xs"></i> Marca de Produtos <i class="fas fa-angle-right fa-xs"></i> Editar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>inventory/brand"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Formulário (Form) -->
    <form method="POST">
        <div class="w-100 my-l">
            <label for="name_product" class="mr-2">Nome da Marca</label>
            <input type="text" name="name_product" id="name_product" class="w-50" value="<?php echo $product_brand_info['name_product']; ?>" required autofocus>
        </div>

        <!-- Botão (Button) -->
        <div class="w-100 txt-center my-el">
            <button type="submit">
                Alterar Marca
            </button>
        </div>
    </form>
</div>