<div>
    <livewire:type-transaction.create-type-transactions />
    
<div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Type
                </th>
                <th scope="col" class="px-6 py-3">
                    Status
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($types as $type)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                
                <td class="px-6 py-4">
                    {{$type->name}}
                </td>
                <td class="px-6 py-4">
                    <x-span-status :status="$type->enabled" />
                </td>
                <td class="px-6 py-4 flex">
                    <livewire:type-transaction.delete-type-transactions :type="$type" :key="$type->id .'-delete'" />
                    <livewire:type-transaction.update-type-transactions :type="$type" :key="$type->id .'-update'" />
                </td>
            </tr>
        @empty
            
        @endforelse
        </tbody>
    </table>
    <div class="paginate p-3">
        {{$types->links()}}
    </div>
</div>

    
</div>
