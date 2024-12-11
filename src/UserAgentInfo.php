<?php

/**
 * Repositorio {@link https://github.com/yordanny90/UserAgentInfo}
 * Basado principalmente en los ejemplos y el funcionamiento de {@link https://useragentstring.com/}
 */
class UserAgentInfo{

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
        'win16'=>'Windows 16',
        'win32'=>'Windows 32',
        'windows ce'=>'Windows CE',
        'windows phone'=>'Windows Phone',
        'windows phone os'=>'Windows Phone',
        'windows mobile'=>'Windows Mobile',
        'cygwin'=>'Windows',
        'winnt'=>'Windows',
        'iphone'=>'iOS',
        'cpu os like mac os x'=>'iOS',
        'cpu iphone os like mac os x'=>'iOS',
        'ipod'=>'iOS',
        'ipad'=>'iOS',
        'darwin'=>'Darwin',
        'macintosh'=>'Macintosh',
        'mac os'=>'Macintosh',
        'mac os x'=>'Mac OS X',
        'intel mac os x'=>'Mac OS X',
        'mac osx'=>'Mac OS X',
        'mac os x mach-o'=>'Mac OS X',
        'ppc mac os x'=>'Mac OS X',
        'ppc mac os x mach-o'=>'Mac OS X',
        'mac os x leopard'=>'Mac OS X',
        'mac_powerpc'=>'Macintosh',
        'mac_powerpc mac os'=>'Macintosh',
        'mac_68k'=>'Mac 68K emulator',
        '68k'=>'Mac 68K emulator',
        'amigaos'=>'AmigaOS',
        'blackberry'=>'BlackBerry',
        'linux/smarttv'=>'Smart TV',
        'symbos'=>'Symbian OS',
        'symbianos'=>'Symbian OS',
        'series 60'=>'Symbian OS',
        'webos'=>'Mobile',
        'debian sid'=>'Debian',
        'android'=>'Android',
        'linux'=>'Linux',
        'linux i686'=>'Linux',
        'linux x86_64'=>'Linux',
        'arch linux'=>'Linux',
        'arch linux i686'=>'Linux',
        'arch linux x86_64'=>'Linux',
        'i686 linux'=>'Linux',
        'x86_64 linux'=>'Linux',
        'slackware'=>'Slackware',
        'maemo'=>'Linux',
        'cros'=>'Chrome OS',
        'cros i686'=>'Chrome OS',
        'beos'=>'BeOS',
        'j2me'=>'Java Platform',
        'j2me/midp'=>'Java Platform',
        'j2me/iphone'=>'Java Platform',
        'profile/midp-2.0'=>'Java Platform',
        'opensolaris'=>'OpenSolaris',
        'sunos'=>'Solaris',
        'netbsd'=>'NetBSD',
        'syllable'=>'Syllable',
        'dragonfly'=>'DragonFly BSD',
        'rim tablet os'=>'RIM Tablet OS',
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
        'linux mint'=>'Linux Mint',
    ];
    public static $browser_valids=[
        'chrome'=>'Google Chrome',
        'chromeplus'=>'ChromePlus',
        'crios'=>'Google Chrome',
        'chromium'=>'Chromium',
        'msie'=>'Internet Explorer',
        'iemobile'=>'Internet Explorer Mobile',
        'firefox'=>'Firefox',
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
        'Firefox',
        'Opera',
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
            if($fixVer) $row=self::fixVersion($row);
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
        if($fixVer) $row=self::fixVersion($row);
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
        if($fixVer) $row=self::fixVersion($row);
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

    private static function fixVersion(array $row){
        if(isset($row[1])){
            if(preg_match('/^[v]?(\d+(?:\.\d+)?).*/', str_replace('_', '.', $row[1]), $m)){
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
        self::analyze($userAgent, $browser_list, $os_list, $base);
        $res=[
            'useragent'=>$userAgent,
            'base'=>$base
        ];
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
                        $res['browser']=$br;
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
                        $res['os']=$os;
                        break;
                    }
                }
            }
        }
        $res['os_list']=$os_list;
        $res['browser_list']=$browser_list;
        $res=array_filter($res);
        return new self($res);
    }

    public static function me(){
        return $_SERVER['HTTP_USER_AGENT'] ?? '';
    }

    /**
     * Extrae un parte del UserAgent y lo divide en secciones (1:parte)(2:extra/idioma)(3:subparte)(4:Siguiente seccion)
     */
    private const PREG_PART='/^([\w ]*[\/\w\.\+\-:]+(?:\s\d[\d\.\_]*)?)(\s?\[\w+\])?(?:[,;]?\s?\(((?:\([^\(\)]*\)|[^\(\)])*)(?:\)|$))?(?:\b|\s|,|;|\)|$)(.*)$/';

    /**
     * Extrae un parte del UserAgent y lo divide en secciones:
     * 0: Nombre
     * 1: Versión
     * 2: Subparte
     * @param string $str
     * @param $next
     * @return array|null
     */
    private static function extractPart(string $str, &$next=null): ?array{
        $next=null;
        if(preg_match(self::PREG_PART, trim($str, " ,;"), $m)){
            $next=trim($m[4]??'', " ,;");
            $name=$m[1];
            $lang=$m[2];
            $ver='';
            $subpart=trim($m[3]??'');
            if(preg_match('/^(.*)[\/ ][v]?(\d[^\/]*)?$/', $name, $m)){
                $name=$m[1];
                $ver=$m[2]??'';
            }
            $res=[
                $name,
                $ver,
                $subpart,
            ];
            return $res;
        }
        // Limpia la parte del string que no se logra interpretar
        if(preg_match('/^([^\w]+)(?:\b|$)(.*)/', trim($str, " ,;"), $m)){
            $next=trim($m[2]??'', " ,;");
            return null;
        }
        return null;
    }

    private static function analyze($str, array &$browser_list=[], array &$os_list=[], ?array &$base=null){
        while($str){
            $part=static::extractPart($str, $next);
            $str=$next;
            if($part){
                if($browser=self::validate($part, $browser_list, $os_list, $base)){
                    $browser_list[]=$browser;
                }
                if(!empty($part[2])){
                    self::analyze($part[2], $browser_list, $os_list, $base);
                }
            }
        }
    }

    private static function validate(array $app, array &$browser_list, array &$os_list, ?array &$base){
        $n=strtolower($app[0]);
        $ver=$app[1]??'';
        if(!$base){
            $base=array_filter([
                $app[0],
                $ver,
            ]);
            $str=$n;
            if(preg_match('/^(.*)[\/](\w*)$/', $str, $m)){
                $n=$m[2];
                if($os=static::$OS_valids[$n] ?? null){
                    $os=array_filter([$os, $ver]);
                    $os_list[]=$os;
                    return null;
                }
            }
            return null;
        }
        if(empty($n)) return null;
        if($n=='version'){
            $last=count($browser_list)-1;
            if($last>=0 && in_array(strtolower($browser_list[$last][0]??''), ['safari', 'opera'])){
                $browser_list[$last][1]=$ver;
                $browser_list[$last]=array_filter($browser_list[$last]);
                return null;
            }
            if($browser=self::$browser_valids[strtolower($base[0]??'')=='opera'?'opera':'safari'] ?? null){
                $browser=array_filter([$browser,$ver]);
                return $browser;
            }
            return null;
        }
        if(($browser=static::$browser_valids[$n] ?? null)){
            $browser=array_filter([$browser,$ver]);
            return $browser;
        }
        if($ver && $os=static::$OS_valids[strtolower($n.'/'.$ver)] ?? null){
            $os=array_filter([$os]);
            $os_list[]=$os;
            return null;
        }
        if($ver && $os=static::$OS_valids[strtolower($n.' '.$ver)] ?? null){
            $os=array_filter([$os]);
            $os_list[]=$os;
            return null;
        }
        if($os=static::$OS_valids[$n] ?? null){
            $os=array_filter([$os, $ver]);
            $os_list[]=$os;
            return null;
        }
        $str=$n;
        if(preg_match('/^(.*)\s(\d[\d\.\_]*)(\s.*)?$/', strtolower($n.' '.$ver), $m)){
            $n=$m[1].($m[3]??'');
            $ver=$m[2];
            if($browser=static::$browser_valids[$n] ?? null){
                $browser=array_filter([$browser,$ver]);
                return $browser;
            }
            if($os=static::$OS_valids[$n] ?? null){
                $os=array_filter([$os,$ver]);
                $os_list[]=$os;
                return null;
            }
        }
        if(preg_match('/^(.*)[\/\s](\d.*)/', $str, $m)){
            $n=$m[1];
            $ver=$m[2];
            if($browser=static::$browser_valids[$n] ?? null){
                $browser=array_filter([$browser,$ver]);
                return $browser;
            }
            if($os=static::$OS_valids[$n] ?? null){
                $os=array_filter([$os,$ver]);
                $os_list[]=$os;
                return null;
            }
        }
        if($ver && preg_match('/^(.*)\s(\w*)$/', $str, $m)){
            $n=$m[2];
            if($browser=static::$browser_valids[$n] ?? null){
                $browser=array_filter([$browser,$ver]);
                return $browser;
            }
        }
        if($ver && preg_match('/^([a-z][\w\s]*)\/([a-z][\w\s]*)$/', $str, $m)){
            if($os=static::$OS_valids[$m[1]] ?? null){
                $os=array_filter([$os]);
                $os_list[]=$os;
            }
            elseif($os=static::$OS_valids[$m[2]] ?? null){
                $os=array_filter([$os,$ver]);
                $os_list[]=$os;
            }
            if($browser=static::$browser_valids[$m[1]] ?? null){
                $browser=array_filter([$browser]);
                return $browser;
            }
            elseif($browser=static::$browser_valids[$m[2]] ?? null){
                $browser=array_filter([$browser,$ver]);
                return $browser;
            }
            return null;
        }
        if(preg_match('/^(\w+)[\/\s]/', $str, $m)){
            $n=$m[1];
            if($os=static::$OS_valids[$n] ?? null){
                $os=array_filter([$os,$ver]);
                $os_list[]=$os;
                return null;
            }
        }
        return null;
    }
}
