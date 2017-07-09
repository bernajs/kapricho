<?php

require_once("class.helper.php");

class Admin extends Helper
{
    public $correo;
    public $nombre;
    public $apellido;
    public $contrasena;
    public $created_at;
    public $modified_at;
    public $status;
    public $id;

    public function __construct()
    {
        $this->sql = new db();
    }

    public function db($key)
    {
        switch ($key) {
            case "insert":
                $query = "INSERT INTO admin (correo,nombre,contrasena,apellido,status,created_at)
                VALUES (
                '".$this->correo."',
                '".$this->nombre."',
                '".$this->contrasena."',
                '".$this->apellido."',
                '".$this->status."',
                '".$this->created_at."'
                )";
                break;
            case "update":
                $query = "UPDATE admin
                SET
                correo='".$this->correo."',
                nombre='".$this->nombre."',
                apellido='".$this->apellido."',
                contrasena='".$this->contrasena."',
                modified_at='".$this->modified_at."',
                status='".$this->status."'
                WHERE id=".$this->id;
                break;
            case "delete": $query = "DELETE FROM admin WHERE id=".$this->id;
                break;

    }
        $lid = false;
        if ($key=="insert") {$lid = true;}
        $this->execute($query, $lid);
    }

    public function getData($id = null){
        $query = 'SELECT * FROM admin WHERE id > 0';
        if ($id!=null) {$query.=" AND id=".$id."";}
        if ($this->status!=null) {$query .= " AND status=".$this->status;}
        if ($this->search!=null) {$query .= " AND ".$this->search_field." LIKE '%".$this->search."%'";}
        if ($this->order!=null) {$query .= " ORDER BY ".$this->order;}
        if ($this->limit!=null) {$query .= " LIMIT ".$this->limit;}
        return $this->execute($query);
    }
    public function getLastInserted(){return $this->lastInserted;}

    public function isDuplicate($correo){
      $query = 'SELECT id FROM admin WHERE correo="'.$correo.'" LIMIT 1';
      $result = $this->execute($query);
      if (count($result)>0) {return true;} else {return false;}
    }
    # LOGIN: Validate if user exists.
    public function isRegistered($user, $pass){
        $query = 'SELECT * FROM admin WHERE correo = "'.$user.'" AND contrasena = "'.$pass.'" AND status = 1 LIMIT 1';
        return $this->execute($query);
    }

    # LOGIN: Validate if email is registered.
    public function isValidEmail($email){
        $query = 'SELECT * FROM user WHERE email = "'.$email.'" AND status = 1 LIMIT 1';
        $result = $this->execute($query);
        return $result;
    }

    public function recover($correo){
        $query = 'SELECT nombre, apellido, correo, contrasena FROM admin WHERE correo = "'.$correo.'"';
        return $this->execute($query);
    }
}
