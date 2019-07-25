<?php

/**
 * 将时间戳转换为能看的懂的
 * 传入数组型
 */
function toTime($arr, $add_field = 'add_time')
{


    foreach ($arr as $key => $value) {

        if (!empty($value[$add_field])) {
            $arr[$key][$add_field] = date('Y-m-d H:i:s', $value[$add_field]);
        }
        if (!empty($value['edit_time'])) {
            $arr[$key]['edit_time'] = date('Y-m-d H:i:s', $value['edit_time']);
        }
    }

    return $arr;
}

//设置网络请求配置
function _request($curl, $https = true, $method = 'GET', $data = null)
{
    // 创建一个新cURL资源
    $ch = curl_init();

    // 设置URL和相应的选项
    curl_setopt($ch, CURLOPT_URL, $curl);    //要访问的网站
    curl_setopt($ch, CURLOPT_HEADER, false);    //启用时会将头文件的信息作为数据流输出。
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  //将curl_exec()获取的信息以字符串返回，而不是直接输出。

    if ($https) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);  //false 禁止 cURL 验证对等证书（peer's certificate）。
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true);  //验证主机
    }
    if ($method == 'POST') {
        curl_setopt($ch, CURLOPT_POST, true);  //发送 POST 请求
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);  //全部数据使用HTTP协议中的 "POST" 操作来发送。
    }


    // 抓取URL并把它传递给浏览器
    $content = curl_exec($ch);
    if ($content  === false) {
        return "网络请求出错: " . curl_error($ch);
        exit();
    }
    //关闭cURL资源，并且释放系统资源
    curl_close($ch);
    // http://127.0.0.1:12138/wShop/index.php/home/test/index
    return $content;
}




/**
 * 获取用户的openid
 * @param  string $openid [description]
 * @return [type]         [description]
 */
function baseAuth($redirect_url)
{

    $appid = 'wx9b7ab18e61268efb';
    $appsecret = 'bcd46807674b9448617438256db6cada';
    //===
    // $appid='wxc5919bd34da8b695';
    // $appsecret='87e678bca54b92f8c7213e1ba9f12963';


    //1.准备scope为 snsapi_base 网页授权页面 snsapi_userinfo

    $baseurl = urlencode($redirect_url);
    $snsapi_base_url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $appid . '&redirect_uri=' . $baseurl . '&response_type=code&scope=snsapi_userinfo&state=YQJ#wechat_redirect';

    //2.静默授权,获取code
    //页面跳转至redirect_uri/?code=CODE&state=STATE
    $code = $_GET['code'];
    if (!isset($code)) {
        header('Location:' . $snsapi_base_url);
    }


    //3.通过code换取网页授权access_token和openid
    $curl = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $appid . '&secret=' . $appsecret . '&code=' . $code . '&grant_type=authorization_code';
    $content = _request($curl);
    $result = json_decode($content, true);

    return $result;
}

/**
 * +-----------------------------------------------------------------------------------------
 * 删除目录及目录下所有文件或删除指定文件
 * +-----------------------------------------------------------------------------------------
 * @param str $path   待删除目录路径
 * @param int $delDir 是否删除目录，1或true删除目录，0或false则只删除文件保留目录（包含子目录）
 * +-----------------------------------------------------------------------------------------
 * @return bool 返回删除状态
 * +-----------------------------------------------------------------------------------------
 */
function delFile($path, $delDir = false)
{
    if (is_array($path)) {
        foreach ($path as $subPath)
            delFile($subPath, $delDir);
    }
    if (is_dir($path)) {
        $handle = opendir($path);
        if ($handle) {
            while (false !== ($item = readdir($handle))) {
                if ($item != "." && $item != "..")
                    is_dir("$path/$item") ? delFile("$path/$item", $delDir) : unlink("$path/$item");
            }
            closedir($handle);
            if ($delDir)
                return rmdir($path);
        }
    } else {
        if (file_exists($path)) {
            return unlink($path);
        } else {
            return false;
        }
    }
    clearstatcache();
}


//判断字符串的开头
function startwith($str, $pattern)
{
    if (strpos($str, $pattern) === 0)
        return true;
    else
        return false;
}


/**
 * 设置重复提交的验证码
 * Discount
 * =================================
 * 创建日期：2017年11月30日16:57:28
 * 作者：代码狮
 * github：https://github.com/ALNY-AC
 * 微信:AJS0314
 * QQ:1173197065
 * 留言：后来者想了解详细情况的请联系作者。
 * =================================
 * 不需要传任何参数，调用就行
 * @return String $_code 返回生成的唯一验证码
 */
