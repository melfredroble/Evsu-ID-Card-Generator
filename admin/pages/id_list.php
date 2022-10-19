
<div class="container bg-light">
    <h3 class="py-3">Generated ID list</h3>
    <div class="row justify-content-center">
            <div class="table-responsive m-5">
                <table id="table" class="table table-striped" style="width:100%">
                
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Print</th>
                            <th scope="col">Printed</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
                    <?php

include_once '../db/db.php';

$search = "SELECT users.id, users.stud_id, users.first_name, users.last_name, users.status, id_form.img, id_form.middle_name, id_form.course, id_form.birthday, id_form.address, id_form.contact, id_form.contact_fname, id_form.contact_mname, id_form.contact_lname, id_form.contact_address, id_form.contact_no FROM users LEFT OUTER JOIN id_form ON users.stud_id = id_form.stud_id";
$user = $conn->query($search) or die($conn->error);

// $form = mysqli_query($conn, "SELECT * FROM id_form");

// $form_row = mysqli_fetch_object($form);


while($row = $user->fetch_assoc()){
    if(!empty($row['middle_name'])){
?>
                    <tr>
                        <th scope="row"><?= $row['id']; ?></th>
                        <td><?= $row['stud_id']; ?></td>
                        <td><?= ucfirst($row['first_name']); ?></td>
                        <td><?= ucfirst($row['last_name']); ?></td>
                        <td><a href="print.php?id=<?= $row['id']; ?>" target="_blank" class="bg-success border-0 btn shadow-none"><i class="fas fa-print text-white">  </i></a></td>
                        <form action="php/notif.php" method="post">
                        <td>
                        <?php
                            if($row['status'] == 0 ){
                        ?>
                            <input type="hidden" name="id"  value="<?= $row['id']; ?>">
                            <button type="submit" name="done" class=" border-0 btn shadow-none text-success "><i class="fas fa-check"></i></button>
                        <?php
                            }else {
                        ?>
                            <input type="hidden" name="id"  value="<?= $row['id']; ?>">
                            <button type="submit" name="undone" class=" border-0 btn shadow-none text-danger "><i class="fas fa-times"></i></button>
                        <?php
                            }
                        ?>
                        </td>
                        </form>
                        
                        <td><button type="button" id="edit-btn"  data-id="<?= $row['id'] ?>" class="bg-info border-0 btn shadow-none edit"><i class="fas fa-pen text-white"></i></button></td>
                        <td><button type="button" id="delete-btn"  data-id="<?= $row['stud_id'] ?>"  value="<?php echo $row['id']; ?>" class="bg-danger border-0 btn shadow-none delete"><i class="fas fa-trash text-white"></i></button></a></td>
                        

                    </tr>


                    <?php
            }
}
            ?>
                </tbody>
                <tfoot>
                </tfoot>

                </table>
            </div>
    </div>
</div>


