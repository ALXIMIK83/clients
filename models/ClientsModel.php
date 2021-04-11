<?php


namespace app\models;

use app\core\Model;
use app\DB\DbConnectionManager;


class ClientsModel extends Model
{
    public function getData()
    {
        $posts = [];
        $query = ""
            . "SELECT * "
            . "FROM clients ";
        $result = $this->base->db->query($query);
        if ($result) {
            // Cycle through results
            while ($row = $result->fetch_assoc()) {
                $posts[] = [
                    'id' => $row['id'],
                    'name' => $row['name'],
                    'phone' => $row['phone'],
                    'email' => $row['e-mail'],
                ];
            }
        } else {
            die($this->base->db->error);
        }
        return $posts;
    }

    public function insertData($clientsData)
    {
        extract($clientsData);
        if (preg_match('/^[a-zA-Zа-яА-Я]+$/u', $name) &&
            preg_match('/^[0-9]+$/', $phone) &&
            filter_var($e_mail, FILTER_VALIDATE_EMAIL)
        ) {
            $query = "INSERT INTO clients (
              `name`, `phone`, `e-mail`
          )
          VALUES (
              '%s', '%s', '%s'
          )";
            $query = \sprintf($query, $this->base->db->real_escape_string($name), $this->base->db->real_escape_string($phone), $this->base->db->real_escape_string($e_mail));
            if ($this->base->db->query($query)) {
                return true;
            } else {
                die($this->base->db->error);
            }
        }

    }

    public function deleteItem($item)
    {
        $query = "DELETE FROM clients WHERE `id` = $item";
        if ($this->base->db->query($query)) {
            return true;
        } else {
            die($this->base->db->error);
        }
    }

    public function create_table()
    {
        $query = "CREATE TABLE `clients` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(20) NULL DEFAULT NULL,
	`phone` VARCHAR(20) NULL DEFAULT NULL,
	`e-mail` VARCHAR(20) NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)";
        if ($this->base->db->query($query)) {
            return true;
        } else {
            die($this->base->db->error);
        }
    }
}
