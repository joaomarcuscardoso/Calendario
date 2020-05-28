<?php
class HomeController extends Controller {
    private $array;
    private $users;
    public function __construct() {
        
        date_default_timezone_set('America/Sao_Paulo');
        $this->array = array("month" => array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Juno", "Julho", "Agosto", "Setembro", "Outubro", "Novembro","Dezembro"),
        "month_number" => date("n"), "year" => date("yy"));
        $this->users = new Users();
        if($this->users->isLogged() == false) {

            
            header("Location: ".BASE_URL."login/");
            exit;


        }  else {
            $this->array["token"] = $_SESSION['token'];
        }  


    }

    public function index() {
        $data = new Data(); 
   
        $id_user = $this->users->getId();

        $this->array['data_schedules'] = $data->selectForId($id_user);
        

        $months = date("m");
       
        $now = getdate(strtotime($months));

        $this->array["months"] = cal_days_in_month(CAL_GREGORIAN, $now['mon'], $now['year']);

        $this->array['calendar_days'] = $data->getHolidaysAndSchedules($this->array['months'], $id_user); 

        $this->loadTemplate("home", $this->array);
    }


    public function change_month() {
        if(!empty($_POST["month-value"]) && !empty($_POST['year-value'])) {
            $data = new Data(); 
            $id_user = $this->users->getId();
            $months = addslashes($_POST['month-value']); 
            $this->array['year'] = intval(addslashes($_POST['year-value']));

            $this->array['data_schedules'] = $data->selectForId($id_user);
            foreach($this->array['month'] as $key => $values) {
                if($values == $months) {
                    $this->array['month_number'] =   $key + 1;
                } 
            }

            $this->array["months"] = cal_days_in_month(CAL_GREGORIAN, $this->array['month_number'], $this->array['year']);
             $this->array['calendar_days'] = $data->getHolidaysAndSchedules($this->array['months'], $id_user); 
  
            $this->loadTemplate("home", $this->array);

        } else {
            header("Location: ".BASE_URL);
            exit;
        } 

        
        
    }



}


