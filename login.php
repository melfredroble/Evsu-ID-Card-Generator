<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap5/css/bootstrap.min.css">
    <link href="bootstrap5/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="style.css">
    <script src="bootstrap5/js/bootstrap.min.js"></script>
    <title>Login</title>
</head>
<body>

    <div class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center">
        
        <div class="row justify-content-center w-100">
        <h2 class="text-center  mb-5 text-secondary  ">Student ID Card Generator System</h2>
            <div class="col-12 col-sm-7 col-md-6 col-lg-4">
                <div class="card rounded">
                    <div class="card--header rounded-top bg-danger "></div>
                    <form action="php/verify.php" method="POST" class="m-0 py-3">
                        <div class="card-body mx-3 p-0 py-3 d-flex justify-content-center align-items-center flex-column">
                        <h3 class="text-center text-danger mt-2">Sign In</h3>
                        <p class="text-success"> 
                            <?php
                            
                            if(isset($_GET['success'])){
                                $success = $_GET['success'];
                                echo '<i class="fas fa-check-circle text-success"></i>' . ' ' . $success;
                            }

                            if(isset($_GET['error'])){
                                $error = $_GET['error'];
                                echo '<i class="fas fa-times-circle text-danger"></i>' . ' ' . $error ; 
                            }
                            ?>
                            
                        </p>
                            <div class="form-group w-75">
                                <input type="text" class="form-control" name="stud_id" autocomplete="off" required>
                                <label for="" class=" form-label">
                                    <span class="content-name">Student No.</span>
                                </label>
                            </div>
                            <div class="form-group w-75">
                                <input type="password" class="form-control " name="pwd" autocomplete="off" required>
                                <label for="" class="form-label">
                                    <span class="content-name">Password</span>
                                </label>
                            </div>

                        </div>
                    <div class="card-footer mt-2 pb-3 bg-white border-0 d-flex justify-content-center align-items-center flex-column">
                        <button class="btn btn-danger mb-3 w-75  shadow-none" type="submit" name="submit">Sign In</button>
                        <p>Don't have an account? <a href="signup.php" class="text-decoration-none text-danger">Sign
                                Up</a></p>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>




    
    </body>
</html>