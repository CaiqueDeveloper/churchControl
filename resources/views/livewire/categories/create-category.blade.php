<div>
   <x-button wire:click="$toggle('canShowModal', 'true')">
        {{ __('Create an new category') }}
   </x-button>
   @if($canShowModal)
        <x-modal>
            <x-slot name="title">Create an new category</x-slot>
            <x-slot name="body">                
                <form wire:submit.prevent="create">
                    @csrf

                    <div class="mb-6">
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" wire:model.defer="name" class="block mt-1 w-full" type="text" name="name" />
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="my-3">
                        <x-label for="name" :value="__('Select an church')" />
                        <x-select name="church_id" wire:model.defer="church_id">
                            <option selected>Select an church</option>
                            @foreach($churchs[0]->churchs as $church)
                            <option value="{{$church->id}}">{{$church->name}}</option>
                            @endforeach
                        </x-select>
                    </div>

                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </form> 
            </x-slot>
        </x-modal>
   @endif
</div>
