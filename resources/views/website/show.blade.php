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
    <div class="container">
        <div class="row justify-content-md-center align-items-center" style="height:100vh;">
            <div class="col-12 col-sm-6">
                <div class="card p-0">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">URL: {{ $website->url }}</li>
                        <li class="list-group-item">STATUS: {{ $website->status }}</li>
                        <li class="list-group-item">CREATED AT: {{ $website->created_at }}</li>
                    </ul>
                    <hr class=" m-0">
                    <div class="p-2">
                        <form method="POST" action="{{ route('website.destroy', $website->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="float-end btn btn-danger ms-2" type="submit"><i></i>Delete</button>
                        </form>
                        <a href="{{ route('website.index') }}" class="float-end btn btn-outline-secondary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>