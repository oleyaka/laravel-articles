<?php

namespace App\Http\Controllers;

use App\Repositories\SectionRepository;

class SectionController extends Controller
{
    public function index()
    {
        $sections = SectionRepository::showSection();
        return view('sections.index', compact('sections'));
    }
}

