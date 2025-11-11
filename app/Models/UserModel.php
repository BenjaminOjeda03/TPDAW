<?php
/*ID, Nombre, Apellido, Nombre de usuario,
Email, Teléfono, Perfil (Administrador, Gestión, Consultas)*/



class UserModel {

    private $id;
    private $nombre;
    private $apellido;
    private $nombre_usuario;
    private $email;
    private $telefono;
    private $perfil; // Administrador, Gestión, Consultas

    public function __construct($id, $nombre, $apellido, $nombre_usuario, $email, $telefono, $perfil) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->nombre_usuario = $nombre_usuario;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->perfil = $perfil;
    }

}
?>