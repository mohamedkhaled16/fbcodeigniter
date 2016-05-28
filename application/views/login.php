<html>
<head>
    <title>Login with Facebook</title>
    <script type="text/javascript" src="//code.jquery.com/jquery-2.2.4.min.js"></script>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css">
    <style type="text/css">
    body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #eee;
    }

   
    </style>
</head>
<body>

    <div class="container">
        <div class="row">
        <form class="form-signin" role="form">
            <?php if (@$user_profile):?>
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 140px; height: 140px;">
                        <h2><?=$user_profile['name']?></h2>
                        <a href="<?= $logout_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Logout</a>
                        <a href="admin" class="btn btn-lg btn-primary btn-block" role="button">Admin</a>

                    </div>
                </div>
            <?php else: ?>

                <form role="form" class="form-horizontal"></form>                         
                <div class="col-sm-3">
                </div>
                <div class="col-sm-6">

                <h2 class="form-signin-heading">Login</h2>
                <?php
                    if(!isset($login_url))
                    {
                      $login_url ="#";
                    }
                ?>
                <a href="<?= $login_url ?>" class="btn btn-lg btn-primary btn-block" role="button">Login using FB <i class="fa fa-facebook" aria-hidden="true"></i>
</a>
                <a href="#" class="btn btn-lg btn-primary btn-block" role="button" >Admin? Login</a>
                <?php echo validation_errors(); ?>
                <?php echo form_open('VerifyLogin'); ?>
                         <!-- <form role="form" class="form-horizontal">-->
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="username">Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="username" id="username" class="form-control">

                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="form-group">
                                                        <label class="control-label col-sm-2" for="password">Password</label>
                                                        <div class="col-sm-10">
                                                            <input type="password" name="password" id="password" class="form-control">
                                                        </div>
                                                       <br><br>
                                                        <div class="col-sm-offset-2 col-sm-2">

                                                            <input type="submit" class="btn btn-primary"value="Submit">

                                                        </div>



                                                    </div>

                         </form>       
                </div>
            <?php endif; ?>



    </div> 
    </div> 
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>