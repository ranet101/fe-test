<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;
use App\Traits\Utilities;
use App\Infrastructure\StackExchangeApi;

class Main extends Controller
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
        $stackExchangeApi = new StackExchangeApi;
        return $stackExchangeApi->call($tagged, $fromdate, $todate); 
    } 

}