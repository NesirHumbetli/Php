<?php

$haqqimizdasor = $db->prepare("SELECT * FROM haqqimizda WHERE haqqimizda_id=?");
$haqqimizdasor->execute(array(0));
$haqqimizdacek = $haqqimizdasor->fetch(PDO::FETCH_ASSOC);


?>

<div class="col-md-3">
    <aside class="sidebar">


        <h4 class="mt-xl mb-md"><?php echo $haqqimizdacek['haqqimizda_basliq']; ?></h4>
        <div class="divider divider-primary divider-small mb-xl">
            <hr>
        </div>

        <div class="embed-responsive embed-responsive-16by9 mb-xl">
            <iframe width="360" height="203" src="https://www.youtube.com/embed/<?php echo $haqqimizdacek['haqqimizda_video']; ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>

        <h4 class="mt-xl mb-md">Hədəfimiz</h4>
        <div class="divider divider-primary divider-small mb-xl">
            <hr>
        </div>
        <blockquote class="blockquote-secondary">
            <p class="font-size-lg">"<?php echo $haqqimizdacek['haqqimizda_hedef']; ?>"</p>
            <footer style="font-size: 14px">Hədəfimiz</footer>
        </blockquote>

        <h4 class="mt-xl mb-md">Missiyamız</h4>
        <div class="divider divider-primary divider-small mb-xl">
            <hr>
        </div>
        <blockquote class="blockquote-secondary">
            <p class="font-size-lg">"<?php echo $haqqimizdacek['haqqimizda_missiya']; ?>"</p>
            <footer style="font-size: 14px">Missiyamız</footer>
        </blockquote>





    </aside>
</div>