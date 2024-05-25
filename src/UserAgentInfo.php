<?php

/**
 * Repositorio {@link https://github.com/yordanny90/UserAgentInfo}
 * Basado principalmente en los ejemplos y el funcionamiento de {@link https://useragentstring.com/}
 */
class UserAgentInfo{
    public static $OSvalids=[
        'windows'=>['Windows'],
        'windows nt 10.0'=>['Windows 10'],
        'windows nt 6.3'=>['Windows 8.1'],
        'windows nt 6.2'=>['Windows 8'],
        'windows nt 6.1'=>['Windows 7'],
        'windows nt 6.0'=>['Windows Vista'],
        'windows nt 5.2'=>['Windows Server 2003'],
        'windows nt 5.1'=>['Windows XP'],
        'windows nt 5.0'=>['Windows 2000'],
        'windows nt 4.0'=>['Windows NT 4.0'],
        'windows nt 3.51'=>['Windows NT 3.51'],
        'windows nt 3.5'=>['Windows NT 3.5'],
        'windows nt 3.1'=>['Windows NT 3.1'],
        'windows 2000'=>['Windows 2000'],
        'windows nt'=>['Windows NT'],
        'windows 3.1'=>['Windows 3.1'],
        'windows 3.9'=>['Windows 3.9'],
        'winnt4.0'=>['Windows NT', '4.0'],
        'windows xp'=>['Windows XP'],
        'windows me'=>['Windows ME'],
        'win 9x 4.90'=>['Windows ME'],
        'win98'=>['Windows 98'],
        'windows 98'=>['Windows 98'],
        'win95'=>['Windows 95'],
        'windows 95'=>['Windows 95'],
        'win16'=>['Windows 16'],
        'win32'=>['Windows 32'],
        'windows ce'=>['Windows CE'],
        'windows phone os'=>['Windows Phone OS'],
        'windows mobile'=>['Windows Mobile'],
        'cygwin'=>['Windows'],
        'winnt'=>['Windows'],
        'iphone'=>['iOS'],
        'ipod'=>['iOS'],
        'ipad'=>['iOS'],
        'like mac os x'=>['iOS'],
        'darwin'=>['Darwin'],
        'macintosh'=>['Mac OS'],
        'mac os'=>['Mac OS'],
        'mac os x'=>['Mac OS X'],
        'mac osx'=>['Mac OS X'],
        'mac os x mach-o'=>['Mac OS X'],
        'mac os x leopard'=>['Mac OS X'],
        'mac_powerpc'=>['Mac OS', '9'],
        'mac_68k'=>['Mac 68K emulator'],
        'amigaos'=>['AmigaOS'],
        'blackberry'=>['BlackBerry'],
        'linux/smarttv'=>['Smart TV'],
        'symbos'=>['Symbian OS'],
        'symbianos'=>['Symbian OS'],
        'series 60'=>['Symbian OS', '60'],
        'webos'=>['Mobile'],
        'debian sid'=>['Debian'],
        'android'=>['Android'],
        'linux'=>['Linux'],
        'slackware'=>['Slackware'],
        'maemo'=>['Linux'],
        'cros'=>['Chrome OS'],
        'beos'=>['BeOS'],
        'j2me'=>['Java Platform 2'],
        'j2me/midp'=>['Java Platform 2'],
        'j2me/iphone'=>['Java Platform 2'],
        'opensolaris'=>['OpenSolaris'],
        'sunos'=>['Solaris'],
        'netbsd'=>['NetBSD'],
        'syllable'=>['Syllable'],
        'dragonfly'=>['DragonFly BSD'],
        #### X11_list ####
        'fedora'=>['Fedora'],
        'centos'=>['CentOS'],
        'suse'=>['SUSE'],
        'debian'=>['Debian'],
        'mandriva'=>['Mandriva'],
        'ubuntu'=>['Ubuntu'],
        'kubuntu'=>['Kubuntu'],
        'freebsd'=>['FreeBSD'],
        'openbsd'=>['OpenBSD'],
        'opensuse'=>['openSUSE'],
        'linux mint'=>['Linux Mint'],
        #### X11_list ####
    ];
    public static $X11_list=[
        'Fedora',
        'CentOS',
        'SUSE',
        'Debian',
        'Mandriva',
        'Ubuntu',
        'Kubuntu',
        'FreeBSD',
        'OpenBSD',
        'openSUSE',
        'Linux Mint',
    ];
    public static $excludeBrowsers=[
        't7',
        'avast',
        'avg',
        'gsa',
        'agency',
        'atcontent',
        'config',
        'gls',
        'herring',
        'likewise',
        'openwave',
        'trailer',
        'unique',
        'viewer',
        'ccleaner',
        'applewebkit',
        'webkit',
        'khtml',
        'gecko',
        'version',
        'mobile',
        'linux',
        'mint',
        'mozilla',
    ];
    public static $validBrowsers=[
        'huaweibrowser'=>'Huawei Browser',
        'samsungbrowser'=>'Samsung Browser',
        'browserng'=>'Nokia Browser',
        'chrome'=>'Google Chrome',
        'crios'=>'Google Chrome',
        'chromium'=>'Google Chrome',
        'msie'=>'Internet Explorer',
        'firefox'=>'Firefox',
        'gecko/firefox'=>'Firefox',
        'fennec'=>'Firefox',
        'icecat'=>'IceCat',
        'minimo'=>'Mini Mozilla',
        'lunascape'=>'Lunascape',
        'safari'=>'Safari',
        'rekonq'=>'Rekonq',
        'shiira'=>'Shiira',
        'arora'=>'Arora',
        'edgios'=>'Microsoft Edge',
        'edg'=>'Microsoft Edge',
        'edge'=>'Microsoft Edge',
        'opr'=>'Opera',
        'opera'=>'Opera',
        'presto'=>'Presto',
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
        'camino'=>'Camino',
        'chimera'=>'Camino',
        'firebird'=>'Mozilla Firebird',
        'k-meleon'=>'K-Meleon',
        'galeon'=>'Galeon',
        'sunrise'=>'Sunrise Browser',
        'sunrisebrowser'=>'Sunrise Browser',
        'midori'=>'Midori',
        'rockmelt'=>'RockMelt',
    ];

