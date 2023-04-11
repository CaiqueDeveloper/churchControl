<div>
    <x-button-update wire:click="$toggle('canShowModal','true')" />
    @if($canShowModal)
    <x-modal>
        <x-slot name="title">Update Category ({{$category->name}})</x-slot>
        <x-slot name="body">
            <form wire:submit.prevent="update">
                @csrf
                <div class="mb-6">
                    <x-label for="name" :value="__('Name')" />
                    <x-input id="name" wire:model.defer="category.name" class="block mt-1 w-full" type="text" name="name" />
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 my-3">
                    <div>
                        <x-label for="name" :value="__('Select an church')" />
                        <x-select name="church_id" wire:model.defer="category.church_id">
                            <option selected>Select an church</option>
                            @foreach($churchs[0]->churchs as $church)
                            <option value="{{$church->id}}">{{$church->name}}</option>
                            @endforeach
                        </x-select>
                    </div>
                    <div>
                        <x-label for="name" :value="__('Select an status')" />
                        <x-select name="enabled" wire:model.defer="category.enabled">
                            <option selected>Select an status</option>
                            <option value="0">Disable</option>
                            <option value="1">Enable</option>
                           
                        </x-select>
                    </div>
                </div>

                <x-button class="mt-4">
                    {{ __('Update') }}
                </x-button>
            </form>
        </x-slot>
    </x-modal>
    @endif
</div>
</div>