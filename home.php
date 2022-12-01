<?php 
include 'admin/db_connect.php'; 
?>
<style>
#portfolio .img-fluid {
    width: calc(100%);
    height: 30vh;
    z-index: -1;
    position: relative;
    padding: 1em;
}
</style>
<link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<header class="masthead">
    <div class="container-fluid h-100">
        <div class="row h-100 align-items-center justify-content-center text-center">
            <div class="col-lg-10 align-self-end mb-4 page-title">
                
                <hr class="divider my-4" />
                <div class="col-md-12 mb-2 text-left">
                    <div class="card">
                        <div class="card-body">
                            <form id="manage-filter" action="index.php?page=flights" method="POST">
                                <div class="row form-group">
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Entrada</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date"
                                            autocomplete="off">
                                        <!-- <option value=""></option>
                                            <?php//
                                               // $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                           // while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php //echo $row['id'] ?>" <?php// echo isset($departure_airport_id) && $departure_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php //endwhile; ?>
                                            </select> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Salida</label>
                                        <input type="date" class="form-control input-sm datetimepicker2" name="date"
                                            autocomplete="off">

                                        <!-- <option value=""></option>

                                            <?php
                                             //  $airport = $conn->query("SELECT * FROM airport_list order by airport asc");
                                           // while($row = $airport->fetch_assoc()):
                                            ?>
                                                <option value="<?php// echo $row['id'] ?>" <?php// echo isset($arrival_airport_id) && $arrival_airport_id == $row['id'] ? "selected" : '' ?>><?php echo $row['location'].", ".$row['airport'] ?></option>
                                            <?php //endwhile; ?>
                                            </select> -->
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="" class="control-label">Personas</label>
                                        <select name="cars" id="cars" form="carform">
                                            <option value="volvo">1</option>
                                            <option value="saab">2</option>
                                            <option value="opel">3</option>
                                            <option value="audi">4</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3" id="rdate" style="display: none">
                                        <label for="" class="control-label">Indique la fecha</label>
                                        <input type="date" class="form-control input-sm datetimepicker2"
                                            name="date_return" autocomplete="off">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="onewway"
                                                value="1" checked>
                                            <label class="form-check-label" for="onewway">
                                                Intancia larga
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-2 text-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="trip" id="rtrip"
                                                value="2">
                                            <label class="form-check-label" for="rtrip">
                                                Una noche
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 offset-sm-5">
                                        <button class="btn btn-block btn-sm btn-primary" type="submit">
                                            <span class="material-symbols-outlined">
                                                menu_book
                                            </span>

                                            </span>Crear Reservacion</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</header>
<section class="page-section" id="menu">


    </div>
    <div class="row no-gutters">
        <?php
                    $cats = $conn->query("SELECT * FROM airlines_list order by rand() asc");
                                while($row=$cats->fetch_assoc()):
                    ?>


    </div>
    </div>
    <?php endwhile; ?>

    </div>
    </div>
    </div>
    <script>
    $('.view_prod').click(function() {
        uni_modal_right('Product', 'view_prod.php?id=' + $(this).attr('data-id'))
    })
    $('.select2').select2({
        placeholder: 'Seleccione Fecha',
        width: '100%'
    })
    $('[name="trip"]').on("keypress change keyup", function() {
        if ($(this).val() == 1) {
            $('#rdate').hide()
        } else {
            $('#rdate').show()
        }
    })
    </script>

</section>