<?php
include '../src/UserAgentInfo.php';

if(php_sapi_name()!='cli') echo '<pre>';
$list=fopen(__DIR__.'/useragent_list.txt', 'r');
if(!$list) throw new Exception('missing test file');
$t=microtime(true);
$count=0;
while(is_string($userAgent=fgets($list))){
    ++$count;
    $ua=UserAgentInfo::explain($userAgent);
    echo $ua->text_D()."\t".trim($ua->userAgent())."\n";
}
echo "\n".'Items: '.$count.' Time: '.(microtime(true)-$t);
