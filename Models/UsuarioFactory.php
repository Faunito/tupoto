<?php
require_once('Profesor.php');
require_once('Secretaria.php');
class UsuarioFactory{
    public function registrarUsuario($rut,$nombre,$apaterno,$amaterno,$password,$correo,$extra,$facultad){
        switch($extra){
            case 'profesor':
            $profesor = new Profesor();
            $profesor -> setRut($rut);
            $profesor -> setNombre($nombre);
            $profesor -> setApaterno($apaterno);
            $profesor -> setAmaterno($amaterno);
            $profesor -> setPassword($password);
            $profesor -> setFacultad($facultad);
            $profesor -> setTipoProfesor($extra);
            $profesor -> setCorreoElectronico($correo); 
            $profesor -> getDBProfesor()->add($profesor);                       
            return $profesor;
            break;
            
            case 'director':
            $director = new Director();
            $director -> setRut($rut);
            $director -> setNombre($nombre);
            $director -> setApaterno($apaterno);
            $director -> setAmaterno($amaterno);
            $director -> setPassword($password);
            $director -> setFacultad($facultad);
            $director -> setCarrera($carrera);
            $director -> setTipoProfesor($extra);
            $director -> setCorreoElectronico($correo); 
            $director -> getDBDirector()->add($director);                       
            return $director;
            break;
            
            default:
            $secretaria = new Secretaria();
            $secretaria -> setRut($rut);
            $secretaria -> setNombre($nombre);
            $secretaria -> setFacultad($facultad);
            $secretaria -> setApaterno($apaterno);
            $secretaria -> setAmaterno($amaterno);
            $secretaria -> setPassword($password);
            $secretaria -> setCorreoElectronico($correo);
            $secretaria -> setTelefono($extra);
            $secretaria -> getDBSecretaria()->add($secretaria);
            return $secretaria;
            break;            
        }
    }
    
    public function modificarUsuario(){
        switch($extra){
            case 'profesor':
            $profesor = new Profesor();
            $profesor -> setRut($rut);
            $profesor -> setNombre($nombre);
            $profesor -> setApaterno($apaterno);
            $profesor -> setAmaterno($amaterno);
            $profesor -> setPassword($password);
            $profesor -> setFacultad($facultad);
            $profesor -> setTipoProfesor($extra);
            $profesor -> setCorreoElectronico($correo); 
            $profesor -> getDBProfesor()->add($profesor);                       
            return $profesor;
            break;
            
            case 'director':
            $director = new Director();
            $director -> setRut($rut);
            $director -> setNombre($nombre);
            $director -> setApaterno($apaterno);
            $director -> setAmaterno($amaterno);
            $director -> setPassword($password);
            $director -> setFacultad($facultad);
            $director -> setCarrera($carrera);
            $director -> setTipoProfesor($extra);
            $director -> setCorreoElectronico($correo); 
            $director -> getDBDirector()->add($director);                       
            return $director;
            break;
            
            default:
            $secretaria = new Secretaria();
            $secretaria -> setRut($rut);
            $secretaria -> setNombre($nombre);
            $secretaria -> setFacultad($facultad);
            $secretaria -> setApaterno($apaterno);
            $secretaria -> setAmaterno($amaterno);
            $secretaria -> setPassword($password);
            $secretaria -> setCorreoElectronico($correo);
            $secretaria -> setTelefono($extra);
            $profesor -> getDBSecretaria()->add($secretaria);
            return $secretaria;
            break;            
        }
    }
     
     
}?>