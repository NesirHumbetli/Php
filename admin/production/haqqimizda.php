<?php
include "header.php";

$haqqimizdasor = $db->prepare("SELECT * FROM haqqimizda where haqqimizda_id=?");
$haqqimizdasor->execute(array(0));
$haqqimizdacek = $haqqimizdasor->fetch(PDO::FETCH_ASSOC);

?>

<head>
    <script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
</head>

<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Haqqımızda</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Açar sözü girin...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Axtar</button>
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Haqqımızda Redaktə <small>
                                    <?php
                                    if (isset($_GET['status']) && $_GET['status'] == 'ok') { ?>

                                        <b style="color: green;">Güncəlləndi.</b>

                                    <?php }elseif(isset($_GET['status']) && $_GET['status'] == 'no') { ?>
                                        
                                        <b style="color: red;">Güncəllənmədi.</b>
                                    
                                    <?php } ?>
                                    </small></h2>
                            <ul class="nav navbar-right panel_toolbox">

                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">
                            <form action="../netting/process.php" method="POST" id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Haqqımızda Başlıq<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $haqqimizdacek['haqqimizda_basliq']; ?>" name="haqqimizda_basliq" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Məzmun <span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <textarea class="ckeditor" name="haqqimizda_mezmun"><?php echo $haqqimizdacek['haqqimizda_mezmun'] ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Video<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $haqqimizdacek['haqqimizda_video']; ?>" name="haqqimizda_video" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Hədəflərimiz<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $haqqimizdacek['haqqimizda_hedef']; ?>" name="haqqimizda_hedef" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-2 col-sm-2 col-xs-12" for="first-name">Missiyamız<span class="required">*</span>
                                    </label>
                                    <div class="col-md-9 col-sm-9 col-xs-12">
                                        <input type="text" id="first-name" value="<?php echo $haqqimizdacek['haqqimizda_missiya']; ?>" name="haqqimizda_missiya" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>
                                <div style="text-align: right;" class="col-md-8 col-sm-8 col-xs-12 col-sm-offset-3">
                                    <button type="submit" name="haqqimizdakaydet" style="margin:0;" class="btn btn-primary">Güncəllə</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<!-- /page content -->

<?php include "footer.php"; ?>