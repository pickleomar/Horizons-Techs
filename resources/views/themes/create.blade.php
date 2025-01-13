<x-app-layout>
    <form method="POST" action="{{ route('themes.create') }}">
        @csrf


        <label for="">Name</label><br>
        <input type="text" placeholder="Article title ..." name="name"><br>

        <label for="">Description</label><br>
        <textarea name="description" placeholder="Content title ..."></textarea><br>

        <button type="submit">
            Submit
        </button>
    </form>
</x-app-layout>
