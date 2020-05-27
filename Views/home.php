<div class="row" id="container-month">

        <form method="POST" action="<?php echo BASE_URL; ?>home/change_month" id="calendar-form">
            <input type="hidden" name="month-value" id="month-value" value="<?php echo $month[$month_number -1] ;?>" />
            <input type="hidden" name="year-value" id="year-value" value="<?php echo $year; ?>" />
        </form>
        <div class="col-sm-2 month-container-prev"><a href="#"  class="btn btn-outline-info btn-arrow" id="month-prev"   >&#10094;</a></div>
        <div class="col-sm-8">
            <div class="month">
                
                <span id="month-letter"><?php echo $month[$month_number- 1]; ?> de <?php echo $year; ?></span>

            </div>
        </div>
        <div class="col-sm-2 month-container-next"><a href="" class="btn btn-outline-info btn-arrow" id="month-next" >&#10095;</a></div>
   
</div>

<div class="row" style="margin:0px!important;">
    <div class="col-sm-12 calendar-col">
        <div class="calendar-container">

            <?php for($i = 0;$i <= $months;$i++): // 42 ?>

                <!-- Data marcadas no calendario pelo usuário -->
                
                <div  class="calendar-container-day">
                    <ul>
                        <li><?php echo $i ?></li>
                        <?php foreach($calendar_days as $calendar): ?>
                        <?php if(date("j/n/yy", strtotime($calendar['data_first'])) == $i."/".$month_number."/".$year): ?>
                            <li>
                                <div class="quadr_schedules">
                                    <a class="quadr_shecules_mark" href="<?php echo BASE_URL; ?>schedules/"><div ></div></a>
                                    <a  href="<?php echo BASE_URL; ?>schedules/" ><p><?php echo $calendar['description'] ?></p></a>
                                
                                </div>
                            </li>
                        <?php endif; ?>
                        <?php endforeach; ?>
                    </ul>
                </div>

            <?php endfor; ?>    
                <
        </div>
    
    </div>

</div>