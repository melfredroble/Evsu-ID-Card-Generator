<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../bootstrap5/css/bootstrap.min.css">
    <link href="../bootstrap5/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <script src="../bootstrap5/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>
<body>

<style>

    
.form-group {
  position: relative;
  height: 70px;
  overflow: hidden;
}

.form-control {
  width: 100%;
  height: 100%;
  color: #595f6e;
  border: none !important;
  outline: none !important;
  box-shadow: none !important;
  padding-top: 20px;
}

.form-label {
  position: absolute;
  bottom: 0px;
  left: 0%;
  width: 100%;
  height: 100%;
  pointer-events: none;
  border-bottom: 1px solid #aaa;
}

.form-label::after {
  content: "";
  position: absolute;
  left: 0;
  bottom: -1px;
  width: 100%;
  height: 100%;
  border-bottom: 3px solid #5fa8d3;
  transform: translateX(-100%);
  transition: transform 0.3s ease;
}

.content-name {
  position: absolute;
  bottom: 5px;
  left: 0;
  color: #aaa;
  transition: all 0.3s ease;
}

.form-group .form-control:focus + .form-label .content-name,
.form-group .form-control:valid + .form-label .content-name {
  transform: translateY(-110%);
  font-size: 14px;
}

.form-group .form-control:focus + .form-label::after,
.form-control:valid + .form-label::after {
  transform: translateX(0%);
}
</style>

<div class="container-fluid bg-light min-vh-100 d-flex justify-content-center align-items-center">
        <div class="row justify-content-center w-100">
        <h2 class="text-center text-secondary mb-5 ">Student ID Card Generator System</h2>
            <div class="col-12 col-sm-7 col-md-6 col-lg-4">
                <div class="card rounded">
                    <div class="card--header rounded-top bg-danger "></div>
                    <form action="php/adminverify.php" method="POST" class="m-0 py-3">
                        <div class="card-body mx-3 p-0 py-3 d-flex justify-content-center align-items-center flex-column">
                        <h3 class="text-center text-danger mt-2">ADMIN LOGIN</h3>
                        <p class="text-success mt-2"> 
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
                                <input type="text" class="form-control" name="username" autocomplete="off" required>
                                <label for="" class=" form-label">
                                    <span class="content-name">Username</span>
                                </label>
                            </div>
                            <div class="form-group w-75">
                                <input type="password" class="form-control " name="password" autocomplete="off" required>
                                <label for="" class="form-label">
                                    <span class="content-name">Password</span>
                                </label>
                            </div>

                        </div>
                    <div class="card-footer pb-3 bg-white border-0 d-flex justify-content-center align-items-center flex-column">
                        <button class="btn btn-danger mb-3 w-75  shadow-none" type="submit" name="submit">Sign In</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>