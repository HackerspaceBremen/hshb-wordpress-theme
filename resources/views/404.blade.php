@extends('layouts.app')

@section('content')
  @include('partials.page-header')

  @if (! have_posts())
    <div role="alert" class="alert alert-error mt-5">
      {!! __('Die gesuchte Seite konnte nicht gefunden werden.', 'sage') !!}
    </div>
  @endif
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
