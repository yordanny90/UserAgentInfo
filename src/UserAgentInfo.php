<?php

/**
 * Repositorio {@link https://github.com/yordanny90/UserAgentInfo}
 * Basado principalmente en los ejemplos y el funcionamiento de {@link https://useragentstring.com/}
 */
class UserAgentInfo{

    /**
     * Parte de una expresión regular
     *
     * Lista de arquitecturas
     * @var string
     */
    public static $prefix_sufix_os='x86|x64|x86_64|ia64|i86pc|i\d86|ppc|cpu|amd|amd64|sparc64|sun4u|intel|arm\w*';
    public static $OS_valids=[
        'windows'=>'Windows',
        'windows nt 10.0'=>'Windows 10',
        'windows nt 6.3'=>'Windows 8.1',
        'windows nt 6.2'=>'Windows 8',
        'windows nt 6.1'=>'Windows 7',
        'windows nt 6.0'=>'Windows Vista',
        'windows nt 6'=>'Windows Vista',
        'windows nt 5.2'=>'Windows Server 2003',
        'windows nt 5.1'=>'Windows XP',
        'windows nt 5.0'=>'Windows 2000',
        'windows 2000'=>'Windows 2000',
        'windows nt'=>'Windows NT',
        'winnt4.0'=>'Windows NT',
        'winnt3.51'=>'Windows NT',
        'windows xp'=>'Windows XP',
        'windows me'=>'Windows ME',
        'win 9x 4.90'=>'Windows ME',
        'win98'=>'Windows 98',
        'windows 98'=>'Windows 98',
        'win95'=>'Windows 95',
        'windows 95'=>'Windows 95',
        'win16'=>'Windows',
        'win32'=>'Windows',
        'windows ce'=>'Windows CE',
        'windows phone'=>'Windows Phone',
        'windows phone os'=>'Windows Phone',
        'windows mobile'=>'Windows Mobile',
        'cygwin'=>'Windows',
        'winnt'=>'Windows',
        'iphone'=>'iOS',
        'os like mac os x'=>'iOS',
        'iphone os like mac os x'=>'iOS',
        'ipod'=>'iOS',
        'ipad'=>'iOS',
        'darwin'=>'Darwin',
        'macintosh'=>'Macintosh',
        'mac os'=>'Macintosh',
        'mac os x'=>'Mac OS X',
        'mac osx'=>'Mac OS X',
        'mac os x mach-o'=>'Mac OS X',
        'mac os x leopard'=>'Mac OS X',
        'mac_powerpc'=>'Macintosh',
        'mac_powerpc mac os'=>'Macintosh',
        'mac_68k'=>'Mac 68K emulator',
        '68k'=>'Mac 68K emulator',
        'amigaos'=>'AmigaOS',
        'blackberry'=>'BlackBerry',
        'bb10'=>'BlackBerry BB10',
        'rim tablet os'=>'BlackBerry Tablet OS',
        'linux/smarttv'=>'Smart TV',
        'symbos'=>'Symbian OS',
        'symbianos'=>'Symbian OS',
        'series 60'=>'Symbian OS',
        'webos'=>'Mobile',
        'debian sid'=>'Debian',
        'android'=>'Android',
        'linux'=>'Linux',
        'arch linux'=>'Linux',
        'linux mint'=>'Linux Mint',
        'linux gentoo'=>'Linux Gentoo',
        'slackware'=>'Slackware',
        'maemo'=>'Linux',
        'cros'=>'Chrome OS',
        'beos'=>'BeOS',
        'j2me'=>'Java Platform',
        'j2me/midp'=>'Java Platform',
        'j2me/iphone'=>'Java Platform',
        'profile/midp'=>'Java Platform',
        'opensolaris'=>'OpenSolaris',
        'sunos'=>'Solaris',
        'netbsd'=>'NetBSD',
        'syllable'=>'Syllable',
        'dragonfly'=>'DragonFly BSD',
        'meego'=>'MeeGo',
        'fedora'=>'Fedora',
        'centos'=>'CentOS',
        'suse'=>'SUSE',
        'debian'=>'Debian',
        'mandriva'=>'Mandriva',
        'ubuntu'=>'Ubuntu',
        'kubuntu'=>'Kubuntu',
        'freebsd'=>'FreeBSD',
        'openbsd'=>'OpenBSD',
        'opensuse'=>'openSUSE',
        'redhat'=>'Red Hat',
        'red hat'=>'Red Hat',
    ];
    public static $browser_valids=[
        'chrome'=>'Google Chrome',
        'chromeplus'=>'ChromePlus',
        'crios'=>'Google Chrome',
        'chromium'=>'Chromium',
        'msie'=>'Internet Explorer',
        'trident'=>'Internet Explorer',
        'iemobile'=>'Internet Explorer Mobile',
        'firefox'=>'Firefox',
        'fxios'=>'Firefox',
        'gecko/firefox'=>'Firefox',
        'edgios'=>'Microsoft Edge',
        'edg'=>'Microsoft Edge',
        'edge'=>'Microsoft Edge',
        'opr'=>'Opera',
        'opera'=>'Opera',
        'opera mini'=>'Opera Mini',
        'opera mobi'=>'Opera Mobile',
        'opt'=>'Opera Touch',
        'safari'=>'Safari',
        # Otros browsers
        'googlebot'=>'Googlebot',
        'ucbrowser'=>'UCBrowser',
        'fennec'=>'Fennec',
        'huaweibrowser'=>'Huawei Browser',
        'samsungbrowser'=>'Samsung Browser',
        'browserng'=>'Nokia Browser',
        'nokiabrowser'=>'Nokia Browser',
        'iron'=>'SRWare Iron',
        'icecat'=>'IceCat',
        'iceweasel'=>'Iceweasel',
        'kazehakase'=>'Kazehakase',
        'minimo'=>'Mini Mozilla',
        'lunascape'=>'Lunascape',
        'rekonq'=>'Rekonq',
        'shiira'=>'Shiira',
        'arora'=>'Arora',
        'netscape'=>'Netscape',
        'netscape6'=>'Netscape',
        'maxthon'=>'Maxthon',
        'konqueror'=>'Konqueror',
        'conkeror'=>'Conkeror',
        'seamonkey'=>'SeaMonkey',
        'thunderbird'=>'Thunderbird',
        'beonex'=>'Beonex',
        'phoenix'=>'Phoenix',
        'palemoon'=>'Pale Moon',
        'omniweb'=>'OmniWeb',
        'deskbrowse'=>'Desktop Browser',
        'classilla'=>'Classilla',
        'classilla/cfm'=>'Classilla',
        'camino'=>'Camino',
        'chimera'=>'Camino',
        'firebird'=>'Mozilla Firebird',
        'k-meleon'=>'K-Meleon',
        'galeon'=>'Galeon',
        'sunrise'=>'Sunrise Browser',
        'sunrisebrowser'=>'Sunrise Browser',
        'midori'=>'Midori',
        'rockmelt'=>'RockMelt',
        'abrowse'=>'ABrowse',
        'bon echo'=>'Mozilla Bon Echo',
        'bonecho'=>'Mozilla Bon Echo',
        'amigavoyager'=>'Amiga Voyager',
        'netfront'=>'NetFront',
    ];
    /**
     * Lista de browsers (Alias) que tendrán prioridad sobre los demás al ser detectados
     *
     * Lista de prefencia de detección personalizable
     * @var string[]
     */
    static $browser_main=[
        //'Opera Mobile',
        //'Google Chrome',
        //'Microsoft Edge',
    ];

