<?php
class HumanResources extends model
{
    public function getEmployeeList($offset, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM employee WHERE id_company = :id_company ORDER BY status ASC, name_employee ASC LIMIT $offset, 10");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function getEmployeeInfo($id, $id_company)
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

    public function getEmployeeCount($id_company)
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as pd FROM employee WHERE id_company = :id_company");
        $sql->bindValue('id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();

        $r = $row['pd'];



        return $r;
    }

    public function getEmployeeActiveCount($id_company)
    {
        $r = 0;

        $sql = $this->db->prepare("SELECT COUNT(*) as pd FROM employee WHERE id_company = :id_company AND status = '1'");
        $sql->bindValue('id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();

        $r = $row['pd'];



        return $r;
    }

    public function addEmployee($name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $occupation, $admission_date, $wage, $bank, $agency, $bank_account, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $status, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO employee SET name_employee = :name_employee, nickname = :nickname, phone = :phone, cellphone = :cellphone, father_name = :father_name, mother_name = :mother_name, birth_date = :birth_date, marital_status = :marital_status, cpf = :cpf, identity = :identity, ctps = :ctps, cnh = :cnh, cnh_cat = :cnh_cat, occupation = :occupation, admission_date = :admission_date, wage = :wage, bank = :bank, agency = :agency, bank_account = :bank_account, aditional_info = :aditional_info, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state, status = :status, id_company = :id_company");

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
        $sql->bindValue(":occupation", $occupation);
        $sql->bindValue(":admission_date", $admission_date);
        $sql->bindValue(":wage", $wage);
        $sql->bindValue(":bank", $bank);
        $sql->bindValue(":agency", $agency);
        $sql->bindValue(":bank_account", $bank_account);
        $sql->bindValue(":aditional_info", $aditional_info);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":address_number", $address_number);
        $sql->bindValue(":address2", $address2);
        $sql->bindValue(":address_neighb", $address_neighb);
        $sql->bindValue(":address_city", $address_city);
        $sql->bindValue(":address_state", $address_state);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function editEmployee($id, $name_employee, $nickname, $phone, $cellphone, $father_name, $mother_name, $status, $birth_date, $marital_status, $cpf, $identity, $ctps, $cnh, $cnh_cat, $occupation, $admission_date, $wage, $bank, $agency, $bank_account, $aditional_info, $address_zipcode, $address, $address_number, $address2, $address_neighb, $address_city, $address_state, $id_company)
    {

        $sql = $this->db->prepare("UPDATE employee SET name_employee = :name_employee, nickname = :nickname, phone = :phone, cellphone = :cellphone, father_name = :father_name, mother_name = :mother_name, status = :status, birth_date = :birth_date, marital_status = :marital_status, cpf = :cpf, identity = :identity, ctps = :ctps, cnh = :cnh, cnh_cat = :cnh_cat, occupation = :occupation, admission_date = :admission_date, wage = :wage, bank = :bank, agency = :agency, bank_account = :bank_account, aditional_info = :aditional_info, address_zipcode = :address_zipcode, address = :address, address_number = :address_number, address2 = :address2, address_neighb = :address_neighb, address_city = :address_city, address_state = :address_state WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":name_employee", $name_employee);
        $sql->bindValue(":nickname", $nickname);
        $sql->bindValue(":phone", $phone);
        $sql->bindValue(":cellphone", $cellphone);
        $sql->bindValue(":father_name", $father_name);
        $sql->bindValue(":mother_name", $mother_name);
        $sql->bindValue(":birth_date", $birth_date);
        $sql->bindValue(":marital_status", $marital_status);
        $sql->bindValue(":status", $status);
        $sql->bindValue(":cpf", $cpf);
        $sql->bindValue(":identity", $identity);
        $sql->bindValue(":ctps", $ctps);
        $sql->bindValue(":cnh", $cnh);
        $sql->bindValue(":cnh_cat", $cnh_cat);
        $sql->bindValue(":occupation", $occupation);
        $sql->bindValue(":admission_date", $admission_date);
        $sql->bindValue(":wage", $wage);
        $sql->bindValue(":bank", $bank);
        $sql->bindValue(":agency", $agency);
        $sql->bindValue(":bank_account", $bank_account);
        $sql->bindValue(":aditional_info", $aditional_info);
        $sql->bindValue(":address_zipcode", $address_zipcode);
        $sql->bindValue(":address", $address);
        $sql->bindValue(":address_number", $address_number);
        $sql->bindValue(":address2", $address2);
        $sql->bindValue(":address_neighb", $address_neighb);
        $sql->bindValue(":address_city", $address_city);
        $sql->bindValue(":address_state", $address_state);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function deleteEmployee($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM employee WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function searchEmployee($sp, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT name_employee, nickname, cellphone, status, id FROM employee WHERE name_employee LIKE '%$sp%' OR nickname LIKE '%$sp%' ORDER BY name_employee ASC");
        $sql->bindValue(":name_employee", $sp . '%');
        $sql->bindValue(":nickname", $sp . '%');
        $sql->bindValue(":status", $sp . '%');
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}
