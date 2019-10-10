<?php
defined('IN_IA') or exit('Access Denied');

class Mogucms_diyModuleWebapp extends WeModuleWebapp {
	// 保存错误信息

    public $error;

    // Access Key ID

    private $accessKeyId = '';

    // Access Access Key Secret

    private $accessKeySecret = '';

    // 签名

    private $signName = '';

    // 模版ID

    private $templateCode = '';
    public function doPageFengmian(){
		include $this->template('index');
	}
	public function doPageJuhe(){
		global $_GPC,$_W;
        $receiver = $_GPC['receiver'];
        if($receiver){
			$domain =$_SERVER['HTTP_HOST'];
            $set = pdo_fetch("select * from ".tablename("mogucms_diy_domain")." as a left join ".tablename("mogucms_diy_mysite")." as b on a.mysiteid = b.id where a.domain='".$domain."'");
            
            $setting = iunserializer($set['loginset']);
            if($setting['smsapi']=="juhe"){
                pdo_delete('uni_verifycode', array('createtime <' => TIMESTAMP - 1800));
                $sql = 'SELECT * FROM ' . tablename('uni_verifycode') . ' WHERE `receiver`=:receiver AND `uniacid`=:uniacid';
                $pars = array();
                $pars[':receiver'] = $receiver;
                $pars[':uniacid'] = 0;
                $row = pdo_fetch($sql, $pars);
				
                $record = array();
                $code = random(6, true);
                if(!empty($row)) {
                    if($row['total'] >= 5) {
                        exit(json_encode(array("message"=>array("errno"=>0,"message"=>"您的操作过于频繁,请稍后再试"))));
                    }
                    $record['total'] = $row['total'] + 1;
                    $record['verifycode'] = $code;
                    $record['createtime'] = TIMESTAMP;
                } else {
                    $record['uniacid'] = 0;
                    $record['receiver'] = $receiver;
                    $record['verifycode'] = $code;
                    $record['total'] = 1;
                    $record['createtime'] = TIMESTAMP;
                }

                if(!empty($row)) {
                    pdo_update('uni_verifycode', $record, array('id' => $row['id']));
                } else {
                    pdo_insert('uni_verifycode', $record);
                }
                $temp ="#code#=$code";
                $a=ihttp_get("http://v.juhe.cn/sms/send?mobile=".$receiver."&tpl_id=".$setting['juheid']."&tpl_value=".urlencode($temp)."&key=".$setting["juhekey"]);
                echo json_encode(array("message"=>array("errno"=>0,"message"=>"验证码发送成功")));
            }
        }else{
            echo json_encode(array("errno"=>10001,"message"=>"该页面不提供直接访问"));
        }
	}
	public function doPageAli(){
		global $_GPC,$_W;
        $mobile =  $_GPC['receiver'];
		if($mobile){
			$domain =$_SERVER['HTTP_HOST'];
            $set = pdo_fetch("select * from ".tablename("mogucms_diy_domain")." as a left join ".tablename("mogucms_diy_mysite")." as b on a.mysiteid = b.id where a.domain='".$domain."'");
            
            $setting = iunserializer($set['loginset']);
            if($setting['smsapi']=="ali"){
				$this->accessKeyId = $setting['aliid'];
				$this->accessKeySecret = $setting['alisecret'];
				$this->signName = $setting['smssign'];
				$this->templateCode = $setting['alimoban'];
                pdo_delete('uni_verifycode', array('createtime <' => TIMESTAMP - 1800));
                $sql = 'SELECT * FROM ' . tablename('uni_verifycode') . ' WHERE `receiver`=:receiver AND `uniacid`=:uniacid';
                $pars = array();
                $pars[':receiver'] = $mobile;
                $pars[':uniacid'] = 0;
                $row = pdo_fetch($sql, $pars);
				
                $record = array();
                $code = random(6, true);
                if(!empty($row)) {
                    if($row['total'] >= 5) {
                        exit(json_encode(array("message"=>array("errno"=>0,"message"=>"您的操作过于频繁,请稍后再试"))));
                    }
                    $record['total'] = $row['total'] + 1;
                    $record['verifycode'] = $code;
                    $record['createtime'] = TIMESTAMP;
                } else {
                    $record['uniacid'] = 0;
                    $record['receiver'] = $mobile;
                    $record['verifycode'] = $code;
                    $record['total'] = 1;
                    $record['createtime'] = TIMESTAMP;
                }

                if(!empty($row)) {
                    pdo_update('uni_verifycode', $record, array('id' => $row['id']));
                } else {
                    pdo_insert('uni_verifycode', $record);
                }
                $status = self::send_verify($mobile, $code);
                echo json_encode(array("message"=>array("errno"=>0,"message"=>"验证码发送成功")));
            }
        }else{
            echo json_encode(array("errno"=>10001,"message"=>"该页面不提供直接访问"));
        }
	}

