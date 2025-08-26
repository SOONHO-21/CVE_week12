FROM httpd:2.4.59

# htpasswd 유틸 설치
RUN apt-get update && apt-get install -y apache2-utils && rm -rf /var/lib/apt/lists/*

# 취약한 설정 파일 복사
COPY vulnerable.conf /usr/local/apache2/conf/extra/vulnerable.conf

# Apache 모듈 활성화 및 conf include
RUN echo "ServerName localhost" >> /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule rewrite_module/LoadModule rewrite_module/' /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule proxy_module/LoadModule proxy_module/' /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule proxy_fcgi_module/LoadModule proxy_fcgi_module/' /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule auth_basic_module/LoadModule auth_basic_module/' /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule authn_file_module/LoadModule authn_file_module/' /usr/local/apache2/conf/httpd.conf \
 && sed -i 's/^#LoadModule authz_user_module/LoadModule authz_user_module/' /usr/local/apache2/conf/httpd.conf \
 && echo "Include conf/extra/vulnerable.conf" >> /usr/local/apache2/conf/httpd.conf

# Path Truncation 테스트용 파일 생성
RUN mkdir -p /var/user/alice /var/user/bob /var/user/test \
 && printf "name: alice\nrole: normal\n" > /var/user/alice/profile.yml \
 && printf "secret: alice top-secret\n" > /var/user/alice/secret.yml \
 && printf "name: bob\nrole: admin\n"    > /var/user/bob/profile.yml \
 && printf "name: test\nrole: demo\n"    > /var/user/test/profile.yml

RUN apt-get update && apt-get install -y libjs-jquery libjs-bootstrap php-pear

EXPOSE 80
CMD ["httpd-foreground"]