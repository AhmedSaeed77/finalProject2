<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{config('app.name')}}</title>
    <link rel= "stylesheet" href=" {{asset('/css/bootstrap.min.css')}}">

   </head>
   <body>

    <div class='container'>
     <h1>Create Government</h1>

      @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
               @foreach($errors->all() as $message)
                <li>{{$message}}</li>
                @endforeach
            </ul>
      </div>
      @endif

     <form action="{{ route('region.update',$region->id) }}"method="post" >
            <input type = "hidden" name="_token" value="{{csrf_token()}}">
             {{ csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type = "text"  name="name" value="{{ $region->name }}" class="form-control">
            </div>

            <div class="form-group">
                <label for="parent_id">Parent</label>
                <select id="govern_id"name="govern_id"class="form-control">
                    <option value="" disabled>government</option>

                    @foreach($governorates as $governorate)
                    <option @if($governorate->id == $region->govern_id) selected @endif value="{{$governorate->id}}">{{ $governorate->name }}</option>
                    @endforeach

                </select>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>

        </form>
    </div>
</body>
<!-- jquery -->
<script src="{{ URL::asset('js/jquery-3.3.1.min.js') }}"></script>
<!-- plugins-jquery -->
<script src="{{ URL::asset('js/plugins-jquery.js') }}"></script>
    
    
</html>
