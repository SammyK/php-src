--TEST--
retry - can only be used within catch block
--FILE--
<?php
echo 'One.'.PHP_EOL;
retry 1 { echo 'Outside'.PHP_EOL; }

try {
	echo 'Two.'.PHP_EOL;
	retry 1 { echo 'In try'.PHP_EOL; }
	throw new Exception('FAIL: Two.');
} catch (Exception $e) {
	/*
	retry 1 {
		echo 'Retrying "Two".'.PHP_EOL;
		#retry 1 { echo 'In retry'.PHP_EOL; }
	}
	*/
	echo 'Three.'.PHP_EOL;
	echo $e->getMessage().PHP_EOL;
} /* finally {
	echo 'Four.'.PHP_EOL;
	retry 1 { echo 'In finally'.PHP_EOL; }
} */

echo 'Done'.PHP_EOL;
//retry 2 { echo 'Outside again...'.PHP_EOL; }

/*
try {
	throw new Exception('Oh snap!');
} catch (Exception $e) {
	retry INF { echo 'Retrying INF...'.PHP_EOL; }
	echo $e->getMessage().PHP_EOL;
}

try {
	throw new Exception('Oh snap!');
} catch (Exception $e) {
	retry "4" { echo 'Retrying STRING...'.PHP_EOL; }
	echo $e->getMessage().PHP_EOL;
}
*/
?>
--EXPECT--
We'll get there...
