<?php

require_once("class.helper.php");

class Categoria extends Helper {
    var $nombre;
    var $created_at;
    var $modified_at;
    var $imagen;
    var $status;
    var $descripcion;
    var $destacado;
    var $sexo;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO categoria (nombre,descripcion,destacado,sexo,imagen,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->descripcion."',
                '".$this->destacado."',
                '".$this->sexo."',
                '".$this->imagen."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE categoria
                SET
                nombre='".$this->nombre."',
                descripcion='".$this->descripcion."',
                destacado='".$this->destacado."',
                sexo='".$this->sexo."',
                imagen='".$this->imagen."',
                modified_at='".$this->modified_at."',
                status='".$this->status."'
                WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM categoria WHERE id=".$this->id;
                break;

    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT * FROM categoria WHERE id > 0';
    if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}
public function getLastInserted(){ return $this->lastInserted; }

public function isDuplicate($nombre){
  $query = 'SELECT id FROM categoria WHERE nombre="'.$nombre.'" LIMIT 1';
  $result = $this->execute($query);
  if (count($result)>0) {return true;} else {return false;}
}
}
?>
