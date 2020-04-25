# localwiki-builder

# Steps
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

php maintenance/install.php "Arabic Wikipedia" "admin" --pass=aaaaa

```

## Scripts
