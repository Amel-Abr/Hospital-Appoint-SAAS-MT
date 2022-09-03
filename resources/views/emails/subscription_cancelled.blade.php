@extends('layouts.emails')
@section('content')

    <h3>Dear: {{ $user->fullname }}</h3>

    <p>Your subscription for plan: {{ $plan->name }} is cancelled.</p>

@endsection
