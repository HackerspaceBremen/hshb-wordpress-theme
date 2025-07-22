<form role="search" method="get" class="search-form join w-full" action="{{ home_url('/') }}">
  <label class="join-item input">
    <span class="sr-only">
      {{ _x('Suche nach:', 'label', 'sage') }}
    </span>

    <input
      type="search"
      class="w-full"
      placeholder="{!! esc_attr_x('Suchen &hellip;', 'placeholder', 'sage') !!}"
      value="{{ get_search_query() }}"
      name="s"
    >
  </label>

  <button class="btn btn-secondary join-item">{{ _x('Suchen', 'submit button', 'sage') }}</button>
</form>
