<?php

namespace Itsaafrin\Isms;

class Isms {

    public function __construct() {
        $this->username = \Config::get('isms::username');
        $this->password = \Config::get('isms::password');
        $this->url = \Config::get('isms::protocol') . \Config::get('isms::url');
        $this->sender_id = \Config::get('isms::sender_id');
    }

    public function SendSms($destination, $message, $type) {

        $destination = urlencode($destination);
        $message = html_entity_decode($message, ENT_QUOTES, 'utf-8');
        $message = urlencode($message);

        $type = (int) $type;

        $link = $this->url . "isms_send.php";
        $link .= "?un=$this->username&pwd=$this->password&dstno=$destination&msg=$message&type=$type&sendid=$this->sender_id";

        $result = $this->postcURL($link);
        return $result;
    }

    public function CheckBalance() {
        $link = $this->url;
        $link .= "isms_balance.php?un=" . urlencode($this->username) . "&pwd=" . urlencode($this->password);
        $result = $this->postcURL($link);
        return $result;
    }

    private function postcURL($link) {

        $http = curl_init($link);
        
        curl_setopt($http, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($http, CURLOPT_SSL_VERIFYPEER, false);
        $http_result = curl_exec($http);
        $http_status = curl_getinfo($http, CURLINFO_HTTP_CODE);
        curl_close($http);
        
        $response = array();
        $response['http_result'] = $http_result;
        $response['http_status'] = $http_status;
        
        return $response;
    }

}
