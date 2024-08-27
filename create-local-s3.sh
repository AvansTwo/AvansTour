# NOTICE: This script will only work if you have a LocalStack instance running on your machine (localhost:4566)
# Create S3 bucket
aws --endpoint-url=http://localhost:4566 s3api create-bucket --bucket avanstour

# Create folders with placeholder files
aws --endpoint-url=http://localhost:4566 s3 cp ./placeholder.txt s3://avanstour/Team-images/placeholder.txt
aws --endpoint-url=http://localhost:4566 s3 cp ./placeholder.txt s3://avanstour/Tour-images/placeholder.txt
aws --endpoint-url=http://localhost:4566 s3 cp ./placeholder.txt s3://avanstour/Question-images/placeholder.txt
