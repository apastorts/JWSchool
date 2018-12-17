@extends('layouts.app')

@section('content')
  <main-form :meeting="{{ json_encode($meeting) }}" ></main-form>
@endsection
