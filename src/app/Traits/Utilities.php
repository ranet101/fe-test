<?php
namespace App\Traits;

trait Utilities
{

    /**
     * Model and returns error message
     *
     * @param String $msg   Required. Message to show.
     * 
     * @return Json
     */ 
    private function returnError($msg)
    {
        return json_encode(["error"=>$msg]);
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