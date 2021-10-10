## Basic S3 Connection

Basic Laravel app built using the TALL stack to test importing a file to an S3 service like Minio.

#### Steps

-   Copy the repo
-   On the env file, set the variables to be like this:

```
AWS_ENDPOINT="Your S3 connection URL"
AWS_ACCESS_KEY_ID="S3 key access"
AWS_SECRET_ACCESS_KEY="S3 secret key"
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET="Bucket name"
AWS_USE_PATH_STYLE_ENDPOINT=true
```

-   Run the app
