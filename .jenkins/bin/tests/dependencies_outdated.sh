DIR=$(dirname $0)

mkdir "$DIR/var/test" -p || true

php .make/composer/listOutdated.php | tee $DIR/var/test/listOutdated.log