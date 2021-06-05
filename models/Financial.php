<?php
class Financial extends model{

    public function getBillsList($limit, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM fn_paid_bills WHERE id_company = :id_company ORDER BY id DESC LIMIT $limit");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    // public function getEmployeeInfo($id, $id_company)
    // {
    //     $array = array();

    //     $sql = $this->db->prepare("SELECT * FROM employee WHERE id = :id AND id_company = :id_company");
    //     $sql->bindValue(":id", $id);
    //     $sql->bindValue("id_company", $id_company);
    //     $sql->execute();

    //     if ($sql->rowCount() > 0) {
    //         $array = $sql->fetch();
    //     }

    //     return $array;
    // }

    public function getBillsCount($id_company)
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as pd FROM fn_paid_bills WHERE id_company = :id_company");
        $sql->bindValue('id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();

        $r = $row['pd'];



        return $r;
    }

    public function addBills($description, $bill_amount, $account_type, $account_category, $release_date_of, $due_date, $payday, $supplier, $doc_number, $payment_situation, $carrier, $aditional_info, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO fn_paid_bills SET description = :description, bill_amount = :bill_amount, account_type = :account_type, account_category = :account_category, release_date_of = :release_date_of, due_date = :due_date, payday = :payday, supplier = :supplier, doc_number = :doc_number, payment_situation = :payment_situation, carrier = :carrier, aditional_info = :aditional_info, id_company = :id_company");

        $sql->bindValue(":description", $description);
        $sql->bindValue(":bill_amount", $bill_amount);
        $sql->bindValue(":account_type", $account_type);
        $sql->bindValue(":account_category", $account_category);
        $sql->bindValue(":release_date_of", $release_date_of);
        $sql->bindValue(":due_date", $due_date);
        $sql->bindValue(":payday", $payday);
        $sql->bindValue(":supplier", $supplier);
        $sql->bindValue(":doc_number", $doc_number);
        $sql->bindValue(":payment_situation", $payment_situation);
        $sql->bindValue(":carrier", $carrier);
        $sql->bindValue(":aditional_info", $aditional_info);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function getCarrierList($id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM fn_carrier WHERE id_company = :id_company ORDER BY carrier_title ASC");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getCarrierInfo($id, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM fn_carrier WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue("id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function addCarrier($carrier_title, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO fn_carrier SET carrier_title = :carrier_title, id_company = :id_company");

        $sql->bindValue(":carrier_title", $carrier_title);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function editCarrier($id, $carrier_title, $id_company)
    {
        $sql = $this->db->prepare("UPDATE fn_carrier SET carrier_title = :carrier_title WHERE id = :id AND id_company = :id_company");

        $sql->bindValue(":id", $id);
        $sql->bindValue(":carrier_title", $carrier_title);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function deleteCarrier($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM fn_carrier WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function getBankCheckList($id_company)
  {
    $array = array();

    $sql = $this->db->prepare("SELECT * FROM bank_check WHERE in_box = '1' AND id_company = :id_company");
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function getBankCheckInfo($id, $id_company)
  {
    $array = array();

    $sql = $this->db->prepare("SELECT * FROM bank_check WHERE id = :id AND id_company = :id_company");
    $sql->bindValue(":id", $id);
    $sql->bindValue("id_company", $id_company);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }

    return $array;
  }

  public function addBankCheck($name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $id_company)
  {

    $sql = $this->db->prepare("INSERT INTO bank_check SET name = :name, issuance_date = :issuance_date, due_date = :due_date, bank = :bank, agency = :agency, bank_account = :bank_account, check_number = :check_number, value_check = :value_check, type_check = :type_check, in_box = :in_box, check_destiny = :check_destiny, id_company = :id_company");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":issuance_date", $issuance_date);
    $sql->bindValue(":due_date", $due_date);
    $sql->bindValue(":bank", $bank);
    $sql->bindValue(":agency", $agency);
    $sql->bindValue(":bank_account", $bank_account);
    $sql->bindValue(":check_number", $check_number);
    $sql->bindValue(":value_check", $value_check);
    $sql->bindValue(":type_check", $type_check);
    $sql->bindValue(":in_box", $in_box);
    $sql->bindValue(":check_destiny", $check_destiny);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }

  public function editBankCheck($id, $name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $id_company)
  {

    $sql = $this->db->prepare("UPDATE bank_check SET name = :name, issuance_date = :issuance_date, due_date = :due_date, bank = :bank, agency = :agency, bank_account = :bank_account, check_number = :check_number, value_check = :value_check, type_check = :type_check, in_box = :in_box, check_destiny = :check_destiny WHERE id = :id AND id_company = :id_company");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":issuance_date", $issuance_date);
    $sql->bindValue(":due_date", $due_date);
    $sql->bindValue(":bank", $bank);
    $sql->bindValue(":agency", $agency);
    $sql->bindValue(":bank_account", $bank_account);
    $sql->bindValue(":check_number", $check_number);
    $sql->bindValue(":value_check", $value_check);
    $sql->bindValue(":type_check", $type_check);
    $sql->bindValue(":in_box", $in_box);
    $sql->bindValue(":check_destiny", $check_destiny);
    $sql->bindValue(":id_company", $id_company);
    $sql->bindValue(":id", $id);
    $sql->execute();
  }

  public function deleteBankCheck($id, $id_company)
  {
    $sql = $this->db->prepare("DELETE FROM bank_check WHERE id = :id AND id_company = :id_company");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }
   
}