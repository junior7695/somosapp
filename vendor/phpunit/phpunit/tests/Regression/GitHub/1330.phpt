--TEST--
GH-1330: Allow non-ambiguous shortened longopts
--FILE--
<?php

$_SERVER['argv'][1] = '--deb';
$_SERVER['argv'][2] = '--config';
$_SERVER['argv'][3] = __DIR__ . '/1330/phpunit1330.xml';
$_SERVER['argv'][4] = 'Issue1330Test';
$_SERVER['argv'][5] = __DIR__ . '/1330/Issue1330Test.php';

require __DIR__ . '/../../bootstrap.php';
PHPUnit\TextUI\Command::main();
?>
--EXPECTF--
PHPUnit %s by Sebastian Bergmann and contributors.

Test 'Issue1330Test::testTrue' started
Test 'Issue1330Test::testTrue' ended


Time: %s, Memory: %s

OK (1 test, 1 assertion)
