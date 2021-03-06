@extends('layouts.app')

@section('content')
  <div class="pt-4">
    <div class="w-1/2 m-auto p-4 rounded border bg-white">
      <div class="flex flex-row">
        <div class="rounded-full main-button inline-block mr-2 text-lg font-bold" style="padding: 10px 19px;" >
          {{ Auth::user()->name[0] }}
        </div>
        <div class="font-bold ml-2 text-lg">
          {{ Auth::user()->name }}
          <div class="text-sm text-grey" >
            {{ Auth::user()->role->name }}
          </div>
        </div>
      </div>
      <div class="flex flex-row pt-4 w-full">
        <div class="text-sm text-grey ml-2 w-full">
          {{ __('Congregacion') }}
          <div class="font-bold flex flex-row justify-between text-lg text-black w-full" >
              <div class="p-2">
                  {{ Auth::user()->congregation->name }}
              </div>
              <div>
                  <a href="/congregation/{{ Auth::user()->id }}" class="bg-teal text-white rounded-sm py-2 px-4 cursor-pointer block">
                      <i class="fas fa-edit"></i>
                  </a>
              </div>
          </div>
        </div>
      </div>
        <hr>
        <div class="text-sm text-grey ml-2">
            {{ __('Publicadores') }}
        </div>
        <div class="p-2 border-2 rounded-sm">
            @foreach($users as $user)
                <a href="/profile/{{ $user->id  }}" class="p-2 flex justify-between cursor-pointer hover:bg-teal-lightest">
                    <div class="py-2">
                        {{ $user->name }}
                    </div>
                    <div class="py-2">
                        {{ $user->role->name }}
                    </div>
                </a>
            @endforeach
        </div>
        <div class="flex justify-between w-full p-2">
            <div></div>
            {!! $users->render() !!}
            <div></div>
        </div>
    </div>
  </div>
@endsection
