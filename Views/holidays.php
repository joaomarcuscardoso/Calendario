<?php 
$dia = 86400;
$datas = array();
$datas['pascoa'] = ($year);
$datas['sexta_santa'] = $datas['pascoa'] - (2 * $dia);
$datas['carnaval'] = $datas['pascoa'] - (47 * $dia);
$datas['corpus_cristi'] = $datas['pascoa'] + (60 * $dia);
$feriados = array (
            '1/01',
            '2/02', // Navegantes
            date('d/m',$datas['carnaval']),
            date('d/m',$datas['sexta_santa']),
            date('d/m',$datas['pascoa']),
            '21/04',
            '1/05',
            date('d/m',$datas['corpus_cristi']),
            '20/09', // Revolução Farroupilha \m/
            '12/10',
            '2/11',
            '15/11',
            '25/12',
);
?>

