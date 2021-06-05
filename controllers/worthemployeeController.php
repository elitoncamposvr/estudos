<?php
class worthemployeeController extends controller
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

        if ($u->hasPermission('worthemployee_view')) {
            $we = new WorthEmployee();
            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['employee_list'] = $we->getEmployeeList($u->getCompany());
            $data['worth_employee_list'] = $we->getList($offset, $u->getCompany());
            $data['list_count'] = $we->getCount($u->getCompany());
            $data['p_count'] = ceil($data['list_count'] / 10);
            $data['edit_permission'] = $u->hasPermission('worthemployee_edit');

            $this->loadTemplate('worth_employee', $data);
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

        if ($u->hasPermission('worthemployee_edit')) {
            $we = new WorthEmployee();

            if (isset($_POST['name']) && !empty($_POST['name'])) {

                $id_employee = addslashes($_POST['name']);
                $advance_amount = addslashes($_POST['advance_amount']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $date_worth = addslashes($_POST['date_worth']);

                $date_worth = implode("-", array_reverse(explode("/", $date_worth)));

                $advance_amount = str_replace('.', '', $advance_amount);
                $advance_amount = str_replace(',', '.', $advance_amount);

                $we->add($id_employee, $date_worth, $advance_amount, $aditional_info, $u->getCompany());

                header("Location: " . BASE_URL . "worthemployee");
            }
            $data['employee_list'] = $we->getEmployeeList($u->getCompany());
            $this->loadTemplate('worth_employee_add', $data);
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

        if ($u->hasPermission('worthemployee_edit')) {
            $we = new WorthEmployee();

            if (isset($_POST['name']) && !empty($_POST['name'])) {

                $id_employee = addslashes($_POST['name']);
                $advance_amount = addslashes($_POST['advance_amount']);
                $aditional_info = addslashes($_POST['aditional_info']);
                $date_worth = addslashes($_POST['date_worth']);

                $date_worth = implode("-", array_reverse(explode("/", $date_worth)));

                $advance_amount = str_replace('.', '', $advance_amount);
                $advance_amount = str_replace(',', '.', $advance_amount);

                $we->edit($id, $id_employee, $date_worth, $advance_amount, $aditional_info, $u->getCompany());

                header("Location: " . BASE_URL . "worthemployee");
            }
            $data['employee_list'] = $we->getEmployeeList($u->getCompany());
            $data['worth_employee_info'] = $we->getInfo($id, $u->getCompany());
            $this->loadTemplate('worth_employee_edit', $data);
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

        if ($u->hasPermission('worthemployee_edit')) {
            $we = new WorthEmployee();

            $we->delete($id, $u->getCompany());
            header("Location: " . BASE_URL . "worthemployee");


            $this->loadTemplate('worthemployee', $data);
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

        if ($u->hasPermission('worthemployee_view')) {
            $we = new WorthEmployee();

            $data['worth_view'] = $we->getView($id, $u->getCompany());
            $data['edit_permission'] = $u->hasPermission('worthemployee_edit');

            $this->loadTemplate('worth_employee_view', $data);
        }
    }

    public function filter()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('worthemployee_view')) {
            $we = new WorthEmployee();

            $name_employee = addslashes($_GET['name_employee']);
            $period1 = addslashes($_GET['period1']);
            $period2 = addslashes($_GET['period2']);

            $data['employee_list'] = $we->getEmployeeList($u->getCompany());
            $data['edit_permission'] = $u->hasPermission('worthemployee_edit');
            $data['filter_list'] = $we->filteredList($name_employee, $period1, $period2, $u->getCompany());

            $this->loadTemplate('worth_employee_filter', $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }
}
