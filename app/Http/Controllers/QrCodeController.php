<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrCodeController extends Controller
{
    //show qrcode
    public function showQrcode(Request $request)
    {

        $request->validate([
            'code' => 'required',

        ]);

        return QrCode::generate($request->code);
    }
}
