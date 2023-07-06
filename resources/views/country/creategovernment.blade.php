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

     <form action="{{ route('governmet.store') }}"method="post" >
            <input type = "hidden" name="_token" value="{{csrf_token()}}">
             {{ csrf_field()}}

            <div class="form-group">
                <label for="name">Name</label>
                <input type = "text"  name="name"class="form-control">
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
