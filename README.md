# Track Workout Progress
A tool to help you out **measuring** your progress in a more **visually way**.
Professional teachers, athletes or even common people that **want to the next level of growth** can use it.
You can **adapt your workout** the way fits you better, you can measure **sets, reps, time, weight** to measure details about **Volume** and **intensity**.
For more details talk to __Natural Set__.

### Requiriments for environment

Run the code bellow to make sure you have [docker][docker_link] and [git][git_link] installed.

> **Note**
>
> Make sure that you are able to run docker [non root][docker_non_root_link]

```sh
git -v
docker compose version
```

### Get started

Open a terminal into the folder that you save your projects.
then copy and past the command bellow.

```sh
git clone https://github.com/spirit-sword/Track-Workout-Progress.git \
&& cd TWP \
&& docker compose up -d --wait \
&& docker compose exec php composer install \
&& sleep 10 \
&& docker compose exec -T db sh -c 'exec mysql --defaults-extra-file=.docker/mysql/config.cnf' < .docker/mysql/dump.sql
```

After the command finish You should be able to open:
- App: http://localhost:8000
- Database: http://localhost:8001

Enjoy!

### Commands

| Command                                       | Description                                                   |
| --------------------------------------------- | ------------------------------------------------------------- |
| `docker compose up -d`                        | Start the containers                                          |
| `docker compose down`                         | Stop containers                                               |
| `docker compose exec php composer install`    | Execute some php command that you need, or composer command.  |

[git_link]: https://git-scm.com/book/en/v2/Getting-Started-Installing-Git
[docker_non_root_link]: https://docs.docker.com/engine/install/linux-postinstall/#manage-docker-as-a-non-root-user
[docker_link]: https://docs.docker.com/engine/install/ubuntu/#install-using-the-repository

### Minimal structure

I have added a small php structure just to be easier you play with php.
I tried to keep this really simple! Then if you are new I strong recommend you investidate what each thing is doing.

### Others Frameworks

In case you want to work with others Frameworks such as Laravel or Symfony.

Just remove all files except In case you want to work with others Frameworks such as Laravel or Symfony.

Just remove all files except `.docker` and `docker-compose.yml`.
After you have added your framework here just run the commands above.
