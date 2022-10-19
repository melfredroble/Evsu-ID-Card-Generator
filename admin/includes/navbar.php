        <!-- Dashboard homepage -->
        <div id="page-content-wrapper" class="">
            <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-align-left text-dark fs-4 me-3" id="menu-toggle"></i>
                    <h2 class="fs-2 m-0"><?php if($_GET['page'] == 'dashboard') { echo "Dashboard"; } ?> </h2>
                </div>

                <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
<?php

include "../db/db.php";

$user_id = $_SESSION['userId'];

$sql = "SELECT * FROM admin WHERE id = '$user_id'";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();

foreach($user as $row){

?>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle second-text fw-bold " href="#" id="navbarDropdown"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-user-circle me-2"></i><?= $row['username'] ?>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Settings</a></li>
                                <li><a class="dropdown-item" href="php/logout.php"> <i class="fas fa-power-off"></i> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>

<?php
}
?>
            </nav>