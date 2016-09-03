Tinhte crawler
==============

Written by [ducntq](mailto:ducntq@gmail.com) to scrape frontpage articles from [tinhte.vn](http://tinhte.vn).
Built with Yii 2.

Used packages
---

1. yiisoft/yii2-httpclient
2. yiisoft/yii2-bootstrap
3. symfony/dom-crawler
4. vlucas/phpdotenv

Run
---

To run scraping:

```
./yii scrape
```

TO run scraping in background:

```
./yii scrape &> scrape.log &
```