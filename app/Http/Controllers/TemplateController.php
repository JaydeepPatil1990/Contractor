<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Feedback;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
 public function index()
 {
   // return view('backend/login');
    return redirect()->guest('/login');
 }



 

}
