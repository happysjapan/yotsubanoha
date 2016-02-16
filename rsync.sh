rsync -avhz --rsh=ssh --delete --exclude=.sass-cache --exclude=sass --progress ./wp/wp-content/themes/biz-vektor-child/ happys:~/www/etsupporthandicap/wp-content/themes/biz-vektor-child

rsync -avhz --rsh=ssh --delete --progress ./wp/wp-content/plugins/yotsubanoha/ happys:~/www/etsupporthandicap/wp-content/plugins/yotsubanoha
