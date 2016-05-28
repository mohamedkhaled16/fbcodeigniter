<html>
<head>
    <title>Post Into Your Profile</title>
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
                        <img class="img-thumbnail" data-src="holder.js/140x140" alt="140x140" src="https://graph.facebook.com/<?=$user_profile['id']?>/picture?type=large" style="width: 80px; height: 80px;">
                        Welcome <?=$user_profile['name']?> | <a href="<?= $logout_url ?>">Logout</a>


<div class='panel panel-primary col-lg-10 col-md-10 col-sm-10'>
                <div class='panel-heading'><h2>Post into Your Profile</h2></div>
                <div class='panel-body'>
                    <form action="facebook" method="post" >
                                                    <div class="row">
                                                      
                                                        <input type="hidden" name="userID" value="<?=$user_profile['id']?>">
                                                        

                                                        <div class="form-group">
                                                        <label class="control-label col-sm-2" for="password">Post Data : </label>
                                                         <div class="col-sm-8">
                                                         <textarea type="text" name="facebookPost" class="col-sm-8"></textarea>
                                                        </div>
                                                        </div>
                                                        <br>
                                                            <div class="col-sm-offset-2 col-sm-2">

                                                            <input type="submit" class="btn btn-primary"value="Post">

                                                        </div>
                                                        <br>
                                                    </div>
                        </form>
                </div>
            </div>
                        
                    </div>



</div> <!-- /container -->
<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
</body>
</html>