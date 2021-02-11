<?
ini_set('memory_limit', -1);
set_time_limit(0);

$Directory = new RecursiveDirectoryIterator($_SERVER['DOCUMENT_ROOT']);
$Iterator = new RecursiveIteratorIterator($Directory);
$Regex = new RegexIterator($Iterator, '/^.+\.php$/i', RecursiveRegexIterator::GET_MATCH);

foreach($Regex as $name => $object){
	$data = file_get_contents($name);
	if(preg_match('/item_favorite/', $data))
		echo "$name", '<br>';
}


?>