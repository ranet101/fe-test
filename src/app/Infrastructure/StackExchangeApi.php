<?php
namespace App\Infrastructure;

use Illuminate\Support\Facades\Http;

class StackExchangeApi
{ 
    
    /**
     * Api call to StackExchange
     * - Prepares paremters to be sent
     * - Do call
     * - Return result
     *
     * @param String $tagged    Required. Tag to filter on.
     * @param Date $fromdate    Optional. Fromdate to filter on.
     * @param Date $todate      Optional. Todate to filter on.
     * 
     * @return Json
     */ 
    public function call($tagged, $fromdate, $todate)
    {
        $endpoint = env('STACKAPP_ENDPOINT');
        $parameters = $this->prepareData($tagged, $fromdate, $todate);
        $response = Http::get($endpoint, $parameters);
        if($response->failed())
            return $this->returnError("Stackexchange error: " . $response->getStatusCode());
        return $response->json();
    } 

    /**
     * Model params array to be sended in api call
     *
     * @param Date $fromdate    Optional. Fromdate to filter on.
     * @param Date $todate      Optional. Todate to filter on.
     * 
     * @return Array
     */ 
    private function prepareData($tagged, $fromdate, $todate)
    {
        $params = [
            'tagged' => $tagged,
            'site' => env('STACKAPP_SITE'),
        ];
        if($fromdate)
            $params["fromdate"]=$fromdate;
        if($todate)
            $params["todate"]=$todate;
        return $params;
    }

}