<div class="shadow-md shadow-slate-200 p-4 rounded-lg mb-6" >

    <label for="email-address-icon" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Type
        Transaction</label>
    <div class="relative">
        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-arrow-left-right w-5 h-5 text-gray-500 dark:text-gray-400" viewBox="0 0 16 16">
                <path fill-rule="evenodd"
                    d="M1 11.5a.5.5 0 0 0 .5.5h11.793l-3.147 3.146a.5.5 0 0 0 .708.708l4-4a.5.5 0 0 0 0-.708l-4-4a.5.5 0 0 0-.708.708L13.293 11H1.5a.5.5 0 0 0-.5.5zm14-7a.5.5 0 0 1-.5.5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H14.5a.5.5 0 0 1 .5.5z" />
            </svg>
        </div>
        <input type="text" id="email-address-icon"
            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            placeholder="Ex: Payment,Receipt,Expense..." wire:model.defer="name" wire:keydown.enter="save">
        

    </div>
    
    @error('name') <span class="text-red-500 font-bold text-sm">{{ $message }}</span> @enderror
</div>
