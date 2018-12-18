@extends('layouts.app')

@section('content')
  <div class="main-header h-64 w-full">
    <div class="mb-12">
      <div class="p-4 text-center font-bold text-4xl">Manage The School Easily</div>
      <div class="p-2 text-center text-xl">Do it from anywhere in any device or even make it automatic.</div>
    </div>
    <div class="bg-white p-4 w-1/2 m-auto rounded shadow">
      <div class="text-center text-lg font-bold mb-2"> Add a new Publisher </div>
      <a href="/user/create" class="rounded main-button text-white font-bold m-auto table w-auto p-2" >New User</a>
    </div>
  </div>
  <div class="mb-4 mx-4 mt-32 border b-grey-lightest rounded">
    <div class="px-4 py-2 font-bold text-lg" >Meetings</div>
    <div>
      @if($meetings->count() > 0)
        @foreach($meetings as $meeting)
          <div class="border-bottom cover-background cursor-pointer">
            <div class="p-4 flex flex-row justify-between">
              <div>
                  <div class="inline-block rounded-full bg-grey-light mr-4 px-2 py-1">
                    <i class="fas fa-calendar"></i>
                  </div>
                  <div class="font-bold inline-block">{{ $meeting->date }}</div>
              </div>
              <div>
                <a href="/meeting/show/{{ $meeting->id }}" class="text-2xl mr-2">
                  <i class="fas fa-pen-square"></i>
                </a>
                <a href="/meeting/send/{{$meeting->id}}" class="text-2xl mr-2">
                  <i class="fas fa-envelope-square"></i>
                </a>
                <a href="/meeting/delete/{{ $meeting->id }}" class="text-2xl mr-2">
                  <i class="fas fa-minus-square"></i>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      @else
        <div class="p-4">
          No meetings found.
        </div>
      @endif
    </div>
  </div>
@endsection
