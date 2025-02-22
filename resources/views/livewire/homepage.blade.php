<div>
    <div class="relative my-5 flex justify-center h-60 w-60 bg-[url('../img/bottle.png')] bg-contain bg-center bg-no-repeat">
        <div class="absolute top-20 text-4xl"><strong>{{ $sum_water }}l</strong></div>
    </div>

    @foreach($users as $user)
        <div class="flex items-center justify-between py-1">
            <div class="flex items-center">
                <div class="relative me-3">
                    <img class="w-8 h-8 rounded-full" src="{{ Vite::asset('resources/img/'.$user->avatar) }}" alt="{{ $user->name }}">
                </div>
                <p class="text-lg">{{ $user->name }}</p>
            </div>

            <div class="flex items-center">
                <div class="text-md pe-3"><strong>{{ $user->water_level }}l</strong></div>

                <div class="cursor-pointer" wire:click="add('{{ $user->id }}')">
                    <img src="{{ Vite::asset('resources/img/glass.png') }}" alt="" class="h-8">
                </div>
            </div>
        </div>
    @endforeach
</div>
