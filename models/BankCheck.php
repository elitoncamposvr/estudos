<?php
class BankCheck extends model
{
  public function getList($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bank_check_received WHERE in_box = '1' AND id_company = :id_company");
    $sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
    }
    
		return $array;

  }
  
  public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM bank_check_received WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;

	}

  public function add($name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $id_company)
  {

    $sql = $this->db->prepare("INSERT INTO bank_check_received SET name = :name, issuance_date = :issuance_date, due_date = :due_date, bank = :bank, agency = :agency, bank_account = :bank_account, check_number = :check_number, value_check = :value_check, type_check = :type_check, in_box = :in_box, check_destiny = :check_destiny, id_company = :id_company");

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

  public function edit($id, $name, $issuance_date, $due_date, $bank, $agency, $bank_account, $check_number, $value_check, $type_check, $in_box, $check_destiny, $id_company)
  {

    $sql = $this->db->prepare("UPDATE bank_check_received SET name = :name, issuance_date = :issuance_date, due_date = :due_date, bank = :bank, agency = :agency, bank_account = :bank_account, check_number = :check_number, value_check = :value_check, type_check = :type_check, in_box = :in_box, check_destiny = :check_destiny WHERE id = :id AND id_company = :id_company");

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

  public function delete($id, $id_company){
		$sql = $this->db->prepare("DELETE FROM bank_check_received WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

  }
  
}
