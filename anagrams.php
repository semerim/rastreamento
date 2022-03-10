<?php

$qs_w = isset($_REQUEST["w"]) ? $_REQUEST["w"] : "";

if ($qs_w == "")
		exit ("Invalid word");
// --------------------------------------------------------

function anagrams ($w) {

$arrWords = array();
$arrAnagrams = array();

$handle = fopen("wl.txt", "r");
if ($handle) {
    while (($line = fgets($handle)) !== false) {
        // process the line read.
		// echo $line . '<br>';
		$arrWords[] = trim ($line);
    }
} else {
    // error opening the file.
}  
fclose($handle);

// --------------------------------------------------------

echo 'Palavra: ' . $w . '<br>';

foreach ($arrWords as $word1) {

	// echo $w . ' - ' . $word1 . '<br>';
	
	if ((isAnagram ($w, $word1))) {
		$arrAnagrams[] = $word1;
		// echo $w . ' - ' . $word1 . '<br>';
	}
}

$strAnagrams = implode ($arrAnagrams, ',');

return $strAnagrams;

}

// --------------------------------------------------------

function isAnagram ($word1, $word2) {

// echo 'Word1: ' . $word1;
// echo 'Word2: ' . $word2;

if (strlen ($word1) != strlen ($word2))
	return false;

$arr1 = str_split ($word1);
sort ($arr1);
$word1_2 = implode ($arr1, '');

$arr2 = str_split ($word2);
sort ($arr2);
$word2_2 = implode ($arr2, '');



// echo count (array_diff ($arr1, $arr2));

if (count ($arr1) != count ($arr2))
	return false;

if ($word1_2 == $word2_2)
	return true;

/*
if (count (array_diff ($arr1, $arr2)) > 0)
	return false;
*/


return false;

}


// ---------------------------------------------------------------------------------------

/*
if (isAnagram ('abba', 'aabb'))
	echo 'SIM<BR>';
else
	echo 'NÃO<BR>';
*/

echo 'Anagramas: ' . anagrams ($qs_w);


?>





