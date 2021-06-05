<?php
class bankcheckController extends controller
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

		if ($u->hasPermission('bank_check_view')) {
			$bc = new BankCheck();

			$data['check_list'] = $bc->getList($u->getCompany());

			$this->loadTemplate('bank_check', $data);
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

        if($u->hasPermission('bank_check_edit')) {

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $bc = new BankCheck();

                $name = addslashes($_POST['name']);
                $issuance_date = addslashes($_POST['issuance_date']);
                $due_date = addslashes($_POST['due_date']);
                $bank = addslashes($_POST['bank']);
                $agency = addslashes($_POST['agency']);
                $bank_account = addslashes($_POST['bank_account']);
                $check_number = addslashes($_POST['check_number']);
                $value_check = addslashes($_POST['value_check']);
                $type_check = addslashes($_POST['type_check']);
                $in_box = addslashes($_POST['in_box']);
                $check_destiny = addslashes($_POST['check_destiny']);

                $issuance_date = implode("-",array_reverse(explode("/", $issuance_date)));
                
                $due_date = implode("-",array_reverse(explode("/", $due_date)));

                $value_check = str_replace('.', '', $value_check);
                $value_check = str_replace(',', '.', $value_check);



                $bc->add($name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $u->getCompany());

                header("Location: ".BASE_URL."bankcheck");
            }

            $this->loadTemplate('bank_check_add', $data);
        }
	}
	
    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('bank_check_edit')) {
            $bc = new BankCheck();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);
                $issuance_date = addslashes($_POST['issuance_date']);
                $due_date = addslashes($_POST['due_date']);
                $bank = addslashes($_POST['bank']);
                $agency = addslashes($_POST['agency']);
                $bank_account = addslashes($_POST['bank_account']);
                $check_number = addslashes($_POST['check_number']);
                $value_check = addslashes($_POST['value_check']);
                $type_check = addslashes($_POST['type_check']);
                $in_box = addslashes($_POST['in_box']);
                $check_destiny = addslashes($_POST['check_destiny']);

                $issuance_date = implode("-",array_reverse(explode("/", $issuance_date)));
                
                $due_date = implode("-",array_reverse(explode("/", $due_date)));

                $value_check = str_replace('.', '', $value_check);
                $value_check = str_replace(',', '.', $value_check);
                
                $bc->edit($id, $name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $u->getCompany());

                header("Location: ".BASE_URL."bankcheck");
            }

            $data['check_info'] = $bc->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('bank_check_edit', $data);
        }
    }

    public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('bank_check_edit')){
			$bc = new BankCheck();

			$bc->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."bankcheck");


			$this->loadTemplate('bankcheck', $data);
		} else {
			header("Location: ".BASE_URL);
		}

    }
    
    // public function view($id) {
    //     $data = array();
    //     $u = new Users();
    //     $u->setLoggedUser();
    //     $company = new Companies($u->getCompany());
    //     $data['company_name'] = $company->getName();
    //     $data['user_email'] = $u->getEmail();

    //     if($u->hasPermission('employee_view')) {
    //         $e = new Employee();

    //         $data['employee_info'] = $e->getInfo($id, $u->getCompany());

    //         $this->loadTemplate('employee_view', $data);
    //     }
    // }
    
    
}
