@extends('layouts.frontLayout.front_design')
@section('content')

<div class="container text-center">
	<div class="content-404">
		<h1><b>OPPS!</b> Non riusciamo a trovare questa pagina.</h1>
		<p>Uh... Sembra che qualcosa sia andato storto.</p>
		<h2><a href="{{ asset('./') }}">Riportami alla Home</a></h2>
    </div>
    <br>
    <br>
</div>
@endsection
