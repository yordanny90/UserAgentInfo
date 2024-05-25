<?php
set_include_path(__DIR__.'/../src');
spl_autoload_extensions('.php');
spl_autoload_register();

$my=UserAgentInfo::my();
echo '<h1>'.$my->getUserAgent().'</h1><h2>OS: '.implode(' ', $my->getOS()??['N/R']).'</h2><h2>Browser: '.implode(' ', $my->getBrowser()??['N/R']).'</h2>';
