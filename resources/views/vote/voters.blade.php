@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('List Of Users who have voted') }}</div>

                <div class="card-body">
                    @foreach($voters as $voter)
                        {{$voter->user->name}}

                        <hr/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
