<x-app-layout>
    @section('title', 'Criar vagas - MaoNaVaga')
    @section('content')
        <div class="py-12">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    {{session('error')}}
                </div>
            @endif

            @if (session('errorLimitVacancy'))
                <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg">
                    {{session('errorLimitVacancy')}}
                    <a href="{{route('plans.index')}}" class="text-blue-500 underline">Clique aqui</a> e mude seu plano agora.
                </div>
            @endif
            <form action="{{ route('company.store-job') }}" method="POST"
                class="max-w-2xl mx-auto bg-gradient-to-r from-blue-500  to-blue-700 p-6 rounded-lg shadow">
                @csrf

                <h2 class="text-2xl font-semibold text-white mb-6">Cadastrar Nova Vaga</h2>
                <!-- company name -->
                <div class="mb-4">
                    <label for="name" class="block text-sm font-medium text-white mb-1">Nome da empresa</label>
                    <input type="text" id="name" name="name"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required />
                </div>

                <!-- title -->
                <div class="mb-4">
                    <label for="title" class="block text-sm font-medium text-white mb-1">Título da Vaga</label>
                    <input type="text" id="title" name="title" placeholder="Ex: Auxiliar de logistica"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required />
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label for="description" class="block text-sm font-medium text-white mb-1">Descrição</label>
                    <textarea id="description" name="description" rows="4" placeholder="Descreva as responsabilidades da vaga"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                {{-- requirements --}}
                <div class="mb-4">
                    <label for="requirements" class="block text-sm font-medium text-white mb-1">Requisitos
                        (opcional)</label>
                    <textarea id="requirements" name="requirements" rows="4" placeholder="Descreva os requisitos."
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>
                {{-- benefits --}}
                <div class="mb-4">
                    <label for="benefits" class="block text-sm font-medium text-white mb-1">Beneficios (opcional)</label>
                    <textarea id="benefits" name="benefits" rows="4" placeholder="Descreva os beneficios."
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"></textarea>
                </div>

                <!-- type -->
                <div class="mb-4">
                    <label for="type" class="block text-sm font-medium text-white mb-1">Tipo de Contrato</label>
                    <select id="type" name="type"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required
                        >
                        <option value="" disabled selected>Selecione o tipo</option>
                        <option value="CLT">CLT</option>
                        <option value="PJ">PJ</option>
                        <option value="Freelancer">Freelancer</option>
                        <option value="Estagio">Estágio</option>
                        <option value="Temporario">Temporário</option>
                    </select>
                </div>

                <!-- Salary -->
                <div class="mb-4">
                    <label for="salary" class="block text-sm font-medium text-white mb-1">Salário (opcional)</label>
                    <input type="text" id="salary" name="salary" placeholder="Ex: R$ 4.000,00"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        oninput="formatSalary(this)" />
                </div>

                <!-- Address -->
                <div class="mb-4">
                    <label for="address" class="block text-sm font-medium text-white mb-1">Endereço</label>
                    <input type="text" id="address" name="address"
                        placeholder="Ex: Centro, 157 - Santa Rita do Sapucai/MG"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500" 
                        required
                    />
                </div>

                <!-- E-mail or Whatsapp Contact -->
                <div class="mb-6">
                    <label for="email_contact" class="block text-sm font-medium text-white mb-1">E-mail ou whatsapp para
                        envio de curriculo</label>
                    <input type="text" id="email_contact" name="email_contact" placeholder="empresa@exemplo.com"
                        class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        required />
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition">
                        Publicar Vaga
                    </button>
                </div>
            </form>
        </div>

    @endsection
</x-app-layout>


<script>
    function formatSalary(input) {
        let value = input.value.replace(/\D/g, ""); // remove tudo que não é número
        value = (value / 100).toFixed(2) + ""; // coloca duas casas decimais
        value = value.replace(".", ","); // troca ponto por vírgula
        value = value.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // separador de milhar
        input.value = "R$ " + value;
    }
</script>
