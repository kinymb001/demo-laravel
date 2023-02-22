<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Libs\LogViewer;

class LogController extends Controller
{
    public function index()
    {
        $data  = LogViewer::getFiles(true);
        return view("admin.logs.index", ["data" => $data]);
    }

    public function show(string $file_name)
    {
        LogViewer::setFile($file_name);
        $logs = LogViewer::all();
        return view("admin.logs.show", ["data" => $logs]);
    }
}
