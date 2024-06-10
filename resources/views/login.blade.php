<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset("layout_asset/assets/css/style.css") }}">
    <title>Login | Sipeter</title>
</head>
<body>
  <div id="ResponseFailed">
    @if (session('error'))
        <div class="alert alert-danger">
          {{session('error')}}
        </div>
    @endif
    <div></div>
  </div>
    <form action="\login" method="post" class="signin-form">
        @csrf
        {{-- <div class="imgcontainer">
          <img src="#" alt="Avatar" class="avatar">
        </div> --}}
        <div class="container">
          <label for="username"><b>NIP</b></label>
          <input type="number" placeholder="Masukkan nip kamu" name="nip" required>
      
          <label for="password"><b>Password</b></label>
          <input type="password" placeholder="Masukkan password kamu" name="password" required>
      
          <button type="submit">Login</button>
        </div>
      
        <div class="container" style="background-color:#f1f1f1">
          <button type="button" class="cancelbtn">Cancel</button>
          <span class="psw">Forgot <a href="#">password?</a></span>
        </div>
      </form>
</body>
</html>