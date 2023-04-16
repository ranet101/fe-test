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
}