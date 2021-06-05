<?php
class clientsController extends controller{
	public function __construct(){
		
		$u = new Users();
		if($u->isLogged() == false){
			header("Location: ".BASE_URL."login");
			exit;
		}
	}

	public function index(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_view')){
			$c = new Clients();
			$offset =  0;

			$data['p'] = 1;
			if(isset($_GET['p']) && !empty($_GET['p'])){
				$data['p'] = intval($_GET['p']);
				if($data['p'] == 0){
					$data['p'] = 1;
				}
			}

			$offset = ( 10 * ($data['p']-1) );

			$data['clients_list'] = $c->getList($offset, $u->getCompany());
			$data['clients_count'] = $c->getCount($u->getCompany());
			$data['p_count'] = ceil( $data['clients_count'] / 10 );
			$data['edit_permission'] = $u->hasPermission('clients_edit');
			
			$this->loadTemplate('clients', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}
	}

	public function add(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_edit')){
			$c = new Clients();
			
			if(isset($_POST['name']) && !empty($_POST['name'])) {
				$name = addslashes($_POST['name']);
				$client_type = addslashes($_POST['client_type']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $cellphone = addslashes($_POST['cellphone']);
                $whatsapp = addslashes($_POST['whatsapp']);
                $cpf = addslashes($_POST['cpf']);
                $cnpj = addslashes($_POST['cnpj']);
                $state_registration = addslashes($_POST['state_registration']);
                $identity = addslashes($_POST['identity']);
                $birth_date = addslashes($_POST['birth_date']);
				
				$limit_credit = addslashes($_POST['limit_credit']);
				$aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address2 = addslashes($_POST['address2']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);

				$limit_credit = str_replace('.', '', $limit_credit);
				$limit_credit = str_replace(',', '.', $limit_credit);

				$birth_date = implode("-",array_reverse(explode("/",$birth_date)));
				
			
				

			$c->add($u->getCompany(), $client_type, $name, $email, $phone, $cellphone, $whatsapp, $cpf, $cnpj, $state_registration, $identity, $birth_date, $limit_credit, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state);
				header("Location: ".BASE_URL."clients");
			}
			
			$this->loadTemplate('clients_add', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}

	public function edit($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_edit')){
			$c = new Clients();
			
			if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
				$client_type = addslashes($_POST['client_type']);
                $email = addslashes($_POST['email']);
                $phone = addslashes($_POST['phone']);
                $cellphone = addslashes($_POST['cellphone']);
                $whatsapp = addslashes($_POST['whatsapp']);
                $cpf = addslashes($_POST['cpf']);
                $cnpj = addslashes($_POST['cnpj']);
                $state_registration = addslashes($_POST['state_registration']);
                $identity = addslashes($_POST['identity']);
                $birth_date = addslashes($_POST['birth_date']);
				$limit_credit = addslashes($_POST['limit_credit']);
				$aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address2 = addslashes($_POST['address2']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);
				$date_register = addslashes($_POST['date_register']);

				$limit_credit = str_replace('.', '', $limit_credit);
				$limit_credit = str_replace(',', '.', $limit_credit);
				
				$birth_date = implode("-",array_reverse(explode("/",$birth_date)));

				$c->edit($id, $u->getCompany(), $client_type, $name, $email, $phone, $cellphone, $whatsapp, $cpf, $cnpj, $state_registration, $identity, $birth_date, $limit_credit, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $date_register);
				header("Location: ".BASE_URL."clients");
			}

			$data['client_info'] = $c->getInfo($id, $u->getCompany());
			
			$this->loadTemplate('clients_edit', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}

	public function view($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_view')){
			$c = new Clients();
			
			$data['client_info'] = $c->getInfo($id, $u->getCompany());
			$this->loadTemplate('clients_view', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}

	public function extract($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_extract')){
			$c = new Clients();
			
			$data['client_info'] = $c->getInfo($id, $u->getCompany());
			$this->loadTemplate('clients_extract', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}

	public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_edit')){
			$c = new Clients();

			$c->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."clients");

			$this->loadTemplate('clients', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}

	public function searchadvanced(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('clients_edit')){
			$c = new Clients();



			$this->loadTemplate('clients_search', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}
}