<?php

// Open a socket
if (!($fp = fsockopen('ssl://imap.gmail.com', 993, $errno, $errstr, 15))) die("Could not connect to host");

// Set timout to 1 second
if (!stream_set_timeout($fp, 1)) die("Could not set timeout");

// Fetch first line of response and echo it
echo fgets($fp);

// Send data to server
echo "Writing data...";
fwrite($fp, "C01 CAPABILITY\r\n");
echo " Done\r\n";

// Keep fetching lines until response code is correct
while ($line = fgets($fp)) {
    echo $line;
    $line = preg_split('/\s+/', $line, 0, PREG_SPLIT_NO_EMPTY);
    $code = $line[0];
    if (strtoupper($code) == 'C01') {
        break;
    }
}

echo "<br/>I've finished!";