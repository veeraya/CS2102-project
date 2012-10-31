<?php

exec('export PATH=/home/pookin/perl5/bin:/usr/local/jdk/bin:/usr/local/jdk/bin:/usr/kerberos/sbin:/usr/kerberos/bin:/usr/lib/courier-imap/sbin:/usr/lib/courier-imap/bin:/usr/local/sbin:/usr/local/bin:/sbin:/bin:/usr/sbin:/usr/bin:/usr/local/bin:/usr/X11R6/bin:/usr/local/bin:/usr/X11R6/bin:/home/pookin/bin:/home/pookin/bin:/home/pookin/bin &&  /bin/bash git-pull.sh 2>&1', &$output, &$return_var);
print_r($output);
print $return_var;

?>
