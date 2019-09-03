@extends('layouts.layout')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2 class="float-left">Notes list</h2>
            <a href="{{ route('notes.create') }}" class="btn btn-primary btn-md float-right">Add note</a>
        </div>
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th scope="col" style="width: 25%;">Date</th>
                    <th scope="col" style="width: 50%;">Note</th>
                    <th scope="col" style="width: 25%;"></th>
                </tr>
            </thead>
            @if($notes->isEmpty())
                <tr>
                    <td></td>
                    <td><div class="alert alert-danger">There are no saved notes</div></td>
                    <td></td>
                </tr>
            @else
            @foreach($notes as $note)
            <tr>
                <td>{{ date('M-d-Y', strtotime($note->created_at)) }}</td>
                <td><p>{{ $note->note }}</p></td>
                <td>
                    <a class="btn btn-primary btn-sm" href="{{ route('notes.show', $note->id) }}">View</a>
                    <a class="btn btn-warning btn-sm" :note="{{$note}}" href="{{ route('notes.edit', $note->id) }}">Edit</a>
                    <a class="btn btn-danger btn-sm" @click="deleteNote({{$note->id}})">Delete</a>
                </td>
            </tr>
            @endforeach
            @endif
        </table>
    </div>
</div>
@endsection
