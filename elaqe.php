<?php include "header.php"; ?>
<div role="main" class="main">
	<div class="container">
		<div class="row pt-xl">
			<div class="col-md-7">
				<h1 class="mt-xl mb-none" style="font-family: arial;">Bizimlə əlaqə</h1>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>
				<p class="lead mb-xl mt-lg" style="font-family: arial;">Bizimlə əlaqə saxlamaq üçün aşağıdakı cədvəli yazın.</p>

				<form action="PHPMailer/src/index.php" method="POST">
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" placeholder="Adınız" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control input-lg" name="name" id="name" required>
							</div>
							
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<input type="email" placeholder="Mail Ünvanı" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control input-lg" name="email" id="email" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<input type="text" placeholder="Mövzu" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control input-lg" name="content" id="subject" required>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="form-group">
							<div class="col-md-12">
								<textarea maxlength="5000" placeholder="Mesajınız" data-msg-required="Please enter your message." rows="5" class="form-control input-lg" name="message" id="message" required></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<input type="submit" name="mailgonder" value="Mesaj Göndər " class="btn btn-primary btn-lg mb-xlg" data-loading-text="Loading...">
						</div>
					</div>
				</form>

			</div>
			<div class="col-md-4 col-md-offset-1">

				<h4 class="mt-xl mb-none">Ünvan & Əlaqə</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<ul class="list list-icons list-icons-style-3 mt-xlg mb-xlg">
					<li><i class="fa fa-map-marker"></i> <strong>Ünvan:</strong><?php echo $ayarcek['ayar_adres']; ?><br><?php echo $ayarcek['ayar_sehr']; ?>/<?php echo $ayarcek['ayar_ray']; ?></li>
					<li><i class="fa fa-phone"></i> <strong>Telefon:</strong><?php echo $ayarcek['ayar_tel']; ?></li>
					<li><i class="fa fa-envelope"></i> <strong>Mail:</strong> <a href="mailto:<?php echo $ayarcek['ayar_mail']; ?>"><?php echo $ayarcek['ayar_mail']; ?></a></li>
				</ul>

				<h4 class="pt-xl mb-none">İş vaxtı</h4>
				<div class="divider divider-primary divider-small mb-xl">
					<hr>
				</div>

				<ul class="list list-icons list-dark mt-xlg">
					<li><i class="fa fa-clock-o"></i> <?php echo $ayarcek['ayar_isvaxt']; ?></li>
				</ul>

			</div>
		</div>
	</div>

	<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
	<div id="googlemaps" class="google-map google-map-footer">
		<iframe
		width="100%"
		height="100%"
		frameborder="0" style="border: 0"
		 src="https://www.google.com/maps/embed/v1/place?key=<?php echo $ayarcek['ayar_googlemap']; ?>&q=<?php echo $ayarcek['ayar_adres']; ?>" allowfullscreen></iframe>
	
	</div>
</div>
<?php include "footer.php"; ?>