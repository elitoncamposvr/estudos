<?php
class humanresourcesController extends controller
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

        if ($u->hasPermission('human_resources_view')) {
            $hr = new HumanResources();
            

            $data['employee_active'] = $hr->getEmployeeActiveCount($u->getCompany());

            $this->loadTemplate('human_resources', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employee()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('human_resources_view')) {
            $hr = new HumanResources();

            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['employee_list'] = $hr->getEmployeeList($offset, $u->getCompany());
            $data['employee_count'] = $hr->getEmployeeCount($u->getCompany());
            $data['p_count'] = ceil($data['employee_count'] / 10);
            $data['edit_permission'] = $u->hasPermission('human_resources_edit');



            $this->loadTemplate('human_resources_employee', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employee_add()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('human_resources_view')) {

            if (isset($_POST['name_employee']) && !empty($_POST['name_employee'])) {
                $hr = new HumanResources();

                $name_employee = addslashes($_POST['name_employee']);
                $nickname = addslashes($_POST['nickname']);
                $phone = addslashes($_POST['phone']);
                $cellphone = addslashes($_POST['cellphone']);
                $father_name = addslashes($_POST['father_name']);
                $mother_name = addslashes($_POST['mother_name']);
                $birth_date = addslashes($_POST['birth_date']);
                $marital_status = addslashes($_POST['marital_status']);
                $cpf = addslashes($_POST['cpf']);
                $identity = addslashes($_POST['identity']);
                $ctps = addslashes($_POST['ctps']);
                $cnh = addslashes($_POST['cnh']);
                $cnh_cat = addslashes($_POST['cnh_cat']);
                $occupation = addslashes($_POST['occupation']);
                $admission_date = addslashes($_POST['admission_date']);
                $wage = addslashes($_POST['wage']);
                $bank = addslashes($_POST['bank']);
                $agency = addslashes($_POST['agency']);
                $bank_account = addslashes($_POST['bank_account']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address2 = addslashes($_POST['address2']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);
                $status = '1'; //Status 1 (Ativo)

                $wage = str_replace('.', '', $wage);
				$wage = str_replace(',', '.', $wage);

                $birth_date = implode("-",array_reverse(explode("/",$birth_date)));
                $admission_date = implode("-",array_reverse(explode("/",$admission_date)));
                

                $hr->addEmployee($name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $occupation, $admission_date, $wage, $bank, $agency, $bank_account, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $status, $u->getCompany());
                $_SESSION['message'] = 'Funcionário '.$_POST['name_employee'].' adicionado com sucesso!';

                header("Location: " . BASE_URL . "humanresources/employee");
            } 

            $this->loadTemplate('human_resources_employee_add', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employee_edit($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('human_resources_edit')) {
            $hr = new HumanResources();

            if (isset($_POST['name_employee']) && !empty($_POST['name_employee'])) {
                $name_employee = addslashes($_POST['name_employee']);
                $nickname = addslashes($_POST['nickname']);
                $phone = addslashes($_POST['phone']);
                $cellphone = addslashes($_POST['cellphone']);
                $father_name = addslashes($_POST['father_name']);
                $mother_name = addslashes($_POST['mother_name']);
                $birth_date = addslashes($_POST['birth_date']);
                $marital_status = addslashes($_POST['marital_status']);
                $status = addslashes($_POST['status']);
                $cpf = addslashes($_POST['cpf']);
                $identity = addslashes($_POST['identity']);
                $ctps = addslashes($_POST['ctps']);
                $cnh = addslashes($_POST['cnh']);
                $cnh_cat = addslashes($_POST['cnh_cat']);
                $occupation = addslashes($_POST['occupation']);
                $admission_date = addslashes($_POST['admission_date']);
                $wage = addslashes($_POST['wage']);
                $bank = addslashes($_POST['bank']);
                $agency = addslashes($_POST['agency']);
                $bank_account = addslashes($_POST['bank_account']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address_number = addslashes($_POST['address_number']);
                $address2 = addslashes($_POST['address2']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
				$address_state = addslashes($_POST['address_state']);

                $wage = str_replace('.', '', $wage);
				$wage = str_replace(',', '.', $wage);

                $birth_date = implode("-",array_reverse(explode("/",$birth_date)));
                $admission_date = implode("-",array_reverse(explode("/",$admission_date)));
                

                $hr->editEmployee($id, $name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $status, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $occupation, $admission_date, $wage, $bank, $agency, $bank_account, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $u->getCompany());
                $_SESSION['message'] = 'Funcionário '.$_POST['name_employee'].' alterado com sucesso!';
                header("Location: " . BASE_URL . "humanresources/employee");
            }

            $data['employee_info'] = $hr->getEmployeeInfo($id, $u->getCompany());


            $this->loadTemplate('human_resources_employee_edit', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employee_delete($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        $_SESSION['message'] = "Funcionário excluído com sucesso!";
        if ($u->hasPermission('human_resources_delete')) {
            $hr = new HumanResources();
            

            $hr->deleteEmployee($id, $u->getCompany());
            header("Location: " . BASE_URL . "humanresources/employee");
            
            

            $this->loadTemplate('human_resources_employee', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employee_view($id)
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('human_resources_view')) {
            $hr = new HumanResources();

            $data['employee_info'] = $hr->getEmployeeInfo($id, $u->getCompany());

            $this->loadTemplate('human_resources_employee_view', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function employeesearch(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('human_resources_view')){
			$hr = new HumanResources();
			
			$sp = addslashes($_GET['sp']);


			$data['employee_list'] = $hr->searchEmployee($sp, $u->getCompany());
			$data['edit_permission'] = $u->hasPermission('human_resources_edit');
			$this->loadTemplate('human_resources_employee_search', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}
}
