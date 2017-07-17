<?php

require_once("class.helper.php");

class Compra extends Helper {
    var $nombre;
    var $created_at;
    var $modified_at;
    var $status;
    var $imagen;
    var $stock;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO caracteristica (nombre,imagen,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->imagen."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE caracteristica
                SET
                nombre='".$this->nombre."',
                imagen='".$this->imagen."',
                modified_at='".$this->modified_at."',
                status='".$this->status."'
                WHERE id=".$this->id;
                break;
                case "restar_stock":
                    $query = "UPDATE producto
                    SET
                    stock = stock - $this->stock,
                    modified_at='".$this->modified_at."'
                    WHERE stock > 0 AND id=".$this->id;
                    break;
                case "aprobar":
                    $query = "UPDATE compra
                    SET
                    modified_at='".$this->modified_at."',
                    status='".$this->status."'
                    WHERE id=".$this->id;
                    break;
            case "delete": $query = "DELETE FROM caracteristica WHERE id=".$this->id;
                break;

    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($pendiente = null){
    $query = 'SELECT usuario.nombre, usuario.apellido, usuario.correo, compra.created_at, compra.id, compra.status, compra.created_at FROM
    usuario INNER JOIN compra ON usuario.id = compra.id_usuario';
    if($pendiente){$query .= ' WHERE compra.status = 0';}
    if($id!=NULL) $query.=" AND id=".$id."";
    if($this->status!=NULL) $query .= " AND status=".$this->status;
    if($this->search!=NULL) $query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";
    if($this->order!=NULL) $query .= " ORDER BY ".$this->order;
    if($this->limit!=NULL) $query .= " LIMIT ".$this->limit;
    return $this->execute($query);
}

public function get_compra($id){
  $query = 'SELECT * FROM compra INNER JOIN compra_item ON compra.id = compra_item.id_compra WHERE compra.id = '.$id;
  return $this->execute($query);
}

public function get_productos($id){
  $query = 'SELECT * FROM compra_item INNER JOIN producto ON producto.id = compra_item.id_producto
  WHERE compra_item.id_compra ='.$id;
  return $this->execute($query);
}

public function get_productos_compra($id){
  $query = 'SELECT * FROM compra INNER JOIN compra_item ON compra.id = compra_item.id_compra
  INNER JOIN producto ON compra_item.id_producto = producto.id WHERE compra.id ='.$id;
  return $this->execute($query);
}

public function getLastInserted(){ return $this->lastInserted; }

public function isDuplicate($nombre){
  $query = 'SELECT id FROM caracteristica WHERE nombre="'.$nombre.'" LIMIT 1';
  $result = $this->execute($query);
  if (count($result)>0) {return true;} else {return false;}
}
}
?>
