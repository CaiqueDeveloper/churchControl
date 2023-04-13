<div>
    <livewire:transaction.create-transaction />
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Transaction
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Value
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Is Recurrent?
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Total Recurrent
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Payment Date
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Paid and/or Received
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    State
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Created By
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Created At
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Updated At
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                    Actions
                </th>
            </tr>
        </thead>
        <tbody>
        @forelse ($transactions as $transaction)
            <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                
                <td class="px-6 py-4">
                    {{$transaction['name']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['value']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['is_recurrent']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['total_recurrent']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['payment_date']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['pay']}}
                </td>
                <td class="px-6 py-4 text-center">
                    <x-span-status :status="$transaction['state']" />
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['created_by']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['created_at']}}
                </td>
                <td class="px-6 py-4 text-center">
                    {{$transaction['updated_at']}}
                </td>
                
                <td class="px-6 py-4 text-center flex">
                    <livewire:transaction.delete-transaction />
                    <livewire:transaction.update-transaction />
                </td>
            </tr>
        @empty
            
        @endforelse
        </tbody>
    </table>
    {{-- <div class="paginate p-3">
        {{$user[0]->churchs[0]->categories()->paginate(10)->links()}}
    </div> --}}
</div>
