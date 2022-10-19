
<div class="container bg-light" >
    <h3 class="p-3 ">STUDENTS</h3>
    <div class="row justify-content-center  rounded    bg-light">
            <div class="table-responsive m-5">
                <table id="example" class="table table-striped" style="width:100%">
                
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Student ID</th>
                            <th scope="col">First name</th>
                            <th scope="col">Last name</th>
                            <th scope="col">Password</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>

                    <tbody>
    <?php

        include_once '../db/db.php';
        
        $search = "SELECT * FROM users";
        $user = $conn->query($search) or die($conn->error);
        
        
            while($row = $user->fetch_assoc()){
            ?>
                    <tr>
                        <th scope="row"><?= $row['id']; ?></th>
                        <td><?= $row['stud_id']; ?></td>
                        <td><?= ucfirst($row['first_name']); ?></td>
                        <td><?= ucfirst($row['last_name']); ?></td>
                        <td>   <?php 
                        $real_password = $row["password"]; 
                        $hidden_password = preg_replace("|.|","*",$real_password);
                        echo $hidden_password;
                        ?></td>
                        <td><button type="button" id="delete-btn"  data-id="<?= $row['stud_id'] ?>" class="bg-danger border-0 btn shadow-none delete"><i class="fas fa-trash text-white"></i></button></a></td>
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


        <!-- ######## Delete Modal###### -->
        <div id="delete-modal" class="modal fade py-5" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
            <div class="modal-dialog modal-dialog-centered"> 
                <div class="modal-content py-5">
                    <form action="php/delete.php" method="POST">
                       <input type="hidden" id="stud_no" name="stud_no">
                        <h3 class="text-center">Are you sure to delete?</h3>
                        <div class=" text-center">
                            <button class="btn btn-sm btn-danger shadow-none" type="submit" name="delete-student">Yes</button>
                            <button type="button" class="btn btn-sm btn-success shadow-none" data-bs-dismiss="modal" aria-label="Close">No</button>
                        </div>
                    </form>         
                </div> 
            </div>
        </div>
        <!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#example').DataTable();


        $(document).on('click', '.delete', function(){
            let studno = $(this).attr('data-id');

            $('#delete-modal').modal('show');
            $('#stud_no').val(studno);

        });

    });
</script>

