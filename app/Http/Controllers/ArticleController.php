<?php

namespace App\Http\Controllers;

use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;


class ArticleController extends Controller
{
    private $articleRepository;

    public function __construct(ArticleRepository $articleRepository, Request $request)
    {
        $this->articleRepository = $articleRepository;
        $this->request = $request;
    }

    public function showBySection($section)
    {
        try {
            $section = $this->articleRepository->getSectionByName($section);
            $articles = $this->articleRepository->getArticlesBySection($section->name);

            return view('articles.index', compact('articles', 'section'));
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }

    }

    public function edit($section)
    {
        try {
            $data = [
                'title' => $this->request->input('title'),
                'content' => $this->request->input('content'),
            ];

            $this->articleRepository->editArticle($section, $this->request->input('id'), $data);

            return redirect()->back();
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }

    }

    public function store($section)
    {
        try {
            $data = [
                'title' => $this->request->input('new_title'),
                'content' => $this->request->input('new_content'),
            ];

            $this->articleRepository->createArticle($section, $data);

            return redirect()->back();
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }
    }

    public function destroy($section, $id)
    {
        try {
            $this->articleRepository->deleteArticle($section, $id);

            return redirect()->back();
        } catch (\Exception $e) {
            return [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }
    }
}
