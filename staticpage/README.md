# Configuration Guide

## Utilizing mod_rewrite

eduhub staticpage utilizes Apache's mod_rewrite module to deliver static pages with clean and understandable URLs.

If your Moodle instance is installed in the root of your webserver, please include the following in your Apache configuration or your .htaccess file within the Moodle directory:

```sh
RewriteEngine On
RewriteRule ^/page/(.*)\.html$ /theme/eduhub/staticpage/view.php?page=$1&%{QUERY_STRING} [L]
```

In some Apache configurations, the rule below might work without the leading slash (for details, refer to Apache mod_rewrite documentation):

```sh
RewriteEngine On
RewriteRule ^page/(.*)\.html$ /theme/eduhub/staticpage/view.php?page=$1&%{QUERY_STRING} [L]
```

Now, the static pages are accessible at:
http://www.yourmoodle.com/page/[pagename].html


## Without mod_rewrite

If you choose not to use or are unable to use Apache's mod_rewrite, local_staticpage will still function.

The static pages will be accessible at:
http://www.yourmoodle.com/theme/eduhub/staticpage/view.php?page=[pagename]

While these URLs may not be as visually appealing as with mod_rewrite, they function in the same manner.

Please note:
In this case, you need to exclude the ".html" extension in the pagename.
The URL http://www.yourmoodle.com/theme/eduhub/staticpage/view.php?page=[pagename].html won't work.

This limitation is due to technical reasons as the pagename parameter is sanitized to only include alphanumeric characters, hyphens, and underscores, but not period characters.

You can still create links to these URLs in a Moodle HTML Block, in your Moodle theme footer, and so on.