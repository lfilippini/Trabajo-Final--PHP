<?php
require_once 'models/usuario.php';

class usuarioController{
	
	public function index(){

	}
	
	public function registro(){
		require_once 'views/usuario/registro.php';
	}
	
	public function save(){
		if(isset($_POST)){
			
			$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : false;
			$apellidos = isset($_POST['apellidos']) ? $_POST['apellidos'] : false;
			$email = isset($_POST['email']) ? $_POST['email'] : false;
			$password = isset($_POST['password']) ? $_POST['password'] : false;
			$rol= isset($_POST['rol']) ? $_POST['rol'] : false;
			if($nombre && $apellidos && $email && $password){
				$usuario = new Usuario();
				$usuario->setNombre($nombre);
				$usuario->setApellidos($apellidos);
				$usuario->setEmail($email);
				$usuario->setPassword($password);
				if(isset($_POST['rol'])) {
                    $usuario->setRol($rol);

                }
                if(isset($_GET['id'])){

                    $id = $_GET['id'];
                    $usuario->setId($id);
                    echo "pase por aca";
                    $save = $usuario->editar();
                }else{
                    $save = $usuario->save();
                }
				if($save){
					$_SESSION['register'] = "complete";
                    $_SESSION['usuario'] = "complete";
                    echo "es trueeee";
				}else{
                   echo $usuario->getId();
					$_SESSION['register'] = "failed";
                    $_SESSION['usuario'] = "failed";
                    echo "es falseeeee";
				}
			}else{
				$_SESSION['register'] = "failed";
			}
		}else{
			$_SESSION['register'] = "failed";
		}

	}
	
	public function login(){
		if(isset($_POST)){
			// Identificar al usuario
			// Consulta a la base de datos
			$usuario = new Usuario();
			$usuario->setEmail($_POST['email']);
			$usuario->setPassword($_POST['password']);

			$identity = $usuario->login();

			if($identity && is_object($identity)){
				$_SESSION['identity'] = $identity;

				if($identity->rol == 'admin'){
					$_SESSION['admin'] = true;
				}

			}else{
				$_SESSION['error_login'] = 'Identificación fallida !!';
			}

		}
		header("Location:".base_url);
	}
	public function editar(){
	    Utils::isAdmin();
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $edit = true;

            $usuario = new Usuario();
            $usuario->setId($id);

            $pro = $usuario->getOne();

            require_once 'views/usuario/editar.php';

        }else{
            header('Location:'.base_url.'views/usuario/gestion.php');
        }
    }

	public function logout(){
		if(isset($_SESSION['identity'])){
			unset($_SESSION['identity']);
		}
		
		if(isset($_SESSION['admin'])){
			unset($_SESSION['admin']);
		}
		
		header("Location:".base_url."views/usuario/login.php");
	}
    public function getAll(){
        header("Location:".base_url."views/usuario/gestion.php");
    }
    public function eliminar(){
        Utils::isAdmin();

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $usuario = new Usuario();
            $usuario->setId($id);

            $delete = $usuario->delete();
            if($delete){
                $_SESSION['delete'] = 'complete';
            }else{
                $_SESSION['delete'] = 'failed';
            }
        }else{
            $_SESSION['delete'] = 'failed';
        }

        header('Location:'.base_url.'usuario/getAll');
    }
}