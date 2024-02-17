#!/bin/bash

ENV_FILE=".env"

if [ -f "$ENV_FILE" ]; then
    while IFS='=' read -r key value; do
        if [[ "$key" != \#* ]] && [[ -n "$key" ]]; then
            key=$(echo "$key" | tr -d '[:space:]')
            value=$(echo "$value" | tr -d '[:space:]')
            
            case "$key" in
                "username")
                    username="$value"
                    ;;
                "password")
                    password="$value"
                    ;;
            esac
        fi
    done < "$ENV_FILE"

    curl -X PUT "http://${username}:${password}@127.0.0.1:5984/_users"
    curl -X PUT "http://${username}:${password}@127.0.0.1:5984/_replicator"
    curl -X PUT "http://${username}:${password}@127.0.0.1:5984/_global_changes"
else
    echo "$ENV_FILE 파일을 찾을 수 없습니다."
    exit 1
fi

