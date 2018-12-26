test/vendor/bin/phpmd ./core        html  unusedcode  --reportfile ./var/test/phpmd-core.xml  --suffixes php

test/vendor/bin/phpmd ./application html  unusedcode  --reportfile ./var/test/phpmd-application.xml  --suffixes php

test/vendor/bin/phpmd ./datamodels  html  unusedcode  --reportfile ./var/test/phpmd-datamodels.xml  --suffixes php

test/vendor/bin/phpmd ./synchro     html  unusedcode  --reportfile ./var/test/phpmd-synchro.xml  --suffixes php

test/vendor/bin/phpmd ./webservices html  unusedcode  --reportfile ./var/test/phpmd-webservices.xml  --suffixes php