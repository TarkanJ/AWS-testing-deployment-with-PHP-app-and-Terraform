# Build "postaveni" kontejneru
docker build -t php-nabijeni-appka .

# Inicializace kontejneru - spusti se jednorazove po buildu...
# parametr -d neboli --detached, bezi na pozadi, aby nezablokoval terminal
# pri spusteni - pouziti hlavne u serveru!!!
# Apropos - nastavil jsem schvalne trochu "exotickej" port, ale bezi to na nem...
docker run -d -p 3766:80 php-nabijeni-appka

# Nebo lze pouzit docker-compose prikaz
# docker-compose up --build

# Místo blokování terminálu můžeš kdykoliv zkontrolovat výstup kontejneru:

# docker logs <container_id>

# nebo pokud chceš logy průběžně:

# docker logs -f <container_id>

echo "HOTOVO!"
echo "@2025 by Martino ;)"
