@inject('request', 'Illuminate\Http\Request')
<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet"  href="{{ display_path('dist/css/bootstrap.min.css') }}">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title style="font-family: Inconsolata">Demo Portal</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');
    @import url('https://fonts.googleapis.com/css?family=Catamaran');


*{
	list-style: none;
	text-decoration: none;
	margin: 0;
	padding: 0;
	box-sizing: border-box;
    font-size: 16px;
}

ol, ul {
    padding-left: 0px;;
}

body{
	background: #f5f6fa;
}

.wrapper .sidebar{
	position: fixed;
	top: 0;
	left: 0;
	width: 250px;
	height: 100%;
	/*padding: 20px 0;*/
	transition: all 0.5s ease;
}

.wrapper .sidebar .profile{
	margin-bottom: 30px;
	text-align: center;
}

.wrapper .sidebar .profile img{
	display: block;
	width: 100px;
	height: 100px;
    border-radius: 50%;
	margin: 0 auto;
}

.wrapper .sidebar .profile h3{
	color: #ffffff;
	margin: 10px 0 5px;
    font-size: 18px;
}

.wrapper .sidebar .profile p{
	color: rgb(206, 240, 253);
	font-size: 14px;
}

.wrapper .sidebar ul li a{
	display: block;
	padding: 13px 30px;
	border-bottom: 1px solid #10558d;
	color: rgb(241, 237, 237);
	font-size: 16px;
	position: relative;
}

.wrapper .sidebar ul li a .icon{
	color: #dee4ec;
	width: 30px;
	display: inline-block;
}

 

.wrapper .sidebar ul li a:hover,
.wrapper .sidebar ul li a.active{
	color: #10558d;

	background:white;
    border-right: 2px solid rgb(5, 68, 104);
}

.wrapper .sidebar ul li a:hover .icon,
.wrapper .sidebar ul li a.active .icon{
	color: #10558d;
}

.wrapper .sidebar ul li a:hover:before,
.wrapper .sidebar ul li a.active:before{
	display: block;
}

.wrapper .section{
	width: calc(100% - 250px);
	margin-left: 250px;
	transition: all 0.5s ease;
}

.wrapper .section .top_navbar{
	
	height: 70px;
	display: flex;
	align-items: center;
	padding: 0 30px;
 
}


.wrapper .section .top_navbar .hamburger a{
	font-size: 28px;
	color: #f4fbff;
}

.wrapper .section .top_navbar .hamburger a:hover{
	color: #a2ecff;
}

 

body.active .wrapper .sidebar{
	left: -250px;
}

body.active .wrapper .section{
	margin-left: 0;
	width: 100%;
}
.portal-heading{
    margin-left: 45%;
    font-size: 24px;
    font-weight: bold;
    color:white
}
body{
    background-repeat: no-repeat;
  	background-size: cover;
    background-image: url({{asset('images/6258748.jpg')}}) ;
}


    </style>
    @yield('css-section') 
</head>
<body>   
    <div class="wrapper">
        <div class="section">
            <div class="top_navbar">
                <div class="hamburger">
                    <a href="#">
                        <i class="fas fa-bars"></i>
                    </a>
                </div>
                {{-- <a href="{{ route('home') }}"><img  src="{{ asset('images/apgvblogo2.png') }}" style="margin-top:10px;margin-left:10px" width="150"/></a> --}}
                <div class="portal-heading">
                    Demo Portal          
                </div>
                
            </div>
            
            @yield('body-section') 
            
        </div>
        @php
            $desarray=['OA'=>'Office Assistant',
            'SUBSTAFF'=>'SUBSTAFF',
            'JMGS-1'=>'Assistant Manager',
            'MMGS-2'=>'Manager',
            'MMGS-3'=>'Senior Manager',
            'SMGS-4'=>'Chief Manager',
            'SMGS-5'=>'Assistant General Manager',]
        @endphp
        <div class="sidebar">
            <a href="{{ route('home') }}"><img  src="{{ asset('images/apgvblogo.jpeg') }}" style="margin-top:0px" height="70" width="250"/></a>
            <div class="profile">
                {{-- <img src="{{url($pdetails->photolink)}}"> --}}
                
                <h3>{{ $pdetails->name }}</h3>
                <p>{{ $desarray[$pdetails->workdetails->pres_cadre] }}</p>
                <p>{{ $pdetails->workdetails->branchdata->BRANCHNAME }}</p>
            </div>
            <ul style="width: 100%">
                <li>
                    <a href="#" class="active">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="item">Home</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-desktop"></i></span>
                        <span class="item">My Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-friends"></i></span>
                        <span class="item">People</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-tachometer-alt"></i></span>
                        <span class="item">Perfomance</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-database"></i></span>
                        <span class="item">Development</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-chart-line"></i></span>
                        <span class="item">Reports</span>
                    </a>
                </li> 
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-user-shield"></i></span>
                        <span class="item">Admin</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <span class="icon"><i class="fas fa-cog"></i></span>
                        <span class="item">Settings</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('logout')}}">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="item">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        
    </div>
    <script src="{{ script_path('jquery.min.js')}}"></script>
<script src="{{ display_path('dist/js/bootstrap.min.js') }}"></script>
  <script>
    var hamburger = document.querySelector(".hamburger");
	hamburger.addEventListener("click", function(){
	document.querySelector("body").classList.toggle("active");
	})
  </script>
  @yield('js-section')
</body>
</html>