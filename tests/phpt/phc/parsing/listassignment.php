@ok
<?php

	// it looks like reference assignments to lists aren't allowed

	// note, weak references
	list ($a, $b) = array ("0" => "x", "1" => "y");
	var_dump ($a);
	var_dump ($b);
	echo "-------------0----------------\n";

#	// note, weak references
#	list ($a, $b) = array ("x" => "x", "y" => "y");
#	var_dump ($a);
#	var_dump ($b);
#	echo "-------------0B----------------\n";


	// a list expression evaluates to its rvalue
	list ($a, $b) = array (11, 12, 13);
	var_dump ($a);
	var_dump ($b);
	echo "-------------1----------------\n";

	// switching the values doesnt work. $a and $b are switched before the array is evaluated
	list ($a, $b) = array ($b, $a);
	var_dump ($a);
	var_dump ($b);
	echo "-------------2----------------\n";
/*
	// note this one doesnt fill the list, only an array will do that
	var_dump (list ($a, $b) = 21, 22, 23);
	var_dump ($a);
	var_dump ($b);
	echo "-------------3----------------\n";
	list(list($x, $y), list($z, $w), $a) = $arr;
	var_dump ($a);
	var_dump ($b);
	echo "-------------6----------------\n";

	list(list($x, , $z), list($z, ,$v), $a) = $arr;
	var_dump ($a);
	var_dump ($b);
	echo "-------------7----------------\n";
*/
	$arr = array ( 1, array (4,5,6,7), array (8,9,"a", array ("b", "c")));

	list($x, $y, $z) = $arr;
	var_dump ($x);
	var_dump ($y);
	var_dump ($z);
	echo "-------------4----------------\n";

	list($x, , $z) = $arr;
	var_dump ($x);
	var_dump ($y);
	var_dump ($z);
	echo "-------------5----------------\n";

	list(, $x, , $z) = $arr;
	var_dump ($x);
	var_dump ($y);
	var_dump ($z);
	echo "-------------6----------------\n";

	// isnt this an interesting feature
	list ($y, $z) = array (1,2);
	var_dump ($x);
	var_dump ($y);
	var_dump ($z);
	echo "-------------7----------------\n";

	// the php site makes an interesting point, and sullies it with an awful example
/*	$a = array();
	$info = array('coffee', 'brown', 'caffeine');
	list($a[0], $a[1], $a[2]) = $info;
	var_dump ($a);
	echo "-------------9----------------\n";

	// how about:
	list($info[2], $info[1], $info[0]) = $info;
	// it looks like it reverses the order, but it doesnt. It first overwrites
	// $info[0], then later overwrites $info[2] with the value already copied
	// from $info[2]
	var_dump ($info);*/

    $new_list = [1, 2];
    list($new_list, $tmp2) = $new_list;
    var_dump($new_list, $tmp2);

    $new_list = [1, 2];
    list($tmp1, $new_list) = $new_list;
    var_dump($new_list, $tmp1);
?>
