<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ami coding pari na - @yield('title', 'Signup')</title>
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
        <form id="registerForm">
            <div class="person-info">
                <h2>Sign Up</h2>
                <p>Please enter your infomation and proceed to the next step so we can build your accounts.</p>
            </div>
            <div class="input-field">
                <i class="fa fa-user"></i>
                <input type="text" name="name" id="name" placeholder="Name">
                <span class="error_msg" id="error_name"></span>
            </div>
            <div class="input-field">
                <i class="fa fa-envelope"></i>
                <input type="text" name="email" id="email" placeholder="Email">
                <span class="error_msg" id="error_email"></span>
            </div>
            <div class="input-field">
                <i class="fa fa-phone"></i>
                <input type="text" name="phone" id="phone" placeholder="Phone">
                <span class="error_msg" id="error_phone"></span>
            </div>
            <div class="seclec_option">
                <select name="country" id="country">
                     <option value="" disabled="disabled" selected>Select Country</option>
                     <option value="USA">USA</option>
                     <option value="UK">UK</option>
                     <option value="Franch">Franch</option>
                </select>
                <span class="error_msg" id="error_country"></span>
            </div>
            <div class="input-field">
                <div id="label_gander">Gender:</div>
                <div class="radio-group">
                    <label class="radio">
                            <input type="radio" name="gender" id="gender" value="male" checked>Male
                            <span></span>
                    </label>
                    <label class="radio">
                            <input type="radio" name="gender" id="gender" value="female">Female
                            <span></span>
                    </label>
                </div>

            </div>
            <div class="input-field">
                <i class="fa fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password">
                <span class="error_msg" id="error_password"></span>
            </div>

            <div class="submit-btn">
                 <button type="submit">Submit</button>
            </div>
        </form>
    </div>

</div>
<script>

     //select register form
     let registerForm = document.getElementById("registerForm")
     //submit form
     registerForm.addEventListener('submit', function(event){
          event.preventDefault()
 
          //catch user input value  
          let name     = $('name').value
          let email     = $('email').value
          let phone     = $('phone').value
          let country     = $('country').value
          let gender     = $('gender').value
          let password = $('password').value


          if(name == ''){
              console.log('Please Provide Your Name')
              $('error_name').innerHTML = 'Please Provide Your Name'
          }
          if(email == ''){
              console.log('Please Provide Your Email Address')
              $('error_email').innerHTML = 'Please Provide Your Email Address'
          }
          if(phone == ''){
              console.log('Please Provide Your Phone Number')
              $('error_phone').innerHTML = 'Please Provide Your Phone Number'
          }
          if(country == ''){
              console.log('Pleae Select Your Country')
              $('error_country').innerHTML = 'Please Select Your Country'
          }
          if(gender == ''){
              console.log('Pleae Select Your Gender')
              $('error_country').innerHTML = 'Please Select Your Gender'
          }
          if(password == ''){
              console.log('Pleae Provide Your Password')
              $('error_password').innerHTML = 'Please Provide Your Password'
          }else{

            let data = {
               name: name,
               email: email,
               phone: phone,
               country: country,
               gender: gender,
               password: password
            }
             //console.log(data)
            RegisterUser(data)
            this.reset()
          }
     })


function RegisterUser(data) {
    
    //call api
    fetch('http://localhost/Ami_coding_pari_na/api/auth/register', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
    })
    .then((response) => response.json())
    .then((data) => {
      console.log(data)
      if(data.success == true){

        localStorage.setItem('loginData', JSON.stringify(data));
         window.location.href = "{{ route('home')}}"
      }else{

          alert(data.message)
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
