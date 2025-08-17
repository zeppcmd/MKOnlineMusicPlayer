<?php
/**************************************************
 * MKOnlinePlayer v2.4
 * 后台音乐数据抓取模块
 * 编写：mengkun(https://mkblog.cn)
 * 时间：2018-3-11
 * 特别感谢 @metowolf 提供的 Meting.php
 *************************************************/

/************ ↓↓↓↓↓ 如果网易云音乐歌曲获取失效，请将你的 COOKIE 放到这儿 ↓↓↓↓↓ ***************/
$netease_cookie = 'NTES_CMT_USER_INFO=476124699%7C%E7%99%BD%E5%88%87%E6%89%8B%E6%92%95%E9%B8%A1%7Chttps%3A%2F%2Fmobilepics.ws.126.net%2F2025_07_01_21_48_13h17Yh0lropjf88.jpg%7Cfalse%7CbGl1ZGlhbnRvbnh1bkAxNjMuY29t; NTES_P_UTID=Hj7f58sl8KUc9vJmVzZqC0Y67RC0CurB|1752482720; NMTID=00OY24e2384l-HpJU0PqBHmhGlJaH0AAAGYIrjVKA; _iuqxldmzr_=32; _ntes_nnid=9ce84a9cfb7a57e287fcf9a74f79a1ff,1752929195338; _ntes_nuid=9ce84a9cfb7a57e287fcf9a74f79a1ff; WEVNSM=1.0.0; WNMCID=afufdb.1752929197138.01.0; WM_TID=w56rtw84y8xFFRUFFFaWlEwdi9HsTPPx; ntes_utid=tid._.PSyfY3JOx0RBU1QEVUOXxAgNn5D45V5b._.0; sDeviceId=YD-2YQrQBUVIYNEEhFVFBLC1Vxdz9Do8Q9L; __snaker__id=lL7FutREOnhxCCOR; NTES_YD_SESS=IYKzSN83ZCvedB.BiBZzF5G_veROWIjRYr5e6Sc0XXGwYtclYUOmhkw1a0.MukKNJQreWDCApj34iv3SZJNJn_.PQSmk8c6PQksQSvv6rX4DjegWq9IKjsgD6j6GXyEdsjiallCT1EfKol6avFPCYqmtsOOYI9dDIzzYe.cAfxIwgljMO2.1RWhTVjEV0p1FIFW7_94K6FTWzzH37EUZY4QRXUzDUPv41QJhjQHqBX43D; S_INFO=1755089402|0|0&60##|18820433765; P_INFO=18820433765|1755089402|1|music|00&99|null&null&null#CN&null#10#0|&0||18820433765; MUSIC_U=008FF69D4560478C7DA989203D5E2AA50BF02A6C96DDB733B3C833B3F9A6BA900646CDB4D092B45D9A76E5BEDC50A833697C4CCDF2C3296D8AF2AC9BEE703C38ADB9ED87893F21082FFA0520C5592779A278F3D74FDEA577BA97262F45456C93B6939AA6AFE5F9E71A3A91DD6BA8D720BAC9D43D5C921200A2112BA232AF8E4E9F43C1AF830579CF61190B2B4FC51E75623FB8BE994178ABD883579A82F42256551CB11E20538FBE0636082F07BD90D446BDBD1D8BDE8BA34A6A973F9B3338217CB9C5305BAB73E20AFD05BC89F0A0BBF84A1425EF47D4962301364AA1B847D356351B10D978D52F266446261A8FD40F985D91B118CB9216EEE28402BC6D91E9B27CE4F6ADF363D2DA500A648F491F7A0508BCC2159BB652E8AED40D181077722221AE388AD5E3D447F3ECB9CDBEF7F8938C7409B24F5E51E7EAC31906024E6F14EF9589FA8BB6DF576ACB8C29E6D2E921F2F521D23BC64FFD23B651DFEC6F638118B551D220B3466E323F13E262280892C184DF89CDD72EFE0C026B7135C8076A659C1B6D72FEFD3229735A85B6026068A3BF9F5009186063F430D7FB5E20A580; __remember_me=true; __csrf=499ec94003b326226225986368fbaaee; ntes_kaola_ad=1; gdxidpyhxdE=2Ht90yiG98n6Up7S5PuV9MLu2Nai2EZacJToBfDiybb2BKQmpviSwbqhawp8YhWdLQ3kA3p110y0I62JondkU6jATa%5CCCpjKAP1uEnOHadNqa333Y%2F9QrbzPktvZvB1CRNS9s%2Bux%5COceRcIEZBAI14%2Folkb4Q8%2BO3IpsTEPrjJ7yk9tj%3A1755091959878; WM_NI=gHhl%2F%2BVzDWKjGnvLEG9iH2%2FypUKkENyhJ1fKrMlZp8I50rUI4GCPgS3sbj2aWC6byac4%2BwBHuU15LrMQYRcYV6vD8UXQKU%2FGKn%2Bbo0c6ePjVuY4Yk%2FRmFdFDJAY9L3GWWXU%3D; WM_NIKE=9ca17ae2e6ffcda170e2e6ee88b35fabbfa4a6cc3bfc928ab7d84f878b8e83c26d8eb79eb0ed7e95ab9abac92af0fea7c3b92aa598a88dae2196a68cb8ca6285b2baadc84dfbb788d3ae73b48b858cc846bbb886d2e541b293a4bbf3348beb0093d843f8998db1e659f1adae8bb16b959dfa83fc6ba1ece598c144b78bffd6cf7a8f8f97b3e25396eabaa5bb5f9c8f85b6ae4d89b2e583ee3ca1eaabb1e95eb787fcbaea2592b38a85c5508a9f97dacf39858999b9d837e2a3; JSESSIONID-WYYY=xwkdKolezZNzYk9TRC44UmJbrvOFuMbV4Vbp9eXR98R16A3iBvoeT2wMWpSqoehT%2FvXN3NSe%2FTwafT83jQ6ENfrz7kFk4uf77%2FroN%2Fs8llQXFk4JQdrRU2%5CUr4P2whIq7UrGOrK8hJfe3PdJgS5AvohTrGEI9bw8OXo4BhDsI6Zpfz4J%3A1755221368510';
/************ ↑↑↑↑↑ 如果网易云音乐歌曲获取失效，请将你的 COOKIE 放到这儿 ↑↑↑↑↑ ***************/
/**
* cookie 获取及使用方法见 
* https://github.com/mengkunsoft/MKOnlineMusicPlayer/wiki/%E7%BD%91%E6%98%93%E4%BA%91%E9%9F%B3%E4%B9%90%E9%97%AE%E9%A2%98
* 
* 更多相关问题可以查阅项目 wiki 
* https://github.com/mengkunsoft/MKOnlineMusicPlayer/wiki
* 
* 如果还有问题，可以提交 issues
* https://github.com/mengkunsoft/MKOnlineMusicPlayer/issues
**/


