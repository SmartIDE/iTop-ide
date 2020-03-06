mkdir "var/test" -p || true

php .make/composer/listOutdated.php --human-readable | tee var/test/listOutdated.log