<x-app-layout>
    <form method="POST" action="{{ route('article.create') }}">
        @csrf


        <label for="">Title</label><br>
        <input type="text" placeholder="Article title ..." name="title"><br>

        <label for="">Content</label><br>
        <textarea name="content" placeholder="Content title ..."></textarea><br>


        <label for="">Image</label><br>
        <input type="file" name="image" accept="image/png, image/jpeg"><br>



        <label for="">Theme</label><br>
        <select name="theme_id" id="">
            @foreach ($themes as $theme)
                <option value="{{ $theme->id }}">{{ $theme->name }}</option>
            @endforeach
        </select><br>

        <button type="submit">
            Submit
        </button>
    </form>
</x-app-layout>
