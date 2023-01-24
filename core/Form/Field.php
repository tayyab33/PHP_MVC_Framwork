<?php 
     namespace app\core\form;
     use \app\core\Model;

     class Field
     {
        
        public Model $model;
        public string $attribute;
        public const TYPE_TEXT = 'text';
        public const TYPE_PASSWORD = 'password';
        public const TYPE_NUMBER  = 'number';
        public string $type;
        public function __construct(Model $model, $attribute){
           $this->type = self::TYPE_TEXT;
           $this->model = $model;
           $this->attribute = $attribute;
        }

        public function __toString(){
          return sprintf(' <div class="form-group">
       <label>%s</label>
        <input type="%s" name="%s" class="form-control %s">
 </div>
 <div class="invalid-feedback"> %s </div>
 ', $this->attribute, $this->attribute, $this->model->{$this->attribute},
      $this->model->hasError($this->attribute) ? 'is-invalid' : '', $this->model->getFirstError($this->attribute)
);
        }
        public function passwordField(){
          $this->type = self::TYPE_PASSWORD;
          return $this;
        }
     }
 ?>