function setRepeat()
{

    //表单唯一提交验证码
    $_code = md5(rand() . __KEY__);
    session('_repeat_code', $_code);
    //表单唯一提交验证码end

    return $_code;
}


/**
 * 验证是否重复提交
 * Discount
 * =================================
 * 创建日期：2017年11月30日16:57:28
 * 作者：代码狮
 * github：https://github.com/ALNY-AC
 * 微信:AJS0314
 * QQ:1173197065
 * 留言：后来者想了解详细情况的请联系作者。
 * =================================
 *不传参数，自动获取session，当判断重复提交后，直接退出php脚本
 */
function isRepeat()
{

    $_user_code = I('post._repeat_code');
    if (empty($_user_code)) {
        //如果没有这个玩意，就直接退出
        // echo '缺少关键参数！请返回重试！';
        return false;
    } else {
        //有表单提交唯一验证码
        $_code = session('_repeat_code');
        if ($_code !== $_user_code) {
            //这里不相等，所以需要重新提交
            // echo '重复提交数据！请返回重试！';
            return false;
        }
    }
    session('_repeat_code', null);
    return true;
}

/**
 * 创建目录
 * set_mkdir
 * =================================
 * 创建日期：2017年12月16日11:31:58
 * 作者：代码狮
 * github：https://github.com/ALNY-AC
 * 微信:AJS0314
 * QQ:1173197065
 * 留言：后来者想了解详细情况的请联系作者。
 * =================================
 *可以创建多级目录
 */
function set_mkdir($src)
{
    //创建目录
    if (is_dir($src)) {
        //存在不创建
        return true;
    } else {
        //第三个参数是“true”表示能创建多级目录，iconv防止中文目录乱码
        $res = mkdir(iconv("UTF-8", "GBK", $src), 0777, true);
        if ($res) {
            return true;
        } else {
            return false;
        }
    }
}


//更新人数
function updatePeople($subject_id)
{
    //取出课程数据>_<
    $model = M('subject');
    $where = [];
    $where['subject_id'] = $subject_id;
    $subject = $model->where($where)->find();
    $sub = $subject['sub'];
    // //取出课程数据>end<

    // //取出订单数据>_<
    // $order=M('order');//订单模型
    // $num=$subject['num'];//课程设置的人员数量
    // $count = $order->where($where)->count();//计算订单中报名的数量
    // $sub=$num-$count;//相减
    // //取出订单数据>end<

    // //记录剩余人数>_<
    // // $save=[];
    // // $save['sub']=$sub;
    // // M('subject')->where($where)->save($save);
    // //记录剩余人数>end<
    return $sub;
}
function ec($str)
{
    echo "<div style='font-size:14px;padding:10px 0;'>$str<div>";
}



//发送短信
function send_sms($phone, $arr)
{

    Vendor('Message.CCP.SDK.CCPRestSDK');
    // 说明：需要包含接口声明文件，可将该文件拷贝到自己的程序组织目录下。
    $accountSid = '8aaf0708697b6beb01699a6311741292';
    // 说明：主账号，登陆云通讯网站后，可在控制台首页看到开发者主账号ACCOUNT SID。

    $accountToken = 'c32e586dcaa04584863aa95e7109fd49';
    // 说明：主账号Token，登陆云通讯网站后，可在控制台首页看到开发者主账号AUTH TOKEN。

    $appId = '8aaf0708697b6beb01699a6311cd1299';
    // 说明：请使用管理控制台中已创建应用的APPID。

    $serverIP = 'app.cloopen.com';
    // 说明：生产环境请求地址：app.cloopen.com。

    $serverPort = '8883';
    // 说明：请求端口 ，无论生产环境还是沙盒环境都为8883.

    $softVersion = '2013-12-26';
    // 说明：REST API版本号保持不变。

    // ====
    // 初始化REST SDK

    $rest = new REST($serverIP, $serverPort, $softVersion);
    $rest->setAccount($accountSid, $accountToken);
    $rest->setAppId($appId);


    // 发送模板短信
    $result = $rest->sendTemplateSMS($phone, $arr, '419357');
    // dump($result);
    return;
    if ($result == null) {
        return -2;
    }
    if ($result->statusCode != 0) {
        // echo "模板短信发送失败!";
        // echo "error code :" . $result->statusCode . "";
        // echo "error msg :" . $result->statusMsg . "";
        return -2;
    } else {
        // 获取返回信息
        return 1;
        //下面可以自己添加成功处理逻辑
    }
}
