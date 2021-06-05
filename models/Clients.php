<?php
class Clients extends model{

	public function getList($offset, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM clients WHERE id_company = :id_company LIMIT $offset, 10");
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

	}

	public function getInfo($id, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM clients WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetch();
		}

		return $array;

	}

	public function getCount($id_company){
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM clients WHERE id_company = :id_company");
		$sql->bindValue('id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];



		return $r;
	}

	public function add($id_company, $client_type, $name,  $email = '', $phone = '', $cellphone = '', $whatsapp = '',  $cpf = '', $cnpj = '', $state_registration = '', $identity = '', $birth_date = '', $limit_credit = '', $aditional_info = '', $address_zipcode = '', $address = '', $address_number = '', $address2 = '', $address_neighb = '', $address_city = '', $address_state = ''){

		$sql = $this->db->prepare("INSERT INTO  clients SET id_company = :id_company, client_type = :client_type, name = :name, email = :email, phone = :phone, cellphone = :cellphone, whatsapp = :whatsapp, cpf = :cpf, cnpj = :cnpj, state_registration = :state_registration, identity = :identity, birth_date =:birth_date, limit_credit = :limit_credit, aditional_info = :aditional_info, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, date_register = NOW()");
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":client_type", $client_type);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":cellphone", $cellphone);
		$sql->bindValue(":whatsapp", $whatsapp);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":state_registration", $state_registration);
		$sql->bindValue(":identity", $identity);
		$sql->bindValue(":birth_date", $birth_date);
		$sql->bindValue(":limit_credit", $limit_credit);
		$sql->bindValue(":aditional_info", $aditional_info);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->execute();

		return $this->db->lastInsertId();

	}

	public function edit($id, $id_company, $client_type, $name, $email, $phone, $cellphone, $whatsapp, $cpf, $cnpj, $state_registration, $identity, $birth_date, $limit_credit, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $date_register){

		$sql = $this->db->prepare("UPDATE clients SET client_type = :client_type, name = :name, email = :email, phone = :phone, cellphone = :cellphone, whatsapp = :whatsapp, cpf = :cpf, cnpj = :cnpj, state_registration = :state_registration, identity = :identity, birth_date =:birth_date, limit_credit = :limit_credit, aditional_info = :aditional_info, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, date_register = :date_register WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(":id_company", $id_company);
		$sql->bindValue(":client_type", $client_type);
		$sql->bindValue(":name", $name);
		$sql->bindValue(":email", $email);
		$sql->bindValue(":phone", $phone);
		$sql->bindValue(":cellphone", $cellphone);
		$sql->bindValue(":whatsapp", $whatsapp);
		$sql->bindValue(":cpf", $cpf);
		$sql->bindValue(":cnpj", $cnpj);
		$sql->bindValue(":state_registration", $state_registration);
		$sql->bindValue(":identity", $identity);
		$sql->bindValue(":birth_date", $birth_date);
		$sql->bindValue(":limit_credit", $limit_credit);
		$sql->bindValue(":aditional_info", $aditional_info);
		$sql->bindValue(":address_zipcode", $address_zipcode);
		$sql->bindValue(":address", $address);
		$sql->bindValue(":address_number", $address_number);
		$sql->bindValue(":address2", $address2);
		$sql->bindValue(":address_neighb", $address_neighb);
		$sql->bindValue(":address_city", $address_city);
		$sql->bindValue(":address_state", $address_state);
		$sql->bindValue(":date_register", $date_register);
		
		$sql->execute();

	}

	public function searchClientByName($name){
		$array = array();

		$sql = $this->db->prepare("SELECT name, id FROM clients WHERE name LIKE :name LIMIT 10");
		$sql->bindValue(':name', '%'.$name.'%');
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

	}

	public function delete($id, $id_company){
		$sql = $this->db->prepare("DELETE FROM clients WHERE id = :id AND id_company = :id_company");
		$sql->bindValue(":id", $id);
		$sql->bindValue(':id_company', $id_company);
		$sql->execute();

	}

}