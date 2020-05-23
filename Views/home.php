<div class="row" id="container-month">
    <div class="col-sm-2 month-container-prev"><a href="#"  class="btn btn-outline-info btn-arrow" id="month-prev"   >&#10094;</a></div>
    <div class="col-sm-8">
        <div class="month">
            
            <span id="month-letter"><?php echo $month[date("n")- 1]; ?> de <?php echo date("yy"); ?></span>
            <input type="hidden" id="month-value" value="<?php echo $month[date("n") -1] ;?>" />
            <input type="hidden" id="year-value" value="<?php echo date("yy"); ?>" />
        </div>
    </div>
    <div class="col-sm-2 month-container-next"><a href="" class="btn btn-outline-info btn-arrow" id="month-next" >&#10095;</a></div>

</div>

<div class="row" style="margin:0px!important;">
    <div class="col-sm-12 calendar-col">
        <div class="calendar-container">
            <form method="POST" id="calendar-form">
                <input type="hidden" id="calendar-container-value" name="months" value="<?php echo $month[date("m")]; ?>" />

            </form>

            
            <?php for($i = 0;$i <= $months;$i++): // 42 ?>

                <div class="calendar-container-day">
                    <ul>
                        <li><?php echo $i ?></li>
      
                    </ul>
                </div>
            <?php endfor; ?>    
        
        </div>
    
    </div>

</div>