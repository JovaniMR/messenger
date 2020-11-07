@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center" style="min-height: 80vh">
        
        <contact-list-component></contact-list-component> 

        <conversation-component></conversation-component>
    </div>
</div>
@endsection
