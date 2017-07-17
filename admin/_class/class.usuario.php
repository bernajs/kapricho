<?php

require_once("class.helper.php");

class Usuario extends Helper {
  var $nombre;
  var $apellido;
  var $telefono;
  var $correo;
  var $contrasena;
  var $created_at;
  var $modified_at;
  var $status;
  var $id;

    public function __construct(){ $this->sql = new db(); }

    public function db($key){
        switch($key){
            case "insert":
                $query = "INSERT INTO usuario (nombre,apellido,correo,telefono,contrasena,status,created_at)
                VALUES (
                '".$this->nombre."',
                '".$this->apellido."',
                '".$this->correo."',
                '".$this->telefono."',
                '".$this->contrasena."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE usuario
                SET
                nombre='".$this->nombre."',
                apellido='".$this->apellido."',
                telefono='".$this->telefono."',
                correo='".$this->correo."',
                contrasena='".$this->contrasena."',
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

# LOGIN: Validate if user exists.
public function isRegistered($user,$pass){
    $query = 'SELECT * FROM usuario WHERE correo = "'.$user.'" AND contrasena = "'.$pass.'" AND status = 1 LIMIT 1';
    return $this->execute($query);
}

public function isDuplicate($correo){
    $query = 'SELECT id FROM usuario WHERE correo="'.$correo.'" LIMIT 1';
    $result = $this->execute($query);
    if(count($result)>0){ return true; }else{ return false; }
}
public function getLastInserted(){ return $this->lastInserted; }

}
?>
