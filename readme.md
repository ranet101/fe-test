Clone repo
```
git clone https://github.com/ranet101/fe-test.git
```
Install laravel dependencies
```
cd src
sudo composer install
```
Update app permissions
```
cd ..
sudo chmod -R 777 src
```
Launch docker
```
cd fe-test
sudo docker-compose up -d
```