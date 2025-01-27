<x-dashboard-layout>
    <style>
        /* Using semantic selectors and minimal classes */
        section {
            padding: 2rem;
        }

        section>header {
            margin-bottom: 2rem;
        }

        section>header h1 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
            color: var(--font-color);
        }

        section>header p {
            color: var(--bg-neutral-4);
            font-size: 0.875rem;
        }

        #profileForm {
            display: grid;
            grid-template-columns: 300px 1fr;
            gap: 2rem;
            background: var(--bg-neutral-2);
            padding: 2rem;
            border-radius: 0.5rem;
            border: 1px solid var(--bg-neutral-3);
        }

        /* Image Upload Area */
        form>div:first-child {
            text-align: center;
        }

        .preview {
            width: 200px;
            height: 200px;
            margin: 0 auto 1rem;
            position: relative;
            cursor: pointer;
        }

        .preview img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
        }

        .preview:hover::after {
            content: 'Change Picture';
            position: absolute;
            inset: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
            color: var(--font-color);
        }

        /* Form Elements */
        form div>label {
            display: block;
            margin-bottom: 0.5rem;
            color: var(--divider-color);
        }

        form div>input,
        form div>textarea {
            width: 100%;
            padding: 0.75rem;
            background: var(--bg-neutral-3);
            border: 1px solid var(--bg-neutral-4);
            border-radius: 0.25rem;
            color: var(--font-color);
            margin-bottom: 1.5rem;
        }

        /* Password Section */
        form>div:last-child>div:last-of-type {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid var(--bg-neutral-3);
        }

        form>div:last-child>div:last-of-type>h2 {
            font-size: 1.25rem;
            margin-bottom: 1.5rem;
            color: var(--font-color);
        }

        /* Action Buttons */
        form>div:last-child>div:last-child {
            display: flex;
            gap: 1rem;
            margin-top: 2rem;
        }
    </style>

    <section>
        <header>
            <h1>Profile Settings</h1>
            <p>Last updated: {{ Auth::user()->updated_at }}</p>
        </header>

        <form id="profileForm" method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            <div>
                <div class="preview">

                    @if (Auth::user()->avatar)
                        <img id="imagePreview"
                            src="{{ str_starts_with(Auth::user()->avatar, 'http') ? Auth::user()->avatar : asset(Auth::user()->avatar) }}"
                            alt="Profile picture">
                    @else
                        <img id="imagePreview"
                            src="https://www.strasys.uk/wp-content/uploads/2022/02/Depositphotos_484354208_S.jpg"
                            alt="Profile picture">
                    @endif
                </div>
                <input type="file" name="avatar" id="profileImage" accept="image/*" hidden>
                <p>Click on the image to change</p>
            </div>

            <!-- User Details Area -->
            <div>
                <div>
                    <label for="name">Username</label>
                    <input type="text" name="name" id="username" value="{{ Auth::user()->name }}">

                    <label for="bio">Bio</label>
                    <textarea id="bio" rows="4" name="bio">
                        {{ htmlspecialchars(Auth::user()->bio) }}
                    </textarea>
                </div>

                <!-- Password Section -->
                {{-- <div>
                    <h2>Change Password</h2>
                    <x-button href="{{ route('password.reset') }}" style="margin-top: 1rem" class="btn-warning outline">
                        Change Password
                    </x-button>
                </div> --}}

                <div style="">
                    <x-button type="submit" class="btn-primary">
                        Update Profile
                    </x-button>
                    <x-button type="reset" class=" outline">
                        cancel
                    </x-button>
                </div>
            </div>
        </form>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const imagePreview = document.getElementById('imagePreview');
            const imageInput = document.getElementById('profileImage');
            const previewContainer = document.querySelector('.preview');

            previewContainer.addEventListener('click', () => {
                imageInput.click();
            });

            imageInput.addEventListener('change', function(e) {
                if (this.files && this.files[0]) {
                    const reader = new FileReader();
                    reader.onload = e => imagePreview.src = e.target.result;
                    reader.readAsDataURL(this.files[0]);
                }
            });

        });
    </script>
</x-dashboard-layout>
