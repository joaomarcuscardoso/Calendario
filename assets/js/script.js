const month = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Juno", "Julho", "Agosto", "Setembro", "Outubro", "Novembro","Dezembro"];
var month_num = [1 ,2 ,3 ,4 ,5 ,6,  7, 8, 9 ,10 ,11, 12];

$(function() {
    $(".btn-arrow").click(function(event){
        event.preventDefault();
        
        var result = $("#month-value").val();
        var year = parseInt($("#year-value").val());
        
        for(var i =0;i<month.length;i++) {
            if(month[i] == result) {
                
                if(event.currentTarget.id == "month-next") {


                    if(result == "Dezembro" ) {    
                        
                        year += 1;        
                        var month_now = 0;
                    } else {     
                      
                        var month_now = month_num[i];

                    }   


                    
                } else {
                    if(result == "Janeiro") {                       
                        year -= 1;
                        var month_now = 11;
                    } else {
                        // Tem que ser menos -2 pois  i da somando um, ai para tira um precisa tirar o valor que o i adicionou
                        // ex: month_num = 2; month_num += i(1); month_num = 3;
                        var month_now = month_num[i] - 2;
                    }   
                        
                }


               var text = month[month_now]+" de "+ year ;
               $("#month-letter").html(text);
               $("#month-value").attr("value", month[month_now]);
               $("#calendar-container-value").attr("value", month[month_now]);
               $("#year-value").attr("value", year);

               
            } 

            $("#calendar-form").submit();
           
        
        }     
    });

    $("#delete-example").on("click", function() {
        alert("Não é permitido excluir o agendamento de exemplo, caso queria que despareça, adicione um agendamento!!");
    });

});
