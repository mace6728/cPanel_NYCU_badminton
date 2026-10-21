<?php
/**
 * Photo album registry. Read by src/Services/GalleryService.php.
 *
 * An album's photos are NOT listed here: they are the image files in its
 * folder(s), shown in natural filename order (2.jpg before 10.jpg). To add
 * photos, copy them into the folder and (optionally) run `php bin/gallery.php
 * thumbs` to create their thumbnails. To add an album, add an entry below and
 * run `php bin/gallery.php stubs`.
 *
 * Paths are relative to the web root (public/). Keys:
 *
 *   categories.<slug>             page at gallery/<slug>.php; <slug> = the file name
 *     title, cover, css           card on gallery.php; `css` is the page stylesheet
 *     albums.<path>               page at gallery/<path>.php
 *       title                     page heading (the card says `card` instead, if set)
 *       cover                     image on the album's card
 *       dir                       folder, or list of folders, holding the photos
 *       exclude   (optional)      file names in the folder that must NOT be shown
 *       order     (optional)      file names to show first, in this order
 */
return [
    'categories' => [
        'university_cup' => [
            'title' => '大運會',
            'cover' => 'img/team.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'university/2018' => [
                    'title' => '2018大專盃',
                    'card'  => '2018大運會',
                    'cover' => 'img/university_cup/2018/2.jpg',
                    'dir'   => 'img/university_cup/2018',
                ],
                'university/2017' => [
                    'title' => '2017大專盃',
                    'card'  => '2017大運會',
                    'cover' => 'img/university_cup/2017/2017_university (156).jpg',
                    'dir'   => 'img/university_cup/2017',
                ],
                'university/2016final' => [
                    'title' => '2016大專盃決賽',
                    'card'  => '2016 決賽',
                    'cover' => 'img/university_cup/2016final/105all.jpg',
                    'dir'   => 'img/university_cup/2016final',
                    'order' => ['105girls.jpg', '105girls1.jpg', '105boys.jpg', '105boys1.jpg', '105all.jpg', '105all1.jpg', '105all2.jpg'],
                ],
                'university/2016preliminary' => [
                    'title' => '2016大專盃預賽',
                    'card'  => '2016 中區預賽',
                    'cover' => 'img/university_cup/2016preliminary/mid4.jpg',
                    'dir'   => 'img/university_cup/2016preliminary',
                ],
                'university/2015final' => [
                    'title' => '2015大專盃決賽',
                    'card'  => '2015 決賽',
                    'cover' => 'img/university_cup/2015final/20150506_0284-min.jpg',
                    'dir'   => 'img/university_cup/2015final',
                ],
                'university/2015preliminary1' => [
                    'title' => '2015中區預賽第一天',
                    'card'  => '2015 中區預賽1',
                    'cover' => 'img/university_cup/2015preliminary1/20150317_0001-min.jpg',
                    'dir'   => 'img/university_cup/2015preliminary1',
                ],
                'university/2015preliminary2' => [
                    'title' => '2015中區預賽第二天',
                    'card'  => '2015 中區預賽2',
                    'cover' => 'img/university_cup/2015preliminary2/20150318_0001-min.jpg',
                    'dir'   => 'img/university_cup/2015preliminary2',
                ],
                'university/2015preliminary3' => [
                    'title' => '2015中區預賽第三天',
                    'card'  => '2015 中區預賽3',
                    'cover' => 'img/university_cup/2015preliminary3/20150319_0001-min.jpg',
                    'dir'   => 'img/university_cup/2015preliminary3',
                ],
                'university/2014preliminary' => [
                    'title' => '2014中區預賽',
                    'card'  => '2014 中區預賽',
                    'cover' => 'img/university_cup/2014preliminary/20140319_0001-min.jpg',
                    'dir'   => 'img/university_cup/2014preliminary',
                ],
            ],
        ],
        'jinzhu' => [
            'title' => '勁竹盃',
            'cover' => 'img/jinzhu/2014/20141018_0006-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'jinzhu/2018jinzhu' => [
                    'title' => '2018勁竹盃',
                    'cover' => 'img/jinzhu/2018/2018-13.jpg',
                    'dir'   => 'img/jinzhu/2018',
                ],
                'jinzhu/2017jinzhu' => [
                    'title' => '2017勁竹盃',
                    'cover' => 'img/jinzhu/2017/2017 (69).JPG',
                    'dir'   => 'img/jinzhu/2017',
                ],
                'jinzhu/2016jinzhu' => [
                    'title' => '2016勁竹盃',
                    'cover' => 'img/jinzhu/2016/2016 (74).JPG',
                    'dir'   => 'img/jinzhu/2016',
                ],
                'jinzhu/2015jinzhu' => [
                    'title' => '2015勁竹盃',
                    'cover' => 'img/jinzhu/2015/2015 (152).jpg',
                    'dir'   => 'img/jinzhu/2015',
                ],
                'jinzhu/2014jinzhu' => [
                    'title' => '2014勁竹盃',
                    'cover' => 'img/jinzhu/2014/20141018_0006-min.jpg',
                    'dir'   => 'img/jinzhu/2014',
                ],
                'jinzhu/2012jinzhu' => [
                    'title' => '2012勁竹盃',
                    'cover' => 'img/jinzhu/2012/20121124_0010-min.jpg',
                    'dir'   => 'img/jinzhu/2012',
                ],
            ],
        ],
        'wind' => [
            'title' => '風城盃',
            'cover' => 'img/wind/2015/20150913_0042-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'wind/2018wind' => [
                    'title' => '2018風城盃',
                    'cover' => 'img/wind/2018/2018w1.jpg',
                    'dir'   => 'img/wind/2018',
                ],
                'wind/2016wind' => [
                    'title' => '2016風城盃',
                    'cover' => 'img/wind/2016/2016w1.jpg',
                    'dir'   => 'img/wind/2016',
                ],
                'wind/2015wind' => [
                    'title' => '2015風城盃',
                    'cover' => 'img/wind/2015/20150913_0042-min.jpg',
                    'dir'   => 'img/wind/2015',
                ],
                'wind/2014wind' => [
                    'title' => '2014風城盃',
                    'cover' => 'img/wind/2014/20140531_0001-min.jpg',
                    'dir'   => 'img/wind/2014',
                ],
                'wind/2013wind' => [
                    'title' => '2013風城盃',
                    'cover' => 'img/wind/2013/20130609_0007-min.jpg',
                    'dir'   => 'img/wind/2013',
                ],
            ],
        ],
        'chintsao' => [
            'title' => '勁草盃',
            'cover' => 'img/chintsao/2014/20140827_0001-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'chintsao/2014chintsao' => [
                    'title' => '2014勁草盃',
                    'cover' => 'img/chintsao/2014/20140827_0001-min.jpg',
                    'dir'   => 'img/chintsao/2014',
                ],
            ],
        ],
        'meichu' => [
            'title' => '梅竹賽',
            'cover' => 'img/meichu/105_6.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'meichu/2018' => [
                    'title' => '2018梅竹',
                    'cover' => 'img/meichu/2018/2018 (3).jpg',
                    'dir'   => 'img/meichu/2018',
                ],
                'meichu/2017boy' => [
                    'title' => '2017梅竹男羽',
                    'cover' => 'img/meichu/2017boy/2017_meichu_boy (10).jpg',
                    'dir'   => 'img/meichu/2017boy',
                ],
                'meichu/2017girl' => [
                    'title' => '2017梅竹女羽',
                    'cover' => 'img/meichu/2017girl/2017_meichu_girl (10).JPG',
                    'dir'   => 'img/meichu/2017girl',
                ],
                '2016meichu' => [
                    'title' => '丙申梅竹',
                    'card'  => '2016丙申梅竹',
                    'cover' => 'img/meichu/105_6.jpg',
                    'dir'   => 'img/meichu',
                ],
            ],
        ],
        'cmu' => [
            'title' => '中國醫大盃',
            'cover' => 'img/cmu/2014/20141220_0022-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'cmu/2014cmu' => [
                    'title' => '2014中國醫大盃',
                    'cover' => 'img/cmu/2014/20141220_0006-min.jpg',
                    'dir'   => 'img/cmu/2014',
                ],
                'cmu/2013cmu' => [
                    'title' => '2013中國醫大盃',
                    'cover' => 'img/cmu/2013/20131214_0036-min.jpg',
                    'dir'   => 'img/cmu/2013',
                ],
            ],
        ],
        'DrPro' => [
            'title' => '風崗盃',
            'cover' => 'img/DrPro/20140216_0055-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'DrPro/2014DrPro' => [
                    'title' => '2014風崗盃',
                    'cover' => 'img/DrPro/20140216_0055-min.jpg',
                    'dir'   => 'img/DrPro',
                ],
            ],
        ],
        'fengyuan' => [
            'title' => '豐原主委盃',
            'cover' => 'img/fengyuan/2013/20131208_0005-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'fengyuan/2013fengyuan' => [
                    'title' => '2013豐原主委盃',
                    'cover' => 'img/fengyuan/2013/20131208_0005-min.jpg',
                    'dir'   => 'img/fengyuan/2013',
                ],
            ],
        ],
        'ncku' => [
            'title' => '成大公開賽',
            'cover' => 'img/ncku/2013/20130712_0001-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'ncku/2013ncku' => [
                    'title' => '2013成大公開賽',
                    'cover' => 'img/ncku/2013/20130712_0001-min.jpg',
                    'dir'   => 'img/ncku/2013',
                ],
            ],
        ],
        'ncue' => [
            'title' => '彰師大盃',
            'cover' => 'img/ncue/2014/20140222_0001-min.jpg',
            'css'   => 'sortGallery.min.css',
            'albums' => [
                'ncue/2014ncue' => [
                    'title' => '2014彰師大盃',
                    'cover' => 'img/ncue/2014/20140222_0001-min.jpg',
                    'dir'   => 'img/ncue/2014',
                ],
                'ncue/2013ncue' => [
                    'title' => '2013彰師大盃',
                    'cover' => 'img/ncue/2013/20130929_0001-min.jpg',
                    'dir'   => 'img/ncue/2013',
                ],
            ],
        ],
        'friendly' => [
            'title' => '友誼賽',
            'cover' => 'img/friendship/2014HKcityu/20140108_0002-min.jpg',
            'css'   => 'friendly.min.css',
            'albums' => [
                'friendly/2017HKcityu' => [
                    'title' => '2017香港城市大學友誼賽',
                    'cover' => 'img/friendship/2017HKcityu/42.jpg',
                    'dir'   => 'img/friendship/2017HKcityu',
                ],
                'friendly/2016CTUs' => [
                    'title' => '2016兩岸五校交大交流賽',
                    'cover' => 'img/friendship/2016CTUs/2016CTUs28.jpg',
                    'dir'   => 'img/friendship/2016CTUs',
                ],
                'friendly/2016JapanShio' => [
                    'title' => '2016日本尚志高校友誼賽',
                    'cover' => 'img/friendship/2016JapanShio/shi4.jpg',
                    'dir'   => 'img/friendship/2016JapanShio',
                ],
                'friendly/2015JapanSeniorGirls' => [
                    'title' => '2015日本高中友誼賽',
                    'card'  => '2015日本高中女生友誼賽',
                    'cover' => 'img/friendship/2015JapanSeniorGirls/20150731_0003-min.jpg',
                    'dir'   => 'img/friendship/2015JapanSeniorGirls',
                ],
                'friendly/2015HKpolyu' => [
                    'title' => '2015香港理工大學友誼賽',
                    'cover' => 'img/friendship/2015HKpolyu/20150107_0004-min.jpg',
                    'dir'   => 'img/friendship/2015HKpolyu',
                ],
                'friendly/2015NCTUalumni' => [
                    'title' => '2015交大校友友誼賽',
                    'cover' => 'img/friendship/2015NCTUalumni/20150104_0006-min.jpg',
                    'dir'   => 'img/friendship/2015NCTUalumni',
                ],
                'friendly/2014HKcityu' => [
                    'title' => '2014香港城市大學友誼賽',
                    'cover' => 'img/friendship/2014HKcityu/20140108_0002-min.jpg',
                    'dir'   => 'img/friendship/2014HKcityu',
                ],
            ],
        ],
        'special' => [
            'title' => '特殊活動',
            'cover' => 'img/special/107_goodbye/107_goodbye (1).jpg',
            'css'   => 'friendly.min.css',
            'albums' => [
                'special/107_goodbye' => [
                    'title' => '2018送舊',
                    'cover' => 'img/special/107_goodbye/107_goodbye (1).jpg',
                    'dir'   => 'img/special/107_goodbye',
                ],
                'special/107_summer' => [
                    'title' => '2018移地訓練',
                    'cover' => 'img/special/107_summer/big/107_summer (3).jpg',
                    'dir'   => ['img/special/107_summer/big', 'img/special/107_summer/small'],
                ],
            ],
        ],
    ],
];
