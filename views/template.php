<!DOCTYPE html>
<html>

<head>
	<meta charset='utf-8'>
	<meta lang="pt-br">
	<meta http-equiv='X-UA-Compatible' content='IE=edge'>
	<title>7UpCar - Painel de <?php echo $viewData['company_name']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo BASE_URL; ?>assets/images/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="<?php echo BASE_URL; ?>assets/css/main.css" />

	<!-- FontAwesome JS-->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script type="text/javascript">
		var BASE_URL = '<?php echo BASE_URL; ?>';
	</script>
</head>

<body>
	<div class="container">
		<div class="aside menuOpen">
			<nav>
				<span class="logo">
					Logo
				</span>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>" class="btn-menu"><i class="fas fa-home fa-lg"></i>Visão Geral</a>
				</div>
				<div class="item" id="registrations-menu">
					<a href="#registrations-menu" class="btn-menu"><i class="fas fa-address-book fa-lg"></i>Cadastros</a>
					<div class="submenu">
						<a href="<?php echo BASE_URL; ?>clients">Clientes</a>
						<a href="<?php echo BASE_URL; ?>provider">Fornecedores</a>
						<a href="<?php echo BASE_URL; ?>services">Serviços</a>
						<a href="<?php echo BASE_URL; ?>shippingcompany">Trasnportadoras</a>
					</div>
				</div>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>orderservice" class="btn-menu"><i class="fas fa-tools fa-lg"></i>Ordem de Serviço</a>
				</div>
				<div class="item" id="inventory-menu">
					<a href="#inventory-menu" class="btn-menu"><i class="fas fa-boxes fa-lg"></i>Estoque</a>
					<div class="submenu">
						<a href="<?php echo BASE_URL; ?>inventory">Produtos</a>
						<a href="<?php echo BASE_URL; ?>purchases">Compras</a>
					</div>
				</div>
				<div class="item" id="sales-menu">
					<a href="#sales-menu" class="btn-menu"><i class="fas fa-shopping-cart fa-lg"></i>Vendas</a>
					<div class="submenu">
						<a href="<?php echo BASE_URL; ?>sales">Vendas</a>
						<a href="<?php echo BASE_URL; ?>budget">Orçamentos</a>
					</div>
				</div>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>schedule" class="btn-menu"><i class="fas fa-tools fa-lg"></i>Agenda</a>
				</div>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>financial" class="btn-menu"><i class="fas fa-dollar-sign fa-lg"></i>Financeiro</a>
				</div>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>humanresources" class="btn-menu"><i class="fas fa-id-card-alt fa-lg"></i>Recursos Humanos</a>
				</div>
				<hr>
				<div class="item">
					<a href="<?php echo BASE_URL; ?>settings" class="btn-menu"><i class="fas fa-cogs fa-lg"></i>Configurações</a>
				</div>
			</nav>
		</div>
		<div class="main_content main_content_normal">
			<header>
				<span onclick="menuToggle()" class="toggle_menu"><i class="fas fa-bars fa-2x"></i></span>
				<input type="text" name="main_search" id="main_search" placeholder="Pesquisa Cliente">
				<span class="avatar"><a href="<?php echo BASE_URL; ?>login/logout"><i class="fas fa-sign-out-alt fa-lg"></i></a></span>
			</header>
			<section>
				<article>
					<?php $this->loadViewInTemplate($viewName, $viewData); ?>
				</article>
			</section>
			<footer>
				<p>7UpCar - Sistema Desenvolvido por <a href="https://7upweb.com.br" target="_blank">7UpWeb</a></p>
			</footer>
		</div>
	</div>

	<script src="<?php echo BASE_URL; ?>assets/js/main_script.js"></script>
</body>

</html>