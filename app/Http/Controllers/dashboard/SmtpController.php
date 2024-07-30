<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SmtpController extends Controller
{
    public function smtpSettings() {
        return view('backend.pages.smtp.smtp');
    }
}
