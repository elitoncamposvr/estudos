<?php
class paymentmethodsController extends controller
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

		if ($u->hasPermission('payment_methods')) {
			$pm = new PaymentMethods();

			$data['payment_method_list'] = $pm->getList($u->getCompany());

			$this->loadTemplate('payment_methods', $data);
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

        if($u->hasPermission('payment_methods')) {

            if(isset($_POST['method']) && !empty($_POST['method'])) {
                $pm = new PaymentMethods();

                $method = addslashes($_POST['method']);
                $type_method = addslashes($_POST['type_method']);

                $pm->add($method, $type_method, $u->getCompany());

                header("Location: ".BASE_URL."paymentmethods");
            }

            $this->loadTemplate('payment_methods_add', $data);
        }
	}
	
    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('payment_methods')) {
            $pm = new PaymentMethods();

            if(isset($_POST['method']) && !empty($_POST['method'])) {
                $method = addslashes($_POST['method']);
                $type_method = addslashes($_POST['type_method']);
                
                $pm->edit($id, $method, $type_method, $u->getCompany());

                header("Location: ".BASE_URL."paymentmethods");
            }

            $data['payment_method_info'] = $pm->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('payment_methods_edit', $data);
        }
    }

    public function delete($id){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('payment_methods')){
			$pm = new PaymentMethods();

			$pm->delete($id, $u->getCompany());
			header("Location: ".BASE_URL."paymentmethods");


			$this->loadTemplate('paymentmethod', $data);
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
