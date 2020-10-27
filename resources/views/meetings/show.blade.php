@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <a href="/meetings">&lt; Back</a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                <div class="mb-2">
                    <h1>{{$meeting->title}}</h1>
                </div>

                <div class="meeting-meta">
                    <div>
                        {{$meeting->location}}
                    </div>

                    <div>
                        {{$meeting->start->format('Y M d @ H:i')}} - {{$meeting->end->format('Y M d @ H:i')}}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div>{{$meeting->description}}</div>

                <!-- here is where a form allowing users to toggle on/off the public meeting page - you will need to handle that form inside of a controller -->

                <div class="mt-5">
                    <h2>RSVPs</h2>
                    <!-- here is where a list of emails with their RSVP status for this meeting will go -->
                </div>
            </div>
        </div>
    </div>
@endsection
