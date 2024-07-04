[rss]<item>
<title>{title}</title>
<guid isPermaLink="true">{rsslink}</guid>
<link>{rsslink}</link>
<dc:creator>{rssauthor}</dc:creator>
<pubDate>{rssdate}</pubDate>
<category>{category}</category>
<description><![CDATA[{short-story}]]></description>
</item>[/rss]

[turbo]<item turbo="true">
<turbo:extendedHtml>true</turbo:extendedHtml>
<link>{rsslink}</link>
<author>{rssauthor}</author>
<category>{category}</category>
<pubDate>{rssdate}</pubDate>
<turbo:content><![CDATA[<header><h1>{title}</h1></header>{full-story}]]></turbo:content>
</item>[/turbo]

[dzen]<item>
<title>{title}</title>
<link>{rsslink}</link>
<pdalink>{rsslink}</pdalink>
<guid>{news-id}</guid>
<pubDate>{rssdate}</pubDate>
<category>native-yes</category>
{images}
<content:encoded><![CDATA[{full-story}]]></content:encoded>
</item>[/dzen]