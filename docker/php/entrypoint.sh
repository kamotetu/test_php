#!/bin/sh

if [ -n "${HOST_UID}" -a "${HOST_UID}" != "$(id -u www-data)" ]; then
    usermod -u "${HOST_UID}" www-data
fi

if [ -n "${HOST_GID}" -a "${HOST_GID}" != "$(id -g www-data)" ]; then
    groupmod -g "${HOST_GID}" www-data
fi

ini=$(cat << EOS
xdebug.client_host=${XDEBUG_CLIENT_HOST:-$(ip route | awk 'NR==1 {print $3}')}
xdebug.client_port=${XDEBUG_CLIENT_PORT}
xdebug.mode=${XDEBUG_MODE}
EOS
)
echo "${ini}" >> /usr/local/etc/php/conf.d/php.ini

exec docker-php-entrypoint "$@"
