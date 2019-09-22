@extends('layouts.app')

@section('content')
<div class="container">
   <table class = "table">
        <tr>
            <th>Username</th>
            <th>Status</th>
            <th>Verify</th>
        </tr>
        @foreach($users as $user)
            <tr>
                <td>{{$user->name}}</td>
                <td>
                    @if($user->verified == 0)
                        Unverified
                    @else
                        Verified
                    @endif
                </td>
                <td>
                    @if($user->verified == 0)
                        <a href="/user/verify/{{$user->id}}" class = "btn btn-primary">
                            Verify
                        </a>
                    @else
                        -
                    @endif

                </td>
            </tr>
      @endforeach
   </table>

</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

@endsection
