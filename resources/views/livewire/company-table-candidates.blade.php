<div class="overflow-x-auto">
<table class="min-w-full bg-white rounded-lg shadow divide-y divide-gray-200">
    <tbody class="divide-y divide-gray-200">
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

        @foreach ($candidates as $candidate)
            <tr wire:key="candidate-{{ $candidate->user->id }}" class="hover:bg-gray-100">

                <td class="p-3 whitespace-nowrap">{{ $candidate->user->name }} </td>
                <td class="p-3 whitespace-nowrap">
                    <span
                        class="p-2 {{ $candidate->status == 'Recebido'
                            ? 'bg-gray-400 text-white'
                            : ($candidate->status == 'Em analise'
                                ? 'bg-blue-500 text-white'
                                : ($candidate->status == 'Aprovado'
                                    ? 'bg-green-500 text-white'
                                    : 'bg-red-500 text-white')) }}">
                        {{ $candidate->status }}
                    </span>
                </td>

                <td class="p-3 whitespace-nowrap">
                    <a class="text-blue-400 hover:text-blue-600 hover:underline"
                        href="{{ route('show.resume', $candidate->user->id) }}">
                        Ver curriculo
                    </a>
                </td>

                <td class="p-3 whitespace-nowrap">
                    @php $phone = preg_replace('/\D/', '', $candidate->user->phone); @endphp
                    <a href="https://wa.me/{{ $phone }}" target="_blank" class="text-blue-900 underline">
                        {{ $candidate->user->phone }}
                    </a>
                </td>

                <td class="p-3 whitespace-nowrap">{{ $candidate->user->email }}</td>
                <td class="p-3 whitespace-nowrap">{{ $candidate->vacancy->title }}</td>

                <td class="p-3 whitespace-nowrap">
                    <button wire:click="changeOpen({{ $candidate->id }})"
                        class="px-3 py-1.5 text-sm font-medium bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Mover Status
                    </button>

                    @if (!empty($open[$candidate->id]))
                        <div
                            class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 flex flex-col 
                    shadow-lg rounded-lg overflow-hidden z-30">

                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                                wire:click="changeStatus({{ $candidate->user->id }}, {{ $candidate->vacancy->id }}, 'Recebido')">
                                📥 Recebido
                            </button>

                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                                wire:click="changeStatus({{ $candidate->user->id }}, {{ $candidate->vacancy->id }}, 'Em Analise')">
                                👀 Em Análise
                            </button>

                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                                wire:click="openAndCloseModal({{$candidate->user->id}}, {{$candidate->vacancy->id}})">
                                📞 Entrevista
                            </button>

                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                                wire:click="changeStatus({{ $candidate->user->id }}, {{ $candidate->vacancy->id }}, 'Aprovado')">
                                👍 Aprovado
                            </button>

                            <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm text-red-600"
                                wire:click="changeStatus({{ $candidate->user->id }}, {{ $candidate->vacancy->id }}, 'Reprovado')">
                                ❌ Reprovado
                            </button>
                        </div>
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@if ($isOpenModal)
    <div >
        <div class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50">
            <div class="bg-white w-full max-w-md rounded-xl shadow-lg p-6 relative ">

                <!-- Fechar -->
                <button wire:click="openAndCloseModal" class="absolute top-4 right-4 text-gray-400 hover:text-gray-600">
                    ✕
                </button>

                <h2 class="text-xl font-semibold mb-6">
                    Agendar entrevista
                </h2>

                <div class="space-y-4">
                    <input type="hidden" wire:model="vacancyId">
                    <input type="hidden" wire:model="selectedCandidateId">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Data da entrevista
                        </label>
                        <input type="date" name="date" wire:model="date" class="w-full border rounded-lg px-3 py-2" >
                        @error('date') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Horário
                        </label>
                        <input type="time" wire:model="time" class="w-full border rounded-lg px-3 py-2">
                        @error('time') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Local ou link
                        </label>
                        <input type="text" wire:model="location" class="w-full border rounded-lg px-3 py-2"
                            placeholder="Av. Central, 210">
                            @error('location') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">
                            Observações
                        </label>
                        <textarea wire:model="notes" class="w-full border rounded-lg px-3 py-2" placeholder="Trazer currículo impresso"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Tipo de entrevista
                        </label>
                        <div class="flex gap-6">
                            <label class="flex items-center gap-2">
                                <input type="radio" wire:model="type" value="local">
                                Presencial
                            </label>

                            <label class="flex items-center gap-2">
                                <input type="radio" wire:model="type" value="Online">
                                Online
                            </label>

                            @error('type') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                <button wire:click="handleClick({{ $selectedCandidateId }}, {{ $vacancyId }}, 'Entrevista Agendado')"
                    class="mt-6 w-full bg-blue-600 hover:bg-blue-700 text-white py-2.5 rounded-lg">
                    Agendar entrevista
                </button>

            </div>
        </div>
    </div>
@endif

@if (session()->has('message'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Sucesso! </strong>
                <span class="block sm:inline">{{ session('message') }}</span>
            </div>
        @endif
</div>




