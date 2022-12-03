<?php

namespace App\Http\Services;

Class PaytechService{

    /**
     * @var string
     */
    const URL = "https://paytech.sn";
    const PAYMENT_REQUEST_PATH = '/api/payment/request-payment';
    const PAYMENT_REDIRECT_PATH = '/payment/checkout/';//todo
    //const URL = "http://localhost:5008";//todo
    const MOBILE_CANCEL_URL = "https://paytech.sn/mobile/cancel";
    const MOBILE_SUCCESS_URL = "https://paytech.sn/mobile/success";
    /**
     * @var string
     */
    private $apiKey;
    /**
     * @var string
     */
    private $apiSecret;
    /**
     * @var array
     */
    private $query = [];

    private $params = [];

    /**
     * @var array
     */
    private $customeField = [];

    private $liveMode = true;

    private $testMode = false;

    private $isMobile = false;

    private $currency = 'XOF';

    private $refCommand = '';

    private $notificationUrl = [];


    public function __construct($apiKey, $apiSecret)
    {
        $this->setApiKey($apiKey);
        $this->setApiSecret($apiSecret);


        if (!empty($_POST['is_mobile']) && $_POST['is_mobile'] === 'yes') {
            $this->isMobile = true;
        }
    }

    /**
     * @param string $apiKey
     */
    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    /**
     * @param string $apiSecret
     */
    public function setApiSecret($apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    /**
     * @return array
     */
    public function send()
    {
        $params = [
            'item_name' => PaytechService::arrayGet($this->query, 'item_name'),
            'item_price' => PaytechService::arrayGet($this->query, 'item_price'),
            'command_name' => PaytechService::arrayGet($this->query, 'command_name'),
            'ref_command' => $this->refCommand,
            'env' => ($this->testMode) ? 'test' : 'prod',
            'currency' => $this->currency,
            'ipn_url' => PaytechService::arrayGet($this->notificationUrl, 'ipn_url'),
            'success_url' => $this->isMobile ? $this::MOBILE_SUCCESS_URL : PaytechService::arrayGet($this->notificationUrl, 'success_url'),
            'cancel_url' => $this->isMobile ? $this::MOBILE_CANCEL_URL : PaytechService::arrayGet($this->notificationUrl, 'cancel_url'),
            'custom_field' => json_encode($this->customeField)
        ];


        $rawResponse = PaytechService::post($this::URL . $this::PAYMENT_REQUEST_PATH, $params, [
            "API_KEY: {$this->apiKey}",
            "API_SECRET: {$this->apiSecret}"
        ]);


        /**
         * @var array
         */
        $jsonResponse = json_decode($rawResponse, true);


        if (array_key_exists('token', $jsonResponse)) {
            $query = '';

            return [
                'success' => 1,
                'token' => $jsonResponse['token'],
                'redirect_url' => $this::URL . $this::PAYMENT_REDIRECT_PATH . $jsonResponse['token'] . $query
            ];
        } else if (array_key_exists('error', $jsonResponse)) {
            return [
                'success' => -1,
                'errors' => $jsonResponse['error']
            ];
        } else {
            return [
                'success' => -1,
                'errors' => [
                    'Internal Error'
                ]
            ];
        }

    }

    private static function arrayGet($array, $name, $default = '')
    {
        return empty($array[$name]) ? $default : $array[$name];
    }

    private static function post($url, $data = [], $header = [])
    {
        $strPostField = http_build_query($data);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $strPostField);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array_merge($header, [
            'Content-Type: application/x-www-form-urlencoded;charset=utf-8',
            'Content-Length: ' . mb_strlen($strPostField)
        ]));

        return curl_exec($ch);
    }

    /**
     * @param array $query
     * @return $this
     */
    public function setQuery($query)
    {
        $this->query = $query;
        return $this;
    }

    /**
     * @param array $customeField
     * @return $this
     */
    public function setCustomeField($customeField)
    {
        if (is_array($customeField)) {
            $this->customeField = $customeField;
        }

        return $this;
    }

    /**
     * @param bool $liveMode
     * @return $this
     */
    public function setLiveMode($liveMode)
    {
        $this->liveMode = $liveMode;
        $this->testMode = !$liveMode;

        return $this;
    }

    /**
     * @param bool $testMode
     * @return $this
     */
    public function setTestMode($testMode)
    {
        $this->testMode = $testMode;
        $this->liveMode = !$testMode;

        return $this;
    }

    /**
     * @param string $currency
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->currency = strtolower($currency);
        return $this;
    }

    /**
     * @param string $refCommand
     * @return $this
     */
    public function setRefCommand($refCommand)
    {
        $this->refCommand = $refCommand;

        return $this;
    }

    /**
     * @param array $notificationUrl
     * @return $this
     */
    public function setNotificationUrl($notificationUrl)
    {
        $this->notificationUrl = $notificationUrl;
        return $this;
    }

    /**
     * @param bool $isMobile
     * @return $this
     */
    public function setMobile($isMobile)
    {
        $this->isMobile = $isMobile;

        return $this;
    }
}
