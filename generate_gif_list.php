<?php
$gifFolder = 'gifs/';
$gifs = glob($gifFolder . '*.gif');
$gifList = array_map(function($gif) use ($gifFolder) {
    return str_replace($gifFolder, '', $gif);
}, $gifs);

echo "const gifList = [\n";
foreach ($gifList as $gif) {
    echo "  '" . addslashes($gif) . "',\n";
}
echo "];\n";
