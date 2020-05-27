<?php 
class LoginController extends Controller {
    private $users;
    private $array;
    

    public function __construct() {
        $this->users = new Users();
        $this->array = array();
        if($this->users->isLogged() == true) {

            //  perfil  do usuário
            header("Location: ".BASE_URL."login/profile");
            exit;
        }

    }
    
    public function index() {
        if(!empty($_POST['email']) && !empty($_POST['password'])) {
            
            $email = addslashes($_POST['email']);
            $password = addslashes(md5(($_POST['password'])));

            
            $this->array['access_user'] = $this->users->validateLogin($email, $password);

            header("Location: ".BASE_URL);
            exit;
        }
        $this->loadTemplate("login", $this->array);
    }

    public function profile() {
        // Fazer mudar o email, nome
        $this->array['user_profile'] = $this->users->getUser();

        $this->loadTemplate("profile", $this->array);
    }

    public function forgetPassword() {
        $this->loadTemplate("forgetPassword", $this->array);
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

}