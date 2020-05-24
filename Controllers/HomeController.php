<?php
class HomeController extends Controller {
    private $array;
    public function __construct() {
        date_default_timezone_set('America/Sao_Paulo');
        $this->array = array("month" => array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Juno", "Julho", "Agosto", "Setembro", "Outubro", "Novembro","Dezembro"),
        "month_number" => date("n"), "year" => date("yy"));
        
        
        
    }

    public function index() {
        $data = new Data();  

        $this->array['data'] = $data->selectForId(1);



        $months = date("m");
       
        $now = getdate(strtotime($months));

        $this->array["months"] = cal_days_in_month(CAL_GREGORIAN, $now['mon'], $now['year']);




        $this->loadTemplate("home", $this->array);
    }


    public function change_month() {
        if(!empty($_POST["month-value"]) && !empty($_POST['year-value'])) {

            $months = addslashes($_POST['month-value']); 
            $this->array['year'] = intval(addslashes($_POST['year-value']));


            foreach($this->array['month'] as $key => $values) {
                if($values == $months) {
                    $this->array['month_number'] =   $key + 1;
                } 
            }
           

            
            $this->array["months"] = cal_days_in_month(CAL_GREGORIAN, $this->array['month_number'], $this->array['year']);
            $this->loadTemplate("home", $this->array);

        } else {
            header("Location: ".BASE_URL);
            exit;
        } 

        
        
    }



}


