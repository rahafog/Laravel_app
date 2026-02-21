<x-app-layout>

    <div class="h-screen md:flex md:flex-row">
        {{-- left side  --}}

        <div class="flex items-center overflow-hidden bg-black md:w-7/12">
            <img alt="{{$post->description}}" src="{{asset('storage/'.$post->image)}}" class="object-cover w-full">


        </div>

        {{-- right side --}}

        <div class="flex w-full flex-col bg-white md:w-5/12">
            <div class="border-b-2">
                <div class="flex items-center p-5 gap-0">
                    <img src="{{$post->owner->image}}" alt="{{$post->owner->username}}"  class="mr-5 h-10 w-10 rounded full">
                    <div class="grow">
                        <a href="" class="font-bold">{{$post->owner->username}}</a>
                    </div>
                </div>

            </div>
            <div class="gorw">
                <div class="flex item-start px-5 py-2 gap-3">
                    <img src="{{$post->owner->image}}" class="ltr:mr-5 rtl:ml-5 h-10 w-10 rounded-full">
                    <div class="flex flex-col">
                        <div>
                            <a href="" class="font-bold">{{$post->owner->username}}</a>
                            <span class="inline">{{$post->description}}</span>
                        </div>
                        <div class="mt-1 text-sm text-gray-400">
                           {{$post->created_at->diffforHumans(null,true,true)}}

                        </div>
                    </div>
                </div>
                {{-- comments --}}
            </div>

        </div>


    </div>

</x-app-layout>
