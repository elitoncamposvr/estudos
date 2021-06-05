<?php
class SingleReceipt extends model
{

  public function getList($offset, $id_company)
  {
    $array = array();

    $sql = $this->db->prepare("SELECT * FROM single_receipt WHERE id_company = :id_company ORDER BY id DESC LIMIT $offset, 10");
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetchAll();
    }

    return $array;
  }

  public function getCount($id_company)
  {
    $r = 0;

    $sql = $this->db->prepare("SELECT COUNT(*) as sr FROM single_receipt WHERE id_company = :id_company");
    $sql->bindValue('id_company', $id_company);
    $sql->execute();
    $row = $sql->fetch();

    $r = $row['sr'];



    return $r;
  }

  public function getInfo($id, $id_company)
  {
    $array = array();

    $sql = $this->db->prepare("SELECT * FROM single_receipt WHERE id = :id AND id_company = :id_company");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();

    if ($sql->rowCount() > 0) {
      $array = $sql->fetch();
    }

    return $array;
  }

  public function add($name, $receipt_amount, $regarding, $cpf, $identity, $id_company)
  {

    $sql = $this->db->prepare("INSERT INTO single_receipt SET name = :name, receipt_amount = :receipt_amount, regarding = :regarding, date_receipt = NOW(), cpf = :cpf, identity = :identity, id_company = :id_company");

    $sql->bindValue(":name", $name);
    $sql->bindValue(":receipt_amount", $receipt_amount);
    $sql->bindValue(":regarding", $regarding);
    $sql->bindValue(":cpf", $cpf);
    $sql->bindValue(":identity", $identity);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }

  public function edit($id, $name, $receipt_amount, $regarding, $cpf, $identity, $id_company)
  {
    $sql = $this->db->prepare("UPDATE single_receipt SET name = :name, receipt_amount = :receipt_amount, regarding = :regarding, cpf = :cpf, identity = :identity WHERE id = :id AND id_company = :id_company");

    $sql->bindValue(":id", $id);
    $sql->bindValue(":name", $name);
    $sql->bindValue(":receipt_amount", $receipt_amount);
    $sql->bindValue(":regarding", $regarding);
    $sql->bindValue(":cpf", $cpf);
    $sql->bindValue(":identity", $identity);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }


  public function delete($id, $id_company)
  {
    $sql = $this->db->prepare("DELETE FROM single_receipt WHERE id = :id AND id_company = :id_company");
    $sql->bindValue(":id", $id);
    $sql->bindValue(":id_company", $id_company);
    $sql->execute();
  }
}
