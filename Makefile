YII = ./vendor/yii
YIIC = ${YII}/framework/yiic.php
APP_NAME = tango
YIIMONGO_PATH=./${APP_NAME}/protected/extensions
YIIMONGO_FULLPATH=${YIIMONGO_PATH}/YiiMongoDbSuite
MONGO_HOST = localhost:27017
MONGO_DBNAME = tango
CONFIGGER = ./src/configger.php
APPCFG=./appconfig.json
DATE=$(shell date +%I:%M%p)


#
# CREATE THE SAMPLE APP (tango)
#

build: clean app


app:
	git submodule update --init
	php ${YIIC} webapp ${APP_NAME}
	mkdir -p ${YIIMONGO_PATH}
	cp -r ./vendor/YiiMongoDbSuite ${YIIMONGO_PATH}/
	rm -rf ${YIIMONGO_FULLPATH}/.git
	rm ${YIIMONGO_FULLPATH}/.gitignore
	${CONFIGGER} ${APPCFG} < webapp_response.txt
	echo "Copied Configs for ${APP_NAME}\n"


clean:
	rm -rf ./${APP_NAME}

