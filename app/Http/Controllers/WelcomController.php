<?php

namespace App\Http\Controllers;
use App\Http\Controllers\MarkdownService;
use Illuminate\Http\Request;

class WelcomController extends Controller
{
    public function index()
    {
        //'htmlContent',MarkdownService::parse('droitsDeLHomme.md')
        return view('welcom')->with('htmlContent',MarkdownService::parse('droitsDeLHomme.md'));
    }
    public function apropos()
    {
        //'htmlContent',MarkdownService::parse('droitsDeLHomme.md')
        return view('data.apropos');
    }
    public function contact()
    {
        //'htmlContent',MarkdownService::parse('droitsDeLHomme.md')
        return view('data.contact');
    }

}
