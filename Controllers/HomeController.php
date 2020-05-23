<?php
class HomeController extends Controller {
    public function __construction() {

    }

    public function index() {
        $array = array();


        $array['month'] = array("Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Juno", "Julho", "Agosto", "Setembro", "Outubro", "Novembro","Dezembro");
        $data = new Data();   

        if(!empty($_POST['months'])) {

            $months = addslashes($_POST['months']);
            
/*             header("Location: "+BASE_URL+$months);
            exit; */
        }

        $months = date("m");
        $now = getdate(strtotime($months));

        $array["months"] = cal_days_in_month(CAL_GREGORIAN, $now['mon'], $now['year']);
        $array['data'] = $data->selectAll();

        $this->loadTemplate("home", $array);
    }



}


