@extends('layouts.app')

@section('content')
  <div class="mb-4 mx-4 mt-4 border b-grey-lightest bg-white rounded">
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
                  <div class="font-bold inline-block">{{ carbon($meeting->date)->englishDayOfWeek.' '.carbon($meeting->date)->day.' '.carbon($meeting->date)->englishMonth.' '.carbon($meeting->date)->year }}</div>
              </div>
              <div>
                <a href="/meeting/show/{{ $meeting->id }}" class="text-2xl mr-2">
                  <i class="fas fa-pen-square"></i>
                </a>
                <a href="/meeting/send/{{$meeting->id}}" class="text-2xl mr-2">
                  <i class="fas fa-envelope-square"></i>
                </a>
                <button class="text-2xl mr-2" data-toggle="modal" data-target="#modal-{{ $meeting->id }}">
                  <i class="fas fa-minus-square"></i>
                </button>
              </div>
            </div>
          </div>
            <!-- Modal -->
          <div class="modal fade" id="modal-{{$meeting->id}}" tabindex="-1" role="dialog" aria-labelledby="modal-{{$meeting->id}}" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Delete Meeting</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  Do you want to <strong>delete</strong> the <strong>{{ carbon($meeting->date)->englishDayOfWeek.' '.carbon($meeting->date)->day.' '.carbon($meeting->date)->englishMonth.' '.carbon($meeting->date)->year }}</strong> meeting?
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <a href="/meeting/delete/{{ $meeting->id }}" class="btn btn-danger">Delete</a>
                </div>
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
