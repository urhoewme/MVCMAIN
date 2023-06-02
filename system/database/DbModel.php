<?php

namespace app\system\database;

use app\system\Application;
use app\system\classes\Model;
use PDO;

abstract class DbModel extends Model
{
    abstract static public function tableName(): string;

    abstract public function attributes(): array;

    abstract static public function primaryKey(): string;

    public function save()
    {
        $tableName = $this->tableName();
        $attributes = $this->attributes();
        $params = array_map(fn($attr) => ":$attr", $attributes);
        $statement = self::prepare("INSERT INTO $tableName (" . implode(',', $attributes) . ") 
                VALUES(" . implode(',', $params) . ")");
        foreach ($attributes as $attribute) {
            $statement->bindValue(":$attribute", $this->{$attribute});
        }

        $statement->execute();
        return true;
    }

    public static function findOne($where)
    {
        $tableName = static::tableName();
        $attributes = array_keys($where);
        $sql = implode("AND", array_map(fn($attr) => "$attr = :$attr", $attributes));
        $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
        foreach ($where as $key => $item) {
            $statement->bindValue(":$key", $item);
        }
        $statement->execute();
        return $statement->fetchObject(static::class);
    }

    public static function findById($id)
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT * FROM $tableName WHERE id = $id");
        $statement->execute();
        return $statement->fetch(PDO::FETCH_OBJ);
    }

    public static function update($params)
    {
        $id = $_GET['id'];
        $name = $params['name'];
        $email = $params['email'];
        $gender = $params['gender'];
        $status = $params['status'];
        $tableName = static::tableName();
        $statement = self::prepare("UPDATE $tableName SET name=\"$name\", email=\"$email\", gender=\"$gender\", status=\"$status\" WHERE id=$id");
        return $statement->execute();
    }

    public static function findAll()
    {
        $tableName = static::tableName();
        $statement = self::prepare("SELECT id, name, email, status, gender FROM $tableName");
        $statement->execute();
        return $statement->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function delete()
    {
        $id = $_GET['id'];
        $tableName = static::tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id=$id");
        return $statement->execute();

    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}