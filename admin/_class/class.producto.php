<?php

require_once("class.helper.php");

class Producto extends Helper {
    var $nombre;
    var $imagenes;
    var $descripcion;
    var $categoria;
    var $stock;
    var $destacado;
    var $created_at;
    var $modified_at;
    var $status;
    var $precio;
    var $id_categoria;
    var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO producto (id_categoria,nombre,precio,stock,imagenes,descripcion,destacado,status,created_at)
                VALUES (
                '".$this->id_categoria."',
                '".$this->nombre."',
                '".$this->precio."',
                '".$this->stock."',
                '".$this->imagenes."',
                '".$this->descripcion."',
                '".$this->destacado."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE producto
                SET
                nombre='".$this->nombre."',
                precio='".$this->precio."',
                id_categoria='".$this->id_categoria."',
                descripcion='".$this->descripcion."',
                imagenes='".$this->imagenes."',
                destacado='".$this->destacado."',
                stock='".$this->stock."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
            case "destacado":
                $query = "UPDATE producto SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM producto WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
    $query = 'SELECT producto.id, producto.nombre, producto.descripcion, producto.imagenes, producto.stock, producto.destacado, producto.status, producto.created_at, producto.modified_at,
    producto.precio, categoria.id AS id_categoria, categoria.nombre AS categoria FROM producto INNER JOIN categoria ON producto.id_categoria = categoria.id';
    if($id!=NULL) $query.=" AND producto.id=".$id."";
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

// public function get_categorias_producto($id){
//   $query = 'SELECT caracteristica.nombre, caracteristica.id, caracteristica.imagen FROM caracteristica
//   INNER JOIN producto_caracteristica ON caracteristica.id = producto_caracteristica.id_caracteristica WHERE producto_caracteristica.id_producto = '.$id;
//   return $this->execute($query);
// }
// public function get_categorias(){
//   $query = 'SELECT * FROM caracteristica WHERE status = 1';
//   return $this->execute($query);
// }

public function isDuplicate($nombre){
    $query = 'SELECT id FROM producto WHERE nombre="'.$nombre.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}
public function getLastInserted(){ return $this->lastInserted; }

}
?>
