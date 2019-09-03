@extends('layouts.layout')
@section('content')
<notes-form :edit="true" :id="{{$note->id}}"></notes-form>
    {{-- @include('notes.partials._form') --}}
@endsection
