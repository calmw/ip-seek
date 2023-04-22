<?php

namespace calm;
class IpSeek
{
    public function getLocationByIp($ip, $host = "https://ip.teco.cool/api/v1/"): array
    {
        if (!$this->checkIpv4($ip)) {
            return [
                "status" => "failed",
                "msg" => "invalid ip address",
            ];
        }

        $SIGN = "i am a signature";
        $sign = $this->makeSign([
            "SIGN" => $SIGN,
            "ip" => $ip,
        ]);

        $postData = [
            "SIGN" => $SIGN,
            "ip" => $ip,
            "sign" => $sign,
        ];
        $url = $host . "/getLocationByIp";
        if ($res = $this->getLocation($url, $postData)) {
            return [
                "status" => "ok",
                "data" => $res,
            ];
        }
        return [
            "status" => "failed",
            "data" => null,
        ];
    }

    public function getLocation($url, $post_data = array(), $timeout = 5): bool|string
    {
        $post_string = $post_data;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_string);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_TIMEOUT, $timeout);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    public function makeSign($data): string
    {
        if (isset($data['sign'])) {
            unset($data['sign']);
        }

        ksort($data);
        $str = '';
        foreach ($data as $k => $v) {
            $str .= $k . '=' . $v . '&';
        }
        $SIGN_KEY = "2OUVEH9nfPgx46NIQEoKU6BJKYGffpNhB7qmk";
        $str .= 'key=' . $SIGN_KEY;
        $base64 = base64_encode($str);
        return strtoupper(md5($base64));
    }

    public function checkIpv4($ip): bool
    {
        if (!filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE)) {
            return false;
        }
        $arr = explode('.', $ip);
        if (count($arr) != 4) {
            return false;
        } else {
            for ($i = 0; $i < 4; $i++) {
                if (($arr[$i] < '0') || ($arr[$i] > '255')) {
                    return false;
                }
            }
        }
        return true;
    }
}