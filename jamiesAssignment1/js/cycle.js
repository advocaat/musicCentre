var words = $('span[id^="word-"]').hide(),
    i = 0;
(function cycle() { 
    words.eq(i).fadeIn('fast')
              .delay(3000)
              .fadeOut('fast', cycle);
    i = ++i % words.length;
})();