	private function percentEncode($string) {
        $string = urlencode ( $string );
        $string = preg_replace ( '/\+/', '%20', $string );
        $string = preg_replace ( '/\*/', '%2A', $string );
        $string = preg_replace ( '/%7E/', '~', $string );
        return $string;
    }
	
	private function computeSignature($parameters, $accessKeySecret) {

        ksort ( $parameters );

        $canonicalizedQueryString = '';

        foreach ( $parameters as $key => $value ) {

            $canonicalizedQueryString .= '&' . $this->percentEncode ( $key ) . '=' . $this->percentEncode ( $value );

        }

        $stringToSign = 'GET&%2F&' . $this->percentencode ( substr ( $canonicalizedQueryString, 1 ) );

        $signature = base64_encode ( hash_hmac ( 'sha1', $stringToSign, $accessKeySecret . '&', true ) );

        return $signature;

    }

	public function send_verify($mobile, $verify_code) {

        $params = array (   //此处作了修改

                'SignName' => $this->signName,

                'Format' => 'JSON',

                'Version' => '2017-05-25',

                'AccessKeyId' => $this->accessKeyId,

                'SignatureVersion' => '1.0',

                'SignatureMethod' => 'HMAC-SHA1',

                'SignatureNonce' => uniqid (),

                'Timestamp' => gmdate ( 'Y-m-d\TH:i:s\Z' ),

                'Action' => 'SendSms',

                'TemplateCode' => $this->templateCode,

                'PhoneNumbers' => $mobile,

                //'TemplateParam' => '{"code":"' . $verify_code . '"}' 

                'TemplateParam' => '{"code":"'.$verify_code.'"}'   //更换为自己的实际模版

        );

        //var_dump($params);die;

        // 计算签名并把签名结果加入请求参数

        $params ['Signature'] = $this->computeSignature ( $params, $this->accessKeySecret );

        // 发送请求（此处作了修改）

        //$url = 'https://sms.aliyuncs.com/?' . http_build_query ( $params );

        $url = 'http://dysmsapi.aliyuncs.com/?' . http_build_query ( $params );

         

        $ch = curl_init ();

        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_SSL_VERIFYPEER, FALSE );

        curl_setopt ( $ch, CURLOPT_SSL_VERIFYHOST, FALSE );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );

        curl_setopt ( $ch, CURLOPT_TIMEOUT, 10 );

        $result = curl_exec ( $ch );

        curl_close ( $ch );

        $result = json_decode ( $result, true );
		file_put_contents("a.txt",serialize($result));
        //var_dump($result);die;

        if (isset ( $result ['Code'] )) {

            $this->error = $this->getErrorMessage ( $result ['Code'] );

            return false;

        }

        return true;

    }

	public function getErrorMessage($status) {

        // 阿里云的短信 乱八七糟的(其实是用的阿里大于)

        // https://api.alidayu.com/doc2/apiDetail?spm=a3142.7629140.1.19.SmdYoA&apiId=25450

        $message = array (

                'InvalidDayuStatus.Malformed' => '账户短信开通状态不正确',

                'InvalidSignName.Malformed' => '短信签名不正确或签名状态不正确',

                'InvalidTemplateCode.MalFormed' => '短信模板Code不正确或者模板状态不正确',

                'InvalidRecNum.Malformed' => '目标手机号不正确，单次发送数量不能超过100',

                'InvalidParamString.MalFormed' => '短信模板中变量不是json格式',

                'InvalidParamStringTemplate.Malformed' => '短信模板中变量与模板内容不匹配',

                'InvalidSendSms' => '触发业务流控',

                'InvalidDayu.Malformed' => '变量不能是url，可以将变量固化在模板中'

        );

        if (isset ( $message [$status] )) {

            return $message [$status];

        }

        return $status;

    }
}