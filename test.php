<?php

require_once('snaptic.php');

$snaptic = new Snaptic('username', 'password');
$notes = $snaptic->getNotes();

foreach ($notes->notes as $note) {
	print $note->created_at;
	print $note->tag;
}

$myfirstnote = "my first note!! hello #world!!";

print $snaptic->postNote($myfirstnote);

?>
