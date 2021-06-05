<?php
class Services extends model
{

    public function getList($offset, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM services WHERE id_company = :id_company ORDER BY name_service ASC LIMIT $offset, 10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getInfo($id, $id_company){
        $array = array();
    
        $sql = $this->db->prepare("SELECT * FROM services WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    
        if($sql->rowCount() > 0){
            $array = $sql->fetch();
        }
    
        return $array;
    
    }

    public function getCount($id_company){
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM services WHERE id_company = :id_company");
		$sql->bindValue('id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];



		return $r;
	}

    public function add($name_service, $standard_value, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO services SET name_service = :name_service, standard_value = :standard_value, id_company = :id_company");

        $sql->bindValue(":name_service", $name_service);
        $sql->bindValue(":standard_value", $standard_value);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function edit($id, $name_service, $standard_value, $id_company)
    {
        $sql = $this->db->prepare("UPDATE services SET name_service = :name_service, standard_value = :standard_value WHERE id = :id AND id_company = :id_company");

        $sql->bindValue(":id", $id);
        $sql->bindValue(":name_service", $name_service);
        $sql->bindValue(":standard_value", $standard_value);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }


    public function delete($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM services WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function searchService($sp, $id_company){
		$array = array();

		$sql = $this->db->prepare("SELECT name_service, standard_value, id FROM services WHERE name_service LIKE '%$sp%' ORDER BY name_service ASC");
		$sql->bindValue(":name_service", $sp.'%');
		$sql->bindValue(":id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0) {
			$array = $sql->fetchAll();
		}
		return $array;
	}
}
