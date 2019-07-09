_s
===

Hi. I'm a moded starter theme called `_s`, or `underscores`, if you like, based on the original _s by Automattic, and Storefront by WooCommerce (which ironically is also based on _s). I'm a theme meant for hacking so don't use me as a Parent Theme. Instead try turning me into the next, most awesome, WordPress theme out there. That's what I'm here for.

My ultra-minimal CSS might make me look like theme tartare but that means less stuff to get in your way when you're designing your awesome theme. Here are some of the other more interesting things you'll find here:

* A just right amount of lean, well-commented, modern, HTML5 templates.
* A helpful 404 template.
* A custom header implementation in `inc/custom-header.php` just add the code snippet found in the comments of `inc/custom-header.php` to your `header.php` template.
* Custom template functions in `inc/_s-template-functions.php` that keep your templates clean and neat and prevent code duplication.
* Some small tweaks in `inc/_s_-functions.php` that can improve your theming experience.
* A script at `assets/js/navigation.js` that makes your menu a toggled dropdown on small screens (like your phone), ready for CSS artistry. It's enqueued in `class-_s.php`.
* 2 sample CSS layouts in `layouts/` for a sidebar on either side of your content.
Note: `.no-sidebar` styles are not automatically loaded.
* Smartly organized starter CSS in `style.css` that will help you to quickly get your design off the ground.
* Full support for `WooCommerce plugin` integration with hooks in `inc/woocommerce/class-_s-woocommerce.php`, styling override woocommerce.css with product gallery features (zoom, swipe, lightbox) enabled.
* Licensed under GPLv2 or later. :) Use it to make something cool.

Getting Started
---------------

Download `_s` from GitHub. The first thing you want to do is copy the `_s` directory and change the name to something else (like, say, `coldplay-is-amazing`), and then you'll need to do a five-step find and replace on the name in all the templates.

1. Search for `'_s'` (inside single quotations) to capture the text domain.
2. Search for `_s_` to capture all the function names.
3. Search for `Text Domain: _s` in `style.css`.
4. Search for <code>&nbsp;_s</code> (with a space before it) to capture DocBlocks and class names.
5. Search for `_s-` to capture prefixed handles.

OR

1. Search for: `'_s'` and replace with: `'coldplay-is-amazing'`.
2. Search for: `_s_` and replace with: `coldplay_is_amazing`.
3. Search for: `Text Domain: _s` and replace with: `Text Domain: coldplay-is-amazing` in `style.css`.
4. Search for: <code>&nbsp;_s</code> and replace with: <code>&nbsp;Coldplay_Is_Amazing</code>.
5. Search for: `_s-` and replace with: `coldplay-is-amazing-`.

Then, update the stylesheet header in `style.css`, the links in `footer.php` with your own information and rename `_s.pot` from `languages` folder to use the theme's slug. Next, update or delete this readme.

Now you're ready to go! The next step is easy to say, but harder to do: make an awesome WordPress theme. :)

Good luck!