define('HTTPS', true);    // 如果您的网站启用了https，请将此项置为“true”，如果你的网站未启用 https，建议将此项设置为“false”
define('DEBUG', false);      // 是否开启调试模式，正常使用时请将此项置为“false”
define('JSONP', false);      // 是否开启JSONP模式，使用远程api时请开启
define('CACHE_PATH', 'cache/');     // 文件缓存目录,请确保该目录存在且有读写权限。如无需缓存，可将此行注释掉

/*
 如果遇到程序不能正常运行，请开启调试模式，然后访问 http://你的网站/音乐播放器地址/api.php ，进入服务器运行环境检测。
 此外，开启调试模式后，程序将输出详细的运行错误信息，方便定位错误原因。
 
 因为调试模式下程序会输出服务器环境信息，为了您的服务器安全，正常使用时请务必关闭调试。
*/

/*****************************************************************************************************/
if(!defined('DEBUG') || DEBUG !== true) error_reporting(0); // 屏蔽服务器错误

require_once('plugns/Meting.php');
require_once('plugns/Download.php');

use Metowolf\Meting;
use Mxue\Download;

$source = getParam('source', 'netease');  // 歌曲源
$API = new Meting($source);
$DOWNLOAD = new Download($source);

$API->format(true); // 启用格式化功能

if($source == 'kugou' || $source == 'baidu' || $source == 'tencent') {
    define('NO_HTTPS', true);        // 酷狗、百度音乐和QQ源暂不支持 https
} elseif(($source == 'netease') && $netease_cookie) {
    $API->cookie($netease_cookie);    // 解决网易云 Cookie 失效
}

// 没有缓存文件夹则创建
if(defined('CACHE_PATH') && !is_dir(CACHE_PATH)) createFolders(CACHE_PATH);

