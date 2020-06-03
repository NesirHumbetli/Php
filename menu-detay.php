<?php
include "header.php";

$menusor = $db->prepare("SELECT * FROM menu WHERE menu_id=:id");
$menusor->execute(array(
    ':id' => $_GET['menu_id']
));
$menucek = $menusor->fetch(PDO::FETCH_ASSOC);
?>

<div role="main" class="main">
    <div class="container">
        <div class="row pt-xl">

            <div class="col-md-9">

                <h1 class="mt-xl mb-none"><?php echo $menucek['menu_ad']; ?></h1>
                <div class="divider divider-primary divider-small mb-xl">
                    <hr>
                </div>

                <div class="row">

                    <!-- START -->
                    <div class="col-md-12">
                        
                        <span class="thumb-info thumb-info-side-image thumb-info-no-zoom mt-xl">
                            <div class="col-md-12">
                                <div class="" style="font-size: 15px;">


                                    <p style="font-size: 12px"><?php echo $menucek['menu_detay']; ?></p>
                                    
                                </div>
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