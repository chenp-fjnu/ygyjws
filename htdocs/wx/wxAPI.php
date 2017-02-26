<?php
require_once 'API.php';
require_once "jssdk.php";

class wxAPI extends API
{
    const ENCODING = 'UTF-8';
    private $jssdk;
    public $assessToken;

	public function setup(){
        $this->jssdk = new JSSDK("wx478a4ee1cf43c4d8", "22e4a856c8fad8f456362bd2e814dd86");
        $this->assessToken = $this->jssdk->getAccessToken();
    }
    public function __construct($action) {
        parent::__construct($action);
        $this->setup();
    }
    protected function get_materialcount(){
        $url = "https://api.weixin.qq.com/cgi-bin/material/get_materialcount?access_token=".$this->assessToken;
        $res = json_decode($this->jssdk->httpGet($url));
        return $res;
    }
 }
// Requests from the same server don't have a HTTP_ORIGIN header
if (!array_key_exists('HTTP_ORIGIN', $_SERVER)) {
    $_SERVER['HTTP_ORIGIN'] = $_SERVER['SERVER_NAME'];
}

try {
    $API = new wxAPI($_REQUEST['action']);
    echo $API->processAPI();
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}