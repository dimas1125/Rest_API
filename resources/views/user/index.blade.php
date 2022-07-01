<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="resource/css/index.css">

    <title>Project API</title>
  </head>
  <body>
    @php
        $no = 1;
    @endphp
    
    @csrf
    <div class="container">
        <div class="conten mt-3">
            <h1>List Users</h1>
            @if ($message = Session::get('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <a href="create" class="btn btn-success mb-3">+Add</a>
            <div class="table">
                <table class="table">
                    <tr>
                        <th class="table-primary" scope="col">No</th>
                        <th class="table-primary" scope="col">First Name</th>
                        <th class="table-primary" scope="col">Last Name</th>
                        <th id="action" class="table-primary" scope="col">Action</th>
                    </tr>
                    @forelse ($users['data'] as $user)
                    <tr>
                        <th scope="row">{{ $no++ }}</th>
                        <td>{{ $user['firstName'] }}</td>
                        <td>{{ $user['lastName'] }}</td>
                        <td id="action">
                            <form method="POST" action="{{ 'users/'.$user['id'] }}">
                                @method('DELETE')
                                @csrf
                            
                                <a href="{{ 'users/'.$user['id'] }}" class="btn btn-primary"><i class="fa fa-fw fa-edit"></i> Edit</a> |
                                <button type="submit" class="btn btn-danger" onClick="return confirm('Are you sure to delete this user?');"><i class="fa fa-fw fa-trash"></i> Delete</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td><td colspan="6" align="center">No Record(s) Found!</td></td>
                    </tr>
                    @endforelse
                </table>
            </div>
    
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  </body>
</html>