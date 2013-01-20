<?php

include 'include.php';

function track($repo){
	$main = file_get_html($repo);
	$element = $filecontent->find("body");
	$wrapper = $element->children();
	$wrapper = $wrapper[1];
	$commitid = $wrapper->children(1)->children(2)->children()->children(2)->children(1)->children(2)->first_child()->first_child()->last_child()->children(2)->children();
	$commitid = file_get_contents($commitid);
	return $commitid;
}

function update_info($repo){
	$sql = "SELECT repoid FROM repo_list WHERE repo_url = '$repo'";
	$repoid= $link->query($sql);
	$sql="SELECT * FROM files WHERE repoid='$repoid'";
	$files=$link->query($sql); 
	$new_version= track($repo);
	$sql="UPDATE files SET version_sha1='$new_version' WHERE repoid='$repoid'";
	$update = $link->query($sql);
	foreach($files as $file){
		$id=$file->file_id;
		$check= track_file($file->file_url, $id);
	}
}

function track_file($file_url, $id){
	$lines1= file_get_contents($lines);
	$l=sha1($lines1);
	$sql= "SELECT * FROM track WHERE file_id='$id'";
	$sha= $link->query($sql);
	$sha=$sha->fetch_object();
	$sha= $sha->file_sha();
	if($l==$sha)
		return "";
	else
		return $lines1;
}

?>