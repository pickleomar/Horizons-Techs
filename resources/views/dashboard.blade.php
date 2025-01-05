<x-app-layout>
    {{ Auth::user()->name }}<br>
    {{ Auth::user()->role }}
</x-app-layout>
