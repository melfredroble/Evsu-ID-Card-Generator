<?php



if(!isset($_SESSION['userId'])){

    header("Location: ?page=login");

}

?>

<style>
     .border {
        border: 1px solid #ccc !important;
    }

    .card--header {
        height: 10px !important;

    }
</style>



<div class="w-100 container py-5 bg-light">
    <div class="mb-3">
        <h1 class="text-center text-secondary">Student ID form</h1>
        <?php
            if(isset($_GET['success'])){

                $success = $_GET['success'];
                echo '<p class="text-center text-success"><i class="fas fa-check"></i>' . ' ' . $success . '</p>';

            }

            if(isset($_GET['error'])){

                $error = $_GET['error'];
                echo '<p class="text-center text-danger"><i class="fas fa-times"></i>' . ' ' . $error;

            }

            
        ?>
    </div>
    <div class="card bg-white">
    <div class="card--header rounded-top w-100 bg-danger"></div>
    <?php

include "db/db.php";

$stud_id = $_SESSION['userStudId'];
$id = $_SESSION['userId'];
$sql = "SELECT users.id, users.stud_id, users.first_name, users.last_name, id_form.img, id_form.middle_name, id_form.course, id_form.birthday, id_form.address, id_form.contact, id_form.contact_fname, id_form.contact_mname, id_form.contact_lname, id_form.contact_address, id_form.contact_no FROM users LEFT OUTER JOIN id_form ON users.stud_id = id_form.stud_id WHERE users.id = '$id'";
$user = $conn->query($sql) or die($conn->error);
$row = $user->fetch_assoc();

