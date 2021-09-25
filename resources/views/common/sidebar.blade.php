<div class="sidebar">
        <h3><span>C</span>Ami Coding Pari Na</h3>
        <ul>
          <script>
          {   
                let loginData = JSON.parse(localStorage.getItem('loginData'));
                if(loginData !=null && loginData.success == true){
                    document.write(`<li><a href="{{ route('home') }}">Home</a></li><li><a href="" onclick="Logout()">Logout</a></li>`)
                }else if(loginData ==null ){

                    document.write(`<li><a href="{{ route('signin') }}">Sign In</a></li><li><a href="{{ route('signup') }}">Sign Up</a></li>`)
                 }
        
            }
           </script>
        </ul>

        <p>&copy; 2021 copyright all right reserve</p>   
</div>


