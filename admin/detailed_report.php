<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<style>

    body
    {
        overflow:auto;
        background-color: #1b1b1b;
        padding-top: 40px;
    }
    .form-signin {
        max-width: 280px;
        padding: 15px;
        margin:200px;
        margin-top:80px;
        margin-left: 130px;
    }

    .input-group-addon
    {
        background-color: rgb(50, 118, 177);
        border-color: rgb(40, 94, 142);
        color: rgb(255, 255, 255);
    }

    .form-signup input[type="text"],.form-signup input[type="password"] { border: 1px solid rgb(50, 118, 177); }
    .fullscreen_bg {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        background-size: cover;
        background-position: 50% 50%;
        background-image: url('http://i.imgur.com/aFs5QmP.jpg');
        background-repeat:repeat;
    }

    table {
        width: 100%;
        display:block;
    }
    thead {
        display: inline-table;
        width: 95%;
        height: 30px;
    }
    tbody {
        height: 150px;
        display: inline-block;
        width: 100%;
        overflow: auto;
    }


</style>
<script>
    $(document).ready(function(){

        $(".customer").toggle();

    });

    $(document).ready(function(){
        $("#a").click(function(){
            $(".customer").show();
        });
    });

    $(document).ready(function(){
        $("#b").click(function(){
            $(".customer").hide();
        });
    });

    $(document).ready(function(){
        $("#c").click(function(){
            $(".customer").hide();
        });
    });

</script>
<!------ Include the above in your HEAD tag ---------->


<!--                        <div class="text-center">-->
                            <h4> <label for="Choose Report"  style="color:#E74C3C">Choose Report</label></h4>
                            <div class="input-group"><span class="input-group-addon"><span class="fa fa-tasks"></span></span>
                                <select class="form-control"  >
                                    <option value="Income" selected>Income</option>
                                    <option value="Expenses">Expenses</option>
                                </select></div>
                            <h5><label for="Choose Report" style="color:#E74C3C"> Time :</label>
                                <input id="a" type="radio" name="type" value="Daily">Daily
                                <input id="b" type="radio" name="type" value="Weekly">Weekly
                                <input id="c" type="radio" name="type" value="Monthly">Monthly</h5>

                            <div class="customer" >
                                <div class="input-group">
                                    <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                    <input type="date" class="form-control" placeholder="Date" />
                                </div>
                            </div>
                            </br><button type="button" class="btn btn-primary btn-lg btn3d"><span class="glyphicon glyphicon-download-alt"></span> Download</button>
                        </div>


                        <div class="panel-body">

<!--                                <thead>-->
<!--                                <th>Date</th>-->
<!--                                <th>Customer Name</th>-->
<!--                                <th>Driver Name</th>-->
<!--                                <th>Destination</th>-->
<!--                                <th>Payment Type</th>-->
<!--                                <th>Status</th>-->
<!--                                </thead>-->
<!--                            <tbody>-->
<!--                            --><?php
//                            $conn = $pdo->open();
//
//                            try{
//                                $stmt = $conn->prepare("SELECT * FROM driver");
//                                $stmt->execute();
//                                foreach($stmt as $row){
//
//                                    echo "
//                            <tr>
//                            <td>".$row['id']."</td>
//                            <td>".$row['firstname'].' '.$row['lastname']."</td>
//                            <td>".$row['email']."</td>
//                            <td>".$row['mobile']."</td>
//                            <td>".date('M d, Y', strtotime($row['date_registered']))."</td>
//                            <td>Completed</td>
//                            </tr>
//                        ";
//                                }
//                            }
//                            catch(PDOException $e){
//                                echo $e->getMessage();
//                            }
//
//                            $pdo->close();
//                            ?>
<!--                            </tbody>-->
<!--                            </table>-->
                            <div class="text-center">
                                <h4> <label style="color:#E74C3C" for="Total">Total :</label>7740</h4> </div>



                        </div>






