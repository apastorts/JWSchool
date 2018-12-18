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
      <div class="flex flex-row pt-4">
        <div class="text-sm text-grey ml-2">
          {{ __('Congregation') }}
          <div class="font-bold text-lg text-black" >
            {{ Auth::user()->congregation->name }}
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
