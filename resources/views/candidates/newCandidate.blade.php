@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Candidate') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('candidate.create') }}">

                        @if(Session::has('candidate_save_successful'))
                            <div class = "text-success" style = "margin-bottom: 5px;">
                                {{Session::get('candidate_save_successful')}}
                            </div>
                        @elseif(Session::has('candidate_save_error'))
                            <div class = "text-danger" style = "margin-bottom: 5px;">
                                {{Session::get('candidate_save_error')}}
                            </div>
                        @endif


                        @csrf

                        <div class="form-group row">
                            <label for="eng_ID" class="col-md-4 col-form-label text-md-right">{{ __('Eng ID') }}</label>

                            <div class="col-md-6">
                                <input id="eng_ID" type="text" class="form-control @error('eng_ID') is-invalid @enderror" name="eng_ID" value="{{ old('eng_ID') }}" required autocomplete="eng_ID" autofocus>

                                @error('eng_ID')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Position') }}</label>

                            <div class="col-md-6">
                                <select id = "position" name="position" class= "form-control" required>
                                    <option disabled selected value>Please select a position</option>
                                    @foreach($positions as $position)
                                        <option value = "{{$position->position_id}}">{{$position->position_name}}</option>
                                    @endforeach
                                </select>
                                @error('position')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register Candidate') }}
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
