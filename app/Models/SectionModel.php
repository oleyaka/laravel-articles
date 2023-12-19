<?php

namespace app\Models;

use Illuminate\Database\Eloquent\Model;

class SectionModel extends Model
{
    protected $table = 'sections';
    protected $fillable = ['name'];

    public function articles()
    {
        return $this->hasMany(ArticleModel::class);
    }
}
