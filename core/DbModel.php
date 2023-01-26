<?php

namespace app\core;
use \app\core\Model;
use \app\core\User;

abstract class DbModel extends Model
{
   abstract public function tableName(): string;
   abstract public function attribute(): array;
   abstract public function primaryKey(): string;
   public function save(){
    $tableName = $this->tableName();
    $attributes = $this->attribute();
    $params = array_map(fn($attr) => ":$attr", $attributes);
  $statement = self::prepare("INSERT INTO $tableName (".implode(',', $attributes).") VALUES (".implode(',', $params).")");
  // echo "<pre>";
  //  var_dump($statement);
  foreach ($attributes as  $attribute) {
     $statement->bindValue(":$attribute", $this->{$attribute});
  }
   $statement->execute();
   return true;
   }
   public function findOne($where){
       $tableName = static::tableName();
       $attributes = array_keys($where);
       $sql = implode("AND ", array_map(fn($attr) => "$attr = :$attr", $attributes));
       $statement = self::prepare("SELECT * FROM $tableName WHERE $sql");
       foreach($where as $key => $item){
       $statement->bindValue(":$key", $item);
    }
       $statement->execute();
       return $statement->fetchObject(static::class);
   }
   public static function prepare($sql){
   	return  Application::$app->db->pdo->prepare($sql);
   }
}