<div class="row">
    <div class="col-sm-12">
    
        <h3 class="title-h3">Crie uma conta</h3>

    </div>

</div>
<div class="row row-login" >
    <div class="col-sm-2"></div>
    <div class="col-sm-6">
        <?php if(!empty($message)): ?>
            <div class="alert alert-danger" role="alert"><?php echo $message; ?></div>
        <?php endif; ?>
        <form method="POST" action="<?php echo BASE_URL; ?>Login/register_valitaion">
            
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"  placeholder="Digite seu email..."><br/>
            <label for="password">Senha</label>
            <input type="password" class="form-control"  name="password" placeholder="Digite sua senha..."><br/>
            <input type="submit" value="Cadastrar" class="form-control btn btn_submit" />
    
        </form>
        <div class="sub_btn">
            <p style="margin-right:6px;"> 
                Tem uma conta?
                
            </p>
            <a href="<?php echo BASE_URL; ?>Login/">
                Acessar
            </a>

        </div>
    </div>
    <div class="col-sm-2"></div>

</div>