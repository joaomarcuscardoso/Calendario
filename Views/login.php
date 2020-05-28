<div class="row">
    <div class="col-sm-12">
    
        <h3 class="title-h3">Acesse sua Conta</h3>

    </div>

</div>
<div class="row row-login" >
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <?php if(!empty($message)): ?>
            <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo BASE_URL; ?>login/login_access">
            
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"  placeholder="Digite seu email..."><br/>
            <label for="password">Senha</label>
            <input type="password" class="form-control"  name="password" placeholder="Digite sua senha..."><br/>
            <input type="submit" class="form-control btn btn-info" />
    
        </form>
        <a class="forgetPassword" href="<?php echo BASE_URL ?>login/forgetPassword" >Esqueceu a minha senha?</a>
    
    </div>
    <div class="col-sm-2"></div>

</div>