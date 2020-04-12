@extends('layouts.app')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Film </div>

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

                    <form method="POST" action="{{ route('film.create') }}" enctype="multipart/form-data">
                        @csrf
                    
                            <div class="form-group">
                    
                                <label class="lable" for="name">Name:</label>
                    
                                <div class="control">
                    
                                    <input type="text" class="form-control" id ="name" name="name" value="{{ old('name')}}" required >
                            
                                </div>
                        
                            </div>

                            <div class="form-group">
                    
                                    <label class="lable" for="name">Description:</label>
                        
                                    <div class="control">
                        
                                    <textarea class="form-control" id="description" name="description" rows="4" cols="50" required >{{ old('description')}}</textarea>
                                
                                    </div>
                            
                            </div>

                            <div class="form-group">
                           
                                <label class="lable" for="name">Realease Date:</label>
                    
                                <div class="control">
                    
                                <input class="date form-control"  type="text" id="datepicker" name="release_date" value="{{ old('release_date')}}" required >
                            
                                </div>
                        
                            </div>

                            <div class="form-group">
                    
                                <label class="lable" for="name">Rating:</label>
                    
                                <div class="control">
                                    <div class='starrr' id='star1'></div>
                                    <input class="form-control"  type="hidden" id="choice" value="{{ old('rating')}}" name="rating" >
                                </div>
                        
                            </div>


                            <div class="form-group">
                    
                                <label class="lable" for="name">Ticket Price:</label>
                    
                                <div class="control">
                    
                                <input class="form-control"  type="number" id="ticket_price" name="ticket_price" value="{{ old('ticket_price')}}" required>
                            
                                </div>
                        
                            </div>

                            <div class="form-group">
                    
                                <label class="lable" for="name">Country:</label>
                    
                                <div class="control">
                                    <select class="form-control" id="country"  name="country" required >
                                    <option  value=""> --Select-- </option>
                                    @if(!empty($countries) )
                                            @foreach($countries as $key =>$value)
                                                <option  value="{{trim($key)}}" > {{trim($value)}} </option>
                                            @endforeach
                                        @endif
                                       
                                    </select>
                            
                                </div>
                        
                            </div>

                            <div class="form-group">
                    
                                <label class="lable" for="name">Genre:</label>
                    
                                <div class="control">
                                    <select class="form-control" id="genre"  name="genre[]" multiple="multiple" required >
                                    @if(!empty($genre) )
                                            @foreach($genre as $key =>$value)
                                                <option  value="{{trim($key)}}"> {{trim($value)}} </option>
                                            @endforeach
                                        @endif
                                    
                                    </select>
                            
                                </div>
                        
                            </div>
                        
                            <div class="form-group">
                    
                                <div class="control">
                                    <input type="file"  name="film_image"  class="form-control"  required  >
                                </div>
                            </div>   
                        
                            <div class="form-group">
                    
                                <div class="control">
                    
                                    <input type="submit" class="btn btn-primary" value="Create">
                                </div>
                    
                            </div>
                    
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

//date picker
   $( function() {
     $( ".date" ).datepicker();
   });

//rating
var $s2input = $('#choice');
    $('#star1').starrr({
      max: 5,
      rating: $s2input.val(),
      change: function(e, value){
        $s2input.val(value).trigger('input');
      }
    });

//Select 2 country
$('#country').select2().val('{{old('country')}}').trigger('change');

//genre
$('#genre').select2().val(@if(old('genre')) {!! json_encode(old("genre")) !!} @else ''  @endif).trigger('change');

  </script>

@endsection
