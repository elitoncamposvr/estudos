<?php
class singlereceiptController extends controller{
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

		if($u->hasPermission('singlereceipt_view')){
            $sr = new SingleReceipt();
            $offset =  0;

			$data['p'] = 1;
			if(isset($_GET['p']) && !empty($_GET['p'])){
				$data['p'] = intval($_GET['p']);
				if($data['p'] == 0){
					$data['p'] = 1;
				}
			}

            $data['single_receipt_list'] = $sr->getList($offset, $u->getCompany());
            $data['single_receipt_count'] = $sr->getCount($u->getCompany());
			$data['p_count'] = ceil( $data['single_receipt_count'] / 10 );
			
			$this->loadTemplate('single_receipt', $data);
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

        if($u->hasPermission('singlereceipt_view')) {
            $sr = new SingleReceipt();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                
                $name = addslashes($_POST['name']);
                $receipt_amount = addslashes($_POST['receipt_amount']);
                $regarding = addslashes($_POST['regarding']);
                $cpf = addslashes($_POST['cpf']);
                $identity = addslashes($_POST['identity']);

                $receipt_amount = str_replace('.', '', $receipt_amount);
                $receipt_amount = str_replace(',', '.', $receipt_amount);
                

                $sr->add($name, $receipt_amount, $regarding, $cpf, $identity, $u->getCompany());

                header("Location: ".BASE_URL."singlereceipt");
            }
            $this->loadTemplate('single_receipt_add', $data);
        }
    }
    
	public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('singlereceipt_edit')) {
            $sr = new SingleReceipt();

            if(isset($_POST['name']) && !empty($_POST['name'])) {
                $name = addslashes($_POST['name']);               
                $receipt_amount = addslashes($_POST['receipt_amount']);               
                $regarding = addslashes($_POST['regarding']);
                $cpf = addslashes($_POST['cpf']);
                $identity = addslashes($_POST['identity']);

                $receipt_amount = str_replace('.', '', $receipt_amount);
                $receipt_amount = str_replace(',', '.', $receipt_amount);
                

                $sr->edit($id, $name, $receipt_amount, $regarding, $cpf, $identity, $u->getCompany());

                header("Location: ".BASE_URL."singlereceipt");
            }

            $data['singlereceipt_info'] = $sr->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('single_receipt_edit', $data);
        }
    }

    public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('singlereceipt_edit')){
			$sr = new SingleReceipt();

			$sr->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."singlereceipt");


			$this->loadTemplate('singlereceipt', $data);
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

        if($u->hasPermission('singlereceipt_view')) {
            $sr = new SingleReceipt();

            $data['singlereceipt_info'] = $sr->getInfo($id, $u->getCompany());

            $this->loadTemplate('single_receipt_view', $data);
        }
    }
}