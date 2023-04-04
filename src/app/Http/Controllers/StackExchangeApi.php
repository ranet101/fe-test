<?php
namespace App\Http\Controllers;

use Illuminate\Routing\Controller as Controller;


class StackExchangeApi extends Controller
{
    public function index(string $tagged, $fromdate = false, $todate = false)
    {
        dd($tagged, $fromdate, $todate);        
    }  
}