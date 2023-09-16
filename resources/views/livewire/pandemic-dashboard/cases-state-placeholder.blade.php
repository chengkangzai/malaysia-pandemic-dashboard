<section class="mt-2 flex flex-col" id="case-state-skeleton" wire:loading.class="animate-pulse">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                    <tr>
                        <th colspan="7" class="border-b py-2">
                            <div class="mx-auto my-1 h-6 w-40 rounded-3xl bg-gray-500"></div>
                            <div class="mx-auto my-1 h-4 w-32 rounded-3xl bg-gray-500 float-right"></div>
                        </th>
                    </tr>
                    <tr>
                        @foreach (range(1, 7) as $_)
                            <th scope="col" class="py-4 text-center">
                                <div class="mx-auto h-4 w-24 rounded-3xl bg-gray-500"></div>
                            </th>
                        @endforeach
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                    @foreach (range(1, 12) as $_)
                        <tr>
                            @foreach (range(1, 7) as $__)
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="mx-auto h-4 w-24 rounded-3xl bg-gray-500"></div>
                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="bg-white">
                        <td class="whitespace-nowrap px-6 py-4 text-left" colspan="7">
                            <div class="mx-auto my-1 h-4 w-64 rounded-3xl bg-gray-500"></div>
                        </td>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
ß
