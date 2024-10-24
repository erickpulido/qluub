@extends('layouts.app')

@section('content')
@vite(['resources/js/components/auth.js'])
<div class="container">
    <form>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="email" name="email" class="form-control">
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="password" class="form-control">
        </div>
        <div class="mb-3">
            <input type="hidden" name="device" value="web" class="form-control">
        </div>
        <button type="button" id="btn-login" class="btn btn-primary">Iniciar sesión</button>
    </form>
</div>



<button id="btn-logout" type="button">Cerrar</button>
@stop