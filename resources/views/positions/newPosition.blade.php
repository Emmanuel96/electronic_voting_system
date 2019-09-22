@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('New Position') }}</div>

                <div class="card-body">
                    @if(Session::has('position_save_success'))
                        <div class = "text-success">
                            {{Session::get('position_save_success')}}
                        </div>
                    @endif
                    @if(Session::has('position_save_error'))
                        <div class = "text-danger">
                            {{Session::get('position_save_error')}}
                        </div>
                     @endif
                    <form method="POST" action="{{ route('create.position') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="positionName" class="col-md-4 col-form-label text-md-right">{{ __('Position Name') }}</label>

                            <div class="col-md-6">
                                <input type = "text" name = "position_name"/>
                                @error('position_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Create Position') }}
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
