<?php
include "header.php";

if (isset($_POST['axtaran']) || isset($_GET['axtarilan'])) {

    if(isset($_POST['axtaran'])) {
        $axtarilan = $_POST['axtarilan'];
    } elseif (isset($_GET['axtarilan'])) {
        $axtarilan = $_GET['axtarilan'];
    }
    
    $searchsor = $db->prepare("SELECT * FROM mezmun WHERE mezmun_ad LIKE :axtarilan");
    $searchsor->execute(array(
        ':axtarilan' => "%$axtarilan%"
    ));

    $say = $searchsor->rowCount();


?>

    <div role="main" class="main">
        <div class="container">
            <div class="row pt-xl">

                <div class="col-md-9">

                    <h1 class="mt-xl mb-none">Axtarış Nəticəsi</h1>
                    <div class="divider divider-primary divider-small mb-xl">
                        <hr>
                    </div>
                    <div class="row">

                        <?php
                        if ($say == 0) { ?>

                            <div class="col-md-7">
                                <p><b><?php echo $axtarilan ?></b> ilə bağlı məlumat tapılmadı...</p>
                            </div>
                        <?php }   ?>
                    </div>

                    <div class="row">
                        <?php

                        ?>
                        <!-- START -->
                        <?php
                        $view = 2;
                        $mezmunsay = $db->prepare("SELECT * FROM mezmun");
                        $mezmunsay->execute();
                        $say = $mezmunsay->rowCount();
                        $sayfasay = ceil($say / $view);
                        $sayfa = isset($_GET['sayfa']) ? (int) $_GET['sayfa'] : 1;
                        if ($sayfa < 1) $sayfa = 1;
                        if ($sayfa > $sayfasay) $sayfa = $sayfasay;

                        $limit = ($sayfa - 1) * $view;

                        $mezmunsor = $db->prepare("SELECT * FROM mezmun WHERE mezmun_ad LIKE :axtarilan ORDER BY mezmun_zaman DESC LIMIT $limit,$view");
                        $mezmunsor->execute(array(
                            ':axtarilan' => "%$axtarilan%"
                        ));

                        while ($mezmuncek = $mezmunsor->fetch(PDO::FETCH_ASSOC)) { ?>

                            <div class="col-md-12">
                                <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                                    <span class="thumb-info-side-image-wrapper p-none">
                                        <img src="<?php echo $mezmuncek['mezmun_resimyol'] ?>" class="img-responsive" alt="" style="width: 400px;height: 250px;padding: 10px;">
                                    </span>
                                    <div class="col-md-6">
                                        <div class="" style="font-size: 15px;">

                                            <h2 style="font-size: 30px;" class="mb-md mt-xs"><?php echo $mezmuncek['mezmun_ad']; ?></h2>

                                            <p><?php echo substr($mezmuncek['mezmun_movzu'], 0, 200) ?></p>
                                            <a class="mt-md" href="xeberler-<?php echo seo($mezmuncek['mezmun_ad'] . "-" . $mezmuncek['mezmun_id']); ?>">Ardını Oxu <i class="fa fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                </span>
                            </div>

                        <?php } ?>
                        <!-- FINISH -->
                    </div>

                    <?php
                    if ($mezmunsor->rowCount() > 1) { ?>
                        <div style="text-align: right;" class="row col-md-12">
                            <ul class="pagination">
                                <?php

                                $nom = 0;
                                while ($nom < $sayfasay) {
                                    $nom++; ?>

                                    <?php
                                    if ($nom == $sayfa) { ?>

                                        <li class="active"><a href="xeberler.php?sayfa=<?php echo $nom; ?>"><?php echo $nom ?></a></li>

                                    <?php } else { ?>

                                        <li><a href="xeberler.php?sayfa=<?php echo $nom; ?>"><?php echo $nom ?></a></li>

                                    <?php } ?>


                                <?php } ?>
                            </ul>

                        </div>
                    <?php } ?>
                </div>

                <!-- SIDEBAR -->

                <?php include "rightbar.php"; ?>
            </div>
        </div>


    </div>
<?php }else {

    Header("Location:anaseyfe");
} ?>
<?php include "footer.php"; ?>