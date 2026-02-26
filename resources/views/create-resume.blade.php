<x-app-layout>
    @section('title', 'Criar Curriculo')

    @section('content')
        <div class="p-8">
                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                        {{ session('success') }}
                    </div>
                @endif
                <livewire:resume-form />
        </div>
    @endsection
</x-app-layout>

<script src="https://unpkg.com/imask"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const phoneInput = document.getElementById('phone');
        if (phoneInput) {
            IMask(phoneInput, {
                mask: [{
                        mask: '(00) 00000-0000'
                    }, // celular
                    {
                        mask: '(00) 0000-0000'
                    } // fixo
                ]
            });
        }
    });
</script>
