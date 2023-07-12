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
        $id = $params['id'];
        $tableName = static::tableName();
        $setClause = array();
        foreach ($params as $key => $value) {
            $setClause[] = "$key=\"$value\"";
        }
        $setClause = implode(',', $setClause);
        $statement = self::prepare("UPDATE $tableName SET $setClause WHERE id=$id");
        return $statement->execute();
    }
    public static function findAll()
    {
        $currentPage = $_GET['page'] ?? 1;
        $recordsPerPage = 10;
        $tableName = static::tableName();
        $sql = "SELECT COUNT(*) AS total FROM $tableName";
        $stmt = self::prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $totalRecords = $result['total'];
        $totalPages = ceil($totalRecords / $recordsPerPage);
        $offset = ($currentPage - 1) * $recordsPerPage;
        $sql = "SELECT * FROM $tableName LIMIT $offset, $recordsPerPage";
        $stmt = self::prepare($sql);
        $stmt->execute();

        return array($stmt->fetchAll(PDO::FETCH_ASSOC), $totalPages);
    }

    public static function delete()
    {
        $id = $_GET['id'];
        $tableName = static::tableName();
        $statement = self::prepare("DELETE FROM $tableName WHERE id=$id");
        return $statement->execute();
    }

    public function deleteMultiple()
    {
        $tableName = static::tableName();
        $records = $_POST['record'] ?? [];
        $recordIds = array_map('intval', $records);
        $sql = "DELETE FROM $tableName WHERE id IN (" . implode(',', $recordIds) . ")";
        $stmt = self::prepare($sql);
        return $stmt->execute();
    }

    public static function prepare($sql)
    {
        return Application::$app->db->pdo->prepare($sql);
    }
}