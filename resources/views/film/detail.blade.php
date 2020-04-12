@extends('layouts.app')
@section('content')
<style>
* {
  box-sizing: border-box;
}

/* Create two equal columns that floats next to each other */
.column {
  float: left;
  width: 30%;
  padding: 10px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
</style>

<input class="form-control"  type="hidden" id="choice" value="{{$filmDetail['rating']}}" name="rating" >
<div class="row">
<div class="column">
        <img height="250" width="250" src="{{asset('/film_image').'/'.$filmDetail['film_image']}}">
  </div>
  <div class="column">
  <h2>Film Detail</h2>
    <div><span class="font-weight-bold">Name: </span><span>{{$filmDetail['name']}}</span></div>
    <div><span class="font-weight-bold">Realease Date: </span><span>{{date("d, F, Y", strtotime($filmDetail['release_date']))}}</span></div>
    <div><span class="font-weight-bold">Rating: </span><span><div class='starrr' id='star1'></div></span></div>
    <div><span class="font-weight-bold">Ticket Price: </span><span>{{$filmDetail['ticket_price']}}</span></div>
    <div><span class="font-weight-bold">Country: </span><span>{{Helper::getCountryName($filmDetail['country'])}}</span></div>
    <div><span class="font-weight-bold">Genre: </span><span>{{Helper::getGenre($filmDetail['genre'])}}</span></div>
    <div class="font-weight-bold">Description: </div>
    <div>{{$filmDetail['description']}}</div>
</div>
<!--Comment section -->
@include('film.comments')
<!--Comment section -->

<script>
//rating
var $s2input = $('#choice');
    $('#star1').starrr({
      max: 5,
      readOnly: true,
      rating: $s2input.val(),
      change: function(e, value){
        $s2input.val(value).trigger('input');
      }
    });
</script>
@endsection