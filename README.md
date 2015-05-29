# Baseplate: Just enough to start a new project.

Docs a work in progress; not completely updated right now.
Preview: COMING SOON (maybe)

## What is this?
This is a bare bones HTML/CSS framework based on Foundation and Lee Munroe's <a href="https://github.com/leemunroe/motherplate">Motherplate</a>

It includes a CSS reset and a bunch of minimal boilerplate styles that should come in useful for any project, including a responsive grid, typography, icons and forms.

It is not as in depth as something like <a href="http://html5boilerplate.com/">HTML5 Boilerplate</a>.

It can be used for a static web project as is, or you can copy the CSS folder into an existing framework.

## Features
* Uses SCSS partials to help structure the CSS.
* Responsive-ready 12-column grid system to work across all devices (<a href="http://foundation.zurb.com">Foundation</a>).
* Uses Font-Awesome icon fonts for icons.
* Uses Normalize to reset browser styles.
* Just enough CSS to get you started; minimal visual styling with this boilerplate allows for easy styling.
* Just the HTML/JS you need to get started; very little components with this boilerplate.

## How to Use
This will vary depending on the framework you are using. The following is how to for a basic static website.

### Download Baseplate
Download and copy the baseplate files into your new project folder.

### Only edit the SCSS files
When you make changes to any of the scss files, your main.css file will be automatically updated.
You don't edit main.css directly, compass takes care of that for you.

## HTML
A bare bones index.html template.

## CSS
* `_config.scss` Put all your variables in here e.g. colors, padding, border radius - this helps with consistency across your project.
* `_forms.scss` Some basic form styles.
* `_grid.scss` A basic responsive grid system with 12 columns.
* `_icons.scss` This is Font Awesome's CSS stylesheet.
* `_ie.scss` Any styles that you need to add in order for Internet Explorer to work.
* `_layout.scss` This is where your main styles go. I typically have header, footer, logo classes here.
* `_links.scss` Styles for any text links and/or buttons.
* `_media.scss` Styles for images, video etc.
* `_mixins.scss` Reusabled SASS mixins e.g. clearfix.
* `_notifications.scss` Alerts to notify or give feedback to the user
* `_other.scss` Small reusable other styles that don't fit the rest of the framework.
* `_reset.scss` This is normalize.
* `_responsive.scss` Add any responsive styles here e.g. hide elements, show elements, resize elements.
* `_shame.scss` Keep this to hand for any quick and dirty CSS you need to add but plan to tidy later.
* `_tables.scss` Styles for tables.
* `_type.scss` Basic styling for your typography.
* `main.scss` This brings all the partials together.

As your project grows and you need to add more styles just create new .scss files and reference them anywhere in your main.scss file.

Typical files I'll end up adding include _nav.scss, _home.scss.

## JavaScript ##
* I've included some basic Javascript including the latest jQuery and the document ready function.

## Images ##
* There is a /img folder for images.
* For images referenced in the CSS I tend to keep them in the css/assets/ folder e.g. sp.png is a sprite I can reference.
* Images referenced in the HTML are stored in the /img folder.

## Fonts ##
* Included font awesome for icons

## Further Documentation ##
* <a href="http://foundation.zurb.com/docs/">Foundation</a>
* <a href="http://sass-lang.com/">SASS</a>
* <a href="http://necolas.github.com/normalize.css/">normalize.css</a>
* <a href="http://fontawesome.io/">Font Awesome</a>
