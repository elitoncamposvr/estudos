<?php
class budgetController extends controller
{
	public function __construct()
	{

		$u = new Users();
		if ($u->isLogged() == false) {
			header("Location: " . BASE_URL . "login");
			exit;
		}
	}

	public function index()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('budget_view')) {
			

			$this->loadTemplate('budget', $data);
		} else {
			header("Location: " . BASE_URL);
		}
	}
/*
	public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                
                $name = addslashes($_POST['name']);
                $id_brand = addslashes($_POST['id_brand']);

                $eq->add($name, $id_brand, $u->getCompany());

                header("Location: ".BASE_URL."equipments");
            }
            $data['equipments_brand_list'] = $eq->getEquipmentBrandList($u->getCompany());
            $this->loadTemplate('equipments_add', $data);
        }
	}
	
    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $id_brand = addslashes($_POST['id_brand']);
                
                $eq->edit($id, $name, $id_brand, $u->getCompany());

                header("Location: ".BASE_URL."equipments");
            }

            $data['equipments_info'] = $eq->getInfo($id, $u->getCompany());
            $data['equipments_brand_list'] = $eq->getEquipmentBrandList($u->getCompany());
            

            $this->loadTemplate('equipments_edit', $data);
        }
    }

    public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('equipments')){
			$eq = new Equipments();

			$eq->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."equipments");


			$this->loadTemplate('equipments', $data);
		} else {
			header("Location: ".BASE_URL);
		}

    }
    
    public function view($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('employee_view')) {
            $e = new Employee();

            $data['employee_info'] = $e->getInfo($id, $u->getCompany());

            $this->loadTemplate('employee_view', $data);
        }
    }

    public function add_brand() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('equipments')) {

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $eq = new Equipments();

                $name = addslashes($_POST['name']);

                $eq->addEquipmentBrand($name, $u->getCompany());

                header("Location: ".BASE_URL."equipments");
            }

            $this->loadTemplate('equipments_brand_add', $data);
        }
	}

    public function edit_brand($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                
                $eq->editEquipmentBrand($id, $name, $u->getCompany());

                header("Location: ".BASE_URL."equipments");
            }

            $data['equipments_brand_info'] = $eq->getEquipmentBrandInfo($id, $u->getCompany());
            

            $this->loadTemplate('equipments_brand_edit', $data);
        }
    }

    public function delete_brand($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('equipments')){
			$eq = new Equipments();

			$eq->deleteEquipmentBrand($id, $u->getCompany());
			header("Location: ".BASE_URL."equipments");


			$this->loadTemplate('equipments', $data);
		} else {
			header("Location: ".BASE_URL);
		}

    }
    */
    
}
