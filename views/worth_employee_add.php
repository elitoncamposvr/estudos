<div class="content">
    <!-- Breadcrumbs -->
    <div class="breadcrumb">
        <div>
            <i class="fas fa-id-card-alt fa-lg icon"></i>
            <p>Recursos Humanos<i class="fas fa-angle-right fa-xs"></i>Funcionários<i class="fas fa-angle-right fa-xs"></i>Vales<i class="fas fa-angle-right fa-xs"></i>Adicionar</p>
        </div>
        <span>
            <a class="btn" href="<?php echo BASE_URL; ?>worthemployee"><i class="fas fa-angle-double-left"></i> Voltar</a>
        </span>
    </div>

    <!-- Formulário -->
    <form method="POST">
        <div class="w-50 py-s">
            <label for="name">Nome do Funcionário</label>
            <select name="name" id="name" class="w-100">
                <?php foreach ($employee_list as $e_list) : ?>
                    <option value="<?php echo $e_list['id']; ?>"><?php echo $e_list['name_employee']; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="w-50 py-s">
            <label for="date_worth">Data</label>
            <input class="w-100" type="date" name="date_worth" id="date_worth" value="<?= date("Y-m-d"); ?>" required>
        </div>
        <div class="w-50 py-s">
            <label for="advance_amount">Valor</label>
            <input class="w-100" type="text" name="advance_amount" id="advance_amount" required>
        </div>
        <div class="w-50 py-s">
            <label for="aditional_info">Observações</label>
            <textarea name="aditional_info" id="aditional_info" class="w-100"></textarea>
        </div>

        <!-- Botões (Button) -->
        <div class="w-50 txt-center my-el">
            <button type="submit">
                Adicionar Vale
            </button>
        </div>
    </form>
</div>


<!-- Scripts JS -->
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?php echo BASE_URL; ?>assets/js/script_price.js"></script>