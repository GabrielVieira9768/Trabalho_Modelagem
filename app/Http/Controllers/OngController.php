<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Ong;
use Illuminate\Http\Request;

class OngController extends Controller
{
    // Retorna todas as ONGs em ordem descendente para serem exibidadas na view
    public function index()
    {
        $ongs = Ong::orderBy('created_at', 'desc')->paginate(10);
        return view ('ongs.index', compact('ongs'))->with('paginate', true);
    }
}