# localwiki-builder

# Getting Wikipedia Mysql Dumps
## #1 Download the Wikipedia Mysql Dump for your language

For example, if we choose arabic Wikipedia

we can download it from http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

```bash
mkdir arwiki
cd arwiki

wget http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

bzip2 -dck arwiki-20200301-pages-articles-multistream.xml.bz2 > arwiki-20200301-pages-articles-multistream.xml
```

# Mediawiki Configuration

## Mediawiki Initialisation

https://releases.wikimedia.org/mediawiki/1.34/mediawiki-1.34.1.tar.gz

```
tar xzvf mediawiki-1.34.1.tar.gz -C /data/mediawiki/releases/
cd /data/mediawiki/all
cp ../releases/mediawiki-1.34.1/ arwiki -r


#mv arwiki arwiki.1.32
cp ../arwiki.1.32/LocalSettings* ./

```

## Extension 

ActiveAbstract
ExpandTemplates
Flow
MobileFrontend
Redirect
Scribunto
TemplateData
Wikibase
WikibaseQuality
WikibaseQualityConstraints
WikimediaBadges
WikimediaMessages




## Mediawiki Installation

```bash
#
# cp ../arwiki.1.32/composer.local.json ./
# optional, if you have run composer install before
rm -f composer.lock

composer install --no-dev

# This step will create a LocalSettngs.php and initialise database
php maintenance/install.php --dbserver=127.0.0.1 --dbuser=wikiuser --dbpass=GoodDay --pass=aaaaa "Arabic Wikipedia" "admin"

```

Create a set of databases
```

for lang in ar es ko; do rm LocalSettings.php; php maintenance/install.php --dbname=wikipedia_$lang --dbserver=127.0.0.1 --dbuser=wikiuser --dbpass=GoodDay --pass=aaaaa "Local Wikipedia" "admin"; done

```

More examples, creating databases for: 

### Turkish Wikipedia 
```
php maintenance/install.php --dbname=wikipedia_tr --dbserver=127.0.0.1 --dbuser=wikiuser --dbpass=GoodDay --pass=aaaaa "Arabic Wikipedia" "admin"
```

### Arabic Wikipedia

```
php maintenance/install.php --dbname=wikipedia_ar --dbserver=127.0.0.1 --dbuser=wikiuser --dbpass=GoodDay --pass=aaaaa "Arabic Wikipedia" "admin"
```

### Mysql / MariaDB
The database of English Wikipedia would be huge, and if disk size is limited and would have to put the database file in to a different director (of a different disk), after you create the database, you can move the database directory, for example, /var/lib/mysql/wikipedia_en to somewhere else, and create a symlink to it.

You may encounter an error as follow:

```mysql

```

To correct the above error, you might have to do the following:

#### Systemd Service
```bash
vi /etc/systemd/system/multi-user.target.wants/mysql.service

# add the following to the [Service] section
...
ReadWritePaths=/data4/mysql_data
ReadWritePaths=/data/mysql_data

systemctl daemon-reload
service mysql restart


```

#### AppArmor
```bash
vi /etc/apparmor.d/usr.sbin.mysqld

# Update the content as follows, change the directory name to yours
...
# Allow data dir access
  /var/lib/mysql/ r,
  /var/lib/mysql/** rwk,
  /data/mysql_data/ r,
  /data/mysql_data/** rwk,
  /data4/mysql_data/ r,
  /data4/mysql_data/** rwk,
...

service apparmor restart

```

## Mediawiki Updates

```
php maintenance/update.php
```

## Scripts

# WikiDump2SQLite


WikiDump2SQLite is a collection of tools that can import the database dumps into mysql database, and create sqlite database from it.

## prerequisite

### Antelope Search Engine

WikiDump2SQLite doesn't use antelope as a search engine nor do any searches with it, but it requires its text processing ability to read in Wikipedia pages which are in XML format

#### Antelope Repository

https://github.com/tyolab/antelope

#### Build Antelope
```
cd antelope_dir
./autogen.sh
mkdir -p build/release
cd build/release
../../configure
make
sudo make install
```

### Using WikiDump2SQLite

#### import_dump

import_dump implicitly uses "/data/mediawiki/all/{lang_code}wiki" as the mediawiki's home directory to run the php code - "import.php" to import pages


```bash
 import_dump -threads 12 -n 500 /data4/wikipedia/zhwiki/2019/zhwiki-20190920-pages-articles-multistream.xml 
```

