<x-app-layout>
    <div class="max-w-6xl mx-auto px-4">
        <div class="flex flex-col lg:flex-row gap-8">

            {{-- LEFT: Posts feed --}}
            <div class="w-full lg:w-[650px]">

                @forelse ($posts as $post)

                    <div class="bg-white border border-gray-200 rounded-xl mb-6 overflow-hidden">

                        {{-- Post header --}}
                        <div class="flex items-center gap-3 p-4">
                            <img
                                class="h-10 w-10 rounded-full border border-gray-200 object-cover"
                                src="{{ $post->owner->image ?? $post->owner->img ?? ('https://ui-avatars.com/api/?name=' . urlencode($post->owner->name ?? $post->owner->username)) }}"
                                alt="{{ $post->owner->username }}"
                            >

                            <div class="leading-tight">
                                <div class="font-bold">
                                    {{ $post->owner->username }}
                                </div>
                                <div class="text-xs text-gray-500">
                                    {{ $post->created_at?->diffForHumans() }}
                                </div>
                            </div>
                        </div>

                        {{-- Post image --}}
                        <div class="w-full bg-gray-50">
                            <img
                                class="w-full max-h-[650px] object-cover"
                                src="{{ asset('storage/' . $post->image) }}"
                                alt="{{ $post->description }}"
                            >
                        </div>

                        {{-- Post body --}}
                        <div class="p-4">
                            <div class="text-sm">
                                <span class="font-bold">{{ $post->owner->username }}</span>
                                <span class="text-gray-800">{{ $post->description }}</span>
                            </div>

                            @if(method_exists($post, 'comments') && $post->comments()->count() > 0)
                                <a href="/post/{{ $post->slug }}"
                                   class="inline-block mt-2 text-sm text-gray-500 font-semibold">
                                    {{ __('View all') }} {{ $post->comments()->count() }} {{ __('comments') }}
                                </a>
                            @endif
                        </div>

                    </div>

                @empty
                    <div class="bg-white border border-gray-200 rounded-xl p-6 text-center text-gray-600">
                        {{ __('Start following your friends and enjoy') }}
                    </div>
                @endforelse

            </div>

            {{-- RIGHT: Current user sidebar --}}
            <aside class="w-full lg:w-[320px] lg:pt-4">
                <div class="bg-white border border-gray-200 rounded-xl p-4 lg:sticky lg:top-6">

                    <div class="flex items-center gap-3">
                        <img
                            class="h-12 w-12 rounded-full border border-gray-200 object-cover"
                            src="{{ auth()->user()->image ?? auth()->user()->img ?? ('https://ui-avatars.com/api/?name=' . urlencode(auth()->user()->name ?? auth()->user()->username)) }}"
                            alt="{{ auth()->user()->username }}"
                        >

                        <div class="leading-tight">
                            <div class="font-bold">
                                {{ auth()->user()->username }}
                            </div>
                            <div class="text-sm text-gray-500">
                                {{ auth()->user()->name }}
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 text-xs text-gray-400">
                        © {{ date('Y') }} hsoubgram
                    </div>

                    <div class="mt-5">
                        <h3 class="text-gray-500 font-bold">{{__('suggestion for you')}}</h3>
                        <ul>
                            @foreach ($suggested_users as $suggest )
                            <li class="flex flex-row my-5 text-sm justify-items-center gap-2">
                                <div class="mr-5">
                                    <a href=""> <img src="{{$suggest->image}}" class="rounded-full h-9 w-9 border border-gray-300"></a>
                                </div>
                                <div class="flex flex-col grow">
                                 <a href="#" class="font-bold text-black">
                                    {{ $suggest->username }}
                                 </a>

                                 <div class="text-gray-500 text-sm">
                                  {{ $suggest->name }}
                                </div>
                                </div>


                                </div>
                            </li>

                            @endforeach
                        </ul>

                    </div>

                </div>
            </aside>
      


        </div>
    </div>
</x-app-layout>
