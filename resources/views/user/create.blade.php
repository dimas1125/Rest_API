<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Create User</title>
  </head>
  <body class="bg-dark bg-opacity-10">
    <div class="container border mt-5 bg-light border-2 rounded-3">
      <div class="conten mb-5 w-50">
        
        <h1 class="mb-5 mt-3">Create New User</h1>
        
        @if (session()->has('failed'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('failed') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <p>Form Create User</p>
        <form method="post" action="users">
          @csrf
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark bg-opacity-75 text-light" id="basic-addon1" required>First Name</span>
            <input type="text" name="nama_depan" class="form-control w-50" autofocus required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark bg-opacity-75 text-light" id="basic-addon1">Last Name</span>
            <input type="text" name="nama_belakang" class="form-control" required>
          </div>
          <div class="input-group mb-3">
            <span class="input-group-text bg-dark bg-opacity-75 text-light" id="basic-addon1">Email</span>
            <input type="email" name="email" class="form-control" required>
          </div>
            <a href="{{ route('users.index') }}" class="btn btn-outline-primary">Back</a>
            <button class="btn btn-outline-success">Create User</button>
        </form>

      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>