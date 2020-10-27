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
                <div>
                    {{$meeting->description}}
                </div>

                <!-- here is where a form allowing users to toggle on/off the public meeting page - you will need to handle that form inside of a controller -->
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <h2> RSVPs</h2>

                <ul>
                    @forelse($meeting->rsvps as $rsvp)
                        <li>{{ $rsvp->email }}, {{ $rsvp->response }}</li>
                    @empty
                        <li>No one has responded to this event.</li>
                    @endforelse
                </ul>

                <form action="{{ route('rsvpToMeeting', $meeting->id) }}" method="post">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="email">Email address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autocomplete="email" placeholder="Enter email">

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Can You Attend?</label>
                                <select name="response" id="response" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                    <option value="Maybe">Maybe</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">RSVP</button>

                    @csrf
                </form>
            </div>
        </div>
    </div>
@endsection
