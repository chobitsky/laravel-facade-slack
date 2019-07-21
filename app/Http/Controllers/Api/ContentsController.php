<?php

namespace App\Http\Controllers\Api;

use Feed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Icicle\Awaitable;
use Icicle\Coroutine\Coroutine;
use Icicle\Loop;

class ContentsController extends Controller
{
    public function list()
    {
        $urls = [
            //"hatena"    => "http://feeds.feedburner.com/hatena/b/hotentry",
            "lifehacker"    => "http://feeds.lifehacker.jp/rss/lifehacker/index.xml",
            "niconico"      => "https://news.nicovideo.jp/ranking/comment?rss=2.0",
            "dpz"           => "http://portal.nifty.com/rss/headline.rdf",
        ];

        $data = [];
        foreach ($urls as $name => $url) {
            $rss = Feed::loadRss($url);
            $data[$name] = $this->getItems($rss);
        }

        return \Response::json($data);
    }

    private function getItems($rss) {
        $rssFeeds = [];
        foreach ($rss->item as $item) {
            $rssFeeds[] = [
                "title"         => (string)$item->title,
                "Link"          => (string)$item->link,
                "Timestamp"     => (string)$item->timestamp,
                "dateTime"      => date("Y-m-d H:i:s", (string)$item->timestamp),
                "Description"   => (string)$item->description,
            ];
        }
        return $rssFeeds;
    }
}
