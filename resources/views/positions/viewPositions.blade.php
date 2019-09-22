@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('position_success'))
        <div class ="text-success">
            {{Session::get('posiiton_success')}}
        </div>
    @elseif(Session::has('position_error'))
        <div class = "text-danger">
            {{Session::get('position_error')}}
        </div>
    @endif
   <table class = "table">
        <tr>
            <th>Position Name</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        @foreach($positions as $position)
            <tr>
                <td>{{$position->position_name}}</td>
                <td>
                    <a class="btn btn-primary" href="/edit/position/{{$position->position_id}}">
                        Edit
                    </a>
                </td>
                <td>
                <a class ="btn btn-danger" href="/position/delete/{{$position->position_id}}">
                        Delete
                    </a>
                </td>
            </tr>
      @endforeach
   </table>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

@endsection
