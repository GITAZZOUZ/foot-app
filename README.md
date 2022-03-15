# foot-app
the application allows you to consult the results of the Leagues FR

# features
- Display the list of matches and results
- Possibility to search for a team with the help of the 'autocomplete' 
- show more details and team statistics on statistics page

# tools
- Symfony 5
- Api Fpptball : https://www.api-football.com/
- webpack
- bootsrap


#
view that calls via the api are limited I used caps :
- public/leagues.json
- public/teams.json
- public/statistics.json

# Installation

get the project
```bash
git clone https://github.com/GITAZZOUZ/foot-app.git 
``` 

build the project 
```bash
composer install
```

build webpack
```bash
yarn build 
```

start server 
```bash
symfony server:start 
```

got to 
```bash
http://127.0.0.1:8001/leagues 
```


