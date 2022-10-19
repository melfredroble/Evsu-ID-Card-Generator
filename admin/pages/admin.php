
<div class="container bg-light" >
    <h3 class="p-3 ">ADMIN</h3>
    <div class="row justify-content-center  rounded    bg-light">

            <div class="table-responsive m-5">
                <table id="table" class="table table-striped" style="width:100%">
                <button class=" mb-2 btn btn-sm btn-success shadow-none" id="add-admin" type="button">Add New Admin</button>
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Username</th>
                            <th scope="col">Password</th>
                            <th scope="col">Usertype</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
    <?php

        include_once '../db/db.php';
        
        $sql = "SELECT * FROM admin";
        $user = $conn->query($sql) or die($conn->error);
        
        
            while($row = $user->fetch_assoc()){
            ?>
                    <tr>
                        <th scope="row"><?= $row['id']; ?></th>
                        <td><?= $row['username']; ?></td>
                        <td>   <?php 
                        $real_password = $row["password"]; 
                        $hidden_password = preg_replace("|.|","*",$real_password);
                        echo $hidden_password;
                        ?></td>
                        <td><?= $row['usertype']; ?></td>
                        <td><button type="button" id="edit-btn"  data-id="<?= $row['id'] ?>" class="bg-primary border-0 btn shadow-none edit"><i class="fas fa-pen text-white"></i></button></td>
                        <td><button type="button" id="delete-btn"  data-id="<?= $row['stud_id'] ?>"  value="<?php echo $row['id']; ?>" class="bg-danger border-0 btn shadow-none delete"><i class="fas fa-trash text-white"></i></button></a></td>
                        
                    </tr>
                    <?php
            }
            ?>
                </tbody>
                <tfoot>
                </tfoot>

                </table>
            </div>
    </div>
</div>


<!-- Add new admin -->

<div id="addAdmin" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" ">
    <div class="modal-dialog modal-dialog-centered"> 
        <div class="modal-content">                  
            <div class="modal-header"> 
                <h5 class="modal-title">Edit</h5>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>          
            <div class="modal-body">               
                <div class="fetched-data">
                    <form action="php/add.php" method="POST" enctype="multipart/form-data">     
                        <div class="row w-100 justify-content-center align-items-center px-3">
                            <div class="col-12 col-lg-12  py-2">
                                <div class="list-group">
                                    <label for="">Username:</label>
                                    <input type="text" class="py-1 px-2 border " name="uname" value="" required>
                                </div>
                            </div>
                            <div class="col-12  py-2">
                                <div class="list-group">
                                    <label for="">Password:</label>
                                    <input type="password" autocomplete="off" class="py-1 px-2 border" name="pwd" required>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>           
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-success shadow-none" name="add-admin">Update</button>  
                </form>
            </div>              
        </div> 
    </div>
</div>



<!-- End add modal -->


<!--Edit Modal -->
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
                            <div class="col-12 col-lg-12 py-2">
                                <div class="list-group">
                                    <label for="">ID: </label>
                                    <input type="text" class="form-control shadow-none py-1 px-2 border"  id="adminid" name="adminid" readonly="readonly" required>
                                </div>
                            </div>
                            <div class="col-12 col-lg-12  py-2">
                                <div class="list-group">
                                    <label for="">Username:</label>
                                    <input type="text" class="py-1 px-2 border " id="uname" name="uname" value="" required>
                                </div>
                            </div>
                            <div class="col-12  py-2">
                                <div class="list-group">
                                    <label for="">Password:</label>
                                    <input type="password" autocomplete="off" class="py-1 px-2 border" name="pwd" id="pwd"  required>
                                </div>
                            </div>
                        </div>
                    </div>                            
                </div>           
                <div class="modal-footer"> 
                    <button type="submit" class="btn btn-success shadow-none" name="update-admin">Update</button>  
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
                                <input type="text" id="id" name="id">
                                <h3 class="text-center">Are you sure to delete?</h3>
                                <div class=" text-center">
                                    <button class="btn btn-sm btn-danger shadow-none" type="submit" name="delete-admin">Yes</button>
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

            let adminId = $(this).data('id'); 
            
            $('#edit').modal('show');
            $.ajax({

            type: 'POST',
            url: 'adminData.php',
            data: 'adminId='+adminId,
            dataType: 'json',
            cache: false,
            success: function(data){
                
            }
            })

            .done(function(data){
                $('#adminid').val(data.id);
                $('#uname').val(data.username);
                $('#pwd').val(data.password);
            })


        });


        $(document).on('click', '#add-admin', function(e){
            e.preventDefault();  

            $('#addAdmin').modal('show');

        });


        

        $(document).on('click', '.delete', function(){
            let id=$(this).val();

            $('#delete-modal').modal('show');
            $('#id').val(id);

        });

    });

</script>

