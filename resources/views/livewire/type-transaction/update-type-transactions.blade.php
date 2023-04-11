<div>
    <x-button-update  wire:click="$toggle('canShowModal','true')"/>
    

    @if($canShowModal)
        <x-modal>
            <x-slot name="title">Update Type Transaction ({{$type->name}})</x-slot>
            <x-slot name="body">                
                <form wire:submit.prevent="update">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your name type transaction</label>
                        <input  type="text" wire:model.defer="type.name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        @error('type.name') <span class="mt-3 text-red-500 font-semibold">{{ $message }}</span> @enderror
                    </div>
                </form> 
            </x-slot>
        </x-modal>
    @endif
</div>
