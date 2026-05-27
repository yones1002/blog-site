<!-- ===== NEWS TICKER ===== -->
<div class="news-ticker">
    <div class="ticker-content">
        <div class="ticker-item">
            @foreach($news as $new)
                <span class="ticker-label">{{$new->category->fa_name}}</span>
                <span>{{$new->title}}</span>
            @endforeach
        </div>
    </div>
</div>
