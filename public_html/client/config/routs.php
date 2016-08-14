<?php
//all routs must define like array in routs


$routs[] = array('/','reaction'=> array(
    'controller'=>'index',
    'action'=>'index'
));

$routs[] = array('{username}','reaction'=> array(
    'controller'=>'username',
    'action'=>'index'
));

$routs[] = array('{username}/{page}','reaction'=> array(
    'controller'=>'username',
    'action'=>'page'
));




return $routs;