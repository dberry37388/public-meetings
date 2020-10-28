@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-2">
            <div class="col">
                <a href="/meetings">&lt; Back</a>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col-12">
                <h1>
                    {{$meeting->title}}
                </h1>

                <div class="mt-3 meeting-meta-info">
                    <div>
                        <i class="fa fa-calendar mr-2"></i> {{ $meeting->start->format('F j, Y') }}
                    </div>

                    <div>
                        <i class="fa fa-clock-o mr-2"></i> {{$meeting->start->format('g:i a')}} - {{$meeting->end->format('h:i a')}}
                    </div>

                    <div>
                        <i class="fa fa-map mr-2"></i> {{$meeting->location}}
                    </div>
                </div>

                <div class="mt-3">
                    {{$meeting->description}}
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-7 col-12 mb-sm-5">

                @include('meetings.partials.agenda-items')

            </div>

            <div class="col-md-5 col-12">
                @include('meetings.partials.rsvp-form')

                <hr>

                @include('meetings.partials.rsvp-list')
            </div>
        </div>
    </div>
@endsection
