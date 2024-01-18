<?php

namespace App\Repositories;

use App\Models\SectionModel;

class SectionRepository
{
    public static function showSection()
    {
        return SectionModel::all();
    }
}
