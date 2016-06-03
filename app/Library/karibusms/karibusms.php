<?php

/**
 *
 *      INNOVATION NETWORK AND SOFTWARE COMPANY
 *
 * 
 *         karibuSMS API 
 * 
 *  @author Ephraim Swilla <swillae1@gmail.com>
 *  @author Yohanna Nasson <yohana.nasson@yahoo.com>
 *
 *  @uses This file is used for sending SMS to users
 * 
 *  @filesource
 * 
 *  @version 1.0
 *  
 */
//**** We check if your server support php curl.....
if (!function_exists('curl_init')) {
    die('KaribuSMS needs you to install first CURL PHP extension. If you use linux, check it here http://goo.gl/FbtR9n');
}

//**** Check if JSON is enabled in your server
if (!function_exists('json_decode')) {
    die('karibusms needs you to install first JSON PHP extension.');
}

class karibusms {

    private $HEADER = array(
    'application/x-www-form-urlencoded'
    );
    private $URL = 'http://karibusms.com/api';
    private $name;

    /**
     *
     * @var karibuSMSpro
     * @uses True Will not use your android phone to send SMS but will use internet messaging
     * 	     False is the default. SMS will be called from your android phone
     */
    public $karibuSMSpro = false;

    public function __construct() {
        define("API_SECRET","f6e39b95eb20c8031031eeeb1bf2f468ee8355cf");
        define("API_KEY","23439155712");
        if (!defined('API_KEY')) {
            die('define first your API_KEY. To define, just write: '
            . 'define("API_KEY","paste your api key here");');
        }
        if (!defined('API_SECRET')) {
            die('define first your API_SECRET. To define, just write:'
            . ' define("API_SECRET","paste your secret key here");');
        }
    }

    /**
     * 
     * @param type $name
     * @uses Set a name Name that will appear as from keyword in message sent
     * @access public, Used only when you use karibusmspro=TRUE; but is still an
     *                 option case. If you don't set name and you use karibusmspro=true,
     *                 app name will be displayed as from name, in a message
     * @return type
     */
    public function set_name($name) {
        return $this->name = $name;
    }

    /**
     * 
     * @param type $phone_number 
     * @param type $message
     * @return message from Server
     * @example path $karibusms->send_sms(255714826458,25578658464,"Hello");
     */
    public function send_sms($phone_number, $message) {
        $pro = $this->karibuSMSpro == FALSE ? 0 : 1;
        $name = $this->name == '' ? 0 : $this->name;
        $fields = array(
        'phone_number' => $phone_number,
        'message' => $message,
        'api_secret' => API_SECRET,
        'karibusmspro' => $pro,
        'name' => $name,
        'api_key' => API_KEY
        );
        return $this->curl($fields);
    }

    /**
     * 
     * @param type $pure_string
     * @return type
     */
    private function encrypt($pure_string) {
        $iv_size = mcrypt_get_iv_size(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
        $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
        $encrypted_string = mcrypt_encrypt(MCRYPT_BLOWFISH, API_SECRET, utf8_encode($pure_string), MCRYPT_MODE_ECB, $iv);
        return $encrypted_string;
    }

    /**
     * 
     * @param type $fields
     */
    private function curl($fields) {
        // Open connection
        $ch = curl_init();
        // Set the url, number of POST vars, POST data

        curl_setopt($ch, CURLOPT_URL, $this->URL);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->HEADER);

        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $result = curl_exec($ch);
        curl_close($ch);
        echo $result;
    }

}
