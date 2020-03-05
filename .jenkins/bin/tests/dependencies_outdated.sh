mkdir "var/test" -p || true

php .make/composer/listOutdated.php | tee ../var/test/listOutdated.log