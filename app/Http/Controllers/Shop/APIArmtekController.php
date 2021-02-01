<?php
namespace App\Http\Controllers\Shop;

//use ArmtekRestClient\Http\Exception\ArmtekException as ArmtekException;
use App\Http\Controllers\ArmtekRestClient\Http\Config\Config as ArmtekRestClientConfig;
use App\Http\Controllers\ArmtekRestClient\Http\ArmtekRestClient as ArmtekRestClient;


class APIArmtekController extends BaseController
{
    /**
     * API запрос поставщику Armtek
     *
     * @param string $numb
     * @param string $brand
     * @return \Illuminate\Http\Response
     */
    public function search($numb, $brand = null)
    {
        try {
            $user_settings = array(
                'user_login' => 'WEBDARYAUTO@MAIL.RU'   // логин
            , 'user_password' => 'GxD-XJp-SX8-g4g'  // пароль
            );

            // init configuration
            $armtek_client_config = new ArmtekRestClientConfig($user_settings);

            // init client
            $armtek_client = new ArmtekRestClient($armtek_client_config);

            $params = [
                'VKORG' => '4000'
                , 'KUNNR_RG' => '43023267'
                , 'PIN' => $numb
                , 'BRAND' => $brand
                , 'QUERY_TYPE' => ''
                , 'KUNNR_ZA' => ''
                , 'INCOTERMS' => ''
                , 'VBELN' => ''
            ];

            // requeest params for send
            $request_params = [

                'url' => 'search/search',
                'params' => [
                    'VKORG' => !empty($params['VKORG']) ? $params['VKORG'] : (isset($ws_default_settings['VKORG']) ? $ws_default_settings['VKORG'] : '')
                    , 'KUNNR_RG' => isset($params['KUNNR_RG']) ? $params['KUNNR_RG'] : (isset($ws_default_settings['KUNNR_RG']) ? $ws_default_settings['KUNNR_RG'] : '')
                    , 'PIN' => isset($params['PIN']) ? $params['PIN'] : ''
                    , 'BRAND' => isset($params['BRAND']) ? $params['BRAND'] : ''
                    , 'QUERY_TYPE' => isset($params['QUERY_TYPE']) ? $params['QUERY_TYPE'] : ''
                    , 'KUNNR_ZA' => isset($params['KUNNR_ZA']) ? $params['KUNNR_ZA'] : (isset($ws_default_settings['KUNNR_ZA']) ? $ws_default_settings['KUNNR_ZA'] : '')
                    , 'INCOTERMS' => isset($params['INCOTERMS']) ? $params['INCOTERMS'] : (isset($ws_default_settings['INCOTERMS']) ? $ws_default_settings['INCOTERMS'] : '')
                    , 'VBELN' => isset($params['VBELN']) ? $params['VBELN'] : (isset($ws_default_settings['VBELN']) ? $ws_default_settings['VBELN'] : '')
                    , 'format' => 'json'
                ]

            ];

            // send data
            $response = $armtek_client->post($request_params);

            // in case of json
            $json_responce_data = $response->json();


        } catch (ArmtekException $e) {

            $json_responce_data = $e->getMessage();

        }

//
//        echo "<h1>Пример вызова поиска</h1>";
//        echo "<h2>Входные параметры</h2>";
//        echo "<pre>"; print_r( $request_params ); echo "</pre>";
//        echo "<h2>Ответ</h2>";
//        echo "<pre>"; print_r( $json_responce_data ); echo "</pre>";

        return $json_responce_data;
    }
}
