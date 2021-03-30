# leovie/dropbox-upload

Upload single files to Dropbox via Docker.

That's it. No download, no sync. Just uploading single files.

## How to use
### Setup
1. Create a Dropbox app to retrieve an access token.
2. `cp environment/.env.dist environment/.env`
3. Paste your access token into variable `DROPBOX_ACCESS_TOKEN` in `environment/.env`

### Upload
```bash
docker run -v $(pwd)/environment/:/environment/-v [UPLOAD_DIRECTORY] leovie/dropbox-upload -l [FILEPATH_IN_DOCKER_CONTAINER] -r [FILEPATH_IN_DROPBOX]
```

Example:
```bash
docker run -v $(pwd)/environment/:/environment/ -v $(pwd)/upload/:/upload/ leovie/dropbox-upload -l /upload/backup.tar -r backup.tar
```

## Thanks
Thanks to
 - [Spatie](https://github.com/spatie) for `spatie/dropbox-api`
 - [Symfony](https://github.com/symfony/) for `symfony/dotenv`