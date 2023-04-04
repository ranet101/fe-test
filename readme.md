#   Deploy and install instructions
Clone repo
```
git clone https://github.com/ranet101/fe-test.git
```
Install laravel dependencies
```
cd fe-test/src
sudo composer install
```
Update app permissions
```
cd ..
sudo chmod -R 777 src
```
Launch docker
```
sudo docker-compose up -d
```
## Examples
Full call: http://localhost/preguntas/javascript/2023-01-02/2023-03-31  
Minimum call: http://localhost/preguntas/javascript