@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <a href="{{ route('home') }}" class="btn btn-primary mb-3">К списку тем</a>

        <h1 class="mb-4">Статьи про {{ $section->name }}</h1>

        @foreach ($articles as $article)
            <div class="card mb-3" id="article_{{ $article->id }}">
                <div class="card-body">
                    <h2 class="card-title editable" onclick="editArticle({{ $article->id }})">{{ $article->title }}</h2>
                    <p class="card-text">{{ $article->content }}</p>

                    <form action="{{ route('articles.edit', ['section' => $section->name, 'id' => $article->id]) }}" method="POST" class="edit-form" style="display: none;">
                        @csrf
                        @method('POST')
                        <div class="form-group">
                            <label for="title">Title:</label>
                            <input type="text" class="form-control" name="title" value="{{ $article->title }}">
                        </div>
                        <div class="form-group">
                            <label for="content">Content:</label>
                            <textarea class="form-control" name="content">{{ $article->content }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success">Save</button>
                    </form>

                    <form action="{{ route('articles.destroy', ['section' => $section->name, 'id' => $article->id]) }}" method="POST" class="delete-form mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach

        <div class="card new-article-container">
            <div class="card-body">
                <h2 class="card-title">Создать статью</h2>
                <form action="{{ route('articles.store', ['section' => $section->name]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="new_title">Title:</label>
                        <input type="text" class="form-control" name="new_title" required>
                    </div>
                    <div class="form-group">
                        <label for="new_content">Content:</label>
                        <textarea class="form-control" name="new_content" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Create Article</button>
                </form>
            </div>
        </div>

        <script>
            function editArticle(id) {
                var articleContainer = document.getElementById('article_' + id);
                var editForm = articleContainer.querySelector('.edit-form');

                if (editForm.style.display === 'none') {
                    editForm.style.display = 'block';
                    articleContainer.querySelector('.editable').style.display = 'none';
                } else {
                    editForm.style.display = 'none';
                    articleContainer.querySelector('.editable').style.display = 'block';
                }
            }
        </script>
    </div>
@endsection
