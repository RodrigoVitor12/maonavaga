<x-app-layout>
    @section('title', 'Meus Candidatos - MaoNaVaga')

    @section('content')
        <div class="p-6">
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
                    <thead class="bg-[#1447E8]">
                        <tr>
                            <th class="p-3 text-left text-white">Nome do Candidato</th>
                            <th class="p-3 text-left text-white">Status</th>
                            <th class="p-3 text-left text-white">Ver curriculo</th>
                            <th class="p-3 text-left text-white">Whatsapp</th>
                            <th class="p-3 text-left text-white">E-mail</th>
                            <th class="p-3 text-left text-white">Vaga Candidatada</th>
                            <th class="p-3 text-left text-white"></th>
                        </tr>
                    </thead>
                    
                    <livewire:company-table-candidates />
                </table>
            </div>
        </div>

    @endsection
</x-app-layout>