<!-- Modal -->
    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ">
      <div class="modal-dialog modal-dialog-centered"> 
          <div class="modal-content">                  
            <div class="modal-header"> 
              <h5 class="modal-title">Edit</h5>
              <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>          
            <div class="modal-body">               
                <div class="fetched-data">
                <form action="php/edit.php" method="POST" enctype="multipart/form-data">     
                    <div class="row w-100 justify-content-center align-items-center px-3">
                        
                        <div class="col-12 mb-4">
                            <div id="stud_img" class="mb-3">
                            </div>
                            <input type="file" name="file">
                        </div>

                        <div>
                            <h5>Personal Informations:</h5>
                        </div>

                        <div class="col-12 col-lg-5 py-2">
                            <div class="list-group">
                                <label for="">First name: </label>
                                <input type="hidden" id="id" name="id">
                                <input type="text" class="py-1 px-2 border" id="fname" name="fname"  required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2   py-2">
                            <div class="list-group">
                                <label for="">M.I</label>
                                <input type="text" class="py-1 px-2 border" id="mname" name="mname" value="" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5  py-2">
                            <div class="list-group">
                                <label for="">Last Name:</label>
                                <input type="text" class="py-1 px-2 border " id="lname" name="lname" value="" required>
                            </div>
                        </div>
                        <div class="col-12  py-2">
                            <div class="list-group">
                                <label for="">Course:</label>
                                <select name="course"  class="border py-1 px-2 ">
                                    <option id="course" ></option>
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
                                <input type="date" class="py-1 px-2 border" name="bday" id="bday"  value="" required>
                            </div>
                        </div>
                        <div class="col-6  py-2">
                            <div class="list-group">
                                <label for="">Address:</label>
                                <input type="text" class="py-1 px-2  border" name="address" id="address" required> 
                            </div>
                        </div>
                        <div class="col-12 col-lg-6  py-2">
                            <div class="list-group">
                                <label for="">Student Number:</label>
                                <input type="text" class="py-1 px-2  border" name="stud_id" id="studno"  value="" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6  py-2">
                            <div class="list-group">
                                <label for="">Contact Number: +63</label>
                                <input type="number" class="py-1 px-2  border" name="contact" id="contact"  value="" required>
                            </div>
                        </div>
                        <div class="pt-3">
                            <h5>Contact person in case of emergency:</h5>
                        </div>
                        <div class="col-12 col-lg-5 py-2">
                            <div class="list-group">
                                <label for="">First name:</label>
                                <input type="text" class="py-1 px-2  border" name="contact_fname" id="contact_fname" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-2 py-2">
                            <div class="list-group">
                                <label for="">M.I</label>
                                <input type="text" class="py-1 px-2  border" name="contact_mname" id="contact_mname" required>
                            </div>
                        </div>
                        <div class="col-12 col-lg-5 py-2">
                            <div class="list-group">
                                <label for="">Last name:</label>
                                <input type="text" class="py-1 px-2 border" name="contact_lname" id="contact_lname" required>
                            </div>
                        </div>
                        <div class="col-12 py-2">
                            <div class="list-group">
                                <label for="">Address:</label>
                                <input type="text" class="py-1 px-2 border" name="contact_address" id="contact_address" required>
                            </div>
                        </div>
                        <div class="col-12 py-2">
                            <div class="list-group">
                                <label for="">Contact number: +63</label>
                                <input type="number" class="py-1 px-2 border" name="contact_no" id="contact_no" required>
                            </div>
                        </div>
                    </div>
                </div>                            
            </div>           
            <div class="modal-footer"> 
              <button type="submit" class="btn btn-success shadow-none" name="update">Update</button>  
            </form>
            
          </div>              
        </div> 
      </div>
    </div>


        <!-- ######## Delete Modal###### -->
                    <div id="delete-modal" class="modal fade py-5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
                        <div class="modal-dialog modal-dialog-centered"> 
                        <div class="modal-content py-5">
                            <form action="php/delete.php" method="POST">
                               <input type="hidden" id="id" name="id-no">
                               <input type="hidden" id="stud_no" name="stud_no">
                                <h3 class="text-center">Are you sure to delete?</h3>
                                <div class=" text-center">
                                    <button class="btn btn-sm btn-danger shadow-none" type="submit" name="delete">Yes</button>
                                    <button type="button" class="btn btn-sm btn-success shadow-none" data-bs-dismiss="modal" aria-label="Close">No</button>
                                </div>
                            </form>         
                        </div> 
                        </div>
                    </div>
                    <!-- End Modal -->




<script>
    $(document).ready(function() {
        $('#table').DataTable();


        $(document).on('click', '#edit-btn', function(e){
            e.preventDefault();  

            let studId = $(this).data('id'); 
            
            $('#edit').modal('show');
            $.ajax({

            type: 'POST',
            url: 'studentData.php',
            data: 'studId='+studId,
            dataType: 'json',
            cache: false,
            success: function(data){
                
            }
            })

            .done(function(data){
                $('#id').val(data.id);
                $('#studno').val(data.stud_id);
                $('#stud_img').html("<img width='120' src='../upload/"+data.img+"' />");
                $('#fname').val(data.first_name);
                $('#mname').val(data.middle_name);
                $('#lname').val(data.last_name);
                $('#course').html(data.course);
                $('#course').val(data.course);
                $('#bday').val(data.birthday);
                $('#address').val(data.address);
                $('#contact').val(data.contact);
                $('#contact_fname').val(data.contact_fname);
                $('#contact_mname').val(data.contact_mname);
                $('#contact_lname').val(data.contact_lname);
                $('#contact_address').val(data.contact_address);
                $('#contact_no').val(data.contact_no);
            })


        });

        $(document).on('click', '.delete', function(){
            let id=$(this).val();
            let studno = $(this).attr('data-id');

            $('#delete-modal').modal('show');
            $('#id').val(id);
            $('#stud_no').val(studno);

        });

    });

</script>

