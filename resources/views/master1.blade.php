@inject('request', 'Illuminate\Http\Request')
<!DOCTYPE Html>
<html>
<head>
<title>Demo Project Portal</title>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
<link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
<link rel="stylesheet"  href="{{ display_path('dist/css/bootstrap.min.css') }}">
<style type="text/css">
    h5 {
     margin-bottom: 0;
    } 
    .flex-container{
        margin-left:0px;
        margin-right:0px;
        display: flex; /* Standard syntax */
    }
    .body-container{
        margin-left:0px;
        margin-right:0px;
        border:0px solid black;
        padding:15px;
    }
    .flex-container .column{
        background:#ddd;
        color:black;
        flex: 1; /* Standard syntax */
    }
    .topnav {
        margin-left:0px;
        margin-right:0px;
        overflow: hidden;
        background: #ddd;
        border-top:0.5px solid white;
    }
    .topnav-right {
        float: right;
    }
    .topnav a {
        float: left;
        color: #f2f2f2;
        text-align: center;
        padding: 5px 10px;
        text-decoration: none;
        font-size: 15px;
    }
    .topnav a:hover {
        background-color: #ddd;
        color: black;
    }
    .topnav a.active {
        background-color: black;
        color: white;
    }
    active {
        background-color: #ddd;
        color: white;
    }
    .alert{padding:5px;margin-bottom:5px;border:1px solid transparent;border-radius:4px}
    .alert-danger{color:#a94442;background-color:#f2dede;border-color:#ebccd1}
    .alert-success{color:#3c763d;background-color:#dff0d8;border-color:#d6e9c6}

    .dropdownmenu {   float: left;   overflow: hidden; }

    .dropdownmenu .dropbtn { 
        font-size: 16px;  
        border: none;
        outline: none;
        color: white;
        padding: 5px 10px;
        background: #ddd;
        font-family: inherit;
        margin: 0;
    }
    .dropdownmenu:hover .dropbtn {
        background-color: #ddd;
        color: black;
    }
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 75px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }
    .dropdown-content a {
        float: none;
        color: black;
        padding: 10px 10px;
        text-decoration: none;
        display: block;
        text-align: left;
    }
    .dropdown-content a:hover {
        background-color: #ddd;
    }
    .dropdownmenu:hover .dropdown-content {
        display: block;
    }
  
    body{
        color: #333;
    font-family: Arial, Helvetica, sans-serif;
	background-image: url({{asset('images/onethree.jpg')}});

}
    table{font-size:14px;}

    </style>  
    @yield('css-section') 
</head>
<body>
    <div class="flex-container" style="border:1px solid black;">
        <div class="column" style="float:left;">
            <img  src="{{ asset('images/apgvblogo.jpeg') }}" height="45" width="150"/>
        </div>
        <div class="column" >
            <div style="text-align:left;height:0px;"><strong>Andhra Pradesh Grameena Vikas Bank <br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Demo Project Portal</strong></div>
        </div>   
    </div> 
    @section('nav-section')    
        <div class="topnav">
            <a @if($request->segment(1)=='home') class='active' @endif href="{{route('home')}}" style="border-right:1px solid #FFF;font-size:14px;">Home</a> 

            @if(Config('branchtype') == 'RegionalOffice')
            <a @if($request->segment(1)=='home') class='active' @endif href="{{route('home')}}" style="border-right:1px solid #FFF;font-size:14px;">Home</a> 
            @endif

            @if(Config('branchtype') == 'BranchOffice')
            <a @if($request->segment(1)=='home') class='active' @endif href="{{route('home')}}" style="border-right:1px solid #FFF;font-size:14px;">Home</a>   
            @endif  

            <div class="topnav-right">
                <a style="border-right:1px solid #FFF;color:white;14px;">Welcome  {{ Session::get('employee_name') }}</a> 
                <a href="{{route('logout')}}">Logout</a>                
            </div>
        </div>		
    @show 
    <div class="body-container">
        @yield('body-section') 
    </div>
    <script type="text/javascript" src="{{ asset('js/jquery-1.11.3.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    @yield('js-section')
</body>
</html>