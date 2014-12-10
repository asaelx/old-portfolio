var feed = new Instafeed({
    get: 'user',
    userId: 371921,
    accessToken: '371921.467ede5.a093aec36e6a40619a1c40e40edc9837',
    template: '<li class="option"><a class="link" href="{{link}}" target="_blank"><img src="{{image}}" class="img"></a></li>',
    limit: 15
});
feed.run();