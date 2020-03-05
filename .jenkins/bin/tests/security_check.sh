mkdir "securityChecker" || true
mkdir "var/test" -p || true

cd securityChecker

composer.phar require --dev sensiolabs/security-checker --no-interaction
php vendor/bin/security-checker security:check ../composer.lock --no-interaction  | tee var/test/security_check.log

