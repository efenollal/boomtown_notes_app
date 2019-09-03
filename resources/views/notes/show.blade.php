@extends('layouts.layout')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <small>Date: {{ date('M-d-Y', strtotime($note->created_at)) }}</small>
                    </div>
                    <div class="card-body">
                        <p class="card-text">{{$note->note}}</p>
                        <a href="/notes/{{ $note->id }}/edit" class="btn btn-danger btn-md ">Edit note</a>
                        <a href="/notes" class="btn btn-warning btn-md ">Back to notes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
