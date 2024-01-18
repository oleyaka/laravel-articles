<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    protected $table = 'articles';
    protected $fillable = ['section_id', 'title', 'content'];

    public function section()
    {
        return $this->belongsTo(SectionModel::class);
    }
}
