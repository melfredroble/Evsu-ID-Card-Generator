<?php

session_start();

if(!isset($_SESSION['userId'])) {

    header("Location: login.php");

}


include_once "includes/header.php";


include_once "includes/sidebar.php";
include_once "includes/navbar.php";


$folder = isset($_GET['folder']) ? $_GET['folder'] : 'pages/';
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
require_once($folder . $page . '.php');

?>
<div id="bulkprint" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content" style="font-size: 14px; color:black;">
            <div class="modal-header bg-dark  w-100" >
                <h5 class="modal-title text-white" ><center>
                    PRINT IDs IN BULK
                    </center></h5>
                    <button type="button" class="btn-close btn-close-white  text-start" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

        <div class="modal-body" >       	
            <form action="barcode.php" method="post" target="_blank">
            <div class="input-group" style="margin-bottom:10px">
                <span class="input-group-text">From</span>
                <input id="text" type="number" class="form-control" name="startpoint" required>
            </div>
            <div class="input-group" style="margin-bottom:10px">
                <span class="input-group-text">To</span>
                <input type="number" class="form-control" name="endpoint" required>
            </div>
<?php

include "../db/db.php";

$sql = "SELECT * FROM users";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();

?>
            <div class="input-group">
                <span class="input-group-text">Student id starts @</span>
                <input id="msg" type="text" class="form-control" name="receiptrange" placeholder="" value="<?php echo $row['id']; ?>" readonly="readonly">
            </div>
        </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-success" value="Print" id="btns1" name="Change"> &nbsp;
            </div>
            </form> 
            </div>       
        </div>
  </div> 
<?php


include_once "includes/footer.php";



