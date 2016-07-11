<?php

function score_evaluate_comment($author_uid, $entry_uid, $comment) {
	if ($author_uid != $entry_uid) {
		$text_length = strlen(util_sanitize($comment));
		if ($text_length > 300) { // Elaborate comments
			return 3;
		}
		else if ($text_length > 100) { // Interesting comments
			return 2;
		}
		else { // Short comments
			return 1;
		}
	}
	else {
		return 0;
	}
}

function score_comments_given($db, $uid) { 
	return db_select_single_value($db, "SELECT SUM(score) FROM comment WHERE uid_author = '$uid' AND uid_entry != '$uid'");
}

function score_comments_received($db, $uid) { 
	return db_select_single_value($db, "SELECT SUM(score) FROM comment WHERE uid_entry = '$uid' AND uid_author != '$uid'");
}

function score_coolness($given, $received) {
	return $given - $received;
}

function score_average($comments) {
	$total = 0;
	$count = 0;
	foreach ($comments as $comment) {
		$total += $comment['score'];
		$count++;
	}
	return round(1. * $total / $count, 2);
}


?>