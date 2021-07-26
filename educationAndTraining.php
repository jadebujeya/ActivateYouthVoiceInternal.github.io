<?php
	include_once 'head.php';
?>


<h2>Education and Training Opertunities</h2>
<p>
This is intended as a centralised location to post any training or personal devellopment oppertunities anyone stubles accross and thinks are worth shring, but that we are not orgainising to do as a group. 
</p>

<form action="user_written_content/education_and_training/upload.php" enctype="multipart/form-data">
  <fieldset>
    <legend>Personalia:</legend>
    <label for="fname">First name:</label><br>
    <input type="text" id="fname" name="fname" value="John"><br>
    <label for="lname">Include File:</label><br>
    <input type="file" name="file"><br><br>
    <button type="submit" name="submit">Upload</button>
  </fieldset>
</form>


<?php 
include_once 'foot.php';
?>
