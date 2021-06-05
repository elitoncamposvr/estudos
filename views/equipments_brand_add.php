<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div><i class="fas fa-cogs fa-lg icon"></i>
            <p>Configurações<i class="fas fa-angle-right fa-xs"></i>Veículos<i class="fas fa-angle-right fa-xs"></i>Marcas<i class="fas fa-angle-right fa-xs"></i>Adicionar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>equipments/brands"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>
    <div class="w-100">
        <!-- Formulário de Adição (Add Form) -->
        <form method="POST">
            <label for="name_brand"></label>
            <div class="w-50 my-s">
                <input type="text" name="name_brand" id="name_brand" class="w-100" required>
            </div>
    </div>
    <!-- Botão (Button) -->
    <button type="submit" class="my-el">
        Adicionar Marca
    </button>
    </form>
</div>