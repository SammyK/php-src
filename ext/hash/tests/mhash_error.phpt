--TEST--
Test mhash() function : error conditions 
--SKIPIF--
<?php include "skip_mhash.inc"; ?>
--FILE--
<?php

$data = 'This is test data to hash';

echo "\n-- Testing mhash() function with empty key --\n";
var_dump(mhash(MHASH_SHA256, $data, ''));
var_dump(mhash(MHASH_SHA256, $data, null));

?>
===Done===
--EXPECTF--
-- Testing mhash() function with empty key --

Warning: mhash(): HMAC requested without a key in %s on line %d
bool(false)

Warning: mhash(): HMAC requested without a key in %s on line %d
bool(false)
===Done===