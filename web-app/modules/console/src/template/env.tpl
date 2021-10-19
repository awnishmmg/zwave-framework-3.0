RewriteEngine On
IndexIgnore web-app
Options -Indexes
DirectoryIndex web-app
php_value include_path './web-app/'
php_value auto_prepend_file 'hooks/prepend.php'
php_value auto_append_file 'hooks/append.php'
ErrorDocument 404 /zwave-project/404.php
SetEnv ENV_BASE_URL {{ENV_BASE_URL}}