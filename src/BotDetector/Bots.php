<?php

/**
 * This file is auto-generated by bin/generate-bots-class. Do not edit
 */

declare(strict_types=1);

namespace Setono\BotDetectionBundle\BotDetector;

final class Bots
{
    public const REGEX = "#monitoring360bot
    |Cloudflare-Healthchecks
    |360Spider
    |Aboundex
    |AcoonBot
    |AddThis\.com
    |AhrefsBot
    |AhrefsSiteAudit/([\d+.]+)
    |ia_archiver|alexabot|verifybot
    |alexa\ssite\saudit
    |Amazonbot
    |Amazon[\s-]Route\s?53[\s-]Health[\s-]Check[\s-]Service
    |AmorankSpider
    |ApacheBench
    |Applebot
    |AppSignalBot
    |Arachni
    |AspiegelBot
    |Castro\s2,\sEpisode\sDuration\sLookup
    |Curious\sGeorge
    |archive\.org_bot|special_archiver
    |Ask\sJeeves/Teoma
    |Backlink-Check\.de
    |BacklinkCrawler
    |Baidu.*spider|baidu\sTranscoder
    |BazQux
    |Better\sUptime\sBot
    |MSNBot|msrbot|bingbot|BingPreview|msnbot-(UDiscovery|NewsBlogs)|adidxbot
    |Blekkobot
    |BLEXBot
    |Bloglovin
    |Blogtrottr
    |BoardReader\sBlog\sIndexer
    |BountiiBot
    |Browsershots
    |BUbiNG
    |(?<!HTC)[\s_]Butterfly/
    |CareerBot
    |CCBot
    |Cliqzbot
    |Cloudflare-AMP
    |CloudflareDiagnostics
    |CloudFlare-AlwaysOnline
    |coccoc.com
    |collectd
    |CommaFeed
    |CSS\sCertificate\sSpider
    |Datadog\sAgent|Datadog/?Synthetics
    |Datanyze
    |Dataprovider
    |Daum(oa)?[\s/][0-9]
    |Dazoobot
    |discobot
    |Domain\sRe-Animator\sBot|support@domainreanimator.com
    |DotBot
    |DuckDuck(?:Go-Favicons-)?Bot
    |EasouSpider
    |eCairn-Grabber
    |EMail\sExractor
    |evc-batch
    |Exabot|ExaleadCloudview
    |ExactSeek\sCrawler
    |Ezooms
    |facebookexternalhit|facebookplatform|facebookexternalua|facebookcatalog
    |Feedbin
    |FeedBurner
    |Feed\sWrangler
    |Feedly
    |Feedspot
    |Fever/[0-9]
    |FlipboardProxy|FlipboardRSS
    |Findxbot
    |FreshRSS
    |Genieo
    |GigablastOpenSource
    |Gluten\sFree\sCrawler
    |gobuster
    |ichiro/mobile\sgoo
    |Storebot-Google
    |Google\sFavicon
    |Google\sSearch\sConsole
    |Google\sPage\sSpeed\sInsights
    |google_partner_monitoring
    |Google-Cloud-Scheduler
    |Google-Structured-Data-Testing-Tool
    |GoogleStackdriverMonitoring
    |via\sggpht\.com\sGoogleImageProxy
    |SeznamEmailProxy
    |Seznam-Zbozi-robot
    |Heurekabot-Feed
    |ShopAlike
    |AdsBot-Google|Adwords-(DisplayAds|Express|Instant)|Google\sWeb\sPreview|Google[\s-]Publisher[\s-]Plugin|Google-(Ads-Conversions|Ads-Qualify|Adwords|AMPHTML|Assess|HotelAdsVerifier|Read-Aloud|Shopping-Quality|Site-Verification|speakr|Stale-Content-Probe|Test|Youtube-Links)|(APIs|DuplexWeb|Feedfetcher|Mediapartners)-Google|Googlebot|Google(?:AdSenseInfeed|AssociationService|Prober|Producer)|Google.*/\+/web/snippet
    |heritrix
    |HubSpot\s
    |HTTPMon
    |ICC-Crawler
    |inoreader.com
    |iisbot
    |ips-agent
    |IP-Guide\.com
    |k6/[0-9\.]+
    |kouio
    |larbin
    |([A-z0-9]*)-Lighthouse
    |last-modified\.com
    |linkdexbot|linkdex\.com
    |LinkedInBot
    |ltx71
    |Mail\.RU
    |magpie-crawler
    |MagpieRSS
    |masscan-ng/([\d+.]+)
    |masscan
    |Mastodon/
    |meanpathbot
    |MetaJobBot
    |MetaInspector
    |MixrankBot
    |MJ12bot
    |Mnogosearch
    |MojeekBot
    |munin
    |NalezenCzBot
    |check_http/v
    |nbertaupete95\(at\)gmail.com
    |Netcraft(\sWeb\sServer\sSurvey|\sSSL\sServer\sSurvey|SurveyAgent)
    |netEstate\sNE\sCrawler
    |Netvibes
    |NewsBlur\s.*(Fetcher|Finder)
    |NewsGatorOnline
    |nlcrawler
    |Nmap\sScripting\sEngine
    |Nuzzel
    |Octopus\s[0-9]
    |OnlineOrNot.com_bot
    |omgili
    |OpenindexSpider
    |spbot
    |OpenWebSpider
    |OrangeBot|VoilaBot
    |PaperLiBot
    |phantomas/
    |phpservermon
    |Pocket(?:ImageCache|Parser)/([\d+.]+)
    |PritTorrent
    |PRTG\sNetwork\sMonitor
    |psbot
    |Pingdom(?:\.com|TMS)
    |Quora\sLink\sPreview
    |Quora-Bot
    |RamblerMail
    |QuerySeekerSpider
    |Qwantify
    |Rainmeter
    |redditbot
    |Riddler
    |rogerbot
    |ROI\sHunter
    |SafeDNSBot
    |Scrapy
    |Screaming\sFrog\sSEO\sSpider
    |ScreenerBot
    |SemrushBot
    |SensikaBot
    |SEOENG(World)?Bot
    |SEOkicks-Robot
    |seoscanners\.net
    |SkypeUriPreview
    |SeznamBot|SklikBot|Seznam\sscreenshot-generator
    |shopify-partner-homepage-scraper
    |ShopWiki
    |SilverReader
    |SimplePie
    |SISTRIX\sCrawler
    |compatible;\s(?:SISTRIX\s)?Optimizer
    |SiteSucker
    |sixy.ch
    |Slackbot|Slack-ImgProxy
    |(Sogou[\s-](head|inst|Orion|Pic|Test|web)[\s-]spider)|New-Sogou-Spider
    |Sosospider|Sosoimagespider
    |Sprinklr
    |sqlmap/
    |SSL\sLabs
    |StatusCake
    |Superfeedr\sbot
    |Sparkler/[0-9]
    |Spinn3r
    |SputnikBot
    |SputnikFaviconBot
    |SputnikImageBot
    |SurveyBot
    |TarmotGezgin
    |TelegramBot
    |TLSProbe
    |TinEye-bot
    |Tiny\sTiny\sRSS
    |theoldreader.com
    |trendictionbot
    |TurnitinBot
    |TweetedTimes\sBot
    |TweetmemeBot
    |Twingly\sRecon
    |Twitterbot
    |UniversalFeedParser
    |via\ssecureurl\.fwdcdn\.com
    |Uptimebot
    |UptimeRobot
    |URLAppendBot
    |Vagabondo
    |vkShare;\s
    |VSMCrawler
    |Jigsaw
    |W3C_I18n-Checker
    |W3C-checklink
    |W3C_Validator|Validator.nu
    |W3C-mobileOK
    |W3C_Unicorn
    |Wappalyzer
    |PTST/
    |WeSEE
    |WebbCrawler
    |websitepulse[+\s]checker
    |WordPress
    |Wotbox
    |XenForo
    |yacybot
    |Yahoo!\sSlurp|Yahoo!-AdCrawler
    |Yahoo\sLink\sPreview|Yahoo:LinkExpander:Slingstone
    |YahooMailProxy
    |YahooCacheSystem
    |Y!J-BRW
    |Yandex(SpravBot|ScreenshotBot|MobileBot|AccessibilityBot|ForDomain|Vertis|Market|Catalog|Calendar|Sitelinks|AdNet|Pagechecker|Webmaster|Media|Video|Bot|Images|Antivirus|Direct|Blogs|Favicons|ImageResizer|Verticals|News|Metrika|\.Gazeta\sBot)|YaDirectFetcher|YandexTurbo|YandexTracker|YandexSearchShop|YandexRCA|YandexPartner|YandexOntoDBAPI|YandexOntoDB|YandexMobileScreenShotBot
    |Yeti|NaverJapan|AdsBot-Naver
    |YoudaoBot
    |YOURLS\sv[0-9]
    |YRSpider|YYSpider
    |zgrab
    |Zookabot
    |ZumBot
    |YottaaMonitor
    |Yahoo\sAd\smonitoring.*yahoo-ad-monitoring-SLN24857.*
    |.*Java.*outbrain
    |HubPages.*crawlingpolicy
    |Pinterest(bot)?/\d\.\d.*www\.pinterest\.com.*
    |Site24x7
    |s~snapchat-proxy
    |Snap\sURL\sPreview\sService
    |Let's\sEncrypt\svalidation\sserver
    |GrapeshotCrawler
    |www\.monitor\.us
    |Catchpoint
    |bitlybot
    |Zao/
    |lycos
    |Slurp
    |Speedy\sSpider
    |ScoutJet
    |nrsbot|netresearch
    |scooter
    |gigabot
    |charlotte
    |Pompos
    |ichiro
    |PagePeeker
    |WebThumbnail
    |Willow\sInternet\sCrawler
    |EmailWolf
    |NetLyzer\sFastProbe
    |AdMantX.*admantx\.com
    |Server\sDensity\sService\sMonitoring.*
    |RSSRadio\s\(Push\sNotification\sScanner;support@dorada\.co\.uk\)
    |(A6-Indexer|nuhk|TsolCrawler|Yammybot|Openbot|Gulper\sWeb\sBot|grub-client|Download\sDemon|SearchExpress|Microsoft\sURL\sControl|borg|altavista|dataminr.com|tweetedtimes.com|TrendsmapResolver|teoma|blitzbot|oegp|furlbot|http%20client|polybot|htdig|mogimogi|larbin|scrubby|searchsight|seekbot|semanticdiscovery|snappy|vortex(?!(?:\sBuild|Plus))|zeal(?!ot)|fast-webcrawler|converacrawler|dataparksearch|findlinks|BrowserMob|HttpMonitor|ThumbShotsBot|URL2PNG|ZooShot|GomezA|Google\sSketchUp|Read%20Later|RackspaceBot|robots|SeopultContentAnalyzer|7Siters|centuryb.o.t9|InterNaetBoten|EasyBib\sAutoCite|Bidtellect|tomnomnom/meg|My\sUser\sAgent|cortex|CF-UC\sUser\sAgent|Re-re\sStudio|adreview|AHC/|NameOfAgent|Request-Promise|ALittle\sClient|Hello,?\sworld|wp_is_mobile|0xAbyssalDoesntExist|Anarchy99|daumoa,damoa,daum,daumos,duamoa,duam,duamos|^revolt|nvd0rz|xfa1|Hakai|gbrmss|fuck-your-hp|IDBTE4M\sCODE87|Antoine|Insomania|Hells-Net|b3astmode|Linux\sGnu\s\(cow\)|custom_user_agent|Test\sCertificate\sInfo|iplabel)
    |^sentry
    |^Spotify/(\d+[\.\d]+)$
    |The\sKnowledge\sAI
    |Embedly
    |BrandVerity
    |Kaspersky\sLab\sCFR\slink\sresolver
    |eZ\sPublish\sLink\sValidator
    |woorankreview
    |(Match|LinkCheck)\sby\sSiteimprove.com
    |CATExplorador
    |Buck
    |tracemyfile
    |zelist.ro\sfeed\sparser
    |weborama-fetcher
    |BoardReader\sFavicon\sFetcher
    |IDG/IT
    |Bytespider
    |WikiDo
    |AwarioSmartBot
    |AwarioRssBot
    |oBot
    |SMTBot
    |LCC
    |Startpagina-Linkchecker
    |MoodleBot-Linkchecker
    |GTmetrix
    |Nutch
    |Seobility
    |Vercelbot
    |Grammarly
    |Robozilla
    |Domains\sProject
    |PetalBot
    |SerendeputyBot
    |ias-(?:va|sg).*admantx.*service-fetcher|admantx.com.*service-fetcher
    |SemanticScholarBot
    |VelenPublicWebCrawler
    |Barkrowler
    |BDCbot
    |adbeat
    |BW/(?:(\d+[\.\d]+))
    |https://whatis.contentkingapp.com
    |MicroAdBot
    |PingAdmin.Ru
    |notifyninja.+monitoring
    |WebDataStats
    |parse.ly\sscraper
    |Nimbostratus-Bot
    |HeartRails_Capture/\d
    |Project-Resonance
    |DataXu/\d
    |Cocolyzebot
    |veryhip
    |LinkpadBot
    |MuscatFerret
    |PageThing.com
    |ArchiveBox
    |Choosito
    |datagnionbot
    |WhatCMS
    |httpx
    |scaninfo@(?:expanseinc|paloaltonetworks).com
    |HuaweiWebCatBot
    |Hatena-Favicon
    |Hatena-?Bookmark
    |RyowlEngine/(\d+)
    |OdklBot/(\d+)
    |Mediatoolkitbot
    |ZoominfoBot
    |WeViKaBot/([\d+\.])
    |SEOkicks
    |Plukkie/([\d+\.])
    |proximic;
    |SurdotlyBot/([\d+\.])
    |Gowikibot/([\d+\.])
    |SabsimBot/([\d+\.])
    |LumtelBot/([\d+\.])
    |PiplBot
    |woobot/([\d+\.])
    |Cookiebot/([\d+\.])
    |NetSystemsResearch
    |CensysInspect/([\d+\.])
    |gdnplus.com
    |WellKnownBot/([\d+\.])
    |Adsbot/([\d+\.])
    |MTRobot/([\d+\.])
    |serpstatbot/([\d+\.])
    |colly
    |l9tcpid/v([\d+\.])
    |l9explore/([\d+\.])
    |MegaIndex.ru/([\d+\.])
    |Seekport
    |seolyt/([\d+\.])
    |YaK/([\d+\.])
    |KomodiaBot/([\d+\.])
    |Neevabot/([\d+\.])
    |LinkPreview/([\d+\.])
    |JungleKeyThumbnail/([\d+\.])
    |rocketmonitor(?:\s|bot/)([\d+\.])
    |SitemapParser-VIPnytt/([\d+\.])
    |^Turnitin
    |DMBrowser/\d+|DMBrowser-[UB]V
    |ThinkChaos/
    |DataForSeoBot
    |Discordbot/([\d+.]+)
    |Linespider/([\d+.]+)
    |Cincraw/([\d+.]+)
    |CISPA\sWeb\sAnalyzer
    |IonCrawl
    |Crawldad
    |https://securitytxt-scan.cs.hm.edu/
    |TigerBot/([\d+.]+)
    |TestCrawler/([\d+.]+)
    |CrowdTanglebot/([\d+.]+)
    |Sellers.Guide\sCrawler\sby\sPrimis
    |OnalyticaBot
    |deepnoc
    |Newslitbot/([\d+.]+)
    |um-LN/([\d+.]+)
    |Abonti/([\d+.]+)
    |collection@infegy.com
    |HTTP\sBanner\sDetection\s\(https://security.ipip.net\)
    |ev-crawler/([\d+.]+)
    |webprosbot/([\d+.]+)
    |ELB-HealthChecker
    |Wheregoes.com\sRedirect\sChecker/([\d+.]+)
    |project_patchwatch
    |InternetMeasurement/([\d+.]+)
    |DomainAppender\s/([\d+.]+)
    |FreeWebMonitoring\sSiteChecker/([\d+.]+)
    |Page\sModified\sPinger
    |adstxtlab.com
    |Iframely/([\d+.]+)
    |DomainStatsBot/([\d+.]+)
    |aiHitBot/([\d+.]+)
    |DomainCrawler/
    |DNSResearchBot
    |GitCrawlerBot
    |AdAuth/([\d+.]+)
    |faveeo.com
    |kozmonavt\.
    |CriteoBot/
    |PayPal\sIPN
    |MaCoCu
    |dnt-policy@eff.org
    |InfoTigerBot
    |(?:Birdcrawlerbot|CrawlaDeBot)
    |ScamadviserExternalHit/([\d+.]+)
    |ZaldamoSearchBot
    |AFB/([\d+.]+)
    |SeolytBot/([\d+.]+)
    |LinkWalker/([\d+.]+)
    |RenovateBot/([\d+.]+)
    |INETDEX-BOT/([\d+.]+)
    |NETZZAPPEN
    |SerpReputationManagementAgent/([\d+.]+)
    |panscient.com
    |research@pdrlabs.net
    |Nicecrawler/([\d+.]+)
    |t3versionsBot/([\d+.]+)
    |Crawlson/([\d+.]+)
    |tchelebi/([\d+.]+)
    |JobboerseBot
    |^Lkx-(.*)/([\d+.]+)
    |RepoLookoutBot/([\d+.]+)
    |PATHspider
    |everyfeed-spider/([\d+.]+)
    |Exchange\scheck
    |Sublinq
    |Gregarius/([\d+.]+)
    |COMODO\sDCV
    |Sectigo\sDCV
    |KlarnaBot-(?:DownloadProductImage|EnrichProducts|PriceWatcher)/([\d+.]+)
    |Taboolabot/([\d+.]+)
    |Asana/([\d+.]+)
    |Chrome\sPrivacy\sPreserving\sPrefetch\sProxy
    |URLinspectorBot/([\d+.]+)
    |EntferBot/([\d+.]+)
    |TagInspector/([\d+.]+)
    |pageburst
    |.+diffbot
    |DisqusAdstxtCrawler/([\d+.]+)
    |startmebot/([\d+.]+)
    |2ip\sbot/([\d+.]+)
    |ReqBin\sCurl\sClient/([\d+.]+)
    |XoviBot/([\d+.]+)
    |Overcast/([\d+.]+)\sPodcast\sSync
    |^Verity/([\d+.]+)
    |hackermention
    |BitSightBot/([\d+.]+)
    |Ezgif/([\d+.]+)
    |intelx.io_bot
    |FemtosearchBot/([\d+.]+)
    |AdsTxtCrawler/([\d+.]+)
    |Morningscore
    |Uptime-Kuma/([\d+.]+)
    |ChatGPT-User
    |BrightEdge\sCrawler/([\d+.]+)
    |sfFeedReader/([\d+.]+)
    |[a-z0-9\-_]*((?<!cu|power[\s_]|m[\s_])bot(?![\s_]TAB|[\s_]?5[0-9]|[\s_]Senior|[\s_]Junior)|crawler|crawl|checker|archiver|transcoder|spider)([^a-z]|$)
    #x";
}
