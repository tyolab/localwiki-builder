# localwiki-builder

# Steps
## #1 Download the Wikipedia Mysql Dump for your language

For example, if we choose arabic Wikipedia

we can download it from http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

mkdir arwiki
cd arwiki

wget http://dumps.wikimedia.your.org/arwiki/20200301/arwiki-20200301-pages-articles-multistream.xml.bz2

bzip2 -dck arwiki-20200301-pages-articles-multistream.xml.bz2 > arwiki-20200301-pages-articles-multistream.xml

