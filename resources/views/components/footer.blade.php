<footer class="bg-gradient-to-br from-[#155DFC] to-[#0F3FBF] text-white">
    <div class="max-w-7xl mx-auto px-6 py-16">

        <div class="grid md:grid-cols-4 gap-12">

            <!-- Logo + Sobre -->
            <div class="md:col-span-2">
                <a href="{{ route('home') }}" class="inline-block mb-6">
                    <img src="/images/logo.png" alt="maonavaga" class="h-12">
                </a>

                <p class="text-blue-100 leading-relaxed max-w-md">
                    Conectando talentos às melhores oportunidades de emprego 
                    em Santa Rita do Sapucaí e região.
                </p>

                <!-- Contato -->
                <div class="mt-6 space-y-3 text-blue-200 text-sm">
                    <p class="flex items-center gap-2">
                        <ion-icon name="call-outline"></ion-icon>
                        (35) 99740-1598
                    </p>

                    <p class="flex items-center gap-2">
                        <ion-icon name="mail-outline"></ion-icon>
                        maonavaga26@gmail.com
                    </p>

                    <p class="flex items-center gap-2">
                        <ion-icon name="location-outline"></ion-icon>
                        Santa Rita do Sapucaí - MG
                    </p>
                </div>
            </div>

            <!-- Para Candidatos -->
            <div>
                <h3 class="text-lg font-semibold mb-6 tracking-wide">
                    Para Candidatos
                </h3>

                <div class="flex flex-col gap-4 text-blue-200 text-sm">
                    <a href="{{ route('vacancies.show') }}" class="hover:text-white hover:translate-x-1 transition duration-300">
                        Buscar vagas
                    </a>

                    <a href="{{ route('create.resume') }}" class="hover:text-white hover:translate-x-1 transition duration-300">
                        Criar currículo
                    </a>
                </div>
            </div>

            <!-- Para Empresas -->
            <div>
                <h3 class="text-lg font-semibold mb-6 tracking-wide">
                    Para Empresas
                </h3>

                <div class="flex flex-col gap-4 text-blue-200 text-sm">
                    <a href="{{ route('company.create-job') }}" 
                       class="hover:text-white hover:translate-x-1 transition duration-300">
                        Publicar vagas
                    </a>

                    <a href="https://wa.me/5535997401598?text=Olá, preciso de suporte no site MaoNaVaga!"
                       target="_blank"
                       class="hover:text-white hover:translate-x-1 transition duration-300">
                        Suporte
                    </a>
                </div>

                <!-- CTA Estratégico -->
                <div class="mt-8">
                    <a href="{{ route('company.create-job') }}"
                       class="inline-block bg-white text-[#155DFC] font-semibold px-5 py-2.5 rounded-lg shadow-md hover:shadow-lg hover:scale-105 transition duration-300">
                        Publicar minha vaga
                    </a>
                </div>
            </div>

        </div>

        <!-- Linha inferior -->
        <div class="border-t border-blue-400/40 mt-16 pt-6 flex flex-col md:flex-row items-center justify-between gap-4">

            <p class="text-sm text-blue-200">
                &copy; {{ date('Y') }} MaoNaVaga. Todos os direitos reservados.
            </p>

            <div class="flex gap-6">
                <a href="https://www.facebook.com/profile.php?id=61582307223725"
                   target="_blank"
                   class="text-blue-200 hover:text-white hover:scale-110 transition duration-300">
                    <ion-icon name="logo-facebook" size="large"></ion-icon>
                </a>

                <a href="https://www.instagram.com/maonavaga/"
                   target="_blank"
                   class="text-blue-200 hover:text-white hover:scale-110 transition duration-300">
                    <ion-icon name="logo-instagram" size="large"></ion-icon>
                </a>
            </div>

        </div>

    </div>
</footer>