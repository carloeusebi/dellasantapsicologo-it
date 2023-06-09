<?php

namespace app\db;

use app\App;
use Exception;
use PDO;

abstract class DbModel
{

    abstract public static function tableName(): string;

    abstract public function attributes(): array;


    public function get()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $search = $_GET['search'] ?? null;
        $order = self::getOrder();
        $type = self::getType();

        $join = $_GET['join'] ?? null;

        $query = "SELECT * FROM $tableName ";

        if ($search) {

            $query .= " WHERE " . $attributes[0] . " LIKE :search OR " . $attributes[1] . " LIKE :search ";
        }

        // to order by a joined table
        if ($join) {
            $query .= " JOIN $join" . "s ON $tableName.$join" . "_id = $join" . "s.id ";
        }

        $query .= " ORDER BY $order $type";

        $statement = self::prepare($query);

        if ($search) $statement->bindValue('search', "%$search%");

        $statement = self::execute($statement);

        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getById($id)
    {
        $tableName = $this->tableName();

        $statement = self::prepare("SELECT * FROM $tableName WHERE id = :id");

        $statement->bindValue('id', $id);

        $statement = self::execute($statement);

        return $statement->fetch(PDO::FETCH_ASSOC);
    }


    public function create()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $params = array_map(fn ($attr) => ":$attr", $attributes);
        $query = "INSERT INTO $tableName (" . implode(',', $attributes) . ') VALUES (' . implode(',', $params) . ')';

        $statement = self::prepare($query);

        foreach ($attributes as $attribute) {

            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement = self::execute($statement);

        return true;
    }


    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $query = '';

        $query = implode(', ', array_map(fn ($attr, $param) => "$attr = $param", $attributes, $params));
        $query = "UPDATE $tableName SET $query WHERE id = :id";


        $statement = self::prepare($query);

        foreach ($attributes as $attribute) {

            $statement->bindValue(":$attribute", $this->$attribute);
        }

        $statement = self::execute($statement);

        return true;
    }


    public function delete($id)
    {
        $tableName = $this->tableName();

        $query = "DELETE FROM $tableName WHERE id=:id";

        $statement = self::prepare($query);

        $statement->bindValue('id', $id);

        $statement = $this->execute($statement);
    }


    public static function prepare($query)
    {
        return App::$app->db->prepare($query);
    }


    private function execute($statement)
    {
        try {
            $statement->execute();
        } catch (Exception $e) {
            dd($e);
        }

        return $statement;
    }


    public function setOrder($order)
    {
        $_GET['order'] = $order;
    }


    private function getOrder()
    {
        $order = $_GET['order'] ?? 'id';
        return in_array($order, $this->attributes()) || $order === 'lname' ? $order : 'id'; // need order === lname because surveys can be ordered by patient's lname
    }


    private function getType()
    {
        $type = $_GET['type'] ?? 'asc';
        return $type === 'asc' || $type === 'desc' ? $type : 'asc';
    }


    public function load($data)
    {
        foreach ($data as $key => $value) {

            if ($value) {
                if (!is_array($value))
                    $value = trim($value);
            }

            $this->$key = $value ?? null;
        }
    }
}
