<?php

namespace app\core;
use \app\core\Model;
use \app\core\User;

abstract class DbModel extends Model
{
   abstract public function tableName(): string;
   abstract public function attribute(): array;
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
   public static function prepare($sql){
   	return  Application::$app->db->pdo->prepare($sql);
   }
}