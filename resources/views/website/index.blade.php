<x-app-layout>
    <x-slot name="header">
        <nav aria-label="Global" class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center  flex-wrap sm:flex-nowrap  ">
                <h2 class="flex-none font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Website') }}
                </h2>
                <div class="w-full flex-none mt-4 sm:mt-0 sm:w-auto sm:ml-auto flex items-center">
                    <a class="" href="{{ route('website.create') }}">Add</a>
                </div>
            </div>
        </nav>
    </x-slot>
    <!-- This example requires Tailwind CSS v2.0+ -->
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="align-middle inline-block min-w-full">
                <div class="shadow overflow-hidden border-b border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-4 py-2 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    #
                                </th>
                                <th scope="col" class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Url
                                </th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status
                                </th>
                                <th scope="col" class="px-4 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($websites as $website)
                            <tr>
                                <td class="px-2 py-2 text-center whitespace-nowrap">
                                    {{ $website->id }}
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <!-- <img class="h-10 w-10 rounded-full" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=4&w=256&h=256&q=60" alt=""> -->
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $website->url }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-4 py-2 whitespace-nowrap">
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                        {{ $website->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-2 whitespace-nowrap text-right text-sm font-medium">
                                    <a href="{{ route('website.edit', $website->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                    <a href="{{ route('website.show', $website->id) }}" class="text-indigo-600 hover:text-indigo-900">Show</a>
                                </td>
                            </tr>
                            @endforeach
                            <!-- More people... -->
                            <example-component></example-component>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script src="https://js.pusher.com/7.0/pusher.min.js"></script>
<script>
    Pusher.logToConsole = true;
    var pusher = new Pusher('4fff06e663662112ccfb', {
        cluster: 'us2'
    });
    var channel = pusher.subscribe('my-channel');
    channel.bind('list-update-website', function(data) {
        console.log(data);
    });
</script>