<?php 
class SchedulesController extends Controller {
    private $array;
    public function __construct() {
        $this->array = array();
    }
 

    public function index() {
       
        $data = new Data();

        $this->array['schedules'] = $data->selectForId(1);

        $this->loadTemplate("schedules", $this->array);
    }

    public function add() {

        if(!empty($_POST['data_first']) && !empty($_POST['data_end']) && !empty($_POST['description'])) {
            $data = new Data();
            $id_user = 1;
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
        $id_user = 1;
        $done = 1;
        $data =new Data();

        if(!empty($id_user) && !empty($id_schedules)) {
            $done = addslashes($_GET['d']);
            
            $data->doneSchedules($id_schedules, $id_user, $done);

        } 
        
        header("Location: ".BASE_URL."schedules");
        exit;              
    }
    public function delete($id_schedules) {
        $id_user = 1;
  
        $data =new Data();
      
        if(!empty($id_user) && !empty($id_schedules)) {

            $data->deleteSchedules($id_schedules, $id_user);
        } 
        // javascript ve se existe o id_schedules, senão existir manda um alerta, ou mostra a div- alert danger
        
        header("Location: ".BASE_URL."schedules");
        exit;
    }
}