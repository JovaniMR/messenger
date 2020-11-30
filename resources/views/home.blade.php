@extends('layouts.app')

@section('content')
<div class="container">
    <messenger-component :user-Id="{{ auth()->id() }}"></messenger-component>
</div>
@endsection
