<!-- Add -->
<div class="modal fade" id="addnew">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Add New Vehicle</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./vehicle_row.php" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="driver_id" class="col-sm-3 control-label">Driver ID.</label>

                        <div class="col-sm-9">

                            <?php
                            echo '<select name="driver_id" id="driver_id" class="form-control" required>
                                   <option selected value="" disabled>Select Driver ID</option>';
                            $conn = $pdo->open();

                            try{
                                $stmt = $conn->prepare("SELECT * FROM driver ");
                                $stmt->execute();
                                foreach($stmt as $row){

                                    echo "
                                        <option value=".$row['id'].">".$row['id']."</option>
                                       ";
                                }
                                echo "</select>";
                            }
                            catch(PDOException $e){
                                echo $e->getMessage();
                            }

                            $pdo->close();
                            ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="reg_number" class="col-sm-3 control-label">Registration No.</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="firstname" name="reg_number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>

                        <div class="col-sm-9">
                            <select name="type" id="type" class="form-control" required>
                                <option value="" selected disabled>Select Vehicle type</option>
                                <option value="MiniVan">Mini Van</option>
                                <option value="1_Ton">1 Ton</option>
                                <option value="1.5_Ton">1.5 Ton</option>
                                <option value="4_Ton">4 Ton</option>
                                <option value="8_Ton">8 Ton</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model" class="col-sm-3 control-label">Model</label>

                        <div class="col-sm-9">
                            <select value="" name="model" class="form-control" id="model" required>
                                <option selected disabled>Select Model</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>
                    <!--                <div class="form-group">-->
                    <!--                    <label for="password" class="col-sm-3 control-label">Password</label>-->
                    <!---->
                    <!--                </div>-->

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-primary btn-flat" name="add"><i class="fa fa-save"></i> Save</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit -->
<div class="modal fade" id="edit">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Edit Vehicle</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./vehicle_row.php">
                    <input type="hidden" id="edit-id">
                    <div class="form-group">
                        <label for="reg_number" class="col-sm-3 control-label">Registration No.</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="reg_number" name="reg_number" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="type" class="col-sm-3 control-label">Type</label>

                        <div class="col-sm-9">
                            <select name="type" id="edit-type" class="form-control" required>
                                <option selected disabled>Select Vehicle type</option>
                                <option value="MiniVan">Mini Van</option>
                                <option value="1_Ton">1 Ton</option>
                                <option value="1.5_Ton">1.5 Ton</option>
                                <option value="4_Ton">4 Ton</option>
                                <option value="8_Ton">8 Ton</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name" class="col-sm-3 control-label">Name</label>

                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="edit-name" name="name" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="model" class="col-sm-3 control-label">Model</label>

                        <div class="col-sm-9">
                            <select name="model" class="form-control" id="edit-model" required>
                                <option selected disabled>Select Model</option>
                                <option value="2010">2010</option>
                                <option value="2011">2011</option>
                                <option value="2012">2012</option>
                                <option value="2013">2013</option>
                                <option value="2014">2014</option>
                                <option value="2015">2015</option>
                                <option value="2016">2016</option>
                                <option value="2017">2017</option>
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                            </select>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="edit"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete -->
<div class="modal fade" id="delete">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Deleting...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="./vehicle_row.php">
                    <input type="hidden" class="delete-id" name="delete-id">
                    <div class="text-center">
                        <p>DELETE VEHICLE</p>
                        <h2 class="vehicle_details"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-danger btn-flat" name="delete"><i class="fa fa-trash"></i> Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Update Photo -->
<div class="modal fade" id="edit_photo">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b><span class="fullname"></span></b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="users_photo.php" enctype="multipart/form-data">
                    <input type="hidden" class="userid" name="id">
                    <div class="form-group">
                        <label for="photo" class="col-sm-3 control-label">Photo</label>

                        <div class="col-sm-9">
                            <input type="file" id="photo" name="photo" required>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="upload"><i class="fa fa-check-square-o"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>


<!-- Activate -->
<div class="modal fade" id="activate">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"><b>Activating...</b></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" method="POST" action="users_activate.php">
                    <input type="hidden" class="userid" name="id">
                    <div class="text-center">
                        <p>ACTIVATE USER</p>
                        <h2 class="bold fullname"></h2>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default btn-flat pull-left" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                <button type="submit" class="btn btn-success btn-flat" name="activate"><i class="fa fa-check"></i> Activate</button>
                </form>
            </div>
        </div>
    </div>
</div> 


     