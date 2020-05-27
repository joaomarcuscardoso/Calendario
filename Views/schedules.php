<div class="row">
    <div class="col-sm-12">

        <h3 class="title-h3">Seus Agendamentos</h3><br/>
        <?php if(!empty($messages)): ?>
            <div class="alert alert-danger" role="alert"><?php echo $messages; ?></div>
        <?php endif; ?>
        <a  href="<?php echo BASE_URL; ?>schedules/add/" class="btn btn-success" style="width:100%;">Adicionar</a>
        <table class="table table-dark table-schedules">
            <thead>
                <tr>
                <th scope="col-2">Inicio</th>
                <th scope="col-2">Fim</th>
                <th scope="col-5">Descrição</th>
                <th scope="col-1">concluido</th>
                
                <th scope="col-1">remover</th>
                </tr>
            </thead>
            <tbody>
                 
                <?php foreach($schedules as $s): ?>
                   
                <tr>
                        <td><?php echo date('d/m/Y', strtotime($s['data_first'])); ?></td>
                        <td><?php echo date('d/m/Y', strtotime($s['data_end'])); ?></td>
                       
                        <td><?php echo $s['description']; ?></td>
                        <?php if(!empty($s['done'])): ?>
                            <td class="table-scheudels-td-img-like"><a href="<?php echo BASE_URL; ?>schedules/done/<?php echo $s['id']; ?>?d=0" ><img src="<?php echo BASE_URL; ?>assets/imgs/like-success.png" /></a></td>

                        <?php else: ?>
                            <td class="table-scheudels-td-img-like"><a href="<?php echo BASE_URL; ?>schedules/done/<?php echo $s['id']; ?>?d=1" ><img src="<?php echo BASE_URL; ?>assets/imgs/like.png" /></a></td>
                        <?php endif; ?>
                        <td class="table-scheudels-td-img-delete"><a href="<?php echo BASE_URL; ?>schedules/delete/<?php echo $s['id']; ?>" ><img src="<?php echo BASE_URL; ?>assets/imgs/delete.png" /></a></td>

                </tr>
                <?php endforeach; ?>
                <?php if($schedules == array()): ?>
                <tr>
                        <td><?php echo date('d/m/Y'); ?></td>
                        <td><?php echo date('d/m/Y'); ?></td>
                      
                        <td>Examplo de Agendamento</td>
                        <td class="table-scheudels-td-img-like"><a href="<?php echo BASE_URL; ?>schedules/done/" ><img src="<?php echo BASE_URL; ?>assets/imgs/like-success.png" /></a></td>

                        <td id="delete-example" class="table-scheudels-td-img-delete"><a  href="#" ><img src="<?php echo BASE_URL; ?>assets/imgs/delete.png" /></a></td>

                </tr>
                <?php endif; ?>
               
            
            </tbody>
        </table>
    </div>


</div>
