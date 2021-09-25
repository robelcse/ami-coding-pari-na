<!DOCTYPE html>
<html lang="en">
<head>
  <title>Ami coding pari na - @yield('title', 'Home')</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="{{ asset('public/css/bootstrap.css') }}">
  <script src="{{ asset('public/js/jquery.js') }}"></script>
  <script src="{{ asset('public/js/bootstrap.js') }}"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="{{ asset('public/css/style.css') }}" rel="stylesheet" type="text/css">
  <script>
    let loginData = JSON.parse(localStorage.getItem('loginData'));

    if(loginData == null){
       window.location.href = "{{ route('signin')}}"
    }
  </script>
</head>
<body>

<div class="center-section">
    @include('common.sidebar')
    <div class="content-section">
       <form id="khoj_form">
            <div class="person-info">
                <h2> Khoj the search</h2>
            </div>
            <div class="input_values">
                <input type="text" name="input_values" id="input_values" placeholder="Input Values" />
            </div>
            <div class="input_values">
                <input type="text" name="search_value" id="search_value" placeholder="Search Value" />
            </div>

            <div class="submit-btn">
                 <button type="submit">Khoj</button>
            </div>
            <div class="search_result">
                <h3>Result: <span id="result"></span></h3>
           </div>
        </form>

    </div>
</div>
<script>
   //select form and input field
   let khojForm      = document.getElementById("khoj_form")
   let input_values  = document.getElementById("input_values")
   let search_value  = document.getElementById("search_value")

   //select output div
   let output_result   = document.getElementById("result")
   //form submit
   khojForm.addEventListener("submit", function(){
        event.preventDefault()

      //function for validate user input
        function get_numbers(input) {
            return input.match(/[0-9]+/g);
        }
       //catch user input value
       let InputValues = input_values.value
       let SearchValue = search_value.value


      let InputVal =  get_numbers(InputValues)
      let SearchVal = get_numbers(SearchValue)
      if(InputVal == null){
          console.log('please enter a valid array')
          alert('please enter a valid array')
      }else if(SearchVal == null){
          console.log('please enter a valid item')
          alert('please enter a valid item')
      }else{

          var input_array = InputVal.map(Number)
          var search_result = SearchVal.map(Number)
          var search_Item = parseInt(search_result)
          //sort input values in descending order
          input_array.sort(function(a,b){
            if(a>b){
                return -1
            }else if(a<b){
                return 1
            }else{
                return 0
            }
          })
          let loginData = JSON.parse(localStorage.getItem('loginData'));
          let userId = loginData.user.id

      //sorted data store in the database
      fetch('http://localhost/Ami_coding_pari_na/api/storeUserInput', {
        method: 'POST',
        body: JSON.stringify({
            user_id: userId,
            input_values: `${input_array}`
        }),
        headers: {
            'Content-type': 'application/json; charset=UTF-8',
        },
      })
      .then((response) => response.json())
      .then((data) => console.log(data))
      .catch((err) => {
          console.log(err.message)
       })

      var result = false
      input_array.forEach(function(item){
          if(search_Item == item){
              result = true
          }
      })
      output_result.innerHTML = result
      input_values.value = ""
      search_value.value = ""

      }//end else

   })


   //function for logout
   function Logout(){
      localStorage.removeItem('loginData');
      window.location.href = "{{ route('signin')}}"
    }
</script>
</body>
</html>
