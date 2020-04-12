<div class="container">
<h3>Comments:</h3>
      @if(!empty($filmDetail['film_comment_user']))
        @foreach ($filmDetail['film_comment_user'] as $row)
        <div class="row">
          <div class="col-md-3 font-weight-bold">{{$row['user']['name']}}:</div>
          <div class="col-md-3">{{$row['comments']}}:</div>
        </div>
        @endforeach

      @endif


@if(Auth::user()) 
<form method="POST" action="{{ route('add.comment') }}" >
        <div class="form-group">

        <div class="card-body">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
            @endif
            
            @csrf     
            
            <div class="control">
            <input class="form-control"  type="hidden"  value="{{$filmDetail['id']}}" name="film_id" >
            <input class="form-control"  type="hidden"  value="{{$filmDetail['slug']}}" name="film_slug" >
            <textarea class="form-control" id="comment" name="comment" rows="4" cols="50" required >{{ old('comment')}}</textarea>
        
            </div>
            <div class="control pull-right">
                    
                   

                    <input type="submit" class="btn btn-primary" value="comment">
    
            </div>

        </div>
    </form>
@endif

</div>