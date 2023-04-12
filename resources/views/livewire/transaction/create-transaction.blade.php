<div>
    <x-button wire:click="$toggle('canShowModal', 'true')">

        {{ __('Create an new transaction') }}
    </x-button>
    @if($canShowModal)
    <x-modal>
        <x-slot name="title">Create an new transaction</x-slot>
        <x-slot name="body">
            <form wire:submit.prevent="create">
                @csrf
                <div class="flex items-center mb-4">
                    <input wire:model.defer="pay" id="pay" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                    <label for="pay" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">It's paid?
                </label>
                </div> 
                <div class="mb-6">
                    <x-label for="name" :value="__('Description Transaction')" />
                    <x-input id="name" wire:model.defer="name" class="block mt-1 w-full" type="text" name="name" />
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="mb-6">
                    <x-label for="payment_date" :value="__('Payment Date')" />
                    <x-input id="payment_date" wire:model.defer="payment_date" class="block mt-1 w-full" type="date" name="payment_date" />
                    @error('payment_date') <span class="error">{{ $message }}</span> @enderror
                </div>
                <div class="grid md:grid-cols-2 md:gap-6 my-3">
                    <div>
                        <x-label  :value="__('Select an type Transaction')" />
                        <x-select name="typeTransaction_id" wire:model.defer="typeTransaction_id">
                            <option selected>Select an type Transaction</option>
                            @foreach($typeTransaction as $type)
                                <option value="{{$type->id}}">{{$type->name}}</option>
                            @endforeach
                        </x-select>
                        @error('typeTransaction_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        <x-label for="name" :value="__('Select an category')" />
                        <x-select name="category_id" wire:model.defer="category_id">
                            <option selected>Select an category</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </x-select>
                        @error('category_id') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="flex items-center mb-4">
                    <input wire:model.defer="is_recurrent" id="checkbox-1" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" >
                    <label for="checkbox-1" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300">Is Recurrent? {{$is_recurrent}}</label>
                </div> 
                <div class="grid md:grid-cols-2 md:gap-6 my-3">
                    <div>
                        <x-label for="total_recurrent" :value="__('Total Recurrent')" />
                        <x-input id="total_recurrent" wire:model.defer="total_recurrent" class="block mt-1 w-full" type="text" name="total_recurrent" :value="0"/>
                    </div>
                    <div>
                        <x-label for="value" :value="__('Value')" />
                        <x-input id="value" wire:model.defer="value" class="block mt-1 w-full" type="text" name="value" />
                        @error('value') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <x-input wire:model.defer="created_by" class="block mt-1 w-full" value="{{$created_by}}" type="hidden" name="created_by" />
                </div>
                <x-button class="mt-4">
                    {{ __('Create') }}
                </x-button>
            </form>
        </x-slot>
    </x-modal>
    @endif
</div>