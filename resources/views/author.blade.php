@extends('layouts.app')

@section('content')
  @include('partials.page-header')
  <?php
  global $author_name, $author;
  $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
  $website = $curauth->user_url;
  $mail = $curauth->user_login . "@hackerspace-bremen.de";
  $interests = get_the_author_meta("people_lists_interessen", $curauth->ID);
  $description = $curauth->description;
  if ($curauth->user_login !== "ausgetretenesMitglied") {
  ?>

  <div class="card bg-base-300 text-base shadow-sm mb-5">
    <figure class="px-10 pt-5">
      <div class="avatar">
        <div class="w-24 rounded">
          <?php echo get_avatar( $curauth->ID, 100 ); ?>
        </div>
      </div>
    </figure>
    <div class="card-body">
      <h2 class="card-title"><?php echo $curauth->nickname; ?></h2>
      <?php echo ((!empty($interests)) ? "<p>" . __("Interessen:", "sage") . " " . $interests . "</p>" : ""); ?>
      <?php echo ((!empty($description)) ? "<p>" . $description . "</p>" : ""); ?>

      <div class="card-actions justify-end">
        <?php echo ((!empty($website)) ? "<a role=\"button\" href=\"".$website."\" target=\"_blank\" class=\"btn btn-primary\">".__("Webseite", "sage")."</a>" : ""); ?>
        <a role="button" href="mailto:<?php echo $curauth->user_login; ?>@hackerspace-bremen.de" target="_blank" class="btn btn-primary">{!! __('E-Mail schreiben', 'sage') !!}</a>
      </div>
    </div>
  </div>
  <?php
  }
  ?>

  @if (! have_posts())
    <div role="alert" class="alert alert-error mt-5">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" />
      </svg>
      <span>{!! __('Keine Ergebnisse gefunden.', 'sage') !!}</span>
    </div>
  @endif

  @while(have_posts()) @php(the_post())
    @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
  @endwhile

  {!! get_the_posts_navigation() !!}
@endsection

@section('sidebar')
  @include('sections.sidebar')
@endsection
