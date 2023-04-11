<div>
     <x-button-trash wire:click="$toggle('canShowModal','true')"/>
    
    @if($canShowModal)
        <x-modal>
            <x-slot name="title"></x-slot>
            <x-slot name="body"> 
                <div class="content-confirmed-action">
                    <div class="icon">
                        <svg aria-hidden="true" class=" w-14 h-14 mx-auto mb-4 text-red-400 dark:text-red-200" fill="none"
                            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <div class="title text-2xl font-bold text-gray-700 text-center">
                        <h3>Are you sure you want to delete <span class=" text-red-400 w-10 h-10 dark:text-red-200">{{$category->name}}</span> ?</h3>
                    </div>
                    <div class="footer flex justify-between mt-8">
                        <button data-modal-hide="popup-modal" wire:click="delete" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                            Yes, I'm sure
                        </button>
                        <button wire:click="$toggle('canShowModal','false') type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                    </div>
                </div>     
            </x-slot>
        </x-modal>
    @endif
</div>
