# Tailwind CSS Demo

This repo is for a lightning talk for the Omaha Laravel Meetup group.

The purpose of the demo is to outline basic installation and usage of TailwindCSS in a Laravel project.

## Author

**Peter DeMarco**

- Twitter: @BeardAboutIt
- Github: /PeterDKC
- Currently: @LinkedIn

## Local installation

    git clone git@github.com:PeterDKC/tailwind-demo.git
    cd tailwin-demo
    composer install
    npm install

set your dev database details in `.env`

    php artisan sprocket:make-db
    php artisan trees:seed

You should now have your databases installed, migrated, and 10 faked Trees in the database.

Set up your local development site however you usually do (e.g. valet, apache, or php artisan serve) and resolve any errors that appear in the browser.

You should see a list of Trees with create, edit, and delete buttons with browser default styling.

## Branches

**master**: This branch contains a default Laravel application with the Tree model, controller, migration, and seeder. It has a set of views to view, create, edit, and delete Tree resources in the database. It has no styles applied to any of the frontend. It does include Vue.js and the MDI font set.

**demo-complete**: This branch contains a completed set of views with Tailwind styles applied to represent a completed site. It may / may not correspond to what was done during the live demo, but instead is a reference for what might come out of the demo.

## Tailwind

**Installation**: https://github.com/laravel-frontend-presets/tailwindcss

**Documentation**: https://tailwindcss.com/docs/what-is-tailwind/

## DIY

Below are the set of steps to get Tailwind up and running and start applying classes to the application.

    git checkout -b my-branch-name
    composer install laravel-frontend-presets/tailwindcss
    php artisan preset tailwindcss
    npm install && npm run dev && npm run dev

Open `webpack.mix.js` and make the following changes to the last few lines of the file:

**Before:**

*(snipped)...*
```
   .tailwind()
   .purgeCss();

if (mix.inProduction()) {
  mix.version();
}
```

**After:**

*(snipped)...*
```
   .tailwind()
   .purgeCss()
   .version()
   .extract(['vue', 'axios']);
```

This instructs Webpack to always version ( cache-bust ) our frontend assets, and to make longer-lived files for seldom-changed libraries ( Vue and Axios ). The `extract()` directive is optional but is a good habit to get into. Note that this requires mixing 3 javascript files into the application instead of just one:

*from `resources/views/layouts/app.blade.php` in this application:*

```
...
    <!-- Scripts -->
    <script src="{{ mix('js/manifest.js') }}"></script>
    <script src="{{ mix('js/vendor.js') }}"></script>
    <script src="{{ mix('js/app.js') }}"></script>
...
```

---

**MDI Icons**

Add the following two lines to the top of `resources/assets/css/app.css`:

```
$icon-font-path: '~mdi/fonts';
@import '~mdi/css/materialdesignicons.css';
```

This will instruct Webpack to build out the MDI icon files and package them with the application.



