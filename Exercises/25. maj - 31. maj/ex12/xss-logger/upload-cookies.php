<?php

if (!empty($_SERVER['QUERY_STRING'])) {
	# Opens file log.txt
	$log = fopen("log.txt", "a+");

	# Writes the IP of the sender and the data that was sent
	fputs($log, $_SERVER['REMOTE_ADDR'] . ": " . urldecode($_SERVER['QUERY_STRING']) . "\n");

	# Closes the file
	fclose($log);
}