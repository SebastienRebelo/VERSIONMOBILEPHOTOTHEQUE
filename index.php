 <?php include('html/header.html'); ?>
<?php
  if(!empty($_FILES)) {
    require("imgClass.php");
    $img = $_FILES['upload'];
    $ext = strtolower(substr($img['name'],-3));
    $allow_ext = array("jpg","png","gif");
    if(in_array($ext,$allow_ext)) {
      move_uploaded_file($img['tmp_name'],"imgbd/".$img['name']);
      Img::creerMin("imgbd/".$img['name'],"imgbd/min",$img['name'],340,220);
      Img::convertirJPG("imgbd/".$img['name']);
    } else {
      $erreur ="Votre fichier n'est pas une image.";
    }
  }
?>
  <main>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" class="form-control" id="recipient-name">
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Message:</label>
            <textarea class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>


	<div class="container-fluid">

	<?php
	  $dos = "imgbd/min";
	  $dir = opendir($dos);
	  while($file = readdir($dir)){
	    $allow_ext = array("jpg","png","gif");
	    $ext = strtolower(substr($file,-3));
	    if(in_array($ext,$allow_ext)) {
	      ?>
					<div class="margin_img">
						<a href="imgbd/<?php echo $file; ?>">
							<img class="boxshadow" src="imgbd/min/<?php echo $file; ?>">
						</a>
					<h3 class="margin_txt"> <?php echo strtolower(substr($file,0,-4)) ?></h3>
          </div>

	      <?php
	    }
	  }
		?>

<?php
  if(isset($erreur)) {
    echo $erreur;
  }
?>
  <!-- <form method="POST" action="#" enctype="multipart/form-data">
      <input type="file" class="test_input">
      <input type="submit" class="test_input2" />
  </form> -->
  </main>

<?php include("html/footer.html"); ?>
