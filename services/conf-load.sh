curl -X PUT -d @/etc/unit/conf.json --unix-socket /var/run/control.unit.sock http://localhost/

curl --unix-socket /var/run/control.unit.sock 'http://localhost/'
