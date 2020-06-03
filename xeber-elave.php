<?php
include "header.php";

$mezmunsor = $db->prepare("SELECT * FROM mezmun WHERE mezmun_id=:id");
$mezmunsor->execute(array(
    ':id' => $_GET['mezmun_id']
));
$mezmuncek = $mezmunsor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">

            <div class="col-md-9">

                <h1 class="mt-xl mb-none"><?php echo $mezmuncek['mezmun_ad']; ?></h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <div class="row">

                    <!-- START -->
                    <div class="col-md-12">
                        <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                            <div class="col-md-12">
                                <p style="font-size: 16px!important;"><img src="<?php echo $mezmuncek['mezmun_resimyol'] ?>" class="img-responsive" alt="newsphoto" style="float:left;width: 400px;height: 250px;padding: 10px;margin:16px 10px 5px 0;"><?php echo $mezmuncek['mezmun_movzu']; ?></p>
                                <hr>
                                <p style="font-size: 15px"><b>Axtar Açar Sözlər : </b>

                                    <?php

                                    $etiketler = explode(',', $mezmuncek['mezmun_keyword']);

                                    foreach ($etiketler as $etiketyaz) { ?>
                                        <?php
                                        $color = rand(1, 4);
                                        switch ($color) {
                                            case '1':
                                                $boya = "danger";
                                                break;
                                            case '2':
                                                $boya = "primary";
                                                break;
                                            case '3':
                                                $boya = "warning";
                                                break;
                                            case '4':
                                                $boya = "info";
                                                break;
                                            default:
                                                $boya = "dark";
                                                break;
                                        }

                                        ?>

                                        <a href="axtar?axtarilan=<?php echo $etiketyaz; ?>"><button class="btn btn-<?php echo $boya;?> btn-xs"><?php echo $etiketyaz; ?></button></a>
                                    <?php } ?>

                                </p>
                            </div>
                        </span>
                    </div>
                    <!-- FINISH -->

                </div>

            </div>

            <!-- SIDEBAR -->

            <?php include "rightbar.php"; ?>
        </div>

    </div>
</div>

<?php include "footer.php"; ?>