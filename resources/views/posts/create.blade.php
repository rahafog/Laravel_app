<x-app-layout>
    <div class="p-10 bg-white rounded-xl shadow max-w-3xl mx-auto">
        <h1 class="text-3xl mb-10">{{ __('create a new post') }}</h1>

        @if ($errors->any())
            <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-lg">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/post/create" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf

            <input
                class="w-full border border-gray-200 bg-gray-50 block focus:outline-none rounded-xl"
                name="image"
                id="file_input"
                type="file"
            >

            <p class="mt-2 text-sm text-gray-500" id="file_input_help">
                PNG, JPEG OR GIF
            </p>

            <textarea
                name="description"
                class="mt-10 w-full border border-gray-200 rounded-xl"
                rows="5"
                placeholder="{{ __('write a description') }}"
            ></textarea>

            <x-primary-button class="mt-4">
                {{ __('Create post') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
