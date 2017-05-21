--TEST--
Retry the try block n times
--FILE--
<?php
try {
	echo "Trying\n";
	throw new Exception('Failed!');
} retry 3 => $attempts (Exception $e) {
	echo "Retying #{$attempts}\n";
	echo $e->getMessage() . "\n";
} catch(Exception $e) {
	echo $e->getMessage() . "\n";
}
?>
--EXPECT--
Trying
Retying #1
Trying
Retying #2
Trying
Retying #3
Trying
Failed!
