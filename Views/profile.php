<div class="row">
    <div class="col-sm-12">
        <h3 class="title-h3">Seu perfil de usuário</h3>

    </div>

</div>
<div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
        <?php print_r($user_profile); ?>
        <form class="form-control" method="post">
            <label for="name">nome</label>
            <input type="text" class="form-control" name="name"  placeholder="<?php echo $user_profile['name']; ?>"><br/>
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email"  placeholder="<?php echo $user_profile['email']; ?>"><br/>

            <input type="submit" class="form-control btn btn-info" />
        


        </form>

    </div>
    <div class="col-sm-3"></div>

</div>