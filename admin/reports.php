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
          Reports
      </h1>
      <ol class="breadcrumb">
        <li><a href="./home.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Reports</li>
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
                  <div class="form-group">
                     <label for="type" class="col-sm-3 control-label">Report Type</label>

                      <div class="col-sm-9">
                          <select name="type" id="type" class="form-control" required>
                              <option selected disabled>Select report type</option>
                              <option value="Vehicles">Vehicle</option>
                              <option value="customers">Customers</option>
                              <option value="drivers">Drivers</option>
                              <option value="trips">Trips</option>
                              <option value="members">All Members</option>
                          </select>
                      </div>
                  </div>

              </div>
            </div>
              <?php
             // echo uniqid(rand(),true);

            //  function distance($lat1, $lon1, $lat2, $lon2) {

//                  $pi80 = M_PI / 180;
//                  $lat1 *= $pi80;
//                  $lon1 *= $pi80;
//                  $lat2 *= $pi80;
//                  $lon2 *= $pi80;
//
//                  $r = 6372.797; // mean radius of Earth in km
//                  $dlat = $lat2 - $lat1;
//                  $dlon = $lon2 - $lon1;
//                  $a = sin($dlat / 2) * sin($dlat / 2) + cos($lat1) * cos($lat2) * sin($dlon / 2) * sin($dlon / 2);
//                  $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
//                  $km = $r * $c;
//
//                  //echo '<br/>'.$km;
//                  return $km;
//              }
//              echo distance(-25.7530,28.1942,-26.235119, 27.906766);
              ?>
<script>

    function distance(lat1, lon1, lat2, lon2, unit) {
        var radlat1 = Math.PI * lat1/180
        var radlat2 = Math.PI * lat2/180
        var radlon1 = Math.PI * lon1/180
        var radlon2 = Math.PI * lon2/180
        var theta = lon1-lon2
        var radtheta = Math.PI * theta/180
        var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
        dist = Math.acos(dist)
        dist = dist * 180/Math.PI
        dist = dist * 60 * 1.1515
        if (unit=="K") { dist = dist * 1.609344 }
        if (unit=="N") { dist = dist * 0.8684 }
        return dist
    }

    var distance = distance(-25.7530,28.1942,-25.750319, 28.195769, 'K');
    //round to 3 decimal places
    console.log((Math.floor(distance*1000)/1000)*4.2);  //displays 343.548
   //
   //
   // // console.log(geoDistance(-25.7530,28.1942,-26.235119, 27.906766));
   //  function distance(lat1, lon1, lat2, lon2) {
   //      var p = 0.017453292519943295;    // Math.PI / 180
   //      var c = Math.cos;
   //      var a = 0.5 - c((lat2 - lat1) * p)/2 +
   //          c(lat1 * p) * c(lat2 * p) *
   //          (1 - c((lon2 - lon1) * p))/2;
   //
   //      return 12742 * Math.asin(Math.sqrt(a)); // 2 * R; R = 6371 km
   //  }
   //  console.log(distance(-25.7530,28.1942,-26.235119, 27.906766));

</script>

              <div style="padding-left: 30%;">
                  <div class="input-group">
                      Start Date: <span class="fromdate"><span class="fa fa-calendar-times-o"></span></span>
                      <input type="date" name="fromD" class="form-control" placeholder="Date" required />
                  <br/>
                      End Date: <span class="todate"><span class="fa fa-calendar-times-o"></span></span>
                      <input type="date" name="toD" class="form-control" placeholder="Date" required />
                  </div>
                  <br/>
                  <span class="date-error"></span><br/>
                  <button name="generate" class="btn btn-success" onclick="generateRep()"><i class="fa fa-gears"></i> Generate Report</button>
                  <button name="download" class="btn btn-warning" onclick=""><i class="fa fa-download"></i> Download Report</button>
              </div>
<!--              -->
            <div id="drivers-report" class="box-body">
              <table id="example1" class="table table-bordered">
                <thead>
                  <th>Customer Name</th>
                  <th>Driver Name</th>
                  <th>Pick Up</th>
                  <th>Destination</th>
                  <th>Date</th>
                </thead>
                <tbody >

                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  	<?php include 'includes/footer.php'; ?>

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
        getRow(id);
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
    url: 'drivers_row.php',
    data: {id:id},
    dataType: 'json',
    success: function(response){
      $('.userid').val(response.id);
      $('#edit_email').val(response.email);
      $('#edit_password').val(response.password);
      $('#edit_firstname').val(response.firstname);
      $('#edit_lastname').val(response.lastname);
      $('#edit_address').val(response.address);
      $('#edit_mobile').val(response.mobile_info);
      $('.fullname').html(response.firstname+' '+response.lastname);
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
<script type="application/javascript" src="../assets/js/report.js"></script>
</body>
</html>
