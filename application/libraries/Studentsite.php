<?php

class Studentsite
{
    protected $_ci;
    
    function __construct()
    {
        $this->_ci = &get_instance();
    }

    function __auth()
    {
        $urlAuth = "https://studentsite.uniku.ac.id/studentsite.aspx";
        $parameter = $this->__bypass($urlAuth);

        if ($parameter['status']){
            $postfields = http_build_query([
                "__EVENTTARGET"             =>  "",
                "__EVENTARGUMENT"           =>  "",
                "__VIEWSTATE"               =>  $parameter['viewstate'],
                "__VIEWSTATEGENERATOR"      =>  $parameter['viewgenerator'],
                "__PREVIOUSPAGE"            =>  $parameter['previous'],
                "__EVENTVALIDATION"         =>  $parameter['eventValidation'],
                "txtUser"                   =>  '20190810043@uniku.ac.id',
                "txtPass"                   =>  'Irwansyah123',
                "btnLogin"                  =>  "Login",
            ]);
        
            curl_setopt_array($parameter['ch'], [
                CURLOPT_URL                 =>  $urlAuth,
                CURLOPT_FOLLOWLOCATION      =>  true,
                CURLOPT_RETURNTRANSFER      =>  true,
                CURLOPT_COOKIEJAR           =>  'cookieLogin.txt',
                CURLOPT_COOKIEFILE          =>  'cookieLogin.txt',
                CURLOPT_POSTFIELDS          =>  $postfields,
            ]);

            $html = curl_exec($parameter['ch']);

            $pattern = array(
                'message_pattern'           => '~<span id="lblMessage">(.*?)</span>~',
            );
    
            preg_match($pattern['message_pattern'],         $html, $result['message']);

            $response = array(
                'ch'        => $parameter['ch'],
                'parameter' => $parameter,
                'message'   => @$result['message'][1],
                'html'      => $html
            );
        }else{
            $response = array(
                'ch'        => $parameter['ch'],
                'parameter' => $parameter,
                'message'   => "",
                'html'      => NULL
            );
        }
        return $response;
    }

    function __bypass($url = "")
    {
        $pattern = array(
            'viewstate_pattern'         => '~<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="(.*?)" />~',
            'eventval_pattern'          => '~<input type="hidden" name="__EVENTVALIDATION" id="__EVENTVALIDATION" value="(.*?)" />~',
            'viewgenerator_pattern'     => '~<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="(.*?)" />~',
            'previous_pattern'          => '~<input type="hidden" name="__PREVIOUSPAGE" id="__PREVIOUSPAGE" value="(.*?)" />~'
        );

        $useragent = @$_SERVER['HTTP_USER_AGENT'];
        
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL            => $url,
            CURLOPT_COOKIEFILE     => "",
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERAGENT      => $useragent,
        ]);
        
        $html = curl_exec($ch);
        
        if ($html !== false) {
            preg_match($pattern['viewstate_pattern'],       $html, $viewstate);
            preg_match($pattern['eventval_pattern'],        $html, $eventValidation);
            preg_match($pattern['viewgenerator_pattern'],   $html, $viewgenerator);
            preg_match($pattern['previous_pattern'],        $html, $previous);
            $response = array(
                'status'            =>  true,
                'ch'                =>  $ch,
                'viewstate'         =>  $viewstate[1],
                'eventValidation'   =>  $eventValidation[1],
                'viewgenerator'     =>  $viewgenerator[1],
                'previous'          =>  $previous[1]
            );
        }else{
            $response = array(
                'ch'        =>  $ch,
                'status'    => false
            );
        }
        return $response;
    }

}