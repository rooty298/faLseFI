FROM ubuntu:20.04

ENV DEBIAN_FRONTEND=noninteractive

RUN apt update && apt install -y \
openssh-server \
nano \
php \
apache2 \
openssh-client

RUN mkdir /var/run/sshd \
&& useradd -m lofi

RUN mkdir -p /home/lofi/.ssh \
&& ssh-keygen -t rsa -b 2048 -f /home/lofi/.ssh/id_rsa -N "abcdefg" \
&& cp /home/lofi/.ssh/id_rsa.pub /home/lofi/.ssh/authorized_keys \
&& chown -R lofi:lofi /home/lofi/.ssh \
&& chmod 700 /home/lofi/.ssh \
&& chmod 600 /home/lofi/.ssh/id_rsa \
&& chmod 600 /home/lofi/.ssh/authorized_keys

RUN chgrp www-data /home/lofi/.ssh/id_rsa \
&& chgrp www-data /home/lofi/.ssh/ \
&& chmod 750 /home/lofi/.ssh/ \
&& chmod 640 /home/lofi/.ssh/id_rsa

RUN chmod u+s /bin/nano

RUN rm /var/www/html/index.html
COPY rutas/ /var/www/html

EXPOSE 80 22

CMD service apache2 start && service ssh start && tail -f /dev/null
