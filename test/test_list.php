<?php
include '../src/UserAgentInfo.php';

if(php_sapi_name()!='cli') echo '<pre>';
$list=fopen(__DIR__.'/useragent_list.txt', 'r');
if(!$list) throw new Exception('missing test file');
$t=microtime(true);
$count=0;
while(is_string($userAgent=fgets($list))){
    ++$count;
    $ua=new UserAgentInfo($userAgent);
    echo ($ua->getOS()[0]??'--')."\t".($ua->getOS()[1]??'')."\t".($ua->getBrowser()[0]??'--')."\t".($ua->getBrowser()[1]??'')."\t".trim($ua->getUserAgent())."\n";
}
echo "\n".'Items: '.$count.' Time: '.(microtime(true)-$t);
