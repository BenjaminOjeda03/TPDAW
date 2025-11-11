<?php /*ID, Nombre, Email, Teléfono, Dirección, Fecha de
alta.*/

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Client extends Model {

    use SoftDeletes;

    protected $fillable = [

           'id','name','email','telefono','direccion','fecha_alta'

    ];
  

protected $dates = ['registered_at','deleted_at'];



    /*
    public function __construct($id, $name, $email, $telefono, $direccion, $fecha_alta) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->direccion = $direccion;
        $this->fecha_alta = $fecha_alta;
    }*/


    // Class implementation goes here
}

?>