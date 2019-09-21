@extends('layouts.app')

@section('content')
<div class="container">
        @foreach($candidates as $position => $candidateList)
        <h1>{{$position}} Results</h1>
        <div class="row justify-content-center" id = "{{$position}}">
            @foreach($candidateList as $candidate)
                <div class="col-md-4">
                    <div class="card">
                    <div class="card-header">{{$candidate->user->name}}</div>

                        <div class="card-body">
                        </div>

                        <div style="text-align: center;" class = "card-footer justify-content-center">
                            <a
                                class = "btn btn-primary center disabled"
                                style="color: black;">
                                {{count($candidate->votes)}}
                                    VOTES
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>
@endsection
