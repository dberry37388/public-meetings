@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col">
                <h1>Meetings</h1>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                @foreach($meetings as $meeting)
                <div class="card mb-2">
                    <div class="card-body">
                        <a href="/meetings/{{$meeting->id}}">{{$meeting->title}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
