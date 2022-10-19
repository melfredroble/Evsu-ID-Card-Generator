<div class=" footer text-lg-end text-center px-3" style="background-color: maroon;">
    <div class="row  h-100 pt-3">
        <div class="col-12 d-flex justify-content-center  justify-content-lg-end align-items-center h-100">
            <p class="text-white">&copy; Copyright 2021 Alright Reserved EVSU</p>
        </div>
        
    </div>
</div>




</body>
<script type="text/javascript">

 
    $(document).ready(function() {

        $(document).on('click', '.notif_btn', function(e){
            e.preventDefault();  
           
            $(".down").toggle();
            $(".badge").hide();

            // var studId = $(this).attr("data-id");
            var studId = $('#studId').val();

            $.ajax({

                type: 'POST',
                url: 'notif.php',
                data: {
                    studId: studId
                },
                cache: false
                
            })

        })


    })


</script>
</html>