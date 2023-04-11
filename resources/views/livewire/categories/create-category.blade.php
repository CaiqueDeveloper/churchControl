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
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Category</label>
                        <input type="text" id="name"
                            wire:model.defer="name"
                            name="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('name') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="my-3">
                        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select an chruch</label>
                        <select id="countries" name="church_id" wire:model.defer="church_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option selected>Select an church</option>
                            @foreach($churchs[0]->churchs as $church)
                            <option value="{{$church->id}}">{{$church->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <x-button class="mt-4">
                        {{ __('Create') }}
                    </x-button>
                </form> 
            </x-slot>
        </x-modal>
   @endif
</div>
