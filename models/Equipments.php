<?php
class Equipments extends model
{
    public function getList($offset, $id_company){
		$array = array();

		$sql = $this->db->prepare("
			SELECT 
            equipment_model.id, 
            equipment_model.name, 
            equipment_model.id_brand,
			equipment_brand.name_brand 
			FROM equipment_model
			LEFT JOIN equipment_brand ON equipment_brand.id = equipment_model.id_brand
			WHERE equipment_model.id_company = :id_company LIMIT $offset, 10");
		$sql->bindValue("id_company", $id_company);
		$sql->execute();

		if($sql->rowCount() > 0){
			$array = $sql->fetchAll();
		}

		return $array;

    }
    
    public function getInfo($id, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM equipment_model WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getCount($id_company){
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM equipment_model WHERE id_company = :id_company");
		$sql->bindValue('id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];



		return $r;
	}

    public function add($name, $id_brand, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO equipment_model SET name = :name, id_brand = :id_brand, id_company = :id_company");

        $sql->bindValue(":name", $name);
        $sql->bindValue(":id_brand", $id_brand);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function edit($id, $name, $id_brand, $id_company)
    {

        $sql = $this->db->prepare("UPDATE equipment_model SET name = :name, id_brand = :id_brand WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":name", $name);
        $sql->bindValue(":id_brand", $id_brand);
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function delete($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM equipment_model WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function getEquipmentBrandInfo($id, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM equipment_brand WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue("id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getEquipmentBrandList($id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM equipment_brand WHERE id_company = :id_company ORDER BY name_brand ASC");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getEquipmentBrandListFiltered($offset, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM equipment_brand WHERE id_company = :id_company ORDER BY name_brand ASC LIMIT $offset, 10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getBrandsCount($id_company){
		$r = 0;

		$sql = $this->db->prepare("SELECT COUNT(*) as c FROM equipment_brand WHERE id_company = :id_company");
		$sql->bindValue('id_company', $id_company);
		$sql->execute();
		$row = $sql->fetch();

		$r = $row['c'];



		return $r;
	}


    public function addEquipmentBrand($name_brand, $id_company)
    {
        $sql = $this->db->prepare("INSERT INTO equipment_brand SET name_brand = :name_brand, id_company = :id_company");

        $sql->bindValue(":name_brand", $name_brand);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function editEquipmentBrand($id, $name_brand, $id_company)
    {
        $sql = $this->db->prepare("UPDATE equipment_brand SET name_brand = :name_brand WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":name_brand", $name_brand);
        $sql->bindValue(":id_company", $id_company);
        $sql->bindValue(":id", $id);
        $sql->execute();
    }

    public function deleteEquipmentBrand($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM equipment_brand WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }
}
