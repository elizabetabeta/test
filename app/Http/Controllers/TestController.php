<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function GetDevices(Request $request) {

        $devices = [
            'uredjaj1', 'uredjaj2'
        ];

        return $devices;
    }

    public function getDevice(Request $request, $id)
    {
        dd($request);
    }
}
