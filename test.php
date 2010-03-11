<?php
/*
 * Copyright (c) 2010 Snaptic, Inc
 *
 * Permission to use, copy, modify, and distribute this software for any
 * purpose with or without fee is hereby granted, provided that the above
 * copyright notice and this permission notice appear in all copies.
 *
 * THE SOFTWARE IS PROVIDED "AS IS" AND THE AUTHOR DISCLAIMS ALL WARRANTIES
 * WITH REGARD TO THIS SOFTWARE INCLUDING ALL IMPLIED WARRANTIES OF
 * MERCHANTABILITY AND FITNESS. IN NO EVENT SHALL THE AUTHOR BE LIABLE FOR
 * ANY SPECIAL, DIRECT, INDIRECT, OR CONSEQUENTIAL DAMAGES OR ANY DAMAGES
 * WHATSOEVER RESULTING FROM LOSS OF USE, DATA OR PROFITS, WHETHER IN AN
 * ACTION OF CONTRACT, NEGLIGENCE OR OTHER TORTIOUS ACTION, ARISING OUT OF
 * OR IN CONNECTION WITH THE USE OR PERFORMANCE OF THIS SOFTWARE.
 *
 * http://snaptic.com PHP library
 * Requires a PHP compiled with CURL and JSON (default after 5.2.0)
 *
 * By Niall O'Higgins <niallo@snaptic.com> 2010-03-10
 */

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
