@extends('layouts.app')

@section('title', 'Ver Curriculos - MaoNaVaga')

@section('content')
    <div class="p-8">
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white rounded-lg shadow">
                <thead>
                    <tr class="bg-[#1447E8] text-left">
                        <th class="p-3 text-white">Nome do candidato</th>
                        <th class="p-3 text-white">Curriculo</th>
                        <th class="p-3 text-white">Contato</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($candidates as $candidate)
                    @if ($candidate->resume)
                        <tr class="border-b">
                            <td class="p-3">{{ $candidate->name }}</td>
                            <td class="p-3">
                                <a href="{{ route('show.resume', $candidate->id) }}" class="underline text-blue-600 hover:text-blue-500">Ver curriculo</a>
                            </td>
                            <td class="p-3">
                                @php
                                    // remove tudo que não for número
                                    $raw = preg_replace('/\D/', '', $candidate->phone);

                                    // garante que o número sempre tenha o prefixo 55 antes do DDD
                                    // se já vier com 55, não duplica
                                    if (str_starts_with($raw, '55')) {
                                        $phone = $raw;
                                    } else {
                                        $phone = '55' . $raw;
                                    }
                                @endphp
                                <a href="https://wa.me/{{ $phone }}" target="_blank"
                                    class="bg-green-600 p-2 rounded-lg text-white hover:text-gray-300">
                                    WhatsApp
                                </a>
                            </td>
                        </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
