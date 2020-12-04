@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <messenger-component :user-Id="{{ auth()->id() }}"></messenger-component> --}}
    <profile-component :user="{{ auth()->user() }}" csrf-token="{{csrf_token()}}"></profile-component>
</div>
@endsection
