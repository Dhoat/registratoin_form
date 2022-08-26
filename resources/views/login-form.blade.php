<!DOCTYPE html>
<html>
<head>
    <title>Login - Form</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
   @if(session('error'))
      <div class="alert alert-danger">
          {{ session('error')}}
      </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Login
    </div>
    <div class="card-body">
      <form name="add-registration-form" id="add-registration-form" method="post" action="{{url('login-user')}}">
       @csrf
        <div class="form-group">
          <label for="">Email</label>
          <input type="email" id="email" name="email" class="form-control" required="">
        </div>


        <div class="form-group">
          <label for="">Password</label>
          <input type="password" id="password" name="password" class="form-control" required="">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>