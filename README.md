# faLseFI
Laboratorio LFI con Docker

## Clonar el repositorio, construir y ejecutar
```bash
git clone https://github.com/rooty298/faLseFI.git
cd faLseFI
docker build -t faLseFI .
docker run -p 8080:80 -p 2222:22 faLseFI
```
# Probar
```bash
nmap -p 2222,8080 localhost
```
# Probar en el navegador
```
http://localhost:8080/
```
