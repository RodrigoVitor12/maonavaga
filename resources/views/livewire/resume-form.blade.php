<div class="p-8">

    @if (session()->has('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-700 rounded-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="max-w-4xl mx-auto bg-gradient-to-r from-blue-500 to-blue-700 p-8 rounded-xl shadow-lg">

        <h1 class="text-2xl font-bold text-white text-center mb-6">
            Criar / Editar Currículo
        </h1>

        <form wire:submit.prevent="save" class="space-y-8">

            {{-- ================= DADOS PESSOAIS ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Dados Pessoais</h2>

                <div class="grid md:grid-cols-2 gap-4">

                    <input type="text"
                        wire:model.defer="full_name"
                        placeholder="Nome Completo"
                        class="border p-2 rounded w-full" required>

                    <input type="email"
                        wire:model.defer="email"
                        placeholder="E-mail"
                        class="border p-2 rounded w-full" required>

                    <input type="text"
                        wire:model.defer="phone"
                        placeholder="Telefone"
                        class="border p-2 rounded w-full" required>

                    <input type="text"
                        wire:model.defer="city"
                        placeholder="Cidade / Estado"
                        class="border p-2 rounded w-full" required>

                    <input type="date"
                        wire:model.defer="birth_date"
                        class="border p-2 rounded w-full" required>
                </div>
            </div>

            {{-- ================= RESUMO ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Resumo Profissional</h2>

                <textarea
                    wire:model.defer="summary"
                    rows="4"
                    class="border p-2 rounded w-full"
                    placeholder="Resumo profissional..." required></textarea>
            </div>

            {{-- ================= EXPERIÊNCIA ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Experiência Profissional</h2>

                @foreach($experiences as $index => $experience)

                    <div class="bg-white p-4 rounded mb-4 space-y-4 shadow">

                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="text"
                                wire:model.defer="experiences.{{ $index }}.position"
                                placeholder="Cargo"
                                class="border p-2 rounded w-full">

                            <input type="text"
                                wire:model.defer="experiences.{{ $index }}.company"
                                placeholder="Empresa"
                                class="border p-2 rounded w-full">
                        </div>

                        <div class="grid md:grid-cols-2 gap-4">
                            <input type="date"
                                wire:model.defer="experiences.{{ $index }}.start_date"
                                class="border p-2 rounded w-full">

                            <input type="date"
                                wire:model.defer="experiences.{{ $index }}.end_date"
                                class="border p-2 rounded w-full">
                        </div>

                        <label class="flex items-center gap-2">
                            <input type="checkbox"
                                wire:model="experiences.{{ $index }}.currently_working">
                            Trabalho atualmente aqui
                        </label>

                        <textarea
                            wire:model.defer="experiences.{{ $index }}.activities"
                            placeholder="Principais atividades"
                            class="border p-2 rounded w-full"></textarea>

                        <button type="button"
                            wire:click="removeExperience({{ $index }})"
                            class="text-red-600 text-sm">
                            Remover experiência
                        </button>
                    </div>

                @endforeach

                <button type="button"
                    wire:click="addExperience"
                    class="bg-white text-blue-600 px-4 py-2 rounded shadow">
                    + Adicionar Experiência
                </button>
            </div>

            {{-- ================= FORMAÇÃO ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Formação</h2>

                @foreach($educations as $index => $education)

                    <div class="bg-white p-4 rounded mb-4 space-y-3 shadow">

                        <select wire:model.defer="educations.{{ $index }}.course_type"
                            class="border p-2 rounded w-full">
                            <option value="">Tipo de curso</option>
                            <option>Ensino Médio</option>
                            <option>Curso Técnico</option>
                            <option>Graduação</option>
                            <option>Pós-graduação</option>
                        </select>

                        <input type="text"
                            wire:model.defer="educations.{{ $index }}.institution"
                            placeholder="Instituição"
                            class="border p-2 rounded w-full">

                        <select wire:model.defer="educations.{{ $index }}.status"
                            class="border p-2 rounded w-full">
                            <option value="">Status</option>
                            <option>Em andamento</option>
                            <option>Concluído</option>
                            <option>Trancado</option>
                        </select>

                        <button type="button"
                            wire:click="removeEducation({{ $index }})"
                            class="text-red-600 text-sm">
                            Remover formação
                        </button>
                    </div>

                @endforeach

                <button type="button"
                    wire:click="addEducation"
                    class="bg-white text-blue-600 px-4 py-2 rounded shadow">
                    + Adicionar Formação
                </button>
            </div>

            {{-- ================= HABILIDADES ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Habilidades</h2>

                <input type="text"
                    wire:model.defer="skills"
                    placeholder="Ex: Comunicação, Excel..."
                    class="border p-2 rounded w-full">
            </div>

            {{-- ================= IDIOMAS ================= --}}
            <div>
                <h2 class="text-lg font-semibold text-white mb-4">Idiomas</h2>

                <input type="text"
                    wire:model.defer="languages"
                    placeholder="Ex: Inglês - Básico"
                    class="border p-2 rounded w-full">
            </div>

            {{-- ================= BOTÃO ================= --}}
            <div class="text-center">
                <button type="submit"
                    class="bg-white text-blue-700 font-semibold px-6 py-3 rounded shadow hover:scale-105 transition">
                    Salvar Currículo
                </button>
            </div>

        </form>
    </div>
</div>