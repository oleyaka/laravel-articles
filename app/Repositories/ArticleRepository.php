<?php

namespace App\Repositories;

use App\Models\ArticleModel;
use App\Models\SectionModel;

class ArticleRepository
{
    public function getArticlesBySection($sectionName)
    {
        $section = $this->getSectionByName($sectionName);

        return ArticleModel::where('section_id', $section->id)->get();
    }

    public function getSectionByName($sectionName)
    {
        return SectionModel::where('name', $sectionName)->firstOrFail();
    }

    public function editArticle($sectionName, $articleId, $data)
    {
        $section = $this->getSectionByName($sectionName);

        $article = ArticleModel::where('section_id', $section->id)->findOrFail($articleId);

        $article->update($data);

        return $article;
    }

    public function createArticle($sectionName, $data)
    {
        $section = $this->getSectionByName($sectionName);

        $newArticle = new ArticleModel($data);
        $newArticle->section_id = $section->id;
        $newArticle->save();

        return $newArticle;
    }

    public function deleteArticle($sectionName, $articleId)
    {
        $section = $this->getSectionByName($sectionName);
        $article = ArticleModel::where('section_id', $section->id)->findOrFail($articleId);
        $article->delete();
    }

}
