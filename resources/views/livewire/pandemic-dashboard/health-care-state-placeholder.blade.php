<section class="mt-2 flex flex-col" id="healthcare-state" wire:loading.class="animate-pulse">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
            <div class="overflow-hidden rounded-lg border-b border-gray-200 shadow">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th colspan="5" class="border-b py-2">
                                <div class="mx-auto h-6 w-48 rounded bg-gray-400"></div>
                                <div class="float-right mt-2 h-4 w-32 rounded bg-gray-400"></div>
                            </th>
                        </tr>
                        <tr>
                            @foreach (range(1, 5) as $_)
                                <th scope="col" class="py-4 text-center">
                                    <div class="mx-auto h-4 w-32 rounded bg-gray-400"></div>
                                </th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 bg-white">
                        @foreach (range(1, 12) as $_)
                            <!-- Assuming 5 rows for the skeleton, adjust as needed -->
                            <tr class="@if ($loop->even) bg-gray-50 @endif">
                                @foreach (range(1, 5) as $_)
                                    <td class="whitespace-nowrap px-6 py-4">
                                        <div class="mx-auto h-3 w-24 rounded bg-gray-400"></div>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                        <tr>
                            @foreach (range(1, 5) as $_)
                                <td class="whitespace-nowrap px-6 py-4">
                                    <div class="mx-auto h-4 w-24 rounded bg-gray-400"></div>
                                </td>
                            @endforeach
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr class="bg-white">
                            <td class="whitespace-nowrap px-6 py-4 text-left" colspan="5">
                                <div class="mx-auto h-4 w-64 rounded bg-gray-400"></div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>
