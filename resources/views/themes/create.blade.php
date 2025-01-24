<x-app-layout>
    {{-- <form method="POST" action="{{ route('themes.create') }}" enctype="multipart/form-data">
        @csrf


        <label for="">Name</label><br>
        <input type="text" placeholder="Theme name ..." name="name"><br>
        <div style="color: #F14336">
            {{ implode('', $errors->get('name')) }}
        </div>

        <label for="">Image</label><br>
        <input type="file" accept="image/png, image/jpeg" name="image" id="image"><br>

        <div style="color: #F14336">
            {{ implode('', $errors->get('image')) }}
        </div>
        <label for="">Description</label><br>
        <textarea name="description" placeholder="description  ..."></textarea><br>
        <div style="color: #F14336">
            {{ implode('', $errors->get('description')) }}
        </div>

        <button type="submit">
            Submit
        </button>
    </form> --}}


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
        // Preview image functionality
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
