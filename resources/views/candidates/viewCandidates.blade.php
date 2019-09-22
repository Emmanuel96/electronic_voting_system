@extends('layouts.app')

@section('content')
<div class="container">
    @if(Auth::user()->verified == 0)
        <h4  class ="text-danger">
            Only verified users can vote
        </h4>
    @endif
    @foreach($candidates as $position => $candidateList)
        <h1>{{$position}} Candidates</h1>
        <div class="row justify-content-center" id = "{{$position}}">
            @foreach($candidateList as $candidate)
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-header">{{$candidate->user->name}}</div>

                            <div class="card-body">

                            </div>
                            @if(Auth::user()->verified == 1)
                                <div style="text-align: center;" class = "card-footer justify-content-center">
                                    <a
                                    @if(!$positions_voted->contains('position_id', $candidate->candidate_position_id))
                                        onClick = "vote('{{$candidate->candidate_id}}','{{$position}}')"
                                        class = "btn btn-primary center"
                                    @else
                                        class = "btn btn-primary center disabled"
                                    @endif
                                    style="color: black;">
                                        VOTE
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
            @endforeach
        </div>
    @endforeach
</div>
<script src="https://code.jquery.com/jquery-3.2.1.js" integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE=" crossorigin="anonymous"></script>

<script>
    function vote(id, position){
        //then disable all presidential votes
        var vote_links = document.getElementById(position).getElementsByTagName('a');
        for( var i = 0; i< vote_links.length; i++){
            vote_links[i].classList.add('disabled');
            //change the href to null
            vote_links[i].href = "#";

        }

        $.ajax({
              type: 'GET',
              url: '{{route('vote.candidate')}}',
              data: {candidate_id:id, pos_id: position,  _token: '{{ csrf_token() }}'},
              dataType: 'json',
              success: function(output){

              }
        });
    }
</script>
@endsection
