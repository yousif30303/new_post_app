<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200">
    <nav class="p-6 flex justify-between bg-white mb-6">
        <ul class="flex items-center">
          <li>
            <a href="#" class="p-3">Home</a>
          </li>
          <li>
            <a href="#" class="p-3">Dashbort</a>
          </li>
          <li>
            <a href="" class="p-3">Post</a>
          </li>
        </ul>
        <ul class="flex items-center">
            @auth    
              <li>
                <a href="#" class="p-3">yousif</a>
              </li>                
              <li>
                <a href="#" class="p-3">Logout</a>
              </li>
            @endauth
            @guest       
              <li>
                <a href="" class="p-3">Login</a>
              </li>
              <li>
                <a href="" class="p-3">Register</a>
              </li> 
            @endguest             
        </ul>
    </nav>
    @yield('content')
</body>
</html>