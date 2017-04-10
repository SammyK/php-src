--TEST--
retry - basic functionality for retry keyword
--FILE--
<?php

try {
	echo 'Trying Example 1'.PHP_EOL;
	#retry 3 { echo 'Should not be executed'.PHP_EOL; }
	throw new Exception('Oh snap!');
} catch (Exception $e) {
	#retry 3 { echo 'Retrying Example 1'.PHP_EOL; }
	echo $e->getMessage().PHP_EOL;
} finally {
	retry 3 { echo 'Retrying Example 1'.PHP_EOL; }
	echo 'Bye!'.PHP_EOL;
}

echo PHP_EOL;

/*
$tries = 0;
try {
	echo 'Trying Example 2'.PHP_EOL;
	throw new Exception('Oh snap!');
} catch (Exception $e) {
	retry {
		if (3 === $tries) break;
		echo 'Retrying Example 2'.PHP_EOL;
	}
	echo $e->getMessage().PHP_EOL;
}

/*
try {
	echo 'Trying Example 2'.PHP_EOL;
	throw new Exception('Oh snap '.__LINE__);
} catch (Exception $e) {
	try {
		throw new Exception('Oh snap '.__LINE__);
	} catch (Exception $e) {
		retry { echo 'retry '.__LINE__.PHP_EOL; }
		echo $e->getMessage().PHP_EOL;
	}
	retry 5 { echo 'retry '.__LINE__.PHP_EOL; }
	echo $e->getMessage().PHP_EOL;
}
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
