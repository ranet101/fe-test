<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use Illuminate\Support\Facades\Http;
use App\Traits\Utilities;

class StackExchangeApi extends Controller
{
    use Utilities;
    /**
     * Route anchor method. 
     * - Verifies tagged param is not empty 
     * - Verifies dates params are valids.
     * - Call StackExchange Api and returns reuslts
     *
     * @param String $tagged    Required. Tag to filter on.
     * @param Date $fromdate    Optional. Fromdate to filter on.
     * @param Date $todate      Optional. Todate to filter on.
     * 
     * @return Json
     */ 
    public function index(String $tagged, $fromdate = false, $todate = false)
    {
        if(!$tagged)
            return $this->returnError("Parameter tagged is mandatory");
        if(!$this->checkdate($fromdate))
            return $this->returnError("fromdate parameter format must be  YYYY-mm-dd");
        if(!$this->checkdate($todate))
            return $this->returnError("todate parameter format must be  YYYY-mm-dd");
        return $this->call($tagged, $fromdate, $todate);  
    } 
    
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
    private function call($tagged, $fromdate, $todate)
    {
        $endpoint = env('STACKAPP_ENDPOINT');
        $parameters = $this->prepareData($fromdate, $todate);
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
    private function prepareData($fromdate, $todate)
    {
        $params = [
            'tagged' => "javascript",
            'site' => env('STACKAPP_SITE'),
        ];
        if($fromdate)
            $params["fromdate"]=$fromdate;
        if($todate)
            $params["todate"]=$todate;
        return $params;
    }

    /**
     * Check that Date is in correct format YYYY-mm-dd
     *
     * @param String $date  Required. Date to be validated.
     * 
     * @return bool
     */ 
    private function checkdate($date)
    {
        return true;
    }

}