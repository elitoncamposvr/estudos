<?php
class employeeController extends controller
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

		if ($u->hasPermission('employee_view')) {
            $e = new Employee();
            
            $offset =  0;

			$data['p'] = 1;
			if(isset($_GET['p']) && !empty($_GET['p'])){
				$data['p'] = intval($_GET['p']);
				if($data['p'] == 0){
					$data['p'] = 1;
				}
			}

            $offset = ( 10 * ($data['p']-1) );

            $data['employee_list'] = $e->getList($offset, $u->getCompany());
            $data['employee_count'] = $e->getCount($u->getCompany());
			$data['p_count'] = ceil( $data['employee_count'] / 10 );
            $data['edit_permission'] = $u->hasPermission('employee_edit');

			$this->loadTemplate('employee', $data);
		} else {
			header("Location: " . BASE_URL);
		}
	}

	public function add() {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('employee_view')) {

            if(isset($_POST['name_employee']) && !empty($_POST['name_employee'])) {
                $e = new Employee();

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
                $status = '1'; //Status 1 (Ativo)

                $e->add($name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $status, $u->getCompany());

                header("Location: ".BASE_URL."employee");
            }

            $this->loadTemplate('employee_add', $data);
        }
	}
	
    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('employee_view')) {
            $e = new Employee();

            if(isset($_POST['name_employee']) && !empty($_POST['name_employee'])) {
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
                $status = addslashes($_POST['status']);
                
                $e->edit($id, $name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $status, $u->getCompany());

                header("Location: ".BASE_URL."employee");
            }

            $data['employee_info'] = $e->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('employee_edit', $data);
        }
    }

    public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('employee_view')){
			$e = new Employee();

			$e->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."employee");


			$this->loadTemplate('employee', $data);
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
    
    
}
