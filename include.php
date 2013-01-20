<?php
include 'includes/simple_html_dom.php';

$link = new mysqli('localhost', 'root', 'crypto', 'codeinc');
$repo = $_GET['repo_url'];
$file = $_GET['repo_file'];
$beg = $_GET['beg'];
$end = $_GET['end'];
$html = file_get_html($repo);
$filecontent = file_get_html($file);
$element = $filecontent->find("body");
$wrapper = $element->children();
$wrapper = $wrapper[0];
$main = $wrapper->children();
$main = $main[1];
$hentry = $main->children(2);
$hentry = $hentry[1];
$container = $hentry->children();
$container = $container[1];
$slider = $container->children();
$slider = $slider[0];
$frames = $slider->children();
$frames = $frames[1];
$frame = $frames->first_child();
$files = $frame->first_child();
$data = $files->last_child();
$table = $data->first_child();
$tbody = $tbody->first_child();
$tr = $tbody->first_child();
$td = $tr->last_child();
$maindiv = $td->first_child();
$pre = $maindiv->first_child();
$lines = $pre->children();
$i = 0;
$str='';
foreach($lines as $line){
	if($i>=$beg && $i<=$end)
		$str += $line;
}
echo $str;

?>
