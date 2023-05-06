@extends('layouts.main')

@section('title')
    Post
@endsection

@section('body')
<div class="container-md">
<div class="row">
    <div class="col-md-5 mx-auto">
    <h1>{{$post->title}}</h1>
    <p>{{$post->body}}</p>
    <a class="btn btn-success pull-right mb-5" href="{{route('posts.index')}}">Back</a>
</div>
<div class="col-md-5 mx-auto">
    <div id="disqus_thread"></div>
    <script>
        /**
        *  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
        *  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables    */
        /*
        var disqus_config = function () {
        this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
        this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
        };
        */
        (function() { // DON'T EDIT BELOW THIS LINE
        var d = document, s = d.createElement('script');
        s.src = 'https://mysite-phdzty9spx.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
        })();
    </script>
    <noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>

    <script id="dsq-count-scr" src="//mysite-phdzty9spx.disqus.com/count.js" async></script>
</div>
</div>

</div>
@endsection