    /**
     * Lista de browsers (Alias) que tendrán menor prioridad sobre los demás al ser detectados
     *
     * Son referencias que comunmente se conservan al crear nuevos browsers
     * @var string[]
     */
    static $browser_basic=[
        'Internet Explorer',
        'Chromium',
        'Safari',
    ];

    /**
     * Lista de Sistema operativos (Alias) que tendrán menor prioridad sobre los demás al ser detectados
     *
     * Son nombres de SO sin una versión o nombre exacto
     * @var string[]
     */
    static $os_basic=[
        'Linux',
        'Windows',
        'Macintosh',
    ];

    private $base;
    private $browser;
    private $version;
    private $os;
    private $browser_list;
    private $os_list;
    private $userAgent;
    private function __construct(array $data){
        $this->setData($data);
    }

    private function setData(array $data){
        $this->userAgent=$data['useragent']??'';
        $this->base=$data['base']??null;
        $this->browser=$data['browser']??null;
        $this->version=$data['version']??null;
        $this->os=$data['os']??null;
        $this->browser_list=$data['browser_list']??[];
        $this->os_list=$data['os_list']??[];
    }

    public function userAgent(): string{
        return $this->userAgent;
    }

    public function browser_list(bool $addVersion=false, bool $fixVer=true): array{
        if(!$addVersion) return array_column($this->browser_list, 0);
        return array_map(function($row)use($fixVer){
            if($fixVer) $row=self::fixVersion($row, $this->version);
            return implode(' ', $row);
        }, $this->browser_list);
    }

