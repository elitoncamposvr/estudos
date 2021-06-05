<?php
class inventoryController extends controller
{

    public function __construct()
    {

        $u = new Users();
        if ($u->isLogged() == false) {
            header("Location: " . BASE_URL . "/login");
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

        if ($u->hasPermission('inventory_view')) {
            $i = new Inventory();


            $data['add_permission'] = $u->hasPermission('inventory_add');
            $data['edit_permission'] = $u->hasPermission('inventory_edit');

            $this->loadTemplate("inventory", $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function products()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('inventory_view')) {
            $i = new Inventory();
            $offset = 0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (20 * ($data['p'] - 1));

            $data['inventory_count'] = $i->getCount($u->getCompany());
            $data['p_count'] = ceil($data['inventory_count'] / 20);
            $data['inventory_list'] = $i->getList($offset, $u->getCompany());
            $data['add_permission'] = $u->hasPermission('inventory_add');
            $data['edit_permission'] = $u->hasPermission('inventory_edit');

            $this->loadTemplate("inventory_products", $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }


    public function search()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('inventory_view')) {
            $i = new Inventory();

            $sp = addslashes($_GET['sp']);

            $data['inventory_list'] = $i->searchProducts($sp, $u->getCompany());
            $data['edit_permission'] = $u->hasPermission('inventory_edit');
            $data['add_permission'] = $u->hasPermission('inventory_add');

            $this->loadTemplate("inventory_search", $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
        }
    }

    public function brand()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('inventory_view')) {
            $i = new Inventory();

            $offset =  0;

            $data['p'] = 1;
            if (isset($_GET['p']) && !empty($_GET['p'])) {
                $data['p'] = intval($_GET['p']);
                if ($data['p'] == 0) {
                    $data['p'] = 1;
                }
            }

            $offset = (10 * ($data['p'] - 1));

            $data['brand_list'] = $i->getBrandList($offset, $u->getCompany());
            $data['list_count'] = $i->getBrandCount($u->getCompany());
            $data['p_count'] = ceil($data['list_count'] / 10);

            $this->loadTemplate("inventory_brand", $data);
        } else {
            header("Location: " . BASE_URL . "home/unauthorized");
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

        if ($u->hasPermission('inventory_add')) {
            $i = new Inventory();
            $pd = new Provider();

            if (isset($_POST['name_product']) && !empty($_POST['name_product'])) {

                $name_product = addslashes($_POST['name_product']);
                $product_code = addslashes($_POST['product_code']);
                $original_code = addslashes($_POST['original_code']);
                $id_brand = addslashes($_POST['id_brand']);
                $id_provider = addslashes($_POST['id_provider']);
                $purchase_price = addslashes($_POST['purchase_price']);
                $profit = addslashes($_POST['profit']);
                $price = addslashes($_POST['price']);
                $min_price = addslashes($_POST['min_price']);
                $quant = addslashes($_POST['quant']);
                $ideal_quant = addslashes($_POST['ideal_quant']);
                $min_quant = addslashes($_POST['min_quant']);
                $location = addslashes($_POST['location']);
                $drawer = addslashes($_POST['drawer']);
                $bar_code = addslashes($_POST['bar_code']);
                $product_info = addslashes($_POST['product_info']);
                $unity = addslashes($_POST['unity']);

                $price = str_replace('.', '', $price);
                $price = str_replace(',', '.', $price);

                $i->add($name_product, $product_code, $original_code, $id_brand, $id_provider, $purchase_price, $profit, $price, $min_price, $quant, $ideal_quant, $min_quant, $location, $drawer, $bar_code, $product_info, $unity, $u->getCompany(), $u->getId());

                header("Location: " . BASE_URL . "inventory");
            }

            $data['brand_list2'] = $i->getBrandList2($u->getCompany());
            $data['provider_list'] = $pd->getListProvider($u->getCompany());
            $this->loadTemplate('inventory_add', $data);
        }
    }

    public function addbrand()
    {
        $data = array();
        $u = new Users();
        $u->setLoggedUser();
        $company = new Companies($u->getCompany());
        $data['company_name'] = $company->getName();
        $data['user_email'] = $u->getEmail();

        if ($u->hasPermission('inventory_add')) {

            if (isset($_POST['name_product']) && !empty($_POST['name_product'])) {
                $i = new Inventory();

                $name_product = addslashes($_POST['name_product']);

                $i->addBrand($name_product, $u->getCompany());

                header("Location: " . BASE_URL . "/inventory/brand");
            }

            $this->loadTemplate('inventory_brand_add', $data);
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

        if ($u->hasPermission('inventory_edit')) {
            $i = new Inventory();
            $pd = new Provider();

            if (isset($_POST['name_product']) && !empty($_POST['name_product'])) {
                $name_product = addslashes($_POST['name_product']);
                $product_code = addslashes($_POST['product_code']);
                $original_code = addslashes($_POST['original_code']);
                $id_brand = addslashes($_POST['id_brand']);
                $id_provider = addslashes($_POST['id_provider']);
                $purchase_price = addslashes($_POST['purchase_price']);
                $profit = addslashes($_POST['profit']);
                $price = addslashes($_POST['price']);
                $min_price = addslashes($_POST['min_price']);
                $quant = addslashes($_POST['quant']);
                $ideal_quant = addslashes($_POST['ideal_quant']);
                $min_quant = addslashes($_POST['min_quant']);
                $location = addslashes($_POST['location']);
                $drawer = addslashes($_POST['drawer']);
                $bar_code = addslashes($_POST['bar_code']);
                $product_info = addslashes($_POST['product_info']);
                $unity = addslashes($_POST['unity']);

                $price = str_replace('.', '', $price);
                $price = str_replace(',', '.', $price);

                $i->edit($id, $name_product, $product_code, $original_code, $id_brand, $id_provider, $purchase_price, $profit, $price, $min_price, $quant, $ideal_quant, $min_quant, $location, $drawer, $bar_code, $product_info, $unity, $u->getCompany(), $u->getId());

                header("Location: " . BASE_URL . "inventory");
            }

            $data['inventory_info'] = $i->getInfo($id, $u->getCompany());
            $data['brand_list2'] = $i->getBrandList2($u->getCompany());
            $data['provider_list'] = $pd->getListProvider($u->getCompany());

            $this->loadTemplate('inventory_edit', $data);
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

        if ($u->hasPermission('inventory_edit')) {
            $i = new Inventory();

            if (isset($_POST['name_product']) && !empty($_POST['name_product'])) {
                $name_product = addslashes($_POST['name_product']);

                $i->editBrand($id, $name_product, $u->getCompany(), $u->getId());

                header("Location: " . BASE_URL . "/inventory/brand");
            }

            $data['product_brand_info'] = $i->getBrandInfo($id, $u->getCompany());

            $this->loadTemplate('inventory_brand_edit', $data);
        }
    }

    public function delete($id)
    {
        $u = new Users();
        $u->setLoggedUser();

        if ($u->hasPermission('inventory_edit')) {
            $i = new Inventory();
            $i->delete($id, $u->getCompany(), $u->getId());
            header("Location: " . BASE_URL . "inventory");
        }
    }

    public function delete_brand($id)
    {
        $u = new Users();
        $u->setLoggedUser();

        if ($u->hasPermission('inventory_edit')) {
            $i = new Inventory();
            $i->deleteBrand($id, $u->getCompany(), $u->getId());
            header("Location: " . BASE_URL . "/inventory/brand");
        }
    }
}
