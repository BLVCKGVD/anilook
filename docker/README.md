cd docker

openssl req -newkey rsa:2048 -new -nodes -x509 -days 3650 -keyout ./config/ssl/app.key -out ./config/ssl/app.crt

Country Name (2 letter code) [AU]:RU
State or Province Name (full name) [Some-State]:
Locality Name (eg, city) []:
Organization Name (eg, company) [Internet Widgits Pty Ltd]:
Organizational Unit Name (eg, section) []:
Common Name (e.g. server FQDN or YOUR name) []:anilook.local
Email Address []:

cp .env_example .env

docker-compose up -d
