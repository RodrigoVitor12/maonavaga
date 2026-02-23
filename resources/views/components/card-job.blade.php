<div class="group bg-white w-[370px] rounded-2xl border border-gray-100 shadow-md hover:shadow-2xl hover:-translate-y-1 transition-all duration-300 overflow-hidden">

    <!-- Top Accent -->
    <div class="h-1 bg-[#155DFC]"></div>

    <div class="p-6">

        <!-- Header -->
        <div class="flex justify-between items-start mb-4">

            <div class="flex gap-3">
                <div class="bg-[#155DFC]/10 p-3 rounded-xl">
                    <ion-icon name="bag-outline" class="text-[#155DFC] text-lg"></ion-icon>
                </div>

                <div>
                    <h3 class="text-lg font-semibold text-[#0F172A] leading-snug group-hover:text-[#155DFC] transition">
                        {{$title}}
                    </h3>
                    <p class="text-sm text-gray-500">
                        {{$company}}
                    </p>
                </div>
            </div>

            <!-- Data Badge -->
            <span class="text-xs bg-gray-100 text-gray-500 px-3 py-1 rounded-full whitespace-nowrap">
                {{$date}}
            </span>

        </div>

        <!-- Info -->
        <div class="space-y-2 text-sm text-gray-600 mb-6">

            <p class="flex items-center gap-2">
                <ion-icon name="location-outline" class="text-[#155DFC]"></ion-icon>
                {{$city}}
            </p>

        </div>

        <!-- Buttons -->
        <div class="space-y-3">

            <form action="{{ route('vacancy.apply', $id) }}" method="POST">
                @csrf

                @if (!auth()->check())
                    <button 
                        type="submit"
                        class="w-full bg-[#FDC700] text-[#0F172A] font-semibold py-3 rounded-xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-200"
                    >
                        Candidatar-se
                    </button>
                @else
                    @if (auth()->user()->role != 1 && $role != 0 )
                        <button 
                            type="submit"
                            class="w-full bg-[#FDC700] text-[#0F172A] font-semibold py-3 rounded-xl shadow-sm hover:shadow-md hover:scale-[1.02] transition-all duration-200"
                        >
                            Candidatar-se
                        </button>
                    @endif
                @endif
            </form>

            <a 
                href="{{ route('vacancy.detail', $id) }}" 
                class="w-full block text-center border border-[#155DFC] text-[#155DFC] font-medium py-3 rounded-xl hover:bg-[#155DFC] hover:text-white transition-all duration-200"
            >
                Ver Detalhes
            </a>

        </div>

    </div>
</div>