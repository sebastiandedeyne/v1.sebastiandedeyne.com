<div id="disqus_thread"></div>
<script>
    var disqus_config = function() {
        this.page.url = "{{ $article->url }}";
        this.page.identifier = "{{ $article->title }}";
    };

    (function() {
        var d = document, s = d.createElement('script');
        s.src = '//sebastiandedeyne.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>
