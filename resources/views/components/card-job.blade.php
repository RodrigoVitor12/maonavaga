<div class="bg-white p-6 rounded-md w-[350px] shadow-2xl">
    <p class="text-xl font-bold text-[#0F172A]">
        <ion-icon name="bag-outline" class="text-[#155DFC]" size="small"></ion-icon> 
            {{$title}}
    </p>
    <p class="text-center text-md text-gray-500">{{$company}}</p>
    <p class="text-gray-500 text-md"><ion-icon name="location-outline"></ion-icon> {{$city}}</p>
    <p class="text-md text-gray-500">{{$date}} </p>
    <form action="{{ route('vacancy.apply', $id) }}" method="POST">
        @csrf
        @if (!auth()->check())
            <button 
                type="submit"
                class="bg-[#FDC700] block text-center py-2 rounded-md text-blue-900 mt-3 hover:bg-blue-950 hover:text-blue-500 w-full"
            >
                Candidatar
            </button>
        @else
            @if (auth()->user()->role != 1 && $role != 0 )
                <button 
                    type="submit"
                    class="bg-[#FDC700] block text-center py-2 rounded-md text-blue-900 mt-3 hover:bg-blue-950 hover:text-blue-500 w-full"
                >
                    Candidatar
                </button>
            @endif
        @endif
    </form>
    <a href="{{ route('vacancy.detail', $id) }}" class="bg-[#FDC700] block text-center py-2 rounded-md text-blue-900 mt-3 hover:bg-blue-950 hover:text-blue-500">Ver Detalhes</a>
</div>