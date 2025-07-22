<p class="text-sm text-base-content/75 mb-2">
  {{ __('Veröffentlicht von', 'sage') }} <a href="{{ get_author_posts_url(get_the_author_meta('ID')) }}" class="p-author h-card">{{ get_the_author() }}</a> {{ __('am', 'sage') }} <time class="dt-published" datetime="{{ get_post_time('c', true) }}">
    {{ get_the_date() }}
  </time><?php
         $categories = get_the_category();
         $separator = ', ';
         if (!empty($categories)) {
           $output = __('in', 'sage') . " ";
           foreach ($categories as $category) {
             if ($category->name === "Startseite") continue;
             $output .= '<a href="' . get_category_link($category->term_id) . '" title="' . esc_attr(sprintf(__("Zeige alle Posts in %s"), $category->name)) . '">' . $category->cat_name . '</a>' . $separator;
           }
           echo trim($output, $separator);
         }
         ?>
</p>
