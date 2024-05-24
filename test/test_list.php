<?php
set_include_path(__DIR__.'/../src');
spl_autoload_extensions('.php');
spl_autoload_register();

if(php_sapi_name()!='cli') echo '<pre>';
$list=fopen(__DIR__.'/useragent_list.txt', 'r');
if(!$list) throw new Exception('missing test file');
while(is_string($userAgent=fgets($list))){
    $ua=new UserAgentInfo($userAgent);
    echo "OS: ".implode(' ', $ua->getOS()??['N/R'])."\tBrowser: ".implode(' ', $ua->getBrowser()??['N/R'])."\n";
}