<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Parser\Parser;

class ParserController extends Controller
{
    public static function getProducts()
    {
        $v = new Parser();
        $v->getParse('https://progreem.by/catalog/instrument/');
    }
}
