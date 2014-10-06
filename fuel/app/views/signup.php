
<section class="container">
    <div class="row-fluid">

<?php if(!empty($signup_log)) { ?> 
      <div class="alert alert-success alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Well done!</strong> <?php echo $signup_log; ?>
      </div>
<?php } ?>

<?php if(!empty($signup_error)) { ?> 
      <div class="alert alert-danger alert-dismissible" role="alert">
        <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span></button>
        <strong>Warning!</strong> <?php echo $signup_error; ?>
      </div>
<?php } ?>

      <header class="page-header">
        <h1>Sign Up</h1>
      </header>
      <form class="form-signin" method="post">
         <input type="text" class="input-block-level" placeholder="UserName" name="username" value="<?php echo empty($username)?"":$username; ?>">
         <input type="text" class="input-block-level" placeholder="Email" name="email" value="<?php echo empty($email)?"":$email; ?>">
         <input type="password" class="input-block-level" placeholder="Password" name="password">
         <input type="password" class="input-block-level" placeholder="Password" name="password2">
         <input type="password" class="input-block-level" placeholder="Admin Pass" name="adminpass">
         <button class="btn btn-large btn-primary" type="submit" name="signup" value="true">Sign Up</button>
      </form>
    </div>
</section>