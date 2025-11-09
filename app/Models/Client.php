<?php /*ID, Nombre, Email, Teléfono, Dirección, Fecha de
alta.*/


class Client {

    private $id;
     private $name;
     private $email;
     private $telefono;
     private $direccion;
     private $fecha_alta;


    public function __construct($id, $name, $email, $telefono, $direccion, $fecha_alta) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->fecha_alta = $fecha_alta;
    }


    // Class implementation goes here
}

?>