    public function os_list(bool $addVersion=false, bool $fixVer=true): array{
        if(!$addVersion) return array_column($this->os_list, 0);
        return array_map(function($row)use($fixVer){
            if($fixVer) $row=self::fixVersion($row);
            return implode(' ', $row);
        }, $this->os_list);
    }

    public function browser(bool $fixVer=true): ?string{
        $row=$this->browser??null;
        if(!$row) return null;
        if($fixVer) $row=self::fixVersion($row, $this->version);
        return implode(' ', $row);
    }

    public function os(bool $fixVer=true): ?string{
        $row=$this->os??null;
        if(!$row) return null;
        if($fixVer) $row=self::fixVersion($row);
        return implode(' ', $row);
    }

    public function base(): ?string{
        $base=$this->base_name();
        if(!$base) return null;
        if(!empty($this->base[1])) $base.='/'.$this->base[1];
        return '['.$base.']';
    }

    public function browser_name(): ?string{
        return $this->browser[0]??null;
    }

    public function browser_ver(bool $fixVer=true): ?string{
        $row=$this->browser??null;
        if(!$row) return null;
        $row[1]=$row[1]??$this->version;
        if($fixVer) $row=self::fixVersion($row, $this->version);
        return $row[1]??null;
    }

    public function os_name(): ?string{
        return $this->os[0]??null;
    }

    public function os_ver(bool $fixVer=true): ?string{
        $row=$this->os??null;
        if(!$row) return null;
        if($fixVer) $row=self::fixVersion($row);
        return $row[1]??null;
    }

    private static function fixVersion(array $row, ?string $version=null){
        if(isset($row[1]) || isset($version)){
            if(preg_match('/^[v]?(\d+(?:\.\d+)?).*/i', str_replace('_', '.', $row[1]??$version), $m)){
                $row[1]=$m[1];
            }
            else{
                unset($row[1]);
            }
        }
        return $row;
    }

    public function base_name(): ?string{
        return $this->base[0]??null;
    }

    public function text_A(string $unknown='unknown'): string{
        return ($this->browser_name()??$this->base()??$unknown).' ('.($this->os_name()??$unknown).')';
    }

    public function text_B(string $unknown='unknown', bool $truncVer=true): string{
        return ($this->browser($truncVer)??$this->base()??$unknown).' ('.($this->os_name()??$unknown).')';
    }

    public function text_C(string $unknown='unknown', bool $truncVer=true): string{
        return ($this->browser_name()??$this->base()??$unknown).' ('.($this->os($truncVer)??$unknown).')';
    }

    public function text_D(string $unknown='unknown', bool $truncVer=true): string{
        return ($this->browser($truncVer)??$this->base()??$unknown).' ('.($this->os($truncVer)??$unknown).')';
    }

    public static function explain_me(){
        return self::explain(self::me());
    }

    /**
     * @param string $userAgent
     * @return static
     */
    public static function explain(string $userAgent): self{
        $browser_list=[];
        $os_list=[];
        $data=[];
        $data['useragent']=$userAgent;
        $list=preg_match_all('/[^\,\;\(\)\[\]\n]+/', $userAgent, $list)?$list[0]:[];
        foreach($list as $item){
            self::analyze($item, $browser_list, $os_list, $data);
        }
        if(count($browser_list)>0){
            $def=null;
            $names=array_reverse(array_column($browser_list, 0));
            if(!$def && count($names)>1 && count($diff=array_values(array_intersect($names, self::$browser_main)))>0){
                $def=$diff[0];
            }
            if(!$def && count($names)>1 && count($diff=array_values(array_diff($names, self::$browser_basic)))>0){
                $def=$diff[0];
            }
            if(!$def){
                $def=$names[0]??null;
            }
            if($def){
                foreach($browser_list as $br){
                    if($def===$br[0]){
                        $data['browser']=$br;
                        break;
                    }
                }
            }
        }
        if(count($os_list)>0){
            $def=null;
            $names=array_column($os_list, 0);
            if(!$def && count($names)>1 && count($diff=array_values(array_diff($names, self::$os_basic)))>0){
                $def=$diff[0];
            }
            if(!$def){
                $def=$names[0]??null;
            }
            if($def){
                foreach(array_reverse($os_list) as $os){
                    if($def===$os[0]){
                        $data['os']=$os;
                        break;
                    }
                }
            }
        }
        $data['os_list']=$os_list;
        $data['browser_list']=$browser_list;
        $data=array_filter($data);
        return new self($data);
    }

