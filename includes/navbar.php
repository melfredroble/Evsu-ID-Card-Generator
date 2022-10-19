<nav class="navbar navbar-expand-lg navbar-dark position-relative  py-4 px-lg-5 px-3 "
    style="background-color: maroon; ">
    <a href="?page=homepage" class="navbar-brand  fw-bold" >
        Eastern Visayas State University
    </a>
    <button class="navbar-toggler shadow-none border-0 ms-auto" type="button" data-bs-toggle="collapse"
        data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <?php

        include "db/db.php";


        $user_id = $_SESSION['userId'];
        $sql = "SELECT * FROM users WHERE id = '$user_id'";
        $user = $conn->query($sql) or die($conn->error);
        $row = $user->fetch_assoc();

        foreach($user as $row){


        ?>
    <div class="collapse navbar-collapse " id="navbarNav">
        <ul class="navbar-nav d-flex  ms-auto " id="navbar">
            <li class="nav-item ">
                <a href="?page=homepage"
                    class="nav-link <?php if($_GET['page'] == 'homepage'){  echo 'active'; }?>">Home</a>
            </li>
            <li class="nav-item">
                <a href="?page=idform"
                    class="nav-link <?php if($_GET['page'] == 'idform'){  echo 'active'; } ?>">Student ID Form</a>
            </li>
            <li class="nav-item">
                <a href="?page=request" class="nav-link <?php if($_GET['page'] == 'request'){  echo 'active'; } ?>">
                    Request</a>
            </li>
            <li class="nav-item ms-lg-2 dropdown">
                <input type="hidden" value="<?= $row['id'] ?>" id="studId">
                <button class=" notif_btn btn border-0 active nav-link shadow-none" name="studid"
                    data-id="<?= $row['id']  ?>" style="color: rgba(255,255,255,.55) !important;" type="button"
                    aria-expanded="false"> Notification
                    <?php if($row['status'] == 1 && $row['read_unread'] == 0){ echo '<span class="text-dark badge bg-white  px-1 text-center  " id="spanNotif" >1</span>'; }?>
                </button>
                <ul class="dropdown-menu down ">
                    <div class="d-flex justify-content-center align-items-center py-2 mx-3">
                        <p class="text-secondary" style="font-size: 0.9rem;"> <i class="fas fa-bell"></i>
                            <?php if($row['status'] == 0){ echo 'You will receive  a notification once your ID have been printed.'; }else { echo 'ID has been printed. Claim your ID at the Guidance office.'; } ?>
                        </p>
                    </div>
                </ul>
            </li>
        </ul>
        <ul class="navbar-nav ms-auto d-flex" id="navbar">
            <li class="nav-item ms-lg-2 dropdown">
                <button class="nav-link btn border-0 active dropdown-toggle shadow-none" type="button"
                    data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user-circle me-1"></i>
                    <?= ucfirst($row['first_name']) . " " . ucfirst($row['last_name'])?>
                </button>
                <ul class="dropdown-menu dropdown-menu-end ">
                    <li class="">
                        <a href="?page=changepwd" class="dropdown-item "><i class="fas fa-question-circle "
                                style="font-size: 0.9rem;"></i> Change password</a>
                    </li>
                    <li class="">
                        <a href="php/logout.php" class="dropdown-item "><i class="fas fa-sign-out-alt "
                                style="font-size: 0.9rem;"></i> Logout</a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>

    <?php
        }
        ?>
</nav>