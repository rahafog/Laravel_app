<x-app-layout>
    <div class="p-10 bg-white rounded-xl shadow max-w-3xl mx-auto">
        <h1 class="text-3xl mb-10">{{ __('edit post') }}</h1>

        @if ($errors->any())
            <div class="w-full bg-red-50 text-red-700 p-5 mb-5 rounded-lg">
                <ul class="list-disc pl-4">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('post.update',$post->slug)}}" method="POST" class="w-full" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <x-create-edit :post="$post" />

            <x-primary-button class="mt-4">
                {{ __('Update post') }}
            </x-primary-button>
        </form>
    </div>
</x-app-layout>
