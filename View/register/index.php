<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>

    <!-- Main css -->
    <link rel="stylesheet" href="./View/register/css/style.css">
</head>
<body>
    <div class="main">
        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" action="" id="signup-form" class="signup-form">
                        <h2 class="form-title">Create account</h2>
                        <div class="form-group">
                            <input type="text" value="<?php echo $register->userName; ?>" class="form-input" name="userName" id="name" placeholder="userName" required/>
                            <?php echo '<p style="color:red;"> '.$msg2.' </p>'; ?>
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?php echo $register->img; ?>" class="form-input" name="img" id="img" placeholder="Link img" required/>                          
                        </div>

                        <div class="form-group">
                            <input type="email" value="<?php echo $register->email; ?>" class="form-input" name="email" id="email" placeholder="Email" required/>                           
                            <?php echo '<p style="color:red;"> '.$msg1.' </p>'; ?>
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?php echo $register->gender; ?>" class="form-input" name="gender" id="gender" placeholder="Giới tình" required/>                           
                        </div>

                        <div class="form-group">
                            <input type="date" value="<?php echo $register->birthDay; ?>" class="form-input" name="birthDay" id="birthDay" required/>                           
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?php echo $register->job; ?>" class="form-input" name="job" id="job" placeholder="Nghề nghiệp" required/>                           
                        </div>

                        <div class="form-group">
                            <input type="text" value="<?php echo $register->adress; ?>" class="form-input" name="adress" id="adress" placeholder="Adress" required/>
                        </div>
                        <div class="form-group">
                            <button onclick="return confirm('Check email để lấy thông tin đăng nhập ?')"  type="submit" name="action" value="save" class="form-control btn btn-primary submit px-3">Sign In</button>
                        </div>
                    </form>
                    <p class="loginhere">
                        Have already an account ? 
                        <a href="index.php?controller=login" class="loginhere-link">Login here</a>
                    
                    </p>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="./View/register/vendor/jquery/jquery.min.js"></script>
    <script src="./View/register/js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>