    protected $userAgent;
    protected $explain=null;

    public function __construct(string $userAgent){
        $this->userAgent=$userAgent;
    }

    /**
     * @return string
     */
    public function getUserAgent(): string{
        return $this->userAgent;
    }

    /**
     * @return array|null
     */
    public function getParts(): ?array{
        if(is_null($this->explain)) $this->explain=static::explain($this->userAgent);
        return $this->explain['parts'] ?? null;
    }

    /**
     * @return array|null
     */
    public function getBrowser(): ?array{
        $this->getParts();
        return $this->explain['browser'] ?? null;
    }

    public function getBrowserInvalid(): ?array{
        if($this->getBrowser()) return null;
        return static::_browser($this->explain['parts']['browser'] ?? '', false);
    }

    /**
     * @return array|null
     */
    public function getOS(): ?array{
        $this->getParts();
        return $this->explain['os'] ?? null;
    }

    /**
     * @return array|null
     */
    public function getBase(): ?array{
        $this->getParts();
        return $this->explain['base'] ?? null;
    }

    public function getBrowserList(bool $exclude=true): ?array{
        if(!$this->getParts() || !isset($this->explain['parts']['browser'])) return null;
        $br=$this->explain['parts']['browser'];
        $list=[];
        while($br){
            if($b=static::extractPart($br, true, $next)){
                $br=$next;
                if($exclude && static::excludeBrowser($b[0])) continue;
                $list[$b[0]]=$b;
            }
            else{
                break;
            }
        }
        if(!count($list)) $list=null;
        return $list;
    }

    public static function my(): self{
        return new self($_SERVER['HTTP_USER_AGENT'] ?? '');
    }

    private static function OSvalid(string $name): ?array{
        if($res=static::$OSvalids[strtolower($name)] ?? null) return $res;
        return null;
    }

    private static function excludeBrowser(string $name): bool{
        if(in_array(strtolower($name), self::$excludeBrowsers)) return true;
        if(static::OSvalid($name)) return true;
        return false;
    }

