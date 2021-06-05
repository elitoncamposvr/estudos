<?php
class servicesController extends controller{
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

		if($u->hasPermission('services_view')){
			$services = new Services();
			$offset = 0;

			$data['p'] = 1;
			if(isset($_GET['p']) && !empty($_GET['p'])){
				$data['p'] = intval($_GET['p']);
				if($data['p'] == 0){
					$data['p'] = 1;
				}
			}

			$offset = ( 10 * ($data['p']-1) );

			$data['services_list'] = $services->getList($offset, $u->getCompany());
			$data['services_count'] = $services->getCount($u->getCompany());
			$data['p_count'] = ceil( $data['services_count'] / 10 );
			
			
			$this->loadTemplate('services', $data);
		} else {
			header("Location: ".BASE_URL);
		}
	}

	public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('services_edit')) {
            $services = new Services();

            if(isset($_POST['name_service']) && !empty($_POST['name_service'])) {
                
                $name_service = addslashes($_POST['name_service']);
				$standard_value = addslashes($_POST['standard_value']);
				
				$standard_value = str_replace('.', '', $standard_value);
                $standard_value = str_replace(',', '.', $standard_value);
                

                $services->add($name_service, $standard_value, $u->getCompany());

                header("Location: ".BASE_URL."services");
            }
            $this->loadTemplate('services_add', $data);
        }
	}

	public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('services_edit')) {
            $services = new Services();

            if(isset($_POST['name_service']) && !empty($_POST['name_service'])) {
                
                $name_service = addslashes($_POST['name_service']);
				$standard_value = addslashes($_POST['standard_value']);
				
				$standard_value = str_replace('.', '', $standard_value);
                $standard_value = str_replace(',', '.', $standard_value);
                

                $services->edit($id, $name_service, $standard_value, $u->getCompany());

                header("Location: ".BASE_URL."services");
			}
			$data['services_info'] = $services->getInfo($id, $u->getCompany());

            $this->loadTemplate('services_edit', $data);
        }
	}
	
	public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('services_edit')){
			$services = new Services();

			$services->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."services");


			$this->loadTemplate('services', $data);
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

		if($u->hasPermission('services_view')){
			$services = new Services();
			
			$sp = addslashes($_GET['sp']);


			$data['services_list'] = $services->searchService($sp, $u->getCompany());

			$this->loadTemplate('services_search', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}
}