<x-app-layout>
    <form method="POST" action="{{ route('themes.create') }}" enctype="multipart/form-data">
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
    </form>
</x-app-layout>
