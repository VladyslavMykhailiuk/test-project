#!/bin/sh

# wait-for-it.sh

set -e

TIMEOUT=30
WAIT_FOR="$1"

for i in $(seq $TIMEOUT); do
    nc -z $WAIT_FOR && break
    sleep 1
done

if ! nc -z $WAIT_FOR; then
    echo "Timeout while waiting for $WAIT_FOR"
    exit 1
fi
