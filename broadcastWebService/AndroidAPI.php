<?php
require_once "connections.php"; 
require_once "ResponseAPI.php"; 

/**
 * Description of AndroidAPI
 *
 * @author mj_uc
 */
class AndroidAPI { 
    
    /**
     * Nuestra API donde vamos a hacer nuestro intercambio de datos
     * 
     prepared statements -> inyeccion sql se evitan
     */
    public function API(){
        header('Content-Type: application/JSON');  //Definos  que tipo respuesta va a generar nuestra API               
        $method = $_SERVER['REQUEST_METHOD']; //Recoge el tipo "metodo" del que solicito a la API
        switch ($method) {     
            case 'POST'://inserta telefono
                $this->insertNumber();
                break;                
            default://metodo NO soportado
                echo 'METODO NO SOPORTADO';
                break;
        }
    } 
    
   
    function insertNumber(){
        
        if($_GET['action']=='detail'){  
        
            $json = file_get_contents('php://input');
            $obj = json_decode($json);
            $telefono = $obj->{'telefono'};
            $fecha = $obj->{'fecha'};
            $hora = $obj->{'hora'};
            $estado = $obj->{'estado'};

            $dbc = mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE) or die('Error in db');
            $query_insert="INSERT INTO registrotelefonos (telefono,fecha,hora,estado) VALUES('$telefono', '$fecha', '$hora', '$estado')";
            mysqli_query($dbc,$query_insert) or die('Error querying database.');

            mysqli_close($dbc); 
            //responder con el numero de elementos insertados
        }
    }
    
}//end class