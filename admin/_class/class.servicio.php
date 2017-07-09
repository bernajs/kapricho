<?php

require_once("class.helper.php");

class Servicio extends Helper {
    var $nombre;
    var $info;
    var $destacado;
    var $created_at;
    var $modified_at;
    var $status;
    var $imagen;
    var $id;
    var $id_categoria;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO servicio (nombre,info,imagen,destacado,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->info."',
                '".$this->imagen."',
                '".$this->destacado."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE servicio
                SET
                nombre='".$this->nombre."',
                info='".$this->info."',
                imagen='".$this->imagen."',
                destacado='".$this->destacado."',
                modified_at='".$this->modified_at."',
                status='".$this->status."'
                WHERE id=".$this->id;
                break;
            case "insert_categoria":
                $query = "INSERT INTO servicio_categoria(id_servicio, id_categoria, created_at)
                VALUES(
                  '".$this->id."',
                  '".$this->id_categoria."',
                  '".$this->created_at."'
                )";
            break;
            case "destacado":
                $query = "UPDATE servicio SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete_categoria": $query = "DELETE FROM servicio_categoria WHERE id_servicio=".$this->id;
                    break;
            case "delete": $query = "DELETE FROM servicio WHERE id=".$this->id;
                break;

    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT * FROM servicio WHERE id > 0';
    if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}

public function get_categorias(){
  $query = 'SELECT * FROM categoria WHERE status = 1';
  return $this->execute($query);
}
public function get_servicio_categorias($id){
  $query = 'SELECT categoria.id, categoria.nombre FROM servicio_categoria
  INNER JOIN categoria ON categoria.id = servicio_categoria.id_categoria WHERE servicio_categoria.id_servicio = '.$id;
  return $this->execute($query);
}
public function isDuplicate($nombre){
    $query = 'SELECT id FROM servicio WHERE nombre="'.$nombre.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}
public function getLastInserted(){ return $this->lastInserted; }
}
?>
