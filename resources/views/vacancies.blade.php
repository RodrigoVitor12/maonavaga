@extends('layouts.app')

@section('title', 'Vagas de Emprego - MaoNaVaga')

@section('content')
    <section class="px-8 py-6">
        <h2 class="text-3xl text-[#1447E8] font-bold text-center mt-12">Vagas Publicadas</h2>
        <p class="text-center text-gray-500 mt-4">Encontre aqui a vaga que você procura.</p>
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif
        <div class="grid md:grid-cols-3 gap-6 py-8 justify-center">
            @guest
                @foreach ($vacancies->take(3) as $vacancy)
                    <x-card-job :id="$vacancy->id" :role="$vacancy->user->role" :title="$vacancy->title" :company="$vacancy->name" :city="$vacancy->address"
                        :date="$vacancy->created_at->format('d/m/Y')" />
                @endforeach
            @endguest

            @auth
                @foreach ($vacancies as $vacancy)
                    <x-card-job :id="$vacancy->id" :role="$vacancy->user->role" :title="$vacancy->title" :company="$vacancy->name" :city="$vacancy->address"
                        :date="$vacancy->created_at->format('d/m/Y')" />
                @endforeach
            @endauth
        </div>
        @auth
            <div>
                {{ $vacancies->links() }}
            </div>
        @endauth

        @guest
            <div class="flex flex-col justify-center items-center gap-6">
                <p class="text-2xl text-[#1447E8] font-bold">Para ver mais vagas é necessário fazer Login ou criar
                    uma conta.</p>
                <a href="{{ route('login') }}"
                    class="bg-[#00A63E] hover:bg-blue-950 font-bold p-2 rounded-md text-white text-center">Fazer Login</a>
                <a href="{{ route('registerAsWho') }}"
                    class="bg-[#155DFC] hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Criar uma conta</a>
            </div>
        @endguest
    </section>
@endsection
