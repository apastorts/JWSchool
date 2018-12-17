@extends('layouts.app')

@section('content')
  <div class="main-header h-64 w-full">
    <div class="mb-12">
      <div class="p-4 text-center font-bold text-4xl">Manage The School Easily</div>
      <div class="p-2 text-center text-xl">Do it from anywhere in any device or even make it automatic.</div>
    </div>
    <div class="bg-white p-4 w-1/2 m-auto rounded shadow">
      <input type="text" class="inline-block">
      <div class="inline-block ml-2 p-4 font-bold text-white main-button">
        Search
      </div>
    </div>
  </div>
  <div class="mb-4 mx-4 mt-32 border b-grey-lightest rounded">
    <div class="px-4 py-2 font-bold text-lg" >Meetings</div>

    <div>
      @if($meetings->count() > 0)
        @foreach($meetings as $meeting)
          <a href="/meeting/show/{{ $meeting->id }}" class="text-normal no-underline hover:no-underline">
            <div class="border-bottom cover-background cursor-pointer">
              <div class="p-4 flex flex-row justify-between">
                <div>

                    <div class="inline-block rounded-full bg-grey-light mr-4 px-2 py-1">
                      <i class="fas fa-calendar"></i>
                    </div>
                    <div class="font-bold inline-block">{{ $meeting->date }}</div>
                </div>
              </div>
            </div>
          </a>
        @endforeach
      @else
        <div class="p-4">
          No meetings found.
        </div>
      @endif
    </div>
  </div>
@endsection
