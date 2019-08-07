
{{-- @if(!session()->has('login'))
  
  <script>window.location = "/auth/login.blade.php";</script>

@endif

@php
	Session::put('test','Hellow')
@endphp --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

	@include('partials.head')

	<body>

		<!-- Left Panel -->
		@include('partials.sidebar')
		<!-- /Left Panel -->

		<!-- Right Panel -->
		<div id="right-panel" class="right-panel">
		    @include('partials.navbar')
		    <div class="container">
		    	
			    @yield('content')

		    </div>
		</div>
		<!-- /Right-panel -->
	    @include('partials.scripts')
		
	</body>
</html>
