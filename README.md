# localwiki-builder

# Getting Wikipedia Mysql Dumps
## #1 Download the Wikipedia Mysql Dump for your language

For example, if we choose arabic Wikipedia

we can download it from http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

mkdir arwiki
cd arwiki

wget http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

bzip2 -dck arwiki-20200301-pages-articles-multistream.xml.bz2 > arwiki-20200301-pages-articles-multistream.xml


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

for lang in ar es ko; do rm LocalSettings.php; php maintenance/install.php --dbname=wikipedia_$lang --dbserver=127.0.0.1 --dbuser=wikiuser --dbpass=GoodDay --pass=aaaaa "Arabic Wikipedia" "admin"; done

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

## Mediawiki Updates

```
php maintenance/update.php
```

## Scripts

# WikiDump2SQLite


WikiDump2SQLite is a collection of tools that can import the database dumps into mysql database, and create sqlite database from it

## prerequisite

### Antelope Search Engine

WikiDump2SQLite doesn't use antelope as a search engine and do any searches with it, but it requires its text processing ability to read Wikipedia pages which are in XML format

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

```

