<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div><i class="fas fa-cogs fa-lg icon"></i>
            <p>Configurações<i class="fas fa-angle-right fa-xs"></i>Veículos<i class="fas fa-angle-right fa-xs"></i>Modelos<i class="fas fa-angle-right fa-xs"></i>Editar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>equipments"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Botão (Button) -->
    <form method="post">
        <div class="w-50 my-s">
            <label for="name">Modelo de Veículo</label>
            <input type="text" name="name" id="name" class="w-100" value="<?php echo $equipments_info['name']; ?>" required>
        </div>
        <div class="w-50 my-s">
            <label for="id_brand">Marca do Veículo</label>
            <select name="id_brand" id="id_brand" class="w-100">
                <?php foreach ($equipments_brand_list as $eq) : ?>
                    <option class="txt-up" value="<?php echo $eq['id']; ?>" <?php if ($equipments_info['id_brand'] == $eq['id']) {
                                                                    echo 'selected="selected"';
                                                                } else {
                                                                    echo '';
                                                                } ?>><?php echo $eq['name_brand']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>

        <!-- Botão (Button) -->
        <button type="submit" class="my-el">
            Editar Modelo
        </button>
    </form>
</div>