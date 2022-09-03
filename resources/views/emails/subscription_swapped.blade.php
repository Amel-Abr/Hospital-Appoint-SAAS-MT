@extends('layouts.emails')
@section('content')

    <h3>Dear: {{ $user->fullname }}</h3>

    <p>Your swapped subscription for plan: {{ $plan->name }} from {{ $oldPlan }}.</p>

@endsection
