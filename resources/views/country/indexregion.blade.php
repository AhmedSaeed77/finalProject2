<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href=" {{ asset('/css/bootstrap.min.css') }}">

</head>

<body>
    <div class='container'>

        <h1 class="mb-3">Regions
            <small><a href="/region/create">create</a></small>
        </h1>


        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>   
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>

                    @foreach($regions as $region)
                    <tr>
                        <td> {{ $region->id }}</td>
                        <td><a href="{{ url('categories', $region->id) }}"> {{ $region->name }}</a></td>
                        <td><a href="{{ route('region.edit',$region->id) }}" class="btn btn-sm btn-dark">Edit</a></td>

                        <td>
                            <form action="{{ route('region.destroy',$region->id) }}" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="_method" value="delete">
                                <button class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>

</html>