    static function parts($userAgent): ?array{
        if(preg_match('/^(?:([\w \.\/\-\+]*\w)\s?'.//base
            '(?:\[([\w\-]+)\]\s?)?)?'.//lang
            '(?:(?:\(\1\s?)*\s?\(([^\(\)]+(?:\s?\([^\(\)]+\))?[^\(\)]*)\))'.//os
            '(?:;\s*(rv\:[\w\.]+)\)?)?'.//rv
            '(?:\s?(\w{2}(?:[\-_]\w{2})?)[,;])?'.//lang2
            '((?:\s*(?:[\/\w\.\+\-]+)(?:\s?\([^\(\)]*\))?)*)?'.//browser
            '(?:\s?\[(\w{2}(?:[\-_]\w{2})?)\])?'.//lang3
            '(.*)$/i'//extra
            , $userAgent, $data)){
            $res=array_map('trim', array_combine([
                '_',
                'base',
                'lang',
                'os',
                'rv',
                'lang2',
                'browser',
                'lang3',
                'extra',
            ], $data));
            unset($data);
            unset($res['_']);
            if(!empty($res['os']) && preg_match('/^(.*)(?:^|;)\s?(rv\:[\w\.]+)$/', $res['os'], $os)){
                $res['os']=trim($os[1]);
                $res['rv']=trim($os[2]);
            }
            if(!empty($res['os']) && preg_match('/^(.*)(?:^|;)\s?(?:\w{2}(?:[\-_]\w{2})?,\s?)?(\w{2}(?:[\-_]\w{2})?)((?:$|;).*)/i', $res['os'], $os)){
                if($os[3]==';') $os[3]='';
                $res['os']=trim($os[1].$os[3]);
                $res['lang']=trim($os[2]);
            }
            if(!empty($res['os']) && preg_match('/^(.*)(?:^|;)\s?(\d+x\d+)(?:\-\d+)?((?:$|;).*)/i', $res['os'], $os)){
                if($os[3]==';') $os[3]='';
                $res['os']=trim($os[1].$os[3]);
                $res['dim']=trim($os[2]);
            }
            if(!empty($res['lang2'])){
                if(empty($res['lang'])) $res['lang']=$res['lang2'];
                unset($res['lang2']);
            }
            if(!empty($res['lang3'])){
                if(empty($res['lang'])) $res['lang']=$res['lang3'];
                unset($res['lang3']);
            }
            $res=array_filter($res);
            return $res;
        }
        return null;
    }

    private static function extractPart(string $str, bool $addExtra=false, &$next=null): ?array{
        if(preg_match('/^([\/\w\.\+\-]+)(?:\s?\(([^\(\)]*)\))?(?:\s|$)(.*)$/', trim($str), $m)){
            $next=$m[3];
            $name=explode('/', $m[1]);
            $ver='';
            if(count($name)>1) $ver=array_pop($name);
            $name=implode('/', $name);
            $res=[
                $name,
                $ver
            ];
            if($addExtra) $res[2]=trim($m[2]);
            return $res;
        }
        return null;
    }

    private static function searchPart(string $str, string ...$search): ?array{
        $str=trim($str);
        $preg=implode('|', array_map('preg_quote', $search));
        if(empty($preg)) return null;
        if(preg_match_all('/(?:\s|^)('.$preg.')(?:\/([\w\.\+\-]+)?)?(?:\s?\(([^\(\)]*)\))?(?:\s|$)/', $str, $m, PREG_SET_ORDER)){
            $found=$m[0];
            array_shift($found);
            return $found;
        }
        return null;
    }

    /**
     * @param string $userAgent
     * @return array Array con las llaves (todas son opcionales):
     * <ul>
     * <li>parts</li>
     * <li>base</li>
     * <li>os</li>
     * <li>browser</li>
     * </ul>
     */
    static function explain(string $userAgent): array{
        $parts=self::parts($userAgent);
        if(!$parts) return [];
        $res=[];
        $res['parts']=&$parts;
        if(isset($parts['base'])) $res['base']=static::extractPart($parts['base']);
        if(isset($parts['os'])) $res['os']=static::_os($parts);
        if(isset($parts['browser'])) $res['browser']=static::_browser($parts['browser'], true);
        $res=array_filter($res);
        return $res;
    }

    private static function _browser(string $browser_part, $onlyValid=true): ?array{
        $br=$browser_part;
        $invalid=null;
        $ver=null;
        while($br){
            if($b=static::extractPart($br, true, $next)){
                $br=$next;
                $n=strtolower($b[0]);
                if($n=='version'){
                    $ver=$b[1];
                    continue;
                }
                if(static::excludeBrowser($b[0])) continue;
                if(!$onlyValid && !isset($invalid) && $b[0] && $b[1]) $invalid=[$b[0], $b[1]];
                if(isset($ver) && in_array($n, ['chrome', 'crios'])) continue;
                if(($alias=static::$validBrowsers[$n] ?? null)){
                    return [
                        $alias,
                        $ver ?? $b[1]
                    ];
                }
            }
            else{
                break;
            }
        }
        if($onlyValid) return null;
        return $invalid;
    }

