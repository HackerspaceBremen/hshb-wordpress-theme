@if (! post_password_required())
  <section id="comments" class="comments">
    @php(comment_form())

    @if ($responses())
      <h2>
        {!! $title !!}
      </h2>

      <ol class="comment-list">
        {!! $responses !!}
      </ol>

      @if ($paginated())
        <nav aria-label="Comment">
          <ul class="pager">
            @if ($previous())
              <li class="previous">
                {!! $previous !!}
              </li>
            @endif

            @if ($next())
              <li class="next">
                {!! $next !!}
              </li>
            @endif
          </ul>
        </nav>
      @endif
    @endif

    @if ($closed())
      <x-alert type="warning">
        {!! __('Keine Kommentare möglich.', 'sage') !!}
      </x-alert>
    @endif
  </section>
@endif
