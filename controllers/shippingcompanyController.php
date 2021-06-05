<?php
class shippingcompanyController extends controller
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

        if ($u->hasPermission('shipping_company_view')) {


            $sc = new ShippingCompany();
            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['shipping_company_list'] = $sc->getList($offset, $u->getCompany());
            $data['shipping_company_count'] = $sc->getCount($u->getCompany());
            $data['p_count'] = ceil($data['shipping_company_count'] / 10);
            $data['edit_permission'] = $u->hasPermission('shipping_company_add');

            $this->loadTemplate('shipping_company', $data);
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

        if ($u->hasPermission('shipping_company_add')) {
            $sc = new ShippingCompany();

            if (isset($_POST['name_shipping_co']) && !empty($_POST['name_shipping_co'])) {

                $name_shipping_co = addslashes($_POST['name_shipping_co']);
                $social_reason = addslashes($_POST['social_reason']);
                $contact_name = addslashes($_POST['contact_name']);
                $cnpj = addslashes($_POST['cnpj']);
                $state_registration = addslashes($_POST['state_registration']);
                $phone = addslashes($_POST['phone']);
                $whatsapp = addslashes($_POST['whatsapp']);
                $email = addslashes($_POST['email']);
                $website = addslashes($_POST['website']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address2 = addslashes($_POST['address2']);
                $address_number = addslashes($_POST['address_number']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);


                $sc->add($name_shipping_co, $social_reason, $contact_name, $cnpj, $state_registration, $phone, $whatsapp, $email, $website, $aditional_info, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state, $u->getCompany());

                header("Location: " . BASE_URL . "shippingcompany");
            }

            $this->loadTemplate('shipping_company_add', $data);
        } else {
            header("Location: " . BASE_URL . "unauthorized");
        }
    }

    public function edit($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('shipping_company_edit')) {
            $sc = new ShippingCompany();

            if(isset($_POST['name_shipping_co']) && !empty($_POST['name_shipping_co'])) {
                $name_shipping_co = addslashes($_POST['name_shipping_co']);
                $social_reason = addslashes($_POST['social_reason']);
                $contact_name = addslashes($_POST['contact_name']);
                $cnpj = addslashes($_POST['cnpj']);
                $state_registration = addslashes($_POST['state_registration']);
                $phone = addslashes($_POST['phone']);
                $whatsapp = addslashes($_POST['whatsapp']);
                $email = addslashes($_POST['email']);
                $website = addslashes($_POST['website']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $address_zipcode = addslashes($_POST['address_zipcode']);
                $address = addslashes($_POST['address']);
                $address2 = addslashes($_POST['address2']);
                $address_number = addslashes($_POST['address_number']);
                $address_neighb = addslashes($_POST['address_neighb']);
                $address_city = addslashes($_POST['address_city']);
                $address_state = addslashes($_POST['address_state']);
                
                $sc->edit($id, $name_shipping_co, $social_reason, $contact_name, $cnpj, $state_registration, $phone, $whatsapp, $email, $website, $aditional_info, $address_zipcode, $address, $address2, $address_number, $address_neighb, $address_city, $address_state, $u->getCompany());

                header("Location: ".BASE_URL."shippingcompany");
            }

            $data['shipping_company_info'] = $sc->getInfo($id, $u->getCompany());
            

            $this->loadTemplate('shipping_company_edit', $data);
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

        if ($u->hasPermission('shipping_company_add')) {
            $sc = new ShippingCompany();

            $sc->delete($id, $u->getCompany());

            header("Location: " . BASE_URL . "shippingcompany");


            $this->loadTemplate('shippingcompany', $data);
        } else {
            header("Location: " . BASE_URL . "unauthorized");
        }
    }

    public function view($id) {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if($u->hasPermission('shipping_company_view')) {
            $sc = new ShippingCompany();

            $data['shipping_company_info'] = $sc->getInfo($id, $u->getCompany());

            $this->loadTemplate('shipping_company_view', $data);
        }
    }

    public function search(){
		$data = array();
		$u = new Users();
		$u->setLoggedUser();
		$company = new Companies($u->getCompany());
		$data['company_name'] = $company->getName();
		$data['user_email'] = $u->getEmail();

		if($u->hasPermission('shipping_company_view')){
			$sc = new ShippingCompany();
			
			$sp = addslashes($_GET['sp']);


			$data['shipping_company_list'] = $sc->searchShippingCompany($sp, $u->getCompany());
			$data['edit_permission'] = $u->hasPermission('provider_edit');
			$this->loadTemplate('shipping_company_search', $data);
		} else {
			header("Location: ".BASE_URL."home/unauthorized");
		}

	}
}
