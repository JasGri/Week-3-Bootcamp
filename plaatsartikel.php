<?PHP

$file_contents = fopen( "blog.txt", "r" );
fprint($file_contents);
fprint($file_contents);
fclose($file_contents);

?>
