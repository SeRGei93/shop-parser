<?php


namespace App\Parser;


interface ParseContract
{
    public function getParse($url);
    public function text($obj, $val = null);
    public function html($obj, $val = null);
}