    public static function me(){
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    /**
     * Extrae un parte del UserAgent y lo divide en secciones:
     * 0: Nombre
     * 1: Valor (Opcional)
     * @param string $str
     * @param $next
     * @return array|null
     */
    private static function extractApp(string $str, &$next=null): ?array{
        $str=trim($str, ' /');
        $next=null;
        # Palabras solas
        if(preg_match('/^([^\/\W]+)$/', $str, $m)){
            $r=[$m[1]];
            return $r;
        }
        # rv:
        if(preg_match('/^rv:(.*)$/', $str, $m)){
            $r=['/rv', $m[1]];
            return $r;
        }
        # url
        if(preg_match('/^(.* )?[^ ]*(http[s]?:\/\/.*)$/', $str, $m)){
            if($m[1]=trim($m[1])){
                $next=$m[2];
                $r=self::extractApp($m[1]);
                return $r;
            }
            $r=['/url',$m[2]];
            return $r;
        }
        # next
        if(preg_match('/^([^\/]+(?:\/[^\/ ]+[\/]?)+|[^\/]+\/) (.*)$/i', $str, $m)){
            $next=$m[2];
            $r=self::extractApp($m[1]);
            return $r;
        }
        # Sin /
        if(preg_match('/^[^\/]+$/', $str, $m)){
            # email
            if(preg_match('/@/', $str)){
                if(preg_match('/^(.+)( [^\s]+@[^\s]+)$/', $str, $m)){
                    $next.=$m[2];
                    $r=self::extractApp($m[1], $next);
                    return $r;
                }
                if(preg_match('/^([^\s]+@[^\s]+) (.+)$/', $str, $m)){
                    $r=[$m[1]];
                    $next=$m[2];
                    return $r;
                }
                $r=['/email',$str];
                return $r;
            }
            # Intel Mac OS X
            if(preg_match('/^([^\d]+)$/', $str, $m)){
                $r=[$m[1]];
                return $r;
            }
            # Windows NT 5.1
            if(preg_match('/^([^\W]+) ([v]?\d[^ ]*)$/i', $str, $m)){
                $r=[$m[1], $m[2]];
                return $r;
            }
            # CPU iPhone OS 4_2_1 like Mac OS X
            if(preg_match('/^([^\d]+) (\d[\_\d]*)( [^\d]+)$/', $str, $m)){
                $r=[$m[1].$m[3], $m[2]];
                return $r;
            }
            # Debian-0.9.2+git100804-1
            # Profile/MIDP-2.0
            if(preg_match('/^([^ \d]+)\-([v]?\d[^ ]*)$/i', $str, $m)){
                $r=[$m[1], $m[2]];
                return $r;
            }
            # Windows NT 5.2
            if(preg_match('/^(.+) ([v]?\d[^ ]*)$/i', $str, $m)){
                $r=[$m[1], $m[2]];
                return $r;
            }
            if(preg_match('/^(.+) ([v]?\d[^ ]*) (.+)$/i', $str, $m)){
                $next=$m[3];
                $r=[$m[1], $m[2]];
                return $r;
            }
            # Sin espacios
            if(preg_match('/^[^ ]+$/', $str)){
                $r=[str_replace('-', ' ', $str)];
                return $r;
            }
            $r=[$str];
            return $r;
        }
        # Opera Mini/4.3.24214
        if(preg_match('/^([^\/]+)\/([v]?\d[^\/ ]*)$/i', $str, $m)){
            $r=[$m[1], $m[2]];
            return $r;
        }
        # Opera Mini/Mozilla/23.334
        if(preg_match('/^([^\/]+(?:\/[^\/\d ]+)+)\/([v]?\d[^\/ ]*)$/i', $str, $m)){
            $r=[$m[1], $m[2]];
            return $r;
        }
        # Opera Mini/5.1.21214/22.387
        if(preg_match('/^([^\/]+)\/([v]?\d[^\/ ]*)((?:\/[v]?\d[^\/ ]*)+)$/i', $str, $m)){
            $r=[$m[1], $m[2]];
            return $r;
        }
        # Opera Mini/Nokia2730c-1/22.478
        if(preg_match('/^([^\/]+(?:\/[^\/ ]+)+)\/([v]?\d[^\/ ]*)$/i', $str, $m)){
            $r=[$m[1], $m[2]];
            return $r;
        }
        if(preg_match('/^([^ ]+)\-([v]?\d[^\/ ]*)$/', $str, $m)){
            $r=[$m[1], $m[2]];
            return $r;
        }
        $r=[$str];
        return $r;
    }

    private static function analyze($str, array &$browser_list=[], array &$os_list=[], array &$data=[]){
        while($str){
            $app=static::extractApp($str, $next);
            $str=$next;
            $app=array_filter(array_map('trim', $app));
            self::register($app, $browser_list, $os_list, $data);
        }
    }

    private static function register(array $app, array &$browser_list, array &$os_list, array &$data){
        $n=strtolower($app[0]??'');
        $ver=$app[1]??null;
        $found=false;
        if(in_array($n, ['version','/url','/email','/rv'])){
            $data[$n]=$ver??$data[$n]??null;
            $found=true;
            return $found;
        }
        if($n==='')
            return $found;
        if(!isset($data['base'])){
            $data['base']=array_filter([
                $app[0],
                $ver,
            ]);
            $found=self::register($app, $browser_list, $os_list, $data);
            return $found;
        }
        if(($browser=static::$browser_valids[$n] ?? null)){
            if(in_array($n, ['safari','opera']))
                $ver=null;// El browser usa version/x.x
            $browser=array_filter([$browser,$ver]);
            $browser_list[]=$browser;
            $found=true;
            return $found;
        }
        $nv=$ver?strtolower($n.' '.$ver):null;
        if($nv){
            if($os=static::$OS_valids[$nv] ?? null){
                $os=array_filter([$os]);
                $os_list[]=$os;
                $found=true;
                return $found;
            }
        }
        $n0=preg_replace('/^('.self::$prefix_sufix_os.') | ('.self::$prefix_sufix_os.')$/', '', $n, -1, $c);
        if($c==0) $n0=null;
        if($n0 && $os=static::$OS_valids[$n0] ?? null){
            $os=array_filter([$os, $ver]);
            $os_list[]=$os;
            $found=true;
            return $found;
        }
        if($os=static::$OS_valids[$n] ?? null){
            $os=array_filter([$os,$ver]);
            $os_list[]=$os;
            $found=true;
            return $found;
        }
        if($n=='/url' || $n=='/email' || $n=='/rv')
            return $found;
        if(!preg_match('/[\s\/]/', $n)){
            return $found;
        }
        $str=$n;
        if(preg_match('/^(.*)[\/\s](\d[^\/]*)(?:\/(.*))?$/', $str, $m)){
            $br=self::register([$m[1], $m[2]], $browser_list, $os_list, $data);
            if($br)
                $found=true;
            if(!empty($m[3])){
                $br0=self::register([$m[3]], $browser_list, $os_list, $data);
                if($br0)
                    $found=true;
            }
            if($found)
                return $found;
        }
        if(preg_match('/^(.*)\s(\w*)$/', $str, $m)){
            $br0=self::register([$m[1]], $browser_list, $os_list, $data);
            $br=self::register([$m[2], $ver], $browser_list, $os_list, $data);
            $found=($br || $br0);
            if($found)
                return $found;
        }
        if(preg_match('/^([a-z][\w\s]*)\/([a-z][\w\s]*)$/', $str, $m)){
            $br0=self::register([$m[1]], $browser_list, $os_list, $data);
            $br=self::register([$m[2], $ver], $browser_list, $os_list, $data);
            $found=($br || $br0);
            if($found)
                return $found;
        }
        if(preg_match('/^(.*)[\/](.*)$/', $str, $m)){
            $br0=self::register([$m[1], $ver], $browser_list, $os_list, $data);
            $br=self::register([$m[2]], $browser_list, $os_list, $data);
            $found=($br || $br0);
            if($found)
                return $found;
        }
        if(preg_match('/^([\w]+)[\/\s](.*)/', $str, $m)){
            $br0=self::register([$m[1], $ver], $browser_list, $os_list, $data);
            $br=self::register([$m[2]], $browser_list, $os_list, $data);
            $found=($br || $br0);
            if($found)
                return $found;
        }
        return $found;
    }
}