    private static function _os(array $parts): ?array{
        if(empty($parts['os'])) return null;
        if(preg_match('/(?:^|;\s*)(Android) (\d+(?:\.\d+)*)(?:\s|;|$)/i', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            if(!empty($m[2])) $res[1]=$m[2];
            return $res;
        }
        elseif(preg_match('/(?:^|;\s*)(Android)(?:\s|;|$)/i', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            return $res;
        }
        elseif(preg_match('/(?:^|;\s*)(CrOS) (?:\w+)\s?(\d+(?:\.\d+)*)?(?:\s|;|$)/i', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            if(!empty($m[2])) $res[1]=$m[2];
            return $res;
        }
        # Validaciones para mac
        if(preg_match('/(?:^|;\s*)(?:CPU|CPU iPhone) OS ((?:\d+[\_\.]?)+) (like Mac OS X)(?:;|$)/', $parts['os'], $m) && ($res=static::OSvalid($m[2]))){
            if(!empty($m[1])) $res[1]=str_replace('_', '.', $m[1]);
            return $res;
        }
        elseif(preg_match('/(?:^|;\s*)(?:\w+ )?(Mac OS X(?: [\w+\-]+)?) ((?:\d+[\_\.]?)+)(?:;|$)/', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            if(!empty($m[2])) $res[1]=str_replace('_', '.', $m[2]);
            return $res;
        }
        elseif(preg_match('/(?:^|;\s*)(?:\w+ )?(Mac OS X(?: [\w+\-]+)?)(?:;|$)/', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            return $res;
        }
        elseif(preg_match('/(?:^|;\s*)(?:\w+ )?(Mac OS)(?:;|$)/', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            return $res;
        }
        # Validaciones para linux
        if(preg_match('/(?:^|\(|;\s*)(X11|Linux)(?:\s|;|\)|$)/i', $parts['os'])){
            if(!empty($parts['browser']) && ($linux=static::searchPart($parts['browser'], ...self::$X11_list)) && floatval($linux[1] ?? '')!=0 && ($res=static::OSvalid($linux[0]))){
                $res[1]=$linux[1];
                return $res;
            }
            if(!empty($parts['extra']) && preg_match('/\(([\w\s]+)(\)| package\b)/i', $parts['extra'], $linux) && ($res=static::OSvalid($linux[1]))){
                return $res;
            }
        }
        # Validaciones para windows
        if(preg_match('/(?:^|\(|;|,)\s*(WinNT|Win98|Win95|Win 9x|Windows (?:Phone OS|98|95|NT|CE|ME|2000|Mobile|XP))\s?(\d+(?:\.\d+)*)?(?:\s|;|\)|$)/i', $parts['os'], $m)){
            if(!empty($m[2]) && ($res=static::OSvalid($m[1].' '.$m[2]))){
                return $res;
            }
            elseif(($res=static::OSvalid($m[1]))){
                if(!empty($m[2])) $res[1]=$m[2];
                return $res;
            }
        }
        # Validaciones para otros OS
        if(preg_match('/(?:^|\(|;\s*)(SymbianOS)\/(\d+(?:\.\d+)*)?(?:\s*;|\)|$)/', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            if(!empty($m[2])) $res[1]=$m[2];
            return $res;
        }
        $os=array_reverse(array_filter(array_map('trim', explode(';', str_replace(['(', ')'], ';', $parts['os'] ?? '')))));
        $last=null;
        foreach($os as $name){
            if(($res=static::OSvalid($name))){
                return $res;
            }
            if(is_numeric($name) ||
                in_array($name, ['N', 'U', 'I', 'Nav', 'textmode', 'compatible', 'SV1', 'X11', 'i686', 'x86_64', 'mimic',]) ||
                preg_match('/\b(Warp \d|Europe\/|MSIE|https?\:\/\/)\b/', $name)){
                continue;
            }
            if(preg_match('/(?: |^)((?:([a-z]\w*) )?(\w+))[\s\/](\d+(?:\.\d+)+)(?:\_|\-|\s|$)/i', $name, $m) || preg_match('/(?: |^)((?:([a-z]\w*) )?(\w+))(?:\_|\-|\s|$)/i', $name, $m)){
                $ver=$m[4] ?? null;
                unset($m[4]);
                unset($m[0]);
                $m=array_unique(array_filter($m));
                foreach($m as $n){
                    if(!empty($ver) && ($res=static::OSvalid($n.' '.$ver))){
                        return $res;
                    }
                    elseif(($res=static::OSvalid($n))){
                        if(!empty($ver)){
                            $res[1]=$ver;
                            return $res;
                        }
                        $last=$res;
                        break;
                    }
                }
                if($res) continue;
                unset($n, $res);
            }
        }
        if($last){
            return $last;
        }
        if(preg_match('/(?:^|\-|;)\s*([a-z]+)(\d+(?:\.\d+)+)?\s*(?: |;|\)|$)/i', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            if(!empty($m[2])) $res[1]=$m[2];
            return $res;
        }
        if(preg_match('/\b(Linux)\b/i', $parts['os'], $m) && ($res=static::OSvalid($m[1]))){
            return $res;
        }
        return null;
    }
}
