<?php
include '../src/UserAgentInfo.php';

$my=UserAgentInfo::my();
echo '<h1>'.$my->getUserAgent().'</h1><h2>OS: '.implode(' ', $my->getOS()??['N/R']).'</h2><h2>Browser: '.implode(' ', $my->getBrowser()??['N/R']).'</h2>';
