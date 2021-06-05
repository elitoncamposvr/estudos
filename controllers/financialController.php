<?php
class financialController extends controller
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

		if ($u->hasPermission('financial_view')) {
			$fn = new Financial();

			$limit = 10;

			$data['bills_list'] = $fn->getBillsList($limit, $u->getCompany());


			$this->loadTemplate('financial', $data);
		} else {
			header("Location: " . BASE_URL);
		}
	}

	public function bills_add()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('financial_add')) {
			$fn = new Financial();
			$pd = new Provider();

			if (isset($_POST['description']) && !empty($_POST['description'])) {


				$description = addslashes($_POST['description']);
				$bill_amount = addslashes($_POST['bill_amount']);
				$account_type = addslashes($_POST['account_type']);
				$account_category = addslashes($_POST['account_category']);
				$release_date_of = addslashes($_POST['release_date_of']);
				$due_date = addslashes($_POST['due_date']);
				$payday = date("Y-m-d");
				$supplier = addslashes($_POST['supplier']);
				$doc_number = addslashes($_POST['doc_number']);
				$payment_situation = 2; //1(A Pagar/Receber) - 2(Pago)
				$carrier = addslashes($_POST['carrier']);
				$aditional_info = addslashes($_POST['aditional_info']);

				$bill_amount = str_replace('.', '', $bill_amount);
				$bill_amount = str_replace(',', '.', $bill_amount);

				// $release_date_of = implode("-", array_reverse(explode("/", $release_date_of)));
				// $admission_date = implode("-",array_reverse(explode("/",$admission_date)));


				$fn->addBills($description, $bill_amount, $account_type, $account_category, $release_date_of, $due_date, $payday, $supplier, $doc_number, $payment_situation, $carrier, $aditional_info, $u->getCompany());

				header("Location: " . BASE_URL . "financial");
			}
			
			$data['provider_list'] = $pd->getListProvider($u->getCompany());
			$data['carrier_list'] = $fn->getCarrierList($u->getCompany());
			$this->loadTemplate('financial_add', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
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

		if ($u->hasPermission('financial_settings')) {
			$fn = new Financial();


			$this->loadTemplate('financial_settings', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
		}
	}

	public function settingscarrier()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('financial_settings')) {
			$fn = new Financial();

			$data['carrier_list'] = $fn->getCarrierList($u->getCompany());
			$this->loadTemplate('financial_settings_carrier', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
		}
	}

	public function carrieradd()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('financial_settings')) {
			$fn = new Financial();

			if (isset($_POST['carrier_title']) && !empty($_POST['carrier_title'])) {

				$carrier_title = addslashes($_POST['carrier_title']);

				$fn->addCarrier($carrier_title, $u->getCompany());

				header("Location: " . BASE_URL . "financial/settingscarrier");
			}


			$this->loadTemplate('financial_carrier_add', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
		}
	}

	public function carrieredit($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('financial_settings')) {
			$fn = new Financial();

			if (isset($_POST['carrier_title']) && !empty($_POST['carrier_title'])) {

				$carrier_title = addslashes($_POST['carrier_title']);

				$fn->editCarrier($id, $carrier_title, $u->getCompany());

				header("Location: " . BASE_URL . "financial/settingscarrier");
			}
			$data['carrier_info'] = $fn->getCarrierInfo($id, $u->getCompany());

			$this->loadTemplate('financial_carrier_edit', $data);
		} else {
			header("Location: " . BASE_URL . "home/unauthorized");
		}
	}

	public function carrierdelete($id)
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('financial_settings')) {
			$fn = new Financial();

			$fn->deleteCarrier($id, $u->getCompany());
			header("Location: " . BASE_URL . "financial/settingscarrier");


			$this->loadTemplate('financial/settingscarrier', $data);
		} else {
			header("Location: " . BASE_URL);
		}
	}

	public function bankcheck()
	{
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if ($u->hasPermission('bank_check_view')) {
			$fn = new Financial();

			$data['check_list'] = $fn->getBankCheckList($u->getCompany());

			$this->loadTemplate('financial_bank_check', $data);
		} else {
			header("Location: " . BASE_URL);
		}
	}

	public function bankcheck_add() {
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

                header("Location: ".BASE_URL."financial_bankcheck");
            }

            $this->loadTemplate('financial_bank_check_add', $data);
        }
	}
	
    public function bankcheck_edit($id) {
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

                header("Location: ".BASE_URL."financial_bankcheck");
            }

            $data['check_info'] = $bc->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('financial_bank_check_edit', $data);
        }
    }

    public function bankcheck_delete($id){
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
    
    // public function bank_chek_view($id) {
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
