--TEST--
json_decode() - depth error
--CREDITS--
Sammy Kaye Powers me@sammyk.me
# TestFest Chicago PHP UG 2017-07-19
--SKIPIF--
<?php if (!extension_loaded('json')) die('skip ext/json required'); ?>
--FILE--
<?php
var_dump(json_decode('[]', true, 0));
?>
--EXPECTF--
Warning: json_decode(): Depth must be greater than zero in %s on line %d
NULL
