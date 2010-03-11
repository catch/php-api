<?php
/*
 * http://snaptic.com PHP library
 * Requires a PHP compiled with CURL and JSON (default after 5.2.0)
 *
 * By Niall O'Higgins <niallo@snaptic.com> 2010-03-10
 */

class Snaptic {
    var $username = '';
    var $password = '';
    var $endpoint = 'https://snaptic.com/v1/notes.json';

    public function __construct($username = null, $password = null) {
        $this->username = $username;
        $this->password = $password;
    }

    public function getNotes() {
        $json = $this->getBasicAuth();
        $result = json_decode($json);
        return $result;
    }

    public function postNote($text) {
        $result = $this->postBasicAuth(array("text"=>"$text"));
        return $result;
    }

    /* HTTP GET a URL with basic auth */
    private function getBasicAuth() {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

    private function postBasicAuth($data=array()) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->endpoint);
        curl_setopt($ch, CURLOPT_USERPWD, "$this->username:$this->password");
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        /* work around lighttpd bug http://redmine.lighttpd.net/issues/1017 */
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }

}


?>
