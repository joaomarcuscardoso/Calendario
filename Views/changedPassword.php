<div class="row">
    <div class="col-sm-12">
        <h3 class="title-h3">Mudar senha</h3>


    </div>


</div>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <form  method="post" action="<?php echo BASE_URL; ?>login/changedPasswordSuccess/<?php echo $token; ?>" class="forgetPassowrd-form">
            <label for="password" >Senha</label>
            <input type="password" class="form-control" name="password">
            <input type="submit" style="margin-top:20px;" class="form-control btn btn-info" />
        </form>
    </div>
    <div class="col-sm-3"></div>
</div>