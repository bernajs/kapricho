<?php

require_once("class.helper.php");

class Service extends Helper {
    var $nombre;
    var $direccion;
    var $estado;
    var $zona;
    var $municipio;
    var $ciudad;
    var $coordenadas;
    var $fotos;
    var $videos;
    var $descripcion;
    var $tipo_evento;
    var $capacidad;
    var $servicios;
    var $calificacion;
    var $destacado;
    var $created_at;
    var $modified_at;
    var $status;
    var $id;
    var $id_usuario;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO quinta (id_usuario,nombre,fotos,videos,direccion,estado,zona,municipio,ciudad,coordenadas,descripcion,tipo_evento,capacidad,servicios,destacado,status,created_at)
                VALUES (
                '".$this->id_usuario."',
                '".$this->nombre."',
                '".$this->fotos."',
                '".$this->videos."',
                '".$this->direccion."',
                '".$this->estado."',
                '".$this->zona."',
                '".$this->municipio."',
                '".$this->ciudad."',
                '".$this->coordenadas."',
                '".$this->descripcion."',
                '".$this->tipo_evento."',
                '".$this->capacidad."',
                '".$this->servicios."',
                '".$this->destacado."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE quinta
                SET
                nombre='".$this->nombre."',
                direccion='".$this->direccion."',
                estado='".$this->estado."',
                zona='".$this->zona."',
                municipio='".$this->municipio."',
                ciudad='".$this->ciudad."',
                coordenadas='".$this->coordenadas."',
                descripcion='".$this->descripcion."',
                fotos='".$this->fotos."',
                videos='".$this->videos."',
                tipo_evento='".$this->tipo_evento."',
                capacidad='".$this->capacidad."',
                servicios='".$this->servicios."',
                calificacion='".$this->calificacion."',
                destacado='".$this->destacado."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
            case "destacado":
                $query = "UPDATE quinta SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM quinta WHERE id=".$this->id;
                break;
    }
    $lid = false;
    if($key=="insert"){ $lid = true; }
    $this->execute($query,$lid);
}

public function get_data($id = null){
}


// View.inicio.php
public function get_categorias($destacado = null){
  $query = 'SELECT * FROM categoria WHERE status = 1';
  if($destacado) $query .= ' AND destacado = 1';
  // Hombre 1, mujer 2, ambos 3
  return $this->execute($query);
}

// View.categoria.php
public function get_count_categoria($id){
  $query = 'SELECT categoria.id FROM categoria INNER JOIN producto ON categoria.id = producto.id_categoria WHERE categoria.id='.$id;
  return $this->execute($query);
}

public function get_productos_by_categoria($id){
  $query = 'SELECT producto.nombre, producto.id, producto.imagenes, producto.stock, producto.precio, producto.descripcion, producto.destacado FROM producto
  INNER JOIN categoria ON categoria.id = producto.id_categoria WHERE producto.stock > 0 AND producto.status = 1 AND categoria.id='.$id;
  return $this->execute($query);
}

public function get_productos_destacados(){
  $query = 'SELECT * FROM producto WHERE status = 1 AND stock > 0 AND destacado = 1';
  return $this->execute($query);
}

public function get_promociones_activas(){
  $query = 'SELECT * FROM promocion WHERE status = 1';
  return $this->execute($query);
}

public function get_producto($id){
  $query = 'SELECT * FROM producto WHERE id='.$id;
  return $this->execute($query);
}


// View.quinta.php
public function get_quinta($id){
  $query = 'SELECT * FROM quinta WHERE status = 1 AND id = '.$id;
  return $this->execute($query);
}
public function get_caracteristicas_quinta($id){
  $query = 'SELECT caracteristica.nombre, caracteristica.id, caracteristica.imagen FROM caracteristica
  INNER JOIN quinta_caracteristica ON caracteristica.id = quinta_caracteristica.id_caracteristica WHERE quinta_caracteristica.id_quinta = '.$id;
  return $this->execute($query);
}

// View.servicio.php
// public function get_categorias(){
//   $query = 'SELECT * FROM categoria WHERE status = 1';
//   return $this->execute($query);
// }

public function get_servicios_by_categoria($id){
  $query = 'SELECT servicio.nombre, servicio.info, servicio.imagen, servicio.id FROM servicio
  INNER JOIN servicio_categoria ON servicio.id = servicio_categoria.id_servicio WHERE servicio_categoria.id_categoria = '.$id.'
  ORDER BY servicio.destacado DESC';
  return $this->execute($query);
}
public function get_servicio_categorias($id){
  $query = 'SELECT categoria.nombre, categoria.imagen FROM categoria
  INNER JOIN servicio_categoria ON categoria.id = servicio_categoria.id_categoria WHERE servicio_categoria.id_servicio='.$id;
  return $this->execute($query);
}
public function isDuplicate($nombre){
    $query = 'SELECT id FROM quinta WHERE nombre="'.$nombre.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}
public function getLastInserted(){ return $this->lastInserted; }

}
?>
