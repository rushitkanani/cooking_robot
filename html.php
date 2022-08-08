<script src="wizard/jquery.js"></script>
<script src="wizard/popper.js"></script>
<script src="wizard/jquery-ui.js"></script>
<script src="wizard/bootstrap.js"></script>
<script src="wizard/select2.min.js"></script>
<link rel="stylesheet" href="wizard/select2.min.css">
<link rel="stylesheet" href="wizard/css/bracket.css">
<link rel="stylesheet" href="css/font-awesome-4.7.0/css/font-awesome.css">

<?php
require_once("connection.php");
?>
<form method="post" id="form" action="#">
    <div class="br-pagebody">
        <div class="br-section-wrapper">
            <h6 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10">Custom Recipe</h6>
            <p class="mg-b-30 tx-gray-600">Add your favourite Recipe according to your Taste.</p>

            <div class="form-layout form-layout-1">
                <div class="row mg-b-10">
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Recipe Name: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="text" name="receipe_name" id="receipe_name" placeholder="Enter Recipe name">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Cooking Time: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="cooking_time" id="cooking_time" placeholder="Enter Cooking Time">
                        </div>
                    </div><!-- col-4 -->
                    <div class="col-lg-4">
                        <div class="form-group">
                            <label class="form-control-label">Person: <span class="tx-danger">*</span></label>
                            <input class="form-control" type="number" name="person" id="person" placeholder="Enter number of person">
                        </div>
                    </div>
                    <div class="col-lg-3 mg-t-40 mg-lg-t-0">
                        <label class="custom-file">
                            <input type="file" class="custom-file-input">
                            <span class="custom-file-control custom-file-control-inverse"></span>
                        </label>
                    </div><!-- col-4 -->
                    <!-- col-4 -->
                </div><!-- row -->

            </div>
        </div>

        <div class="br-section-wrapper mg-t-20">
            <table class="table table-bordered table-colored table-dark mg-t-0">
                <thead class="mg-t-0">

                    <?php
                    $q = "SELECT id,ingredient_table.ingredient_name,ingredient_table.ingredient_calories, tmp_receipe_ingrident.portion FROM `tmp_receipe_ingrident` 
                        JOIN `ingredient_table` ON ingredient_table.ing_id=tmp_receipe_ingrident.ing_id WHERE tmp_receipe_ingrident.user_id=1;";
                    $r = mysqli_query($conn, $q);
                    if (mysqli_num_rows($r) > 0) {
                        echo '<tr><td> Sr. No.</td>
                                <td>Ingriendent_name</td>
                                <td>Ingriendent_Calories</td>
                                <td>Portion</td>
                                <td>Action</td></tr>';
                    }
                    $index = 1;
                    while ($row = mysqli_fetch_assoc($r)) {
                        echo '<tbody>';
                        echo '<tr>';

                        echo '<td  class="wd-10p">' . $index++ . '</td>';
                        echo '<td>' . $row['ingredient_name'] . '</td>';
                        echo '<td  class="wd-20p">' . $row['ingredient_calories'] . '</td>';
                        echo '<td  class="wd-20p">' . $row['portion'] . '</td>';
                        echo '<td  class="wd-5p"><button type="button" onclick="remove_item(' . $row['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                        echo '</tr>';
                        echo '</tbody>';
                    }
                    ?>

                </thead>
            </table>
            <div id="add_ing_block" style="visibility: hidden">
                <form id="ing_form" action="#">
                    <select class="select2" type="text" id="ing_name" placeholder="name">
                        <option>Choose one</option>
                        <?php
                        $r = mysqli_query($conn, "SELECT `ing_id`,`ingredient_name` FROM `ingredient_table`");
                        while ($row = mysqli_fetch_assoc($r)) {
                            echo '<option value="' . $row['ing_id'] . '">' . $row['ingredient_name'] . '</option>';
                        }
                        ?>
                    </select>
                    <input type="text" id="ing_calories" placeholder="calories" readonly>
                    <input type="text" id="portion" name="portion" placeholder="Portion">
                    <button class="btn-dark btn" value="add" id="add_ing">ADD</button>
                </form>
            </div>
            <div style="text-align:center">
                <button id="add_ingriendent" name="add_ingriendent" class="btn btn-primary btn-dark">Add Ingrident</button>
            </div>
        </div>


    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper mg-t-20">
            <table class="table table-bordered table-colored table-dark mg-t-0">
                <thead class="mg-t-0">
                    <tr>
                        <?php
                        $q = "SELECT tmp_receipe_utensil.id,utensils.utensils_name FROM tmp_receipe_utensil JOIN utensils ON utensils.utensils_id=tmp_receipe_utensil.utensil_id WHERE tmp_receipe_utensil.user_id=1";
                        $r = mysqli_query($conn, $q);
                        if (mysqli_num_rows($r) > 0) {
                            echo '<td> Sr. No.</td>
                                <td>Utensil name</td>
                                <td>Action</td>';
                        }
                        $index = 1;
                        while ($row = mysqli_fetch_assoc($r)) {
                            echo '<tbody>';
                            echo '<tr>';

                            echo '<td  class="wd-5p">' . $index++ . '</td>';
                            echo '<td>' . $row['utensils_name'] . '</td>';
                            echo '<td  class="wd-5p"><button type="button" onclick="remove_utensil(' . $row['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                            echo '</tr>';
                            echo '</tbody>';
                        }
                        ?>
                    </tr>
                </thead>
            </table>
            <div id="add_utensil_block" style="visibility: hidden">
                <form id="utensil_form" action="#">
                    <select class="select2" type="text" id="utensil_name" placeholder="Utensil name">
                        <option>Choose one</option>
                        <?php
                        $r = mysqli_query($conn, "SELECT `utensils_id`,`utensils_name` FROM `utensils`");
                        while ($row = mysqli_fetch_assoc($r)) {
                            echo '<option value="' . $row['utensils_id'] . '">' . $row['utensils_name'] . '</option>';
                        }
                        ?>
                    </select>
                    <button class="btn-dark btn" value="add" id="add_utensil_db">ADD</button>
                </form>
            </div>
            <div style="text-align:center;">
                <button id="add_utensil" name="add_utensil" class="btn btn-primary btn-dark">Add Utensil</button>
            </div>
        </div>
    </div>

    <div class="br-pagebody">
        <div class="br-section-wrapper mg-t-20">
            <table class="table table-bordered table-colored table-dark mg-t-0">
                <thead class="mg-t-0">
                    <tr>
                        <?php
                        $q = "SELECT * FROM `tmp_receipe_steps` WHERE `user_id`=1";
                        $r = mysqli_query($conn, $q);
                        if (mysqli_num_rows($r) > 0) {
                            echo '<td> Sr. No.</td>
                                <td>Steps</td>
                                <td>Action</td>';
                        }
                        $index = 1;
                        while ($row = mysqli_fetch_assoc($r)) {
                            echo '<tbody>';
                            echo '<tr>';

                            echo '<td class="wd-5p">' . $index++ . '</td>';
                            echo '<td>' . $row['Description'] . '</td>';
                            echo '<td  class="wd-5p"><button type="button" onclick="remove_step(' . $row['id'] . ')" class="btn btn-danger"><i class="fa fa-trash"></i></button></td>';
                            echo '</tr>';
                            echo '</tbody>';
                        }
                        ?>
                    </tr>
                </thead>
            </table>
            <div id="add_steps_block" style="visibility: hidden">
                <form id="step_form" action="#">
                    <input type="text" id="rec_step" name="rec_step" placeholder="add steps">
                    <button class="btn-dark btn" value="add" id="add_step_db">ADD</button>
                </form>
            </div>
            <div style="text-align:center">
                <button id="add_steps" name="add_step" class="btn btn-primary btn-dark">Add Step</button>
            </div>
        </div>
    </div>

</form>

<script>
    $(function() {
        'use strict';

        $('#form').submit(function(ev) {
            ev.preventDefault();
        });

        $('#ing_form').submit(function(ev) {
            ev.preventDefault();
        });

        $('#utensil_form').submit(function(ev) {
            ev.preventDefault();
        });

        $('#step_form').submit(function(ev) {
            ev.preventDefault();
        });

        $('#ing_name').select2({
            dir: "ltr"
        });

        $('#utensil_name').select2({
            dir: "ltr"
        });

        $('#add_ingriendent').on('click', function() {
            $('#add_ing_block').css('visibility', 'visible');
        });

        $('#add_utensil').on('click', function() {
            $('#add_utensil_block').css('visibility', 'visible');
        });

        $('#add_steps').on('click', function() {
            $('#add_steps_block').css('visibility', 'visible');
        });

        $('#add_ing').on('click', function() {
            $.ajax({
                type: 'POST',
                url: 'ingridient_data.php',
                dataType: 'json',
                data: {
                    "ing_id": $("#ing_name").val(),
                    "calories": $('#ing_calories').val(),
                    "portion": $('#portion').val(),
                    "user_id": 1,
                    "method_name": "add_ingredient",
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] == "success") {
                        location.reload();
                    } else if (response['status'] == "Failed") {
                        console.log(response);
                        alert('Ingredient already exists');
                    }
                }
            });
        });

        $("#ing_name").change(function() {
            var ing_id = $("#ing_name").val();
            $.ajax({
                type: 'POST',
                url: 'ingridient_data.php',
                dataType: 'json',
                data: {
                    "ing_id": $("#ing_name").val(),
                    "method_name": "getCalories",
                },
                success: function(response) {
                    console.log(response);
                    if (response.status = "success") {
                        $('#ing_calories').val(response['data']);
                    }
                }
            })
        });

        $("#add_utensil_db").on('click', function() {
            $.ajax({
                type: 'POST',
                url: 'ingridient_data.php',
                dataType: 'json',
                data: {
                    "utensil_id": $("#utensil_name").val(),
                    "user_id": 1,
                    "method_name": "add_utensil",
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] == "success") {
                        location.reload();
                    } else if (response['status'] == "Failed") {
                        alert('Utensil already exists');
                    }
                }
            });
        });

        $('#add_step_db').on('click', function(){
            if($('#rec_step').val().trim() == ''){
                alert("Please enter the steps.");
            } else {
                $.ajax({
                type: 'POST',
                url: 'ingridient_data.php',
                dataType: 'json',
                data: {
                    "rec_step": $("#rec_step").val(),
                    "user_id": 1,
                    "method_name": "add_steps",
                },
                success: function(response) {
                    console.log(response);
                    if (response['status'] == "success") {
                        location.reload();
                    } 
                }
            });
            } 
        });
    });

    function remove_item(id) {
        $.ajax({
            type: 'POST',
            url: 'ingridient_data.php',
            dataType: 'json',
            data: {
                "id": id,
                "method_name": "remove_item",
            },
            success: function(response) {
                console.log(response);
                if (response.status = "success") {
                    location.reload();
                }
            }
        });
    }

    function remove_utensil(id) {
        $.ajax({
            type: 'POST',
            url: 'ingridient_data.php',
            dataType: 'json',
            data: {
                "id": id,
                "method_name": "remove_utensil",
            },
            success: function(response) {
                console.log(response);
                if (response.status = "success") {
                    location.reload();
                }
            }
        });
    }

    function remove_step(id) {
        $.ajax({
            type: 'POST',
            url: 'ingridient_data.php',
            dataType: 'json',
            data: {
                "id": id,
                "method_name": "remove_step",
            },
            success: function(response) {
                console.log(response);
                if (response.status = "success") {
                    location.reload();
                }
            }
        });
    }
</script>