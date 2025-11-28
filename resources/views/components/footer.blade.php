<footer class="px-4 bg-[#155DFC] py-4 text-white">
    <div class="grid md:grid-cols-3 gap-8 mb-2 md:ml-44">
        <div>
            <a href="{{ route('home') }}" class="mb-3 text-2xl font-bold">
                <img src="/images/logo.png" alt="maonavaga">
            </a>
            <p class="mb-3 text-md">Conectando talentos com as melhores oportunidades <br> de emprego em Santa Rita do
                Sapucaí</p>
            <div class="flex flex-col gap-2">
                <p class="text-md"><ion-icon name="call-outline"></ion-icon> (35) 99740-1598</p>
                <p class="text-md"><ion-icon name="mail-outline"></ion-icon> maonavaga26@gmail.com</p>
                <p class="text-md"><ion-icon name="location-outline"></ion-icon> Santa Rita do Sapucaí</p>
            </div>
        </div>

        <div class="flex flex-col">
            <p class="text-2xl font-bold mb-3">Para Candidatos</p>
            <a href="{{ route('vacancies.show') }}" class="text-gray-300 mb-3 hover:text-white">Buscar vagas</a>
            <a href="{{ route('create.resume') }}" class="text-gray-300 hover:text-white">Criar Curriculo</a>
        </div>

        <div class="flex flex-col">
            <p class="text-2xl mb-3 font-bold">Para empresas</p>
            <a href="{{ route('company.create-job') }}" class="text-gray-300 mb-3 hover:text-white">Publicar vagas</a>
            {{-- <a href="#" class="text-gray-300 mb-3 hover:text-white">Buscar Talentos</a> --}}
            {{-- <a href="#" class="text-gray-300 mb-3 hover:text-white">Planos</a> --}}
            <a href="https://wa.me/5535997401598?text=Olá, preciso de suporte no site MaoNaVaga!" target="_blank"  class="text-gray-300 mb-3 hover:text-white">Suporte</a>
        </div>
    </div>

    <hr>

    <div class="mt-3 flex justify-around">
        <p class="text-md">&copy; MaoNaVaga. Todos os direitos reservados.</p>
        <div class="flex gap-4">
            <a href="https://www.facebook.com/profile.php?id=61582307223725" target="_blank"><ion-icon name="logo-facebook" size="large"></ion-icon></a>
            <a href="https://www.instagram.com/maonavaga/" target="_blank"><ion-icon name="logo-instagram" size="large"></ion-icon></ion-icon></a>
        </div>
    </div>
</footer>
