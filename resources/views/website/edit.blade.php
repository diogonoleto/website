<x-app-layout>
    <x-slot name="header">
        <nav aria-label="Global" class="max-w-container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center  flex-wrap sm:flex-nowrap  ">
                <h2 class="flex-none font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Website') }} / {{ __('Edit') }}
                </h2>
            </div>
        </nav>
    </x-slot>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('website.update', $website->id) }}" class="row justify-content-md-center align-items-center">
                        @csrf
                        @method('PUT')
                        <!-- Url Address -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="px-4 py-14">
                            <x-label for="url" :value="__('Url')" />
                            <x-input id="url" class="block mt-1 w-full" type="text" placeholder="http://teste.com" name="url" :value="$website->url ?? old('url')" required autofocus />
                        </div>
                        <div class="text-right px-4 py-4">
                            <a href="{{ route('website.index') }}" class="text-base font-medium rounded-lg bg-gray-100 text-black px-3 py-2 text-center cursor-pointer">Cancel</a>
                            <button type="submit" class="text-base font-medium rounded-lg bg-green-500 text-white p-2 text-center cursor-pointer">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>