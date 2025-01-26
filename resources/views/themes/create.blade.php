<x-app-layout>


    <style>
        .container-theme-form {
            max-width: 800px;
            margin: 0 auto;
            padding: 2rem;
        }

        .container-theme-form header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid var(--bg-neutral-3);
        }

        .theme-form-container {
            background-color: var(--bg-neutral-2);
            border-radius: var(--radius-l);
            border: 1px solid var(--bg-neutral-3);
            padding: 2rem;
        }

        .theme-form-group {
            margin-bottom: 1.5rem;
        }

        .theme-form-container label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--divider-color);
            font-size: 0.875rem;
            font-weight: 500;
        }

        .theme-form-input {
            width: 100%;
            padding: 0.75rem 1rem;
            background-color: var(--bg-neutral-3);
            border: 1px solid var(--bg-neutral-4);
            border-radius: var(--radius-m);
            color: var(--font-color);
            font-size: 1rem;
        }

        .theme-form-input:focus {
            outline: none;
            border-color: var(--secondary-color);
        }

        .theme-form-input::placeholder {
            color: var(--bg-neutral-4);
        }

        .theme-form-textarea {
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


    <div class="container-theme-form">
        <header>
            <h1>Create New Theme</h1>
        </header>

        <div class="theme-form-container">
            <form method="POST" action="{{ route('themes.create') }}" enctype="multipart/form-data">
                @csrf

                <div class="theme-form-group">
                    <label for="name">Theme Name</label>
                    <input type="text" id="name" name="name" class="theme-form-input"
                        placeholder="Enter theme name..." value="{{ old('name') }}">
                    @error('name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="theme-form-group">
                    <label for="image">Theme Image</label>
                    <div class="file-input-container">
                        <input type="file" id="theme-image" name="image" class="file-input"
                            accept="image/png, image/jpeg">
                        <div class="file-input-label">
                            <div class="file-input-icon">📁</div>
                            <div>Drag and drop your image here or click to browse</div>
                            <div style="font-size: 0.875rem; margin-top: 0.5rem;">
                                Supported theme-formats: PNG, JPEG
                            </div>
                        </div>
                    </div>
                    @error('image')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <div class="theme-form-group">
                    <label for="description">Theme Description</label>
                    <textarea id="description" name="description" class="theme-form-input theme-form-textarea"
                        placeholder="Enter theme description...">{{ old('description') }}</textarea>
                    @error('description')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>

                <x-button type="submit" class="btn-primary full-w">
                    Create Theme
                </x-button>


            </form>
        </div>
    </div>


    <script>
        document.getElementById('theme-image').addEventListener('change', function(e) {
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