foreach($user as $row){

?>
    <div class="row ">
        <form action="php/update.php" class="d-flex flex-column flex-lg-row" method="post" enctype="multipart/form-data">
        <div class="col-12 col-lg-4  m-0 p-0 bg-white py-3 ">
            <div class="container-fluid pt-3 d-flex justify-content-center align-items-center flex-column">
                <p class="text-danger">*Upload image w/ white background</p>
                <div class="wrapper ">
                    <div class="image">
                        <img src="upload/<?= $row['img'];  ?>" class="id-img" alt="">
                    </div>
                    <div class="content d-flex justify-content-center align-items-center flex-column">
                        <div class="icon">
                            <i class="fas fa-cloud-upload-alt"></i>
                        </div>
                        <div class="text">
                            No file chosen, yet!
                        </div>
                    </div>
                    <div id="cancel-btn">
                        <i class="fas fa-times"></i>
                    </div>
                    <div class="file-name">
                        File name here
                    </div>
                </div>
                <button onclick="defaultBtnActive()" id="custom-btn" type="button">Choose an image</button>
                <input id="default-btn" type="file" name="file" hidden>
                <input type="hidden" name="stud_id" value="<?= $_SESSION['userStudId']?>" required>
            </div>
        </div>
        <div class="col-12 col-lg-8 d-flex justify-content-center mt-5 py-lg-3 mt-lg-0 bg-white">
            <!-- <div class="card-header w-100 bg-danger"></div> -->
                <div class="row w-100 justify-content-center align-items-center p-3">
                    <div>
                        <h5>Personal Informations:</h5>
                    </div>

                    <div class="col-12 col-lg-5 py-2">
                        <div class="list-group">
                            <label for="">First name: </label>
                            <input type="hidden" name="id" value="<?= $row['id']; ?>">
                            <input type="text" class="py-1 px-2 border" name="fname" value="<?= $row['first_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2   py-2">
                        <div class="list-group">
                            <label for="">M.I</label>
                            <input type="text" class="py-1 px-2 border" name="mname" value="<?= $row['middle_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5  py-2">
                        <div class="list-group">
                            <label for="">Last Name:</label>
                            <input type="text" class="py-1 px-2 border " name="lname" value="<?= $row['last_name']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12  py-2">
                        <div class="list-group">
                            <label for="">Course:</label>
                            <select name="course" id="course " class="border py-1 px-2 ">
                                <option value="<?= $row['course']; ?>"><?php if($row['course'] == null){ echo "Choose your course..."; } else { echo $row['course']; } ?></option>
                                <option value="BS in Civil Engineering">BS in Civil Engineering</option>
                                <option value="BS in Electrical Engineering">BS in Electrical Engineering</option>
                                <option value="BS in Geothermal Engineering">BS in Geothermal Engineering</option>
                                <option value="BS in Industrial Engineering">BS in Industrial Engineering</option>
                                <option value="BS in Mechanical Engineering">BS in Mechanical Engineering</option>
                                <option value="BS in Information Technology">BS in Information Technology</option>
                                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
                                <option value="BS in Hotel and Restaurant Management">BS in Hotel and Restaurant Management</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-6  py-2">
                        <div class="list-group">
                            <label for="">Birthday:</label>
                            <input type="date" class="py-1 px-2 border" name="bday"   value="<?= $row['birthday']; ?>" required>
                        </div>
                    </div>
                    <div class="col-6  py-2">
                        <div class="list-group">
                            <label for="">Address:</label>
                            <input type="text" class="py-1 px-2  border" name="address"  value="<?= $row['address']; ?>" required> 
                        </div>
                    </div>
                    <div class="col-12 col-lg-6  py-2">
                        <div class="list-group">
                            <label for="">Student Number:</label>
                            <input type="text" class="py-1 px-2  border" name="stud_id"  value="<?= $row['stud_id']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6  py-2">
                        <div class="list-group">
                            <label for="">Contact Number: +63</label>
                            <input type="number" class="py-1 px-2  border" name="contact"  value="<?= $row['contact']; ?>" required>
                        </div>
                    </div>
                    <div class="pt-3">
                        <h5>Contact person in case of emergency:</h5>
                    </div>
                    <div class="col-12 col-lg-5 py-2">
                        <div class="list-group">
                            <label for="">First name:</label>
                            <input type="text" class="py-1 px-2  border" name="contact_fname" value="<?= $row['contact_fname']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-2 py-2">
                        <div class="list-group">
                            <label for="">M.I</label>
                            <input type="text" class="py-1 px-2  border" name="contact_mname" value="<?= $row['contact_mname']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 col-lg-5 py-2">
                        <div class="list-group">
                            <label for="">Last name:</label>
                            <input type="text" class="py-1 px-2 border" name="contact_lname" value="<?= $row['contact_lname']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 py-2">
                        <div class="list-group">
                            <label for="">Address:</label>
                            <input type="text" class="py-1 px-2 border" name="contact_address" value="<?= $row['contact_address']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 py-2">
                        <div class="list-group">
                            <label for="">Contact number: +63</label>
                            <input type="number" class="py-1 px-2 border" name="contact_no" value="<?= $row['contact_no']; ?>" required>
                        </div>
                    </div>
                    <div class="col-12 text-end mt-3">
                        <input type="submit" class="btn btn-danger shadow-none" name="submit" value="Submit">
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
</div>

<?php

}

?>

<script>
    const wrapper = document.querySelector(".wrapper");
    const fileName = document.querySelector(".file-name");
    const defaultBtn = document.querySelector("#default-btn");
    const customBtn = document.querySelector("#custom-btn");
    const cancelBtn = document.querySelector("#cancel-btn i");
    const img = document.querySelector(".id-img");
    let regExp = /[0-9a-zA-Z\^\&\'\@\{\}\[\]\,\$\=\!\-\#\(\)\.\%\+\~\_ ]+$/;
    function defaultBtnActive() {
        defaultBtn.click();
    }
    defaultBtn.addEventListener("change", function () {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function () {
                const result = reader.result;
                img.src = result;
                wrapper.classList.add("active");
            }
            cancelBtn.addEventListener("click", function () {
                img.src = "";
                wrapper.classList.remove("active");
            })
            reader.readAsDataURL(file);
        }
        if (this.value) {
            let valueStore = this.value.match(regExp);
            fileName.textContent = valueStore;
        }
    });
</script>