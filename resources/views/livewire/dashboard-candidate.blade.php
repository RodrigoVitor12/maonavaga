<main class="flex-1 p-8 bg-[#F5F6F8]">

    <!-- TÍTULO -->
    <div class="flex justify-between items-center mb-10">
        <h2 class="text-3xl font-semibold text-[#0D6EFD]">
            Olá, {{ auth()->user()->name }}! Bem-vindo ao seu painel.
        </h2>

        <button id="btnTutorial" class="bg-[#0D6EFD] text-white px-4 py-2 rounded-md shadow hover:bg-blue-700 transition">
            Iniciar Tutorial
        </button>
    </div>

    <!-- BOTÕES DE ATALHO -->
    <div class="flex flex-col md:flex-row gap-4">
        <a id="see-vacancies" href="{{ route('vacancies.show') }}"
            class="bg-[#0D6EFD] hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow text-center">
            Ver vagas
        </a>

        <a id="create-cv" href="{{ route('create.resume') }}"
            class="bg-[#0D6EFD] hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow text-center">
            Criar Currículo
        </a>

        <a id="edit-cv" href="{{ route('page.update.resume') }}"
            class="bg-[#0D6EFD] hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow text-center">
            Editar Currículo
        </a>

        <a id="see-cv" href="{{ route('show.resume', auth()->user()->id) }}"
            class="bg-[#0D6EFD] hover:bg-blue-700 text-white font-medium px-4 py-2 rounded-md shadow text-center">
            Ver Currículo
        </a>
    </div>

    <!-- CARDS DE INDICADORES -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-10 mb-12">

        <!-- Candidaturas enviadas -->
        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-medium text-[#6C757D] mb-2">Candidaturas enviadas</h3>
            <p class="text-4xl font-bold text-[#0D6EFD]">{{ $myCandidacies->count() }}</p>
        </div>

        {{-- <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-medium text-gray-600 mb-2">Entrevistas agendadas</h3>
            <p class="text-4xl font-bold text-[#0D6EFD]">1</p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow">
            <h3 class="text-lg font-medium text-gray-600 mb-2">Currículo completo</h3>
            <div class="w-full bg-gray-200 rounded-full h-2">
                <div class="bg-[#0D6EFD] h-2 rounded-full" style="width:85%"></div>
            </div>
        </div> --}}


    </div>

    <!-- MINHAS CANDIDATURAS e entrevistas-->
    <section class="mb-16">
        <h2 class="text-2xl font-semibold mb-4 text-[#0D6EFD]">Minhas Candidaturas</h2>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-xl shadow">
                <thead>
                    <tr class="bg-[#0D6EFD] text-left">
                        <th class="p-3 text-white font-medium">Vaga</th>
                        <th class="p-3 text-white font-medium">Empresa</th>
                        <th class="p-3 text-white font-medium">Status</th>
                        <th class="p-3 text-white font-medium">Data</th>
                        <th class="p-3 text-white font-medium">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($myCandidacies as $myCandidacy)
                        @php
                            $apply = $myCandidacy->applies->first();
                        @endphp

                        <tr class="border-b hover:bg-[#F8FBFF] transition">

                            <td class="p-3">{{ $myCandidacy->title }}</td>

                            <td class="p-3">{{ $myCandidacy->name }}</td>

                            <td class="p-3">
                                <span
                                    class="px-3 py-1 rounded-full text-sm {{ $apply?->status == 'Recebido'
                                        ? 'bg-gray-400 text-white'
                                        : ($apply?->status == 'Em analise'
                                            ? 'bg-blue-500 text-white'
                                            : ($apply?->status == 'Aprovado'
                                                ? 'bg-green-500 text-white'
                                                : 'bg-red-500 text-white')) }}">
                                    {{ $myCandidacy->status == 'Ativo' ? $apply?->status : 'Vaga Encerrada' }}
                                </span>
                            </td>

                            <td class="p-3">
                                {{ $myCandidacy->created_at->format('d/m/Y') }}
                            </td>

                            <td class="p-3">
                                <button wire:click="destroy({{ $myCandidacy->id }})"
                                    class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded shadow">
                                    {{ $myCandidacy->status == 'Ativo' ? 'Cancelar Candidatura' : 'Excluir' }}
                                </button>
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </section>

    {{-- Minhas entrevistas --}}
    <section class="mt-12">
        <div class="flex justify-between items-center mb-4">
            <h2 class="text-xl font-bold text-[#1447E8]">Minhas Entrevistas Agendadas</h2>
        </div>
        
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#1447E8] text-left">
                        <th class="p-3 text-white">Nome da Empresa</th>
                        <th class="p-3 text-white">Agendado para</th>
                        <th class="p-3 text-white">Horario</th>
                        <th class="p-3 text-white">Descrição</th>
                        <th class="p-3 text-white">Local</th>
                        <th class="p-3 text-white">Forma de Entrevista</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($interviews as $interview)
                        <tr class="border-b">
                            <td class="p-3">{{ $interview->candidate->name }}</td>
                            <td class="p-3">{{ date('d/m/Y', strtotime($interview->date)) }}</td>
                            <td class="p-3">{{ $interview->time }}</td>
                            <td class="p-3">
                                {{ $interview->notes }}
                            </td>
                            <td class="p-3">{{ $interview->location }}</td>
                            <td class="p-3">{{ $interview->type == 'local' ? 'Presencial' : $interview->type }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>

    <!-- Shepherd.js -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js/dist/css/shepherd.css" />
    <script src="https://cdn.jsdelivr.net/npm/shepherd.js/dist/js/shepherd.min.js"></script>

    <script>
        document.getElementById("btnTutorial").addEventListener("click", function() {

            const tour = new Shepherd.Tour({
                defaultStepOptions: {
                    cancelIcon: {
                        enabled: true
                    },
                    classes: 'shadow-lg bg-white rounded-lg',
                    scrollTo: {
                        behavior: 'smooth',
                        block: 'center'
                    }
                }
            });

            tour.addStep({
                title: 'Bem-vindo ao Dashboard!',
                text: 'Esta é sua área principal com indicadores e atalhos.',
                attachTo: {
                    element: 'h2.text-3xl',
                    on: 'bottom'
                },
                buttons: [{
                    text: 'Próximo',
                    action: tour.next
                }]
            });

            tour.addStep({
                title: 'Ver vagas',
                text: 'Veja as vagas disponíveis para se candidatar.',
                attachTo: {
                    element: 'a#see-vacancies',
                    on: 'bottom'
                },
                buttons: [{
                        text: 'Voltar',
                        action: tour.back
                    },
                    {
                        text: 'Próximo',
                        action: tour.next
                    }
                ]
            });

            tour.addStep({
                title: 'Criar currículo',
                text: 'Crie seu currículo dentro da plataforma.',
                attachTo: {
                    element: 'a#create-cv',
                    on: 'bottom'
                },
                buttons: [{
                        text: 'Voltar',
                        action: tour.back
                    },
                    {
                        text: 'Próximo',
                        action: tour.next
                    }
                ]
            });

            tour.addStep({
                title: 'Editar currículo',
                text: 'Atualize seu currículo sempre que quiser.',
                attachTo: {
                    element: 'a#edit-cv',
                    on: 'bottom'
                },
                buttons: [{
                        text: 'Voltar',
                        action: tour.back
                    },
                    {
                        text: 'Próximo',
                        action: tour.next
                    }
                ]
            });

            tour.addStep({
                title: 'Ver currículo',
                text: 'Visualize como seu currículo aparece para as empresas.',
                attachTo: {
                    element: 'a#see-cv',
                    on: 'bottom'
                },
                buttons: [{
                        text: 'Voltar',
                        action: tour.back
                    },
                    {
                        text: 'Concluir',
                        action: tour.complete
                    }
                ]
            });

            tour.start();
        });
    </script>

</main>
