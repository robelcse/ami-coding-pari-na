<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ami coding pari na - @yield('title', 'Signin')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
  <script src="{{ asset('public/js/jquery.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">

  <script>
    let loginData = JSON.parse(localStorage.getItem('loginData'));
    if(loginData !=null && loginData.success == true){
       window.location.href = "{{ route('home')}}"
    }
  </script>
</head>
<body>

<div class="center-section">
@include('common.sidebar')
<div class="content-section">
        <form id="loginForm">
            <div class="person-info">
                <h2>Sign In</h2>
            </div>
            <div style="margin-bottom: 20px;text-align:center">
                <span class="error_msg" id="login_error"></span>
            </div>
            <div class="input-field">
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email">
                <span class="error_msg" id="error_email"></span>
            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password">
                <span class="error_msg" id="error_pass"></span>
            </div>

            <div class="submit-btn">
                 <button type="submit">Sign In</button>
            </div>
        </form>
    </div>
</div>

<script src="{{ asset('public/js/signin.js') }}"></script>
<script>


    //select login form
     let loginForm = document.getElementById("loginForm")
     loginForm.addEventListener('submit', function(event){
          event.preventDefault()

          let email     = $('email').value
          let password = $('password').value

          if(email == ''){
              console.log('Pleae Prove Your Email Address')
              $('error_email').innerHTML = 'Pleae Prove Your Email Address'
          }
          if(password == ''){
              console.log('Pleae Prove Your Password')
              $('error_pass').innerHTML = 'Pleae Prove Your Password'
          }else{

            let data = {
               email: email,
               password: password
            }
            //console.log(data)
            LoginUser(data)

          }
     })


//loginuser functoin
function LoginUser(data) {
//call api
    fetch('http://localhost/Ami_coding_pari_na/api/auth/login', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })
    .then((response) => response.json())
    .then((data) => {
      //console.log(data)
      if(data.success == true){
        localStorage.setItem('loginData', JSON.stringify(data));
        window.location.href = "{{ route('home')}}"
      }else{

          console.log(data.message)
          let login_error = document.getElementById("login_error")
          login_error.innerHTML = data.message
      }
      

    })
    .catch((err) => {
        console.log(err.message)
    })

}

//selector function
function $(selector){
    return document.getElementById(selector)
}
</script>
</body>
</html>
