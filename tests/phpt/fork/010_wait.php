@ok
<?php
require_once 'polyfills.php';

function my_usleep ($t) {
  $end_time = microtime (true) + $t * 1e-6;
  while (microtime (true) < $end_time) {
    sched_yield();
    usleep (min (($end_time - microtime (true)) * 1e6 + 1000, 77777));
  }
}

$x = fork (my_usleep (3000000));

function wait_x ($x) {
  $ok = true;
#ifndef KittenPHP
  if (false)
#endif
  for ($i = 0; $i < 6; $i++) {
    $res = wait ($x, 0.5);
    if ($res ^ ($i == 5)) {
      echo "ERROR! $i\n";
      $ok = false;
    }
  }
  if ($ok) {
    echo "OK\n";
  }
}

wait_x ($x);

function run () {
  $y = fork (my_usleep (3000000));
  $z = fork (wait_x ($y));
  $t = wait ($z);
}

run();

wait_result (fork (run()));
