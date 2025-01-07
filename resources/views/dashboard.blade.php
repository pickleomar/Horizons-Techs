<x-app-layout>
    {{ Auth::user()->name }}<br>
    {{-- Retreive The User related Articles --}}
    {{ Auth::user()->articles }}<br>
    {{ Auth::user()->role }}
</x-app-layout>
