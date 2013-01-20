<?php
include 'include.php';

$paste= $_GET['paste'];
$sql= "INSERT INTO pastes (paste_id, content) VALUES ('','$paste1')";
$ins= $link->query($sql);

?>