<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/8ba1bf8786.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">

    <title>myforum</title>
    <style>
        .header {
            color: #5FC8C3;
            font-size: 27px;
            padding: 10px;
        }

        .bigicon {
            font-size: 35px;
            color: #5FC8C3;
        }
    </style>
</head>

<body>
    <?php include 'includes/_header.php'; ?>
    <div class="container shadow mb-5 py-2 rounded" style="width: 600px;">
        <div class="row">
            <div class="col-md-12">
                <div class="well well-sm">
                    <form action="includes/_contactHandler.php" method="post">
                        <fieldset>
                            <legend class="text-xs-center header">Contact us</legend>
                            <?php
                            if(isset($_GET['mysuccess'])){
                                if($_GET['mysuccess']=="mailsendingpass"){
                                    echo'<div class="alert alert-warning" role="alert">
                            feedback send successfully!
                          </div>';
                                }
                                else{
                                    echo'<div class="alert alert-warning" role="alert">
                                    could not connect to mail server
                                  </div>';

                                }

                            }
                            if(isset($_GET['error'])){
                                if($_GET['error']=="emptyname"){
                                    echo'<div class="alert alert-warning" role="alert">
                            please enter your name
                          </div>';
                                }

                                else if($_GET['error']=="emptyEmail"){
                                    echo'<div class="alert alert-warning" role="alert">
                                    please enter a email id 
                                  </div>';
    
    
                                }
                                else if($_GET['error']=="emptyMessage"){
                                    echo'<div class="alert alert-warning" role="alert">
                                    write something to send 
                                  </div>';
    
    
                                }

                                else if($_GET['error']=="invalidEmail"){
                                    echo'<div class="alert alert-warning" role="alert">
                                    enter a correct email id 
                                  </div>';
    
    
                                }


                                else if($_GET['error']=="somethingwentwrong"){
                                    echo'<div class="alert alert-warning" role="alert">
                                    OOPs! something went wrong
                                  </div>';
    
    
                                }






                            }

                            




                            
                            
                            
                            ?>
                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-user bigicon"></i></span>
                                <input type="text" class="form-control " name="fullname" placeholder="fullname" >
                            </div>

                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text" id="addon-wrapping"><i class="fa fa-envelope-o bigicon"></i></span>
                                <input type="text" class="form-control " name="email" placeholder="your email address" >
                            </div>

                            <div class="input-group flex-nowrap mb-2">
                                <span class="input-group-text" ><i class="fa fa-pencil-square-o bigicon"></i></span>
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>


                            
                            






                            
                            

                            <div class="form-group">
                                <div class="">
                                    <button type="submit" name="contact" class="btn btn-success btn-lg">Submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <?php include 'includes/_footer.php'; ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


</body>

</html>