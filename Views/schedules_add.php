<div class="row">
    <div class="col-sm-12">
        <h3 class="title-h3">Adicionar Agendamento</h3><br/>

        <form  method="POST" class="form-group" id="schedules-form">
            <label for="data_first">Data de inicio</label>
            <input id="datepicker" type="date" class="form-control" name="data_first" /><br/>
            <label for="data_end">Data do final</label>
            <input id="datepicker" type="date" class="form-control" name="data_end" /><br/>
            <label for="description">Descrição</label><br/>
            <textarea name="description" placeholder="Digite a descrição"></textarea><br/><br/>
           

            <input type="submit" value="Adicionar" class="form-control btn btn-lg btn-success" />
        </form>


    </div>
</div>