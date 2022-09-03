@extends('layouts.app3')
@section('content_main')
<main>
    <div class="row justify-content-center">
        <div class="col-md-12">
<x-paddle-button :url="$payLink" class="px-8 py-4">
    Subscribe
</x-paddle-button>
    </div>
      </div>

</main>
@endsection
