<?php

namespace Omnipay\Chekonline\Message;

/**
 * Class AbstractRequest
 * @package Omnipay\Chekonline\Message
 */
abstract class AbstractRequest extends \Omnipay\Common\Message\AbstractRequest
{
    /**
     * Адрес тестового сервера
     * @var string
     */
    protected $testEndpoint = 'https://fce.chekonline.ru:4443/fr/api/v2';

    /**
     * Адрес боевого сервера
     * @var string
     */
    protected $prodEndpoint = 'https://fce.chekonline.ru:4443/fr/api/v2';

    /**
     * @return string
     */
    public function getHttpMethod()
    {
        return 'POST';
    }

    /**
     * @return array
     */
    public function getHeaders()
    {
        return [
            'Content-type' => 'application/json"',
        ];
    }

    /**
     * Send the request with specified data
     *
     * @param  array $data The data to send
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function sendData($data)
    {
        var_dump(json_encode($data));
//        die();
        $httpResponse = $this->httpClient->request(
            $this->getHttpMethod(),
            $this->getEndpoint(),
            $this->getHeaders(),
            json_encode($data)
        );
        $contents = $httpResponse->getBody()->getContents();

//        $contents = '{"ClientId":"","Date":{"Date":{"Day":1,"Month":2,"Year":18},"Time":{"Hour":14,"Minute":3,"Second":47}},"Device":{"Name":"10000000000000000062","Address":"192.168.142.20:4062"},"DeviceRegistrationNumber":"2505480089009197","DeviceSerialNumber":"10000000000000000062","DocNumber":12,"DocumentType":0,"FNSerialNumber":"9999999999999062","FiscalDocNumber":14,"FiscalSign":1801474372,"GrandTotal":50000,"Path":"/fr/api/v2/Complex","QR":"t=20180201T1403\u0026s=500.00\u0026fn=9999999999999062\u0026i=14\u0026fp=1801474372\u0026n=1","RequestId":"1","Response":{"Error":0},"Responses":[{"Path":"/fr/api/v2/CloseDocument","Response":{"Date":{"Date":{"Day":1,"Month":2,"Year":18},"Time":{"Hour":14,"Minute":3,"Second":47}},"DocNumber":12,"DocumentType":0,"Error":0,"FiscalDocNumber":14,"FiscalDocument":{"TagID":3,"TagType":"stlv","Value":[{"TagID":1000,"TagType":"string","Value":"Кассовый чек"},{"TagID":1054,"TagType":"byte","Value":1},{"TagID":1055,"TagType":"byte","Value":1},{"TagID":1031,"TagType":"money","Value":0},{"TagID":1081,"TagType":"money","Value":50000},{"TagID":9997,"TagType":"money","Value":0},{"TagID":9996,"TagType":"money","Value":50000},{"TagID":1020,"TagType":"money","Value":50000},{"TagID":1196,"TagType":"string","Value":"QR"},{"TagID":1215,"TagType":"money","Value":0},{"TagID":1216,"TagType":"money","Value":0},{"TagID":1217,"TagType":"money","Value":0},{"TagID":1060,"TagType":"string","Value":"www.nalog.ru"},{"TagID":1036,"TagType":"string","Value":"720760"},{"TagID":1209,"TagType":"byte","Value":2},{"TagID":1048,"TagType":"string","Value":"ИП Иванов И.И."},{"TagID":1018,"TagType":"string","Value":"1234567890  "},{"TagID":1012,"TagType":"unixtime","Value":"2018-02-01T14:03:00Z"},{"TagID":1037,"TagType":"string","Value":"2505480089009197"},{"TagID":1009,"TagType":"string","Value":"г. Челябинск, ул. Ленина, д. 16"},{"TagID":1187,"TagType":"string","Value":"Подземный переход"},{"TagID":1103,"TagType":"money","Value":4545},{"TagID":1008,"TagType":"string","Value":"Daenerys.Targaryen@7kingdoms.com"},{"TagID":1059,"TagType":"stlv","Value":[{"TagID":1079,"TagType":"money","Value":25000},{"TagID":1023,"TagType":"qty","Value":2000},{"TagID":1043,"TagType":"money","Value":50000},{"TagID":1199,"TagType":"byte","Value":2},{"TagID":1200,"TagType":"money","Value":4545},{"TagID":1030,"TagType":"string","Value":"Набор драконов"},{"TagID":1214,"TagType":"byte","Value":4}]},{"TagID":1038,"TagType":"uint32","Value":1},{"TagID":1042,"TagType":"uint32","Value":12},{"TagID":1077,"TagType":"byte[]","Value":"AABrYFFE"},{"TagID":1040,"TagType":"uint32","Value":14},{"TagID":1041,"TagType":"string","Value":"9999999999999062"}]},"FiscalSign":1801474372,"GrandTotal":50000,"NonCash":[50000,0,0],"Password":1,"PaymentAgentModes":0,"QR":"t=20180201T1403\u0026s=500.00\u0026fn=9999999999999062\u0026i=14\u0026fp=1801474372\u0026n=1","TaxCalculationMethod":1,"TaxMode":0,"Text":"КАССОВЫЙ ЧЕК/ПРИХОД\t01-02-18 14:03\nИП Иванов И.И.\nг. Челябинск, ул. Ленина, д. 16\nМЕСТО РАСЧЕТОВ\tПодземный переход\nИНН\t1234567890\nЧЕК: 12\tСМЕНА: 1\nСНО\tОСН\nАВТОМАТ\t720760\nНабор драконов\nПОЛНЫЙ РАСЧЕТ\t2 x 250.00 ~500.00\n\tНДС 10%: ~45.45\n##BIG##ИТОГ\t~500.00\nВСЕГО ПОЛУЧЕНО\t~500.00\nЭЛЕКТРОННЫМИ\t~500.00\nСУММА НДС 10%\t~45.45\nСАЙТ ФНС\twww.nalog.ru\nЭЛ.АДР.ПОКУПАТЕЛЯ\tDaenerys.Targaryen@7kingdoms.com\nРН ККТ: 2505480089009197\tФН: 9999999999999062\nФД: 14\tФП: 1801474372","TurnNumber":1}}]}';
        $contents = json_decode($contents, true);
        return $this->response = $this->createResponse($contents);
    }

    /**
     * Undocumented function
     *
     * @param [type] $fromContent
     * @return \Psr\Http\Message\ResponseInterface
     */
    abstract public function createResponse($fromContent);

    /**
     * @return bool
     */
    protected function getEndpoint()
    {
        return $this->getTestMode() ? $this->testEndpoint : $this->prodEndpoint;
    }
}