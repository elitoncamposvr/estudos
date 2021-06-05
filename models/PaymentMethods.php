<?php
class PaymentMethods extends model
{
  public function getList($id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM payment_methods WHERE id_company = :id_company");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

  }
  
  public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM payment_methods WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;

	}

  public function add($method, $type_method, $id_company)
  {

    $sql = $this->db->prepare("INSERT INTO payment_methods SET method = :method, type_method = :type_method, id_company = :id_company");

    $sql->bindValue(":method", $method);
	$sql->bindValue(":type_method", $type_method);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }

  public function edit($id, $method, $type_method, $id_company) {

		$sql = $this->db->prepare("UPDATE payment_methods SET method = :method, type_method = :type_method WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":method", $method);
		$sql->bindValue(":type_method", $type_method);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":id", $id);
		$sql->execute();

	}

  public function delete($id, $id_company){
		$sql = $this->db->prepare("DELETE FROM payment_methods WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

  }
  
}
