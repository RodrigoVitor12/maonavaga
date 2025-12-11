<tbody class="divide-y divide-gray-200">
@foreach ($candidates as $candidate)
    <tr wire:key="candidate-{{ $candidate->user->id }}" class="hover:bg-gray-100">

        <td class="p-3 whitespace-nowrap">{{ $candidate->user->name }}</td>
        <td 
            class="p-3 whitespace-nowrap"
        >
            <span class="p-2 {{$candidate->status == "Recebido" ? 'bg-gray-400 text-white' 
                : ($candidate->status == "Em analise" ? 'bg-blue-500 text-white' 
                    : ($candidate->status == "Aprovado" ? 'bg-green-500 text-white' : 'bg-red-500 text-white'))}}"
            >
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
                <div class="absolute right-0 mt-2 w-40 bg-white border border-gray-200 flex flex-col 
                    shadow-lg rounded-lg overflow-hidden z-30">

                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                        wire:click="changeStatus({{ $candidate->user->id}}, {{$candidate->vacancy->id}}, 'Recebido')">
                        📥 Recebido
                    </button>

                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                        wire:click="changeStatus({{ $candidate->user->id}}, {{$candidate->vacancy->id}}, 'Em Analise')">
                        👀 Em Análise
                    </button>

                    {{-- <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                        wire:click="changeStatus({{ $candidate->user->id}}, {{$candidate->vacancy->id}}, 'Entrevista Agendada')">
                        📞 Entrevista
                    </button> --}}

                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm"
                        wire:click="changeStatus({{ $candidate->user->id}}, {{$candidate->vacancy->id}}, 'Aprovado')">
                        👍 Aprovado
                    </button>

                    <button class="w-full text-left px-4 py-2 hover:bg-gray-100 text-sm text-red-600"
                        wire:click="changeStatus({{ $candidate->user->id}}, {{$candidate->vacancy->id}}, 'Reprovado')">
                        ❌ Reprovado
                    </button>
                </div>
            @endif
        </td>
    </tr>
@endforeach
</tbody>
