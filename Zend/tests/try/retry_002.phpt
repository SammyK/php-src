--TEST--
retry - basic functionality within embedded contexts
--FILE--
<?php
try {
	echo 'Trying L1'.PHP_EOL;
	throw new Exception('FAIL: L1');
} catch (Exception $e) {
	try {
		echo 'Trying L2'.PHP_EOL;
		throw new Exception('FAIL: L2');
	} catch (Exception $e2) {
		retry 2 { echo 'Retrying L2...'.PHP_EOL; }
		echo $e2->getMessage().PHP_EOL;
	}
	retry 2 { echo 'Retrying L1...'.PHP_EOL; }
	echo $e->getMessage().PHP_EOL;
}

echo PHP_EOL;

try {
	echo 'Trying a thing...'.PHP_EOL;
	throw new Exception('Oh snap! Could not do thing');
} catch (Exception $e) {
	retry 2 {
		try {
			echo 'Retrying another thing... '.PHP_EOL;
			throw new Exception('Throw in retry!');
		} catch (Exception $e2) {
			retry 2 { echo 'Retry the other thing...'.PHP_EOL; }
			echo $e2->getMessage().PHP_EOL;
		}
	}
	echo $e->getMessage().PHP_EOL;
}

echo PHP_EOL;

try {
	echo 'Trying one more thing...'.PHP_EOL;
	throw new Exception('FAIL: Doing last thing');
} catch (Exception $e) {
	retry 2 {
		throw new Exception('This should not be caught');
	}
	echo $e->getMessage().PHP_EOL;
}
?>
--EXPECT--
We'll get there...
