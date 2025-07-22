<footer class="footer sm:footer-horizontal bg-base-300 text-base-content p-10 content-info mt-10">
  <aside class="flex flex-col content-center justify-center items-center">
    <figure>
      <img src="{{ Vite::asset('resources/images/logo-footer.svg') }}" alt="Logo" class="h-32">
    </figure>
    <p class="font-bold">
      <?php
      echo get_bloginfo("description");
      ?>
    </p>
  </aside>

  @if (has_nav_menu('footer_navigation'))
      {!! wp_nav_menu([
            'theme_location' => 'footer_navigation',
            'menu_class' => 'nav',
            'echo' => false,
            'container' => false,
            'items_wrap'    => '%3$s',
            'walker' => new Footer_Menu_Walker()
          ]) !!}
  @endif
  <nav>
    <h6 class="footer-title">Seitendesign</h6>
    <fieldset class="fieldset">
      <label class="flex gap-2 cursor-pointer items-center">
        <input type="radio" name="theme-radios" class="radio radio-sm theme-controller theme-switch" value=""/>
        Automatisch
      </label>
      <label class="flex gap-2 cursor-pointer items-center">
        <input type="radio" name="theme-radios" class="radio radio-sm theme-controller theme-switch" value="hshblight"/>
        Hell
      </label>
      <label class="flex gap-2 cursor-pointer items-center">
        <input type="radio" name="theme-radios" class="radio radio-sm theme-controller theme-switch" value="hshbdark"/>
        Dunkel
      </label>
    </fieldset>
  </nav>
</footer>
