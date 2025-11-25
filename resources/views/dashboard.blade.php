<x-app-layout>
    @section('title', 'Dashboard - MaoNaVaga')

    @section('content')
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        @if (auth()->user()->role == 2)
            <livewire:dashboard-candidate />
        @endif

        @if (auth()->user()->role == 1 || auth()->user()->role == 0)
            <livewire:dashboard-company />
        @endif
    @endsection
</x-app-layout>
