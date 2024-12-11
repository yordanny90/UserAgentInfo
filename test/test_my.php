<?php
include '../src/UserAgentInfo.php';

$my=UserAgentInfo::my();
echo '<h1>'.UserAgentInfo::me().'</h1><h2>'.UserAgentInfo::explain_me()->text_D().'</h2>';
