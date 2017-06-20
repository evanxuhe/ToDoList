<?php

# returns the relative path of the database folder
function dbpath($login) {
	return "2doDB/$login";
}
function readinfo($login) {
	return file(dbpath($login."/info.txt"),FILE_IGNORE_NEW_LINES);
}
# returns the first name of the user of login $login
function get_name($login) {
	$content = file(dbpath($login)."/info.txt",FILE_IGNORE_NEW_LINES);
    return $content[1];
}

# extract the note id (a number) from the file path
# of the file. For example, note_id("2doDB/marc/notes/3") returns "3"
function note_id($note_file) {
	$key=explode("/",$note_file);
	return $key[3];
    
}

# returns the title of the $note array
function get_title($note) {
     return $note[0];

}

# returns the date of the $note array
function get_date($note) {
     return $note[1];

}

?>
