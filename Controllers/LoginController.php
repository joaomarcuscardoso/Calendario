<?php 
class LoginController extends Controller {
    private $users;
    private $array;
    

    public function __construct() {
        $this->users = new Users();
        $this->array = array();
        if($this->users->isLogged() == true) {

            //  perfil  do usuário
            $this->array["token"] = $_SESSION['token'];
            header("Location: ".BASE_URL."login/");
            exit;
        }
        

    }
    
    public function index() {
        $this->loadTemplate("login", $this->array);
    }

    public function profile() {
        // Fazer senha.
        $this->array['user_profile'] = $this->users->getUser();

        $this->loadTemplate("profile", $this->array);
    }

    public function forgetPassword() {
        if(!empty($_SESSION['message'])) {
           $this->array['message'] = $_SESSION['message'];
           $_SESSION['message'] = "";
        }


        $this->loadTemplate("forgetPassword", $this->array);
    }

    public function login_access() {
    
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            
            $email = addslashes($_POST['email']);
            $password = addslashes(md5(($_POST['password'])));

            
            $this->array['access_user'] = $this->users->validateLogin($email, $password);

            if(count($this->array['acces_user']) > 0) {
                $this->array['message'] = "Email e/ou senha errado(s), por favor tente novamente.";

            } else {
                                        
                header("Location: ".BASE_URL."home");
                exit;
            }
        } else {
            $this->array['message'] = "Email e/ou senha vazios, digite seus dados por favor.";
        }

        $this->loadTemplate("login", $this->array); 
    }

    public function changedPassword() {

        if(!empty($_POST['email'])) {
            $email = addslashes($_POST['email']);
            if(!empty($this->users->getEmail($email))) {
                $_SESSION['token'] =  $this->users->createForget_password($email);
/* 
                $to = $email;
                
                $subject = "Verificando o correio do PHP";
                
                $message = "Para redifinir sua senha clique no link \n\n "+BASE_URL+"forgetPassword_success/".$_SESSION['token'] ;
                
                $headers = "De: rfcjoujou@gmail.com";
                
                mail($to, $subject, $message, $headers); */
/* 
                header("Location: ".BASE_URL."login");
                exit; */
                $this->array['token'] = $_SESSION['token'];
            } else {
                $_SESSION['message'] = "Email incorreto, por favor tente novamente.";
                header("Location: ".BASE_URL."login/forgetPassword");
                exit;
            }

        }
        $this->loadTemplate("changedPassword", $this->array);

    }

    public function changedPasswordSuccess() {
        if($this->users->getTokenForgetPassword() == true && !empty($_POST['password'])) {
            $password = addslashes($_POST['password']);
            $this->users->changedPassword($password);
            
            header("Location: ".BASE_URL."login");
            exit;
        } else {
            header("Location: ".BASE_URL."login");
            exit;
        }
    }

    public function logout() {
        if(!empty($_SESSION['token'])) {
            $_SESSION['token'] = "";
        } 
     
        header("Location: ".BASE_URL);
        exit;
    }

    public function register() {
        $this->loadTemplate("register", $this->array);
    }
    public function register_valitaion() {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            $email = addslashes($_POST['email']);
            $password = md5(addslashes($_POST['password']));
            
            $this->users->registerUser($email, $password);

            header("Location: ".BASE_URL);
            exit;
        } else {    
            $this->array['message'] = "Preencha todos os dados por favor!!";
            header("Location: ".BASE_URL."login/register");
            exit;
        }
    }

}