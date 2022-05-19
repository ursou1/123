
    <div>
        <div style="text-align: center">

            <button wire:mouseover="increment" wire:mouseleave="increment">+</button>

            <h1>{{ $count }}</h1>
            <h1>{{ $count1 }}</h1>


            @if ($change)
                <h1>{{ $name }}</h1>
            @endif
            <input wire:model="change" type="checkbox">
            <input wire:model="name" type="text">
            <select wire:model="lolkek" wire:click="changeOption">
                <option>
                    kek
                </option>
                <option>
                    lol
                </option>
            </select>
            <button wire:click="$set('name', 'Default')"> Reset input</button>
        </div>
    </div>
