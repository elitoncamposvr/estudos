<?php
class Employee extends model
{
	public function getList($offset, $id_company)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM employee WHERE id_company = :id_company ORDER BY name_employee ASC LIMIT $offset, 10");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}

		return $array;
	}

	public function getInfo($id, $id_company)
	{
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM employee WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetch();
		}

		return $array;
	}

	public function getCount($id_company){
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as pd FROM employee WHERE id_company = :id_company");
		$sql->bindValue('id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['pd'];



		return $r;
	}

	public function add($name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $status, $id_company)
	{

		$sql = $this->db->prepare("INSERT INTO employee SET name_employee = :name_employee, nickname = :nickname, phone = :phone, cellphone = :cellphone, father_name = :father_name, mother_name = :mother_name, birth_date = :birth_date, marital_status = :marital_status, cpf = :cpf, identity = :identity, ctps = :ctps, cnh = :cnh, cnh_cat = :cnh_cat, status = :status,  id_company = :id_company");

		$sql->bindValue(":name_employee", $name_employee);
		$sql->bindValue(":nickname", $nickname);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":cellphone", $cellphone);
		$sql->bindValue(":father_name", $father_name);
		$sql->bindValue(":mother_name", $mother_name);
		$sql->bindValue(":birth_date", $birth_date);
		$sql->bindValue(":marital_status", $marital_status);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":identity", $identity);
		$sql->bindValue(":ctps", $ctps);
		$sql->bindValue(":cnh", $cnh);
		$sql->bindValue(":cnh_cat", $cnh_cat);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}

	public function edit($id, $name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $status = '1', $id_company)
	{

		$sql = $this->db->prepare("UPDATE employee SET name_employee = :name_employee, nickname = :nickname, status = :status, phone = :phone, cellphone = :cellphone, father_name = :father_name, mother_name = :mother_name WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":name_employee", $name_employee);
		$sql->bindValue(":nickname", $nickname);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":cellphone", $cellphone);
		$sql->bindValue(":father_name", $father_name);
		$sql->bindValue(":mother_name", $mother_name);
		$sql->bindValue(":status", $status);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}

	public function delete($id, $id_company)
	{
		$sql = $this->db->prepare("DELETE FROM employee WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();
	}
}
