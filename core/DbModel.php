<?php

namespace app\core;
use \app\core\Model;

abstract class DbModel extends Model
{
   abstract public function tableName(): string;
   abstract public function attribute(): array;
   public function save(){
    $tableName = $this->tableName();
    $attribute = $this->attribute();
    $params = array_map(fn($attr) => ":$attr", $attribute);
  $statement = self::prepare("INSERT INTO $
  tableName (".implode(',', $attribute).") VALUES(".implode(',', $params).")");
  var_dump($statement, $params, $attribute);
   
   }
   public static function prepare($sql){
   	return  Application::$app->db->pdo->prepare($sql);
   }
}