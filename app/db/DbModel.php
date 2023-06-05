<?php

namespace app\db;

use app\App;
use PDO;

abstract class DbModel
{

    abstract public static function tableName(): string;

    abstract public function attributes(): array;

    public function get($search, $order, $type)
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();

        $query = "SELECT * FROM $tableName ";

        if ($search) {

            $query .= " WHERE " . $attributes[0] . " LIKE :search OR " . $attributes[1] . " LIKE :search ";
        }

        $query .= " ORDER BY $order $type";

        $statement = self::prepare($query);

        if ($search) $statement->bindValue('search', "%$search%");


        $statement->execute();

        $patients = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $patients;
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

        $statement->execute();

        return true;
    }


    public function update()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn ($attr) => ":$attr", $attributes);

        $query = '';

        for ($i = 0; $i < count($attributes) - 1; $i++) {

            $query .= $attributes[$i] . '=' . $params[$i] . ', ';
        }

        $query = mb_substr($query, 0, -2);

        $query = "UPDATE $tableName SET " . $query . " WHERE id=:id";


        $statement = self::prepare($query);

        foreach ($attributes as $attribute) {

            $statement->bindValue(":$attribute", $this->$attribute);
        }

        $statement->execute();

        return true;
    }


    public function delete($id)
    {
        $tableName = $this->tableName();

        $query = "DELETE FROM $tableName WHERE id=:id";

        $statement = self::prepare($query);

        $statement->bindValue('id', $id);

        $statement->execute();
    }

    public function load($data)
    {

        foreach ($data as $key => $value) {

            $this->$key = trim($value) ?? null;
        }
    }


    public static function prepare($query)
    {
        return App::$app->db->prepare($query);
    }
}
