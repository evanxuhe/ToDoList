<?php
session_start();
$login = $_SESSION["login"];
include ("include/util.php");
$login_info = readinfo($login);
?>
<!DOCTYPE html>
<html>
  <head>
    <title>2DO</title>
    <meta charset="utf-8" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
  </head>
<body>
	
	<div id="top_banner">
		<form method="post" action="add_note.php">
			<div id="left_banner">
				<img src="images/note-pad-pencil.jpg" alt="Notepad" />
				<span class="left"><?=get_name($login)?><span id="logo">2DO</span> notes</span>
			</div>
			<div class="right">
				<input class="button right" type="submit" value="Add note" title="add a new note"/>
				<input class="right" type="text" name="note_title" />
				<div>Enter the title of your new note here</div>
			</div>
		</form>
	</div>
	
	<div id="content">

		<?php 
		
		$login_notes = glob(dbpath($login)."/notes/*");
		foreach ($login_notes as $note_file) { 
			$note=file($note_file,FILE_IGNORE_NEW_LINES);
			?>

				<form class="list left" action="perform_action.php" method="post">	
					<input type="hidden" name="todo_id" value= <?=note_id($note_file)?> />
						<div class="note_title" title="<?= get_date($note)?>">
						<?= get_title($note)?>    <input class="button right" type="submit" name="delete_note" value="X" title="delete this note"/>
						</div>	
						<ul>
							<?php for($i=2;$i<count($note);$i++) {?>
									<li><span class="todo"><?=$note[$i]?></span></li>
							<?php }?>
						</ul>
						<div>
					
						<input class ='left text_input' type="text" name="new_todo" />
						<input class ='right button' type="submit" name="add_todo" value="+" title="add a todo"/>
					</div>	
				</form>

		<?php }?>

	
</div>
</body>
</html>