<x-app-layout>
    {{-- <form method="POST" action="{{ route('article.create', ['theme' => $theme->id]) }}" enctype="multipart/form-data">
        @csrf


        <label for="">Title</label><br>
        <input type="text" placeholder="Article title ..." name="title"><br>

        <label for="">Content</label><br>
        <textarea name="content" placeholder="Content title ..."></textarea><br>


        <label for="">Image</label><br>
        <input type="file" name="image" accept="image/png, image/jpeg"><br>



        <button type="submit">
            Submit
        </button>
    </form> --}}

    <style>
        .container-article-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .container-article-form header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        .article-form-container {
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            padding: 2rem;
        }

        .article-form-group {
            margin-bottom: 1.5rem;
        }

        .article-form-container label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--divider-color);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .article-form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: var(--bg-neutral-3);
            border: 1px solid var(--bg-neutral-4);
            border-radius: var(--radius-m);
            color: var(--font-color);
            font-size: 1rem;
        }

        .article-form-input:focus {
            outline: none;
            border-color: var(--secondary-color);
        }

        .article-form-input::placeholder {
            color: var(--bg-neutral-4);
        }

        .article-form-textarea {
            min-height: 150px;
            resize: vertical;
        }

        .file-input-container {
            position: relative;
            width: 100%;
            height: 18rem;
            border: 2px dashed var(--bg-neutral-4);
            border-radius: var(--radius-l);
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            overflow: hidden;
        }

        .file-input-container:hover {
            border-color: var(--secondary-color);
        }

        .file-input {
            position: absolute;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-label {
            text-align: center;
            color: var(--divider-color);
        }

        .file-input-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: var(--bg-neutral-4);
        }
    </style>


    <div class="container-article-form">
        <header>
            <h1>Update Article</h1>
        </header>

        <div class="article-form-container">
            <form method="POST" action="{{ route('article.update', ['article' => $article]) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="article-form-group">
                    <label for="name">Article Name</label>
                    <input type="text" id="name" name="title" value="{{ $article->title }}"
                        class="article-form-input" placeholder="Enter article name..." value="{{ old('name') }}">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>


                <div class="article-form-group">
                    <label for="description">Article Description</label>
                    <textarea id="description" rows="30" name="content" class="article-form-input article-form-textarea"
                        placeholder="Enter article content...">{{ $article->content }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <x-button type="submit" class="btn-primary full-w">
                    Update Article
                </x-button>


            </form>
        </div>
    </div>





</x-app-layout>
