
<section class="container">
    <div class="row-fluid">

<?php if(!empty($signin_log)) { ?> 
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Well done!</strong> <?php echo $signin_log; ?>
      </div>
<?php } ?>

<?php if(!empty($signin_error)) { ?> 
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> <?php echo $signin_error; ?>
      </div>
<?php } ?>

      <header class="page-header">
        <h1>Please sign in</h1>
      </header>
      <form class="form-signin" method="post">
         <input type="text" class="input-block-level" placeholder="UserName" name="username" value="<?php echo empty($username)?"":$username; ?>">
         <input type="password" class="input-block-level" placeholder="Password" name="password">
         <label class="checkbox">
           <input type="checkbox" value="remember-me" name="remember"> Remember me
         </label>
         <button class="btn btn-large btn-primary" type="submit" name="signin" value="true">Sign in</button>
      </form>
    </div>
</section>