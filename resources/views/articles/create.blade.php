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
            <h1>Create New Article</h1>
        </header>

        <div class="article-form-container">
            <form method="POST" action="{{ route('article.create', ['theme' => $theme->id]) }}"
                enctype="multipart/form-data">
                @csrf

                <div class="article-form-group">
                    <label for="name">Article Name</label>
                    <input type="text" id="name" name="title" class="article-form-input"
                        placeholder="Enter article name..." value="{{ old('name') }}">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="article-form-group">
                    <label for="image">Article Image</label>
                    <div class="file-input-container">
                        <input type="file" id="article-image" name="image" class="file-input"
                            accept="image/png, image/jpeg">
                        <div class="file-input-label">
                            <div class="file-input-icon">📁</div>
                            <div>Drag and drop your image here or click to browse</div>
                            <div style="font-size: 0.875rem; margin-top: 0.5rem;">
                                Supported article-formats: PNG, JPEG
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="article-form-group">
                    <label for="description">Article Description</label>
                    <textarea id="description" name="content" class="article-form-input article-form-textarea"
                        placeholder="Enter article content...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <x-button type="submit" class="btn-primary full-w">
                    Create Article
                </x-button>


            </form>
        </div>
    </div>


    <script>
        document.getElementById('article-image').addEventListener('change', function(e) {
            const fileInput = e.target;
            const fileInputContainer = fileInput.parentElement;
            const fileInputLabel = fileInputContainer.querySelector('.file-input-label');

            if (fileInput.files && fileInput.files[0]) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    fileInputContainer.style.backgroundImage = `url(${e.target.result})`;
                    fileInputContainer.style.backgroundSize = 'cover';
                    fileInputContainer.style.backgroundPosition = 'center';
                    fileInputLabel.style.display = 'none';
                }

                reader.readAsDataURL(fileInput.files[0]);
            }
        });
    </script>


</x-app-layout>
