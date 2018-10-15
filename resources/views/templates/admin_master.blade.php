<?php use Illuminate\Support\Facades\Storage;?>

@include('templates.partials.admin.header')

@yield('header')

</head>
<body>
@if(session()->has('kembali'))
<script>
	window.addEventListener('load',function(){alert('{{session()->get('kembali')}}')})
</script>
<?php session()->forget('kembali') ?>
@endif

@include('templates.partials.admin.sidebar')
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class=" container-fluid ">
        <p class="navbar-brand">
        	@yield('header-title')
        </p>
        @if($user->verified == 0)
        <a href="/verifikasi/{{$user->id}}" class="btn btn-danger btn-fill rounded">Verifikasi Akunmu!</a>
        @endif
     <button href="" class="navbar-toggler pull-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <i class="material-icons text-danger">reorder</i>
    </button>
    </div>
</nav>
@yield('content')

</div>
</div>
</body>

@include('templates.partials.admin.footer')

@yield('footer')

</html>