$types = getParam('types');
switch($types)   // 根据请求的 Api，执行相应操作
{
    case 'url':   // 获取歌曲链接
        $id = getParam('id');  // 歌曲ID
        
        $data = $API->url($id);
        
        echojson($data);
        break;
        
    case 'pic':   // 获取封面链接
        $id = getParam('id');  // 歌曲ID
        
        $data = $API->pic($id);
        
        echojson($data);
        break;
    
    case 'lyric':       // 获取歌词
        $id = getParam('id');  // 歌曲ID
        
        if(defined('CACHE_PATH')) {
            $cache = CACHE_PATH.$source.'_'.$types.'_'.$id.'.json';
            
            if(file_exists($cache)) {   // 缓存存在，则读取缓存
                $data = file_get_contents($cache);
            } else {
                $data = $API->lyric($id);
                
                // 只缓存链接获取成功的歌曲
                if(isset($data) && isset(json_decode($data)->lyric)) {
                    file_put_contents($cache, $data);
                }
            }
        } else {
            $data = $API->lyric($id);
        }
        
        echojson($data);
        break;
    
    case 'userlist':    // 获取用户歌单列表
        $uid = getParam('uid');  // 用户ID
        
        if(defined('CACHE_PATH')) {
            $cache = CACHE_PATH.$source.'_'.$types.'_'.$uid.'.json';
            
            if(file_exists($cache)) {   // 缓存存在，则读取缓存
                $data = file_get_contents($cache);
            } else {
                $url= 'http://music.163.com/api/user/playlist/?offset=0&limit=1001&uid='.$uid;
                $data = file_get_contents($url);

                // 只缓存链接获取成功的用户列表
                if(isset($data) && isset(json_decode($data)->playlist)) {
                    file_put_contents($cache, $data);
                }
            }
        } else {
            $url= 'http://music.163.com/api/user/playlist/?offset=0&limit=1001&uid='.$uid;
            $data = file_get_contents($url);
        }
        
        echojson($data);
        break;
        
    case 'playlist':    // 获取歌单中的歌曲
        $id = getParam('id');  // 歌单ID
        
        if(defined('CACHE_PATH')) {
            $cache = CACHE_PATH.$source.'_'.$types.'_'.$id.'.json';
            
            if(file_exists($cache)) {   // 缓存存在，则读取缓存
                $data = file_get_contents($cache);
            } else {
                $data = $API->format(false)->playlist($id);
                
                // 只缓存链接获取成功的歌曲
                if(isset($data) && isset(json_decode($data)->playlist->tracks)) {
                    file_put_contents($cache, $data);
                }
            }
        } else {
            $data = $API->format(false)->playlist($id);
        }
        
        echojson($data);
        break;
     
    case 'search':  // 搜索歌曲
        $s = getParam('name');  // 歌名
        $limit = getParam('count', 20);  // 每页显示数量
        $pages = getParam('pages', 1);  // 页码
        
        if(defined('CACHE_PATH')) {
            $cache = CACHE_PATH.$source.'_'.$types.'_'.md5($s).'_'.$pages.'_'.$limit.'.json';

            if(file_exists($cache)) {   // 缓存存在，则读取缓存
                $data = file_get_contents($cache);
            } else {
                $data = $API->search($s, [
                    'page' => $pages, 
                    'limit' => $limit
                ]);

                // 只缓存链接获取成功的歌曲
                if(isset($data) && json_decode($data)) {
                    file_put_contents($cache, $data);
                }
            }
        } else {
            $data = $API->search($s, [
                'page' => $pages, 
                'limit' => $limit
            ]);
        }
        
        echojson($data);
        break;
    
    case 'comments':  // 获取评论
        $id = getParam('id');  // 歌曲id
        $limit = getParam('count', 50);  // 每页显示数量
        $pages = getParam('pages', 1);  // 页码
        
        if(defined('CACHE_PATH')) {
            $cache = CACHE_PATH.$source.'_'.$types.'_'.$id.'_'.$pages.'_'.$limit.'.json';

            if(file_exists($cache)) {   // 缓存存在，则读取缓存
                $data = file_get_contents($cache);
            } else {
                $data = $API->comments($id, [
                    'page' => $pages, 
                    'limit' => $limit
                ]);

                // 只缓存链接获取成功的歌曲
                if(isset($data) && (isset(json_decode($data)->hot_comment) || isset(json_decode($data)->comment))) {
                    file_put_contents($cache, $data);
                }
            }
        } else {
            $data = $API->comments($id, [
                'page'  => $pages,
                'limit' => $limit
            ]);
        }

        echojson($data);
        break;
    
    case 'download':    // 下载歌曲
        $url = getParam('url');
        $name = getParam('name');
        $artist = getParam('artist');

        $data = $DOWNLOAD->download($url, $name, $artist);

        echojson($data);
        break;
    
    case 'cache':
        $minute = getParam('minute', 30);   // 删除几分钟之前的文件

        date_default_timezone_set('Asia/Shanghai'); // 如果时区不同请自行设置时区

        $list = scandir(CACHE_PATH);
        $jsonList = array();

        foreach ($list as $val) {
            $filePath = CACHE_PATH.$val;
            if (is_file($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
                array_push($jsonList, $filePath);
            }
        }

        $data = array();
        foreach($jsonList as $val) {
            if (strtotime('+'.$minute.' minute', filemtime($val)) <= time()) {
                $filetime = date('Y-m-d H:i:s', filemtime($val));
                if (unlink($val)) {
                    array_push($data, array(
                        'msg' => '删除成功。',
                        'time' => $filetime,
                        'file' => $val,
                    )); 
                } else {
                    array_push($data, array(
                        'msg' => '删除失败，请检查文件权限或其他问题。',
                        'time' => $filetime,
                        'file' => $val,
                    ));
                }
            }
        }

        echojson(json_encode($data));
        break;

    default:
        echo '<!doctype html><html><head><meta charset="utf-8"><title>信息</title><style>* {font-family: microsoft yahei}</style></head><body> <h2>MKOnlinePlayer</h2><h3>Github: https://github.com/mengkunsoft/MKOnlineMusicPlayer</h3><br>';
        if(!defined('DEBUG') || DEBUG !== true) {   // 非调试模式
            echo '<p>Api 调试模式已关闭</p>';
        } else {
            echo '<p><font color="red">您已开启 Api 调试功能，正常使用时请在 api.php 中关闭该选项！</font></p><br>';
            
            echo '<p>PHP 版本：'.phpversion().' （本程序要求 PHP 5.4+）</p><br>';
            
            echo '<p>服务器函数检查</p>';
            echo '<p>curl_exec: '.checkfunc('curl_exec',true).' （用于获取音乐数据）</p>';
            echo '<p>file_get_contents: '.checkfunc('file_get_contents',true).' （用于获取音乐数据）</p>';
            echo '<p>json_decode: '.checkfunc('json_decode',true).' （用于后台数据格式化）</p>';
            echo '<p>hex2bin: '.checkfunc('hex2bin',true).' （用于数据解析）</p>';
            echo '<p>openssl_encrypt: '.checkfunc('openssl_encrypt',true).' （用于数据解析）</p>';
        }
        
        echo '</body></html>';
}

/**
 * 创建多层文件夹 
 * @param $dir 路径
 */
function createFolders($dir) {
    return is_dir($dir) or (createFolders(dirname($dir)) and mkdir($dir, 0755));
}

/**
 * 检测服务器函数支持情况
 * @param $f 函数名
 * @param $m 是否为必须函数
 * @return 
 */
function checkfunc($f,$m = false) {
	if (function_exists($f)) {
		return '<font color="green">可用</font>';
	} else {
		if ($m == false) {
			return '<font color="black">不支持</font>';
		} else {
			return '<font color="red">不支持</font>';
		}
	}
}

/**
 * 获取GET或POST过来的参数
 * @param $key 键值
 * @param $default 默认值
 * @return 获取到的内容（没有则为默认值）
 */
function getParam($key, $default='')
{
    return trim($key && is_string($key) ? (isset($_POST[$key]) ? $_POST[$key] : (isset($_GET[$key]) ? $_GET[$key] : $default)) : $default);
}

/**
 * 输出一个json或jsonp格式的内容
 * @param $data 数组内容
 */
function echojson($data)    //json和jsonp通用
{
    header('Content-type: application/json');
    $callback = getParam('callback');
    
    if(defined('HTTPS') && HTTPS === true && !defined('NO_HTTPS')) {    // 替换链接为 https
        $data = str_replace('http:\/\/', 'https:\/\/', $data);
        $data = str_replace('http://', 'https://', $data);
    }
    
    if(defined('JSONP') && JSONP === true && $callback) //输出jsonp格式
    {
        die(htmlspecialchars($callback).'('.$data.')');
    } else {
        die($data);
    }
}
