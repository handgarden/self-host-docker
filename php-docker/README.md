# php-docker

## 로컬에서 두 가지 호스팅 환경 대응
- PHP 버전 5 & 7
- 각 호스팅에 별도로 DB 존재한다고 가정
## 필요한 컨테이너
- PHP, apache, mysql

## COMPOSE COMMAND
- 다중 컨테이너 실행
```
docker-compose up -d
```

- 다중 컨테이너 종료 및 제거
```
docker-compose down
```

- 특정 컨테이너만 다시 실행
```
docker-compose restart mysql(원하는 서비스 이름)
```

### 참고
[Docker compose 사용하기](https://luvstudy.tistory.com/84)
[[docker-compose] 특정 컨테이너 재시작 하기](https://knight76.tistory.com/entry/aaa-1)