<x-app-layout>
    @section('title', 'Detalhes da vaga - MaoNaVaga')

    @section('content')
        <div class="bg-white flex flex-col rounded-xl p-8">
            <h1 class="text-3xl font-bold text-[#155DFC] mb-2">{{ $vacancy->title }}</h1>

            <h3 class="text-xl text-gray-600 mb-4">{{ $vacancy->name ?? 'Empresa não informada' }}</h3>
            <div class="flex flex-wrap gap-3 mb-6 text-gray-700">
                <span
                    class="bg-blue-100 text-blue-700 px-3 py-1 rounded-full text-sm font-medium">{{ $vacancy->type }}</span>
                <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-sm font-medium">Salário:
                    {{ $vacancy->salary }}</span>
                <span class="bg-purple-100 text-purple-700 px-3 py-1 rounded-full text-sm font-medium">Local:
                    {{ $vacancy->address }}</span>
            </div>

            <div class="mb-6">
                <h2 class="text-xl text-[#155DFC] font-bold mb-2">Descrição da Vaga</h2>
                <p class="text-gray-600 leading-relaxed">{!! nl2br(e($vacancy->description)) !!}</p>
            </div>
            @if ($vacancy->requirements)
                <div class="mb-6">
                    <h2 class="text-xl text-[#155DFC] font-bold mb-2">Requisitos</h2>
                    <p class="text-gray-600 leading-relaxed">{!! nl2br(e($vacancy->requirements)) !!}</p>
                </div>
            @endif

            @if ($vacancy->benefits)
                <div class="mb-6">
                    <h2 class="text-xl text-[#155DFC] font-bold mb-2">Beneficios</h2>
                    <p class="text-gray-600 leading-relaxed">{!! nl2br(e($vacancy->benefits)) !!}</p>
                </div>
            @endif


            <div class="mb-6">
                <h2 class="text-xl font-bold text-[#155DFC] mb-2">Contato</h2>
                <p class="text-gray-600">Envie seu currículo para:
                    <span
                        class="text-blue-500 underline hover:text-blue-700 transition">{{ $vacancy->email_contact }}</span>
                </p>
            </div>

            <div class="">
                <form action="{{ route('vacancy.apply', $vacancy->id) }}" method="POST">
                    @csrf
                    @if (!auth()->check())
                        <button type="submit"
                            class="bg-[#FDC700] block text-center py-2 rounded-md text-blue-900 mt-3 hover:bg-blue-950 hover:text-blue-500 w-full">
                            Candidatar
                        </button>
                    @else
                        @if (auth()->user()->role != 1 && $vacancy->user->role != 0)
                            <button type="submit"
                                class="bg-[#155DFC] block text-center py-2 rounded-md text-white mt-3 hover:bg-blue-950 hover:text-blue-500 w-full">
                                Candidatar
                            </button>
                        @endif
                    @endif
                </form>
            </div>
        </div>
    @endsection
</x-app-layout>
