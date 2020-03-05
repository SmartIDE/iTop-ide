DIR=$(dirname $0)

mkdir "$DIR/securityChecker" || true
mkdir "$DIR/var/test" -p || true

cd $DIR/securityChecker

composer.phar require --dev sensiolabs/security-checker --no-interaction
php vendor/bin/security-checker security:check $DIR/composer.lock --no-interaction  | tee $DIR/var/test/security_check.log

