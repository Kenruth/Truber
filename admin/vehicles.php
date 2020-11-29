<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Vehicles
            </h1>
            <ol class="breadcrumb">
                <li><a href="./home.php"><i class="fa fa-dashboard"></i> Home</a></li>
                <li class="active">Vehicles </li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <?php
            if(isset($_SESSION['error'])){
                echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              ".$_SESSION['error']."
            </div>
          ";
                unset($_SESSION['error']);
            }
            if(isset($_SESSION['success'])){
                echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              ".$_SESSION['success']."
            </div>
          ";
                unset($_SESSION['success']);
            }
            ?>
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">

                            <div class="pull-right">

                            </div>
                        </div>
                        <div class="box-body">
                            <table id="example1" class="table table-bordered">
                                <thead>
                                <th>id</th>
                                <th>Registration Number</th>
                                <th>Type</th>
                                <th>Name</th>
                                <th>Model</th>
                                <th>Action</th>
                                </thead>
                                <tbody>
                                <?php
                                $conn = $pdo->open();

                                try{
                                    $stmt = $conn->prepare("SELECT * FROM vehicle ");
                                    $stmt->execute();
                                    foreach($stmt as $row){

                                        echo "
                          <tr>
                            <td>".$row['id']."</td> 
                            <td>".$row['reg_number']."</td>
                            <td>".$row['type']."</td>
                            <td>".$row['name']."</td>
                            <td>".$row['model']."</td>
                            <td id=".$row['id']."><i class='fa fa-plus-square addnew'></i><i class='fa fa-edit edit'></i><i class='fa fa-trash-o delete'></i></td>
                         
                          </tr>
                        ";
                                    }
                                }
                                catch(PDOException $e){
                                    echo $e->getMessage();
                                }

                                $pdo->close();
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <?php include 'includes/footer.php'; ?>
    <?php include 'includes/vehicles_modal.php'; ?>

</div>
<!-- ./wrapper -->

<?php include 'includes/scripts.php'; ?>
<script>

    $(function(){

        $(document).on('click', '.addnew', function(e){

            e.preventDefault();
            $('#addnew').modal('show');
            var id = e.target.parentNode.id;
            getRow(id);
        });

        $(document).on('click', '.edit', function(e){
            e.preventDefault();
            $('#edit').modal('show');
            var id = e.target.parentNode.id;
            getEdit(id);
        });

        $(document).on('click', '.delete', function(e){
            e.preventDefault();
            $('#delete').modal('show');
            var id = e.target.parentNode.id;
            getRow(id);
        });

        $(document).on('click', '.photo', function(e){
            e.preventDefault();
            var id = e.target.parentNode.id;
            getRow(id);
        });

        $(document).on('click', '.status', function(e){
            e.preventDefault();
            var id = e.target.parentNode.id;
            getRow(id);
        });

    });


    function getRow(id){

        $.ajax({
            type: 'POST',
            url: 'vehicle_row.php',
            data: {v_id:id},
            dataType: 'json',
            success: function(response){
                $('.delete-id').val(response.id);
                $('.vehicle_details').html(
                    '<span>Reg No : '+response.reg_number+'</span><br/>'+
                    '<span>Vehicle Type : '+response.type+'</span><br/>'+
                    '<span>Vehicle Name : '+response.name+'</span><br/>'+
                    '<span>Model : '+response.model+'</span><br/>'
                );
            }
        });
    }

    function getEdit(id){

        $.ajax({
            type: 'POST',
            url: 'vehicle_row.php',
            data: {v_id:id},
            dataType: 'json',
            success: function(response){
                $('#edit-id').val(response.id);
                $('#reg_number').val(response.reg_number);
                $('#edit-type').val(response.type);
                $('#edit-name').val(response.name);
                $('#edit-model').val(response.model);
            }
        });
    }
</script>
<script>
    $(function(){
        //Date picker
        $('#datepicker_add').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })
        $('#datepicker_edit').datepicker({
            autoclose: true,
            format: 'yyyy-mm-dd'
        })

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A' })
        //Date range as a button
        $('#daterange-btn').daterangepicker(
            {
                ranges   : {
                    'Today'       : [moment(), moment()],
                    'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month'  : [moment().startOf('month'), moment().endOf('month')],
                    'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate  : moment()
            },
            function (start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )

    });
</script>
</body>
</html>
