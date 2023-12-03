function urlTo(relativeUrl) {
	return document.body.getAttribute("data-root") + relativeUrl;
};

Storage.prototype.setObject = function(key, value) {
	this.setItem(key, JSON.stringify(value));
}

Storage.prototype.getObject = function(key) {
	var value = this.getItem(key);
	return value && JSON.parse(value) || {};
}

var resources = {
	en: {
		'favourite': 'FAV',
		'history': "History",
		'trending': "Trend",
		"hottest": "Hottest",
		'recommended': "REC.",
		'best': "Best",
		'play': "Play video",
		'latest': "Latest",
		"search": "Search",
		"websites": "More Websites"
	},
	ko: {
		'favourite': '즐겨 찾기',
		'history': '역사',
		'trending': "인기있는",
		"hottest": "뜨거운",
		'recommended': "권장",
		'best': "최고",
		'play': "비디오 재생",
		'latest': "최신의",
		"search": "수색",
		"websites": "더 많은 사이트"
	},
	ja: {
		'favourite': 'お気に入り',
		'history': "歴史",
		'trending': "人気",
		"hottest": "ホット",
		'recommended': "推奨",
		'best': "最高",
		'play': "ビデオを再生",
		'latest': "最新",
		"search": "サーチ",
		"websites": "その他のサイト"
	}
};

var language = navigator.language.replace(/\-.*/, "");
$("[data-i18n]").each(function() {
	var key = $(this).data("i18n");
	if (resources[language] != undefined && resources[language][key] != undefined) {
		$(this).text(resources[language][key]);
	}
});


$(".links a").click(function() {
	var href = $(this).attr("href");
	ga('send', {
		hitType: 'event',
		eventCategory: 'Link',
		eventAction: 'Click',
		eventLabel: (new URL(href)).hostname
	});
});
