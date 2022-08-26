<!DOCTYPE html>
<html>
<head>
    <title>Registration - Form</title>
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
  @if (count($errors) > 0)
      <div class="alert alert-danger">
          <strong>Whoops!</strong> There were some problems with your input.
          <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
          </ul>
      </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Regsitration Form
    </div>
    <div class="card-body">
      <form name="add-registration-form" id="add-registration-form" method="post" action="{{url('store-form')}}"  enctype="multipart/form-data">
       @csrf
        <div class="form-group">
          <label for="">Name</label>
          <input type="text" id="name" name="name" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Email</label>
          <input type="email" id="email" name="email" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Password</label>
          <input type="password" id="password" name="password" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Confirm Password</label>
          <input type="password" id="c_password" name="c_password" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Profile Picture</label>
          <input type="file" id="image" name="image" class="form-control" required="">
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" id="username" name="username" class="form-control" required="">
        </div>        

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>