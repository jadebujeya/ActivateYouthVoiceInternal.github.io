<?php
	include_once 'head.php';
?>


<h2>Welcome!</h2>
<p>
Hi Everyone!
<br>
This is an internal website for us to share documents and other information amoungst ourselves. At this stage, it's not intended to be shared with clients anyone outside of AYV, although once we've got the style and setup sorted out, it shouldn't be to hard to use the same style settings to create a website for clients. Please feel free to have a look around. The site is still pretty rudimentary at the moment, but I've included a list of known problems and things I'd like to try and fix or add for the next update at the bottom on this page. If you find or think of anything that's not on it, please email me to let me know. Obviously, I'm mostly learning this as I go, so some things will be a bit beyond my abilities for a while yet, but it's impritant to have aspirations!
<br>
</p>


<h3>Useful Links</h3>
<p class="googleDocsList">
<a href="https://wehearyouth.slack.com/" src="wehearyouth.slack.com">Chat on Slack</a>
</p>


<form action="user_written_content/it_suggestions/web_suggestions.inc.php" method="POST" autocomplete="on">
	<label for="postSuggestions"><h3>Suggest an Improvement for the Website:</h3></label>
	<textarea id="postSuggestions" name="postSuggestions" rows="10" cols="30">Type suggestions here.</textarea>
	<br>
	<button type="submit" name="submit">Submit</button>
</form>
<?php
		if(isset($_GET["error"])){
			if($_GET["error"]=="emptysuggestion"){
				echo "<p>There was nothing in your suggestion!</p>";	
			}
		else if($_GET["error"]=="stmtfailedPostingSuggestion"){
				echo "<p>Error: connection lost while posting suggestion. If problem persists consult IT support.</p>";	
			}
		else if($_GET["error"]=="none"){
				echo "<p>Your suggestion was posted!</p>";
			} 
		}
		
		?>
		
<?php
	include_once 'user_written_content/it_suggestions/dbh.inc.php';
	$sql = "SELECT * FROM suggestions;";
	$result = mysqli_query($conn, $sql);
	$resultCheck = mysqli_num_rows($result);
	
	if ($resultCheck >0){
		echo "<div style=\"color: black; padding: 5px; margin: 15px; border: 2px solid black; background-color: rgba(228,195,226,0.5)\">";
		while($row = mysqli_fetch_assoc($result)) {
			echo "<div style=\"color: #333333\">" . $row['suggestionsUser'] . "</div> <div style=\"color: rgba(104,74,144,255)\">" . $row['suggestionsTime'] . "</div>" . $row['suggestionsText'] . "<br><br>";
		}
		echo "</div>";
	}
?>

		

<?php 
include_once 'foot.php';
?>
