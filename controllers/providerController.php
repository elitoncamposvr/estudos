<?php
class providerController extends controller{
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

		if($u->hasPermission('provider_view')){
			$pd = new Provider();
			$offset =  0;

			$data['p'] = 1;
			if(isset($_GET['p']) && !empty($_GET['p'])){
				$data['p'] = intval($_GET['p']);
				if($data['p'] == 0){
					$data['p'] = 1;
				}
			}

			$offset = ( 10 * ($data['p']-1) );

			$data['provider_list'] = $pd->getList($offset, $u->getCompany());
			$data['provider_count'] = $pd->getCount($u->getCompany());
			$data['p_count'] = ceil( $data['provider_count'] / 10 );
			$data['edit_permission'] = $u->hasPermission('provider_edit');
			
			
			$this->loadTemplate('provider', $data);
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

		if($u->hasPermission('provider_add')){
			$pd = new Provider();
			
			if(isset($_POST['name_provider']) && !empty($_POST['name_provider'])) {
				$name_provider = addslashes($_POST['name_provider']);
				$social_reason = addslashes($_POST['social_reason']);
				$cnpj = addslashes($_POST['cnpj']);
				$state_registration = addslashes($_POST['state_registration']);
				$contact_name = addslashes($_POST['contact_name']);
				$phone = addslashes($_POST['phone']);
				$email = addslashes($_POST['email']);
				$site = addslashes($_POST['site']);
				$aditional_info = addslashes($_POST['aditional_info']);
				$address_zipcode = addslashes($_POST['address_zipcode']);
				$address = addslashes($_POST['address']);
				$address_number = addslashes($_POST['address_number']);
				$address2 = addslashes($_POST['address2']);
				$address_neighb = addslashes($_POST['address_neighb']);
				$address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);

				

			$pd->add($name_provider, $social_reason, $cnpj, $state_registration, $contact_name, $phone, $email, $site, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $u->getCompany());
				header("Location: ".BASE_URL."provider");
			}
			
			$this->loadTemplate('provider_add', $data);
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

		if($u->hasPermission('provider_edit')){
			$pd = new Provider();
			
			if(isset($_POST['name_provider']) && !empty($_POST['name_provider'])) {
                $name_provider = addslashes($_POST['name_provider']);
				$social_reason = addslashes($_POST['social_reason']);
				$cnpj = addslashes($_POST['cnpj']);
				$state_registration = addslashes($_POST['state_registration']);
				$contact_name = addslashes($_POST['contact_name']);
				$phone = addslashes($_POST['phone']);
				$email = addslashes($_POST['email']);
				$site = addslashes($_POST['site']);
				$aditional_info = addslashes($_POST['aditional_info']);
				$address_zipcode = addslashes($_POST['address_zipcode']);
				$address = addslashes($_POST['address']);
				$address_number = addslashes($_POST['address_number']);
				$address2 = addslashes($_POST['address2']);
				$address_neighb = addslashes($_POST['address_neighb']);
				$address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);
				

				$pd->edit($id, $u->getCompany(), $name_provider, $social_reason, $cnpj, $state_registration, $contact_name, $phone, $email, $site, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state);
				header("Location: ".BASE_URL."provider");
			}

			$data['provider_info'] = $pd->getInfo($id, $u->getCompany());
			
			$this->loadTemplate('provider_edit', $data);
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

		if($u->hasPermission('provider_view')){
			$pd = new Provider();
			
			$data['provider_info'] = $pd->getInfo($id, $u->getCompany());
			$this->loadTemplate('provider_view', $data);
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

		if($u->hasPermission('provider_edit')){
			$pd = new Provider();

			$pd->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."provider");


			$this->loadTemplate('provider_edit', $data);
		} else {
			header("Location: ".BASE_URL);
		}
	}

	public function search(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('provider_view')){
			$pd = new Provider();
			
			$sp = addslashes($_GET['sp']);


			$data['provider_list'] = $pd->searchProvider($sp, $u->getCompany());
			$data['edit_permission'] = $u->hasPermission('provider_edit');
			$this->loadTemplate('provider_search', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}
	
}