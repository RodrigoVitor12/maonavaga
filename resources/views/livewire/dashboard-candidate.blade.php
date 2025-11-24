<main class="flex-1 p-8">
    <div class="flex justify-between items-center mb-8">
        <h2 class="text-3xl font-semibold text-[#1447E8]">
            Olá, {{ auth()->user()->name }}! Bem vindo ao Dashboard
        </h2>
    </div>
    <div class="flex flex-col md:flex-row gap-6">
        <a id="see-vacancies" href="{{route('vacancies.show')}}" class="bg-green-600 hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Ver
            vagas</a>
        <a id="create-cv" href="{{ route('create.resume') }}" class="bg-green-600 hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Criar
            Curriculo</a>
        <a id="edit-cv" href="{{ route('page.update.resume') }}" class="bg-green-600 hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Editar
            Curriculo</a>
        <a id="see-cv" href="{{ route('show.resume', auth()->user()->id) }}" class="bg-green-600 hover:bg-blue-950 text-white font-bold p-2 rounded-md text-center">Ver
            curriculo</a>
            <button id="btnTutorial" class="bg-[#1447E8] text-white px-4 py-2 rounded">
                Iniciar Tutorial
            </button>
    </div>
    <!-- Dashboard Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 mt-8">
        <div class="bg-white p-6 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2 text-[#1447E8]">Candidaturas Enviadas</h3>
            <p class="text-3xl font-bold text-blue-600">{{ $myCandidacies->count() }}</p>
        </div>
    </div>


    <!-- Minhas Candidaturas -->
    <section class="mb-8">
        <h2 class="text-xl font-bold mb-4 text-[#1447E8]">Minhas Candidaturas</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#1447E8] text-left">
                        <th class="p-3 text-white">Vaga</th>
                        <th class="p-3 text-white">Empresa</th>
                        <th class="p-3 text-white">Status</th>
                        <th class="p-3 text-white">Data de Candidatura</th>
                        <th class="p-3 text-white">Ação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($myCandidacies as $myCandidacy)
                        <tr class="border-b">
                            <td class="p-3">{{ $myCandidacy->title }}</td>
                            <td class="p-3">{{ $myCandidacy->name }}</td>
                            <td class="p-3"><span
                                    class="px-2 py-1 rounded-full bg-yellow-200 text-yellow-800">Pendente</span></td>
                            <td class="p-3">{{ $myCandidacy->created_at->format('d/m/Y') }}</td>
                            <td class="p-3">
                                    <button
                                        wire:click="destroy({{$myCandidacy->id}})"
                                        class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600"
                                    >
                                        Cancelar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/shepherd.js/dist/css/shepherd.css" />
        <script src="https://cdn.jsdelivr.net/npm/shepherd.js/dist/js/shepherd.min.js"></script>

<script>
    document.getElementById("btnTutorial").addEventListener("click", function () {

        const tour = new Shepherd.Tour({
            defaultStepOptions: {
                cancelIcon: { enabled: true },
                classes: 'shadow-lg bg-white',
                scrollTo: { behavior: 'smooth', block: 'center' }
            }
        });

        // Passo 1
        tour.addStep({
            title: 'Bem-vindo ao Dashboard!',
            text: 'Esta é a área principal do painel da sua empresa.',
            attachTo: { element: 'h2.text-3xl', on: 'bottom' },
            buttons: [ { text: 'Próximo', action: tour.next } ]
        });

        // Passo 2
        tour.addStep({
            title: 'Ver vagas',
            text: 'Aqui você vê todas as vagas disponiveis',
            attachTo: { element: 'a#see-vacancies', on: 'bottom' },
            buttons: [
                { text: 'Voltar', action: tour.back },
                { text: 'Próximo', action: tour.next }
            ]
        });

        // Passo 3
        tour.addStep({
            title: 'Criar curriculo',
            text: 'Aqui você cria um curriculo simples que ficara disponivel para empresas',
            attachTo: { element: 'a#create-cv', on: 'bottom' },
            buttons: [
                { text: 'Voltar', action: tour.back },
                { text: 'Próximo', action: tour.next }
            ]
        });

        // Passo 4
        tour.addStep({
            title: 'Editar Curriculo',
            text: 'Aqui você edita seu Curriculo',
            attachTo: { element: 'a#edit-cv', on: 'bottom' },
            buttons: [
                { text: 'Voltar', action: tour.back },
                { text: 'Concluir', action: tour.next }
            ]
        });

        //passo 5
        tour.addStep({
            title: 'Ver curriculo',
            text: 'Aqui você vizualiza seu curriculo',
            attachTo: { element: 'a#see-cv', on: 'bottom' },
            buttons: [
                { text: 'Voltar', action: tour.back },
                { text: 'Concluir', action: tour.complete }
            ]
        });

        tour.start();
    });
    </script>
</main>

