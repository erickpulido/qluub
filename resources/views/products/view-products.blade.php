@extends('layouts.app')
@extends('layouts.navbar')

@section('content')
@vite(['resources/js/components/products.js'])

@if(@Auth::user()->hasRole('cliente'))
    <h2>Eres un cliente</h2>
@endif
<div class="container">
    <div id="products-container" class="row">

    </div>
</div>
@stop