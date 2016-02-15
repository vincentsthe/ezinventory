<?php

namespace App\Http\Controllers;

use App\Models\Statistik;

use App\Services\StatistikService;
use Illuminate\Http\Request;

class StatistikController extends Controller
{
    private $statistikService;

    public function __construct()
    {
        $this->statistikService = new StatistikService();
    }

    public function index()
    {
        return view('statistik.index');
    }
}