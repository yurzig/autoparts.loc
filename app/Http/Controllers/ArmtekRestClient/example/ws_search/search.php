<?php
error_reporting(-1);
ini_set('display_errors', 1);

require_once '../config.php';
require_once '../../autoloader.php';

use App\Http\Controllers\ArmtekRestClient\Http\Exception\ArmtekException as ArmtekException;
use App\Http\Controllers\ArmtekRestClient\Http\Config\Config as ArmtekRestClientConfig;
use App\Http\Controllers\ArmtekRestClient\Http\ArmtekRestClient as ArmtekRestClient;

try {

    // init configuration
    $armtek_client_config = new ArmtekRestClientConfig($user_settings);

    // init client
    $armtek_client = new ArmtekRestClient($armtek_client_config);


    $params = [
        'VKORG'         => ''
        ,'KUNNR_RG'     => ''
        ,'PIN'          => 'oc47'
        ,'BRAND'        => 'KNECHT'
        ,'QUERY_TYPE'   => ''
        ,'KUNNR_ZA'     => ''
        ,'INCOTERMS'    => ''
        ,'VBELN'        => ''
    ];

    // requeest params for send
    $request_params = [

        'url' => 'search/search',
        'params' => [
            'VKORG'         => !empty($params['VKORG'])?$params['VKORG']:(isset($ws_default_settings['VKORG'])?$ws_default_settings['VKORG']:'')
            ,'KUNNR_RG'     => isset($params['KUNNR_RG'])?$params['KUNNR_RG']:(isset($ws_default_settings['KUNNR_RG'])?$ws_default_settings['KUNNR_RG']:'')
            ,'PIN'          => isset($params['PIN'])?$params['PIN']:''
            ,'BRAND'        => isset($params['BRAND'])?$params['BRAND']:''
            ,'QUERY_TYPE'   => isset($params['QUERY_TYPE'])?$params['QUERY_TYPE']:''
            ,'KUNNR_ZA'     => isset($params['KUNNR_ZA'])?$params['KUNNR_ZA']:(isset($ws_default_settings['KUNNR_ZA'])?$ws_default_settings['KUNNR_ZA']:'')
            ,'INCOTERMS'    => isset($params['INCOTERMS'])?$params['INCOTERMS']:(isset($ws_default_settings['INCOTERMS'])?$ws_default_settings['INCOTERMS']:'')
            ,'VBELN'        => isset($params['VBELN'])?$params['VBELN']:(isset($ws_default_settings['VBELN'])?$ws_default_settings['VBELN']:'')
            ,'format'       => 'json'
        ]

    ];

    // send data
    $response = $armtek_client->post($request_params);

    // in case of json
    $json_responce_data = $response->json();


} catch (ArmtekException $e) {

    $json_responce_data = $e -> getMessage();

}

//
echo "<h1>???????????? ???????????? ????????????</h1>";
echo "<h2>?????????????? ??????????????????</h2>";
echo "<pre>"; print_r( $request_params ); echo "</pre>";
echo "<h2>??????????</h2>";
echo "<pre>"; print_r( $json_responce_data ); echo "</pre>";
?>
