<main class="flex-1 p-10 bg-[#F5F6F8] min-h-screen">

    <!-- HEADER -->
    <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-6 mb-12">
        <div>
            <h2 class="text-3xl font-bold text-[#0D6EFD]">
                Olá, {{ auth()->user()->name }}
            </h2>
            <p class="text-gray-500 mt-1">
                Gerencie suas vagas, candidatos e entrevistas.
            </p>
        </div>

        <div class="flex gap-3">
            <a href="{{route('company.create-job') }}"
                class="bg-[#0D6EFD] hover:bg-blue-700 text-white font-medium px-5 py-2.5 rounded-lg shadow-sm transition">
                + Publicar Nova Vaga
            </a>

            <button id="btnTutorial"
                class="border border-[#0D6EFD] text-[#0D6EFD] px-5 py-2.5 rounded-lg hover:bg-[#0D6EFD] hover:text-white transition">
                Iniciar Tutorial
            </button>
        </div>
    </div>

    <!-- CARDS DE INDICADORES -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-14">

        <!-- Vagas Publicadas -->
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500">Vagas Publicadas</p>
            <p class="text-4xl font-bold text-[#0D6EFD] mt-2">
                {{$vacancies->count()}}
            </p>
        </div>

        <!-- Vagas Disponíveis -->
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500">Vagas Disponíveis</p>
            <p class="text-4xl font-bold text-[#0D6EFD] mt-2">
                {{ auth()->user()->remaining_vacancies ?? '∞' }}
            </p>
            <p class="text-xs text-gray-400 mt-1">
                {{ auth()->user()->plan_name }} Plan
            </p>
        </div>

        <!-- Candidatos Recebidos -->
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500">Candidatos Recebidos</p>
            <p class="text-4xl font-bold text-[#0D6EFD] mt-2">
                {{ Auth::user()->role == 1 ? $candidates->count() : $totalApplies }}
            </p>
        </div>

        <!-- Entrevistas Agendadas -->
        <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">
            <p class="text-sm text-gray-500">Entrevistas Agendadas</p>
            <p class="text-4xl font-bold text-[#0D6EFD] mt-2">
                {{$interview->count()}}
            </p>
        </div>

    </div>

    <!-- CTA PARA ATUALIZAR PLANO -->
    <div class="bg-white p-7 rounded-2xl shadow-sm border border-gray-100">
        <p class="text-sm text-gray-500">Vagas restantes</p>
        <p class="text-4xl font-bold text-[#0D6EFD] mt-2">
            {{ Auth::user()->vacancies_limit - $vacancies->count() }}
        </p>
        <a href="{{ route('plans.index') }}" class="text-[#0D6EFD] hover:underline text-sm mt-2 inline-block">
            Atualizar Plano
        </a>
    </div>

    <!-- TABELA DE VAGAS -->
    <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8 mb-16">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">
                Vagas Publicadas
            </h2>
            <a id="see-all-candidate" href="{{ route('company.candidates') }}"
                class="text-[#0D6EFD] font-medium hover:underline">
                Ver todos candidatos →
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full text-sm">
                <thead>
                    <tr class="border-b text-gray-500">
                        <th class="p-3 text-left font-medium">Título</th>
                        <th class="p-3 text-left font-medium">Candidatos</th>
                        <th class="p-3 text-left font-medium">Status</th>
                        <th class="p-3 text-left font-medium">Data</th>
                        <th class="p-3 text-left font-medium">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vacancies as $vacancy)
                        <tr class="border-b hover:bg-[#F8FAFF] transition">
                            <td class="p-3 font-medium text-gray-700">{{ $vacancy->title }}</td>
                            <td class="p-3 text-gray-600">{{ $vacancy->applies_count }}</td>
                            <td class="p-3">
                                <span class="px-3 py-1 text-xs font-medium rounded-full
                                    {{ $vacancy->status == 'Ativo'
                                        ? 'bg-[#E7F0FF] text-[#0D6EFD]'
                                        : 'bg-gray-200 text-gray-600' }}">
                                    {{$vacancy->status}}
                                </span>
                            </td>
                            <td class="p-3 text-gray-500">{{ $vacancy->created_at->format('d/m/Y') }}</td>
                            <td class="p-3 flex gap-4 text-sm">
                                <button wire:click="reopen({{$vacancy->id}})" class="text-[#0D6EFD] hover:underline">Reabrir</button>
                                <button wire:click="stop({{$vacancy->id}})" class="text-red-500 hover:underline">Encerrar</button>
                                @if ($vacancy->status == "Encerrado")
                                    <button wire:click="delete({{$vacancy->id}})" class="text-red-700 hover:underline">Excluir</button>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- ENTREVISTAS AGENDADAS -->
    <section class="bg-white rounded-2xl shadow-sm border border-gray-100 p-8">
        <h2 class="text-xl font-semibold text-gray-800 mb-6" id="interviews">Entrevistas Agendadas</h2>

        @if ($interview->count())
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm">
                    <thead>
                        <tr class="border-b text-gray-500">
                            <th class="p-3 text-left font-medium">Candidato</th>
                            <th class="p-3 text-left font-medium">Data</th>
                            <th class="p-3 text-left font-medium">Horário</th>
                            <th class="p-3 text-left font-medium">Local</th>
                            <th class="p-3 text-left font-medium">Tipo</th>
                            <th class="p-3 text-left font-medium">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($interview as $i)
                            <tr class="border-b hover:bg-[#F8FAFF] transition">
                                <td class="p-3 font-medium text-gray-700">{{ $i->scheduledInterview->name }}</td>
                                <td class="p-3 text-gray-500">{{ date('d/m/Y', strtotime($i->date)) }}</td>
                                <td class="p-3 text-gray-600">{{ $i->time }}</td>
                                <td class="p-3 text-gray-600">{{ $i->location }}</td>
                                <td class="p-3 text-gray-600">{{ $i->type == 'local' ? 'Presencial' : $i->type }}</td>
                                <td class="p-3">
                                    <button wire:click="deleteInterview({{$i->id}})" class="text-[#0D6EFD] hover:underline">Concluir</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="text-center py-12 text-gray-500">
                Nenhuma entrevista agendada no momento.
            </div>
        @endif
    </section>

</main>