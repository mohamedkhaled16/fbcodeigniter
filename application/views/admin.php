<?php
if(!$this->session->userdata('logged_in'))
   {
    redirect('FacebookClass/login');
   }

?>
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
    <div>
Welcome <?php print_r($this->session->userdata('logged_in')['username']) ?> | <a href="../VerifyLogin/logout">Logout</a>
</div>
    <table class='table table-hover table-striped table-bordered '>
         <thead>
        <tr>
            <th colspan="2"> User Data</th>
            <th> Token Status</th>
            <th> Action</th>
        </tr>
        </thead>

<?php
                    foreach ($result as $row) {
                        $status = $this->method_call->CheckActiveTokens($row->access_token);
                        ?>
                        <tr>
                            <td><img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?php echo $row->user_id; ?>/picture?type=large" style="width: 80px; height: 80px;"></td>
                            <td><?php echo $row->name; ?></td>
                            <td><?php 
                            if($status) echo "<button class='btn btn-sm btn-success'> valid</button>"; else echo "<button class='btn btn-sm btn-danger'>NotValid</button>"; ?></td>
                            <td><?php if($status) { ?> 
<a href="#" class="btn btn-sm btn-primary " role="button" data-toggle="modal" data-target="#my-modal<?php echo $row->user_id; ?>">Post</a>
                              <?php }?></td>

                        </tr>
</table>
                        <div  id="my-modal<?php echo $row->user_id; ?>" class="modal" data-keyboard = "true" data-backdrop="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" ><span >&times;</span></button>
                                        <h4 class="modal-title">Post into FB (<?php echo $row->name; ?>) Profile </h4>


                                    </div>
                                    <div class="modal-body">
                                                <form action="facebook" method="post" class="form-signin">
                                                    <div class="row">
                                                      
                                                        <input type="hidden" name="userID" value="<?php echo $row->user_id; ?>">
                                                        

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-4" for="password">Post Data : </label>
                                                         <div class="col-sm-5">
                                                         <textarea type="text" name="facebookPost" ></textarea>
                                                        </div>
                                                        </div>
                                                        <br>
                                                            <div class="col-sm-offset-4 col-sm-2">

                                                            <input type="submit" class="btn btn-primary"value="Post">

                                                        </div>
                                                        <br>
                                                    </div>
                                                </form>
                                    </div>
                                    
                                </div>              
                            </div>
                        </div>
                        <?php

                    } ?>



</div>
</div> 
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>