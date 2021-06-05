<?php
class WorthEmployee extends model
{
    public function getList($offset, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("
			SELECT 
            worth_employee.id, 
            worth_employee.id_employee, 
            worth_employee.date_worth,
            worth_employee.advance_amount,
            worth_employee.aditional_info,
            employee.name_employee
	    FROM worth_employee
        LEFT JOIN
            employee ON worth_employee.id_employee = employee.id
      WHERE 
            worth_employee.id_company = :id_company 
      ORDER BY id DESC
      LIMIT $offset, 10");
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

        $sql = $this->db->prepare("SELECT COUNT(*) as we FROM worth_employee WHERE id_company = :id_company");
        $sql->bindValue('id_company', $id_company);
        $sql->execute();
        $row = $sql->fetch();

        $r = $row['we'];



        return $r;
    }

    public function getInfo($id, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM worth_employee WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function getEmployeeList($id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT * FROM employee WHERE id_company = :id_company ORDER BY name_employee ASC");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }

        return $array;
    }

    public function add($id_employee, $date_worth, $advance_amount, $aditional_info, $id_company)
    {

        $sql = $this->db->prepare("INSERT INTO worth_employee SET id_employee = :id_employee, date_worth = :date_worth, advance_amount = :advance_amount, aditional_info = :aditional_info, id_company = :id_company");

        $sql->bindValue(":id_employee", $id_employee);
        $sql->bindValue(":date_worth", $date_worth);
        $sql->bindValue(":advance_amount", $advance_amount);
        $sql->bindValue(":aditional_info", $aditional_info);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function edit($id, $id_employee, $date_worth, $advance_amount, $aditional_info, $id_company)
    {
        $sql = $this->db->prepare("UPDATE worth_employee SET id_employee = :id_employee, date_worth = :date_worth, advance_amount = :advance_amount, aditional_info = :aditional_info WHERE id = :id AND id_company = :id_company");

        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_employee", $id_employee);
        $sql->bindValue(":date_worth", $date_worth);
        $sql->bindValue(":advance_amount", $advance_amount);
        $sql->bindValue(":aditional_info", $aditional_info);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }


    public function delete($id, $id_company)
    {
        $sql = $this->db->prepare("DELETE FROM worth_employee WHERE id = :id AND id_company = :id_company");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
    }

    public function getView($id, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("
        SELECT 
              worth_employee.id, 
              worth_employee.id_employee, 
              worth_employee.date_worth,
              worth_employee.advance_amount,
              worth_employee.aditional_info,
              employee.name_employee
        FROM worth_employee 
        LEFT JOIN employee ON worth_employee.id_employee = employee.id
        WHERE
          worth_employee.id = :id AND
          worth_employee.id_company = :id_company
        ");
        $sql->bindValue(":id", $id);
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();

        if ($sql->rowCount() > 0) {
            $array = $sql->fetch();
        }

        return $array;
    }

    public function filteredList($id_employee, $period1, $period2, $id_company)
    {
        $array = array();

        $sql = $this->db->prepare("SELECT worth_employee.id, worth_employee.id_employee, worth_employee.date_worth, worth_employee.advance_amount, employee.name_employee FROM worth_employee LEFT JOIN employee ON worth_employee.id_employee = employee.id WHERE worth_employee.id_employee = $id_employee AND worth_employee.date_worth BETWEEN '$period1' AND '$period2' ORDER BY worth_employee.id desc");
        $sql->bindValue(":id_company", $id_company);
        $sql->execute();
        if ($sql->rowCount() > 0) {
            $array = $sql->fetchAll();
        }
        return $array;
    }
}
