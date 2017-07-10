<?php

require_once("class.helper.php");

class Files extends Helper {
    var $id;
    var $data;
    var $modified_at;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO quinta (id_usuario,nombre,fotos,videos,direccion,estado,zona,municipio,ciudad,coordenadas,descripcion,tipo_evento,capacidad,servicios,destacado,status,created_at)
                VALUES (
                '".$this->id_usuario."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update_img_producto":
                $query = "UPDATE producto
                SET
                imagenes='".$this->data."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM producto WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_imagenes_producto($id){
  $query = 'SELECT imagenes FROM producto WHERE id = '.$id;
  return $this->execute($query);
}

}
?>
