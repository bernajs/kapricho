<?php

require_once("class.helper.php");

class Usuario extends Helper {
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
    var $caracteristicas;
    var $calificacion;
    var $destacado;
    var $created_at;
    var $modified_at;
    var $status;
    var $id;
    var $id_usuario;
    var $id_caracteristica;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO quinta (id_usuario,nombre,fotos,videos,direccion,estado,zona,municipio,ciudad,coordenadas,descripcion,tipo_evento,capacidad,caracteristicas,destacado,status,created_at)
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
                destacado='".$this->destacado."',
                status='".$this->status."',
                modified_at='".$this->modified_at."'
                WHERE id=".$this->id;
                break;
                case "insert_caracteristica":
                    $query = "INSERT INTO quinta_caracteristica(id_quinta, id_caracteristica, created_at)
                    VALUES(
                      '".$this->id."',
                      '".$this->id_caracteristica."',
                      '".$this->created_at."'
                    )";
                break;
            case "destacado":
                $query = "UPDATE quinta SET destacado='".$this->destacado."', modified_at='".$this->modified_at."' WHERE id=".$this->id;
                break;
            case "delete_caracteristica": $query = "DELETE FROM quinta_caracteristica WHERE id_quinta=".$this->id;
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
    $query = 'SELECT * FROM usuario WHERE status = 1 AND id = '.$id;
    return $this->execute($query);
}

public function get_quintas($id){
  $query = 'SELECT quinta.nombre, quinta.fotos, quinta.descripcion FROM usuario
  INNER JOIN quinta ON quinta.id_usuario = usuario.id WHERE usuario.id ='.$id;
  return $this->execute($query);
}

public function get_caracteristicas_quinta($id){
  $query = 'SELECT caracteristica.nombre, caracteristica.id, caracteristica.imagen FROM caracteristica
  INNER JOIN quinta_caracteristica ON caracteristica.id = quinta_caracteristica.id_caracteristica WHERE quinta_caracteristica.id_quinta = '.$id;
  return $this->execute($query);
}
public function get_caracteristicas(){
  $query = 'SELECT * FROM caracteristica WHERE status = 1';
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
