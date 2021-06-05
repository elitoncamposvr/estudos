<?php
class equipmentsController extends controller
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

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['equipments_list'] = $eq->getList($offset, $u->getCompany());
            $data['equipments_count'] = $eq->getCount($u->getCompany());
            $data['p_count'] = ceil($data['equipments_count'] / 10);
            $data['equipments_brand_list'] = $eq->getEquipmentBrandList($u->getCompany());

            $this->loadTemplate('equipments', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if (isset($_POST['name']) && !empty($_POST['name'])) {

                $name = addslashes($_POST['name']);
                $id_brand = addslashes($_POST['id_brand']);

                $eq->add($name, $id_brand, $u->getCompany());

                header("Location: " . BASE_URL . "equipments");
            }
            $data['equipments_brand_list'] = $eq->getEquipmentBrandList($u->getCompany());
            $this->loadTemplate('equipments_add', $data);
        }
    }

    public function edit($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if (isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $id_brand = addslashes($_POST['id_brand']);

                $eq->edit($id, $name, $id_brand, $u->getCompany());

                header("Location: " . BASE_URL . "equipments");
            }

            $data['equipments_info'] = $eq->getInfo($id, $u->getCompany());
            $data['equipments_brand_list'] = $eq->getEquipmentBrandList($u->getCompany());


            $this->loadTemplate('equipments_edit', $data);
        }
    }

    public function delete($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            $eq->delete($id, $u->getCompany());
            header("Location: " . BASE_URL . "equipments");


            $this->loadTemplate('equipments', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function view($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('employee_view')) {
            $e = new Employee();

            $data['employee_info'] = $e->getInfo($id, $u->getCompany());

            $this->loadTemplate('employee_view', $data);
        }
    }

    public function brands()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['equipments_brands_list'] = $eq->getEquipmentBrandListFiltered($offset, $u->getCompany());
            $data['brands_count'] = $eq->getBrandsCount($u->getCompany());
            $data['p_count'] = ceil($data['brands_count'] / 10);

            $this->loadTemplate('equipments_brand', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function add_brand()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {

            if (isset($_POST['name_brand']) && !empty($_POST['name_brand'])) {
                $eq = new Equipments();

                $name_brand = addslashes($_POST['name_brand']);

                $eq->addEquipmentBrand($name_brand, $u->getCompany());

                header("Location: " . BASE_URL . "equipments/brands");
            }

            $this->loadTemplate('equipments_brand_add', $data);
        }
    }

    public function edit_brand($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            if (isset($_POST['name_brand']) && !empty($_POST['name_brand'])) {
                $name_brand = addslashes($_POST['name_brand']);

                $eq->editEquipmentBrand($id, $name_brand, $u->getCompany());

                header("Location: " . BASE_URL . "equipments/brands");
            }

            $data['equipments_brand_info'] = $eq->getEquipmentBrandInfo($id, $u->getCompany());


            $this->loadTemplate('equipments_brand_edit', $data);
        }
    }

    public function delete_brand($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('equipments')) {
            $eq = new Equipments();

            $eq->deleteEquipmentBrand($id, $u->getCompany());
            header("Location: " . BASE_URL . "equipments");


            $this->loadTemplate('equipments', $data);
        } else {
            header("Location: " . BASE_URL);
        }
    }

    public function settings()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('equipments')) {
			$eq = new Equipments();


			$this->loadTemplate('equipments_settings', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
		}
	}
}
