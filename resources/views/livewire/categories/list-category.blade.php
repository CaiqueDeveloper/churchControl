<div>
    <livewire:categories.create-category />
    
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Category
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
        @forelse ($user[0]->churchs[0]->categories()->paginate(10) as $category)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                
                <td class="px-6 py-4">
                    {{$category->name}}
                </td>
                <td class="px-6 py-4">
                    <x-span-status :status="$category->enabled" />
                </td>
                <td class="px-6 py-4 flex">
                    <livewire:categories.delete-category :category="$category" :key="$category.'-delete'" />
                    <livewire:categories.update-category :category="$category" :key="$category.'-update'"/>
                </td>
            </tr>
        @empty
            
        @endforelse
        </tbody>
    </table>
    <div class="paginate p-3">
        {{$user[0]->churchs[0]->categories()->paginate(10)->links()}}
    </div>
</div>

    
</div>
</div>
