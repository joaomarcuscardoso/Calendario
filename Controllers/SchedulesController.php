<?php 
class SchedulesController extends Controller {
    private $array;
    private $users;
    public function __construct() {
        $this->array = array();
        $this->users = new Users();
        if($this->users->isLogged() == false) {           
            header("Location: ".BASE_URL."login/");
            exit;
        } else {
            $this->array["token"] = $_SESSION['token'];
        }


    }
 

    public function index() {
       
        $data = new Data();
        $id_user = $this->users->getId();
        $this->array['schedules'] = $data->selectForId($id_user);

        $this->loadTemplate("schedules", $this->array);
    }

    public function add() {

        if(!empty($_POST['data_first']) && !empty($_POST['data_end']) && !empty($_POST['description'])) {
            $data = new Data();
            $id_user = $this->users->getId();
            $data_first = addslashes($_POST['data_first']);
            $data_end = addslashes($_POST['data_end']);
            $description = addslashes($_POST['description']);

            $data->addSchedules($data_first, $data_end, $description, $id_user);

            header("Location: ".BASE_URL."schedules");
            exit;
        }


        $this->loadTemplate("schedules_add", $this->array);
    }

    public function done($id_schedules) {
        $done = 1;
        $id_user = $this->users->getId();

        $data =new Data();
   

        if(!empty($id_user) && !empty($id_schedules)) {
            $done = addslashes($_GET['d']);
           
            $data->doneSchedules($id_schedules, $id_user, $done);

        } 
        
        header("Location: ".BASE_URL."schedules");
        exit;              
    }
    public function delete($id_schedules) {
        $data =new Data();
        $id_user = $this->users->getId();
 
        if(!empty($id_user) && !empty($id_schedules)) {  
            $data->deleteSchedules($id_schedules, $id_user);
        } 
        // javascript ve se existe o id_schedules, senão existir manda um alerta, ou mostra a div- alert danger
        
        header("Location: ".BASE_URL."schedules");
        exit;
    }
}