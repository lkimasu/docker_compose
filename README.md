포트폴리오
---

프로젝트명: 로컬 개발환경에서 도커 컴포즈를 활용한 PHP 및 Mysql 기반 게시판<br>
---
1.프로젝트 소개

도커 컴포즈를 활용하여 로컬 개발 환경에서 PHP와 MySQL을 통합한 게시판을 구축한 프로젝트입니다. 이 프로젝트를 통해 로컬 환경에서의 빠른 개발 및 테스트에 대한 경험을 쌓았습니다.

2.개발 환경

- 로컬 환경: Windows 10<br>
- 서버 환경: Ubuntu 22.04.3 LTS (virtualBox)<br>
- 도커 버전: 24.0.7<br>
- 도커 컴포즈 버전: 2.23.3<br>

3.시스템 아키텍쳐

![diagram](https://github.com/lkimasu/docker_compose/assets/43263676/b37031a8-8d84-494b-80d0-fb41bc6ba2d1)<br>


로컬 개발 환경에서 도커 컴포즈를 사용하여 PHP 애플리케이션과 MySQL 데이터베이스를 통합했습니다.<br> 로컬 개발 툴을 사용하여 개발 및 디버깅을 진행 하였고, 우분투 서버에서 배포를 진행을 해보았습니다.<br>

4.개발 프로세스

로컬 개발 환경 설정: 개발 환경으로 Windows 10을 선택하고, 도커를 설치하고 설정했습니다.
도커 컴포즈 구성: PHP 애플리케이션 및 MySQL 데이터베이스를 로컬에서 통합하기 위한 도커 컴포즈 파일 및 도커 파일을 작성했습니다.
애플리케이션 개발: PHP를 사용하여 게시판 애플리케이션을 로컬에서 개발하고 테스트했습니다.
데이터베이스 관리: MySQL을 로컬에서 설치하고 데이터베이스를 설계하며, 초기 데이터를 구성했습니다.

5. 도전과 극복

로컬 환경에서의 도커 및 개발 도구 사용 중에 발생한 문제를 해결하는 과정을 기록했습니다. <br>
도커 컴포즈를 처음 실행하면 초기 sql 데이터가 없어서 실행이 안되는데 init.sql이라는 초기 데이터를 추가 하면서 볼륨을 할당하고 그 볼륨에 init.sql을 넣었는데 init.sql이 실행이 되지 않는 오류 같은데 발생했었습니다.
로그를 보아도 에러가 없어서 고생을 했는데 공식 문서를 찾아본 결과 version이 3.3 이 아닌 3.8을 사용해야 한다는 것을 깨달았습니다.

6.결과물 및 성과

로컬 환경에서 동작하는 도커 기반 PHP 및 MySQL 게시판 애플리케이션을 완성했습니다. 로컬 개발 경험을 통해 빠른 반복 및 효율적인 로컬 테스트를 강조하였고, 우분투 환경에서 도커 허브를 통해서 배포를 해보았습니다.

7.코드 샘플 (docker-compose.yml)
<pre>
```yaml
version: '3.8'
services:
  web:
    build:
      context: .
      dockerfile: Dockerfile
    container_name: php73
    depends_on:
      - db
    volumes:
      - ./src:/var/www/html/
    ports:
      - 8000:80
  db:
    container_name: mysql8
    image: mysql:8.0
    command: --default-authentication-plugin=mysql_native_password
    restart: always
    environment:
      MYSQL_ROOT_PASSWORD: root
      MYSQL_DATABASE: test_db
      MYSQL_USER: devuser
      MYSQL_PASSWORD: devpass
    volumes:
      -  ./data:/var/lib/mysql
      -  ./db/init:/docker-entrypoint-initdb.d
    ports:
      - 6033:3306

```

8.시연
![메인화면](https://github.com/lkimasu/docker_compose/assets/43263676/eb08cc15-d7f3-4578-a468-f6b2962ffcd1)
  
![글작성](https://github.com/lkimasu/docker_compose/assets/43263676/251b12c4-18b9-49ee-94df-3cfef1c31e00)

![글보기](https://github.com/lkimasu/docker_compose/assets/43263676/a5004745-f8dd-4138-aaf6-289cc12f0cb2)
  
![글수정](https://github.com/lkimasu/docker_compose/assets/43263676/7ad7e46d-597b-46c2-8cf0-3fd315ed9d1c)
  
![글삭제](https://github.com/lkimasu/docker_compose/assets/43263676/bd20758f-63d8-4891-ad63-75ef146d193b)

  
  
