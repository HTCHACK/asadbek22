<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tour\Tour;
use App\Models\RBAC\User;

class HomeController extends Controller
{
    public function index()
    {

        return view('welcome', [
            'tours' => Tour::where('is_it_here',false)->where('lang', $this->getLang())->paginate(12), 'uzbtours' => Tour::where('lang', $this->getLang())->where('is_it_here', true)->paginate(10)
        ]);

    }
    private function getLang()
    {
        if (!isset($_COOKIE['language'])) {
            return 'uz';
        }
        if (isset($_COOKIE['language'])) {
            return $_COOKIE['language'];
        }
    }
}
