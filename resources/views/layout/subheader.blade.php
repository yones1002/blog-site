<!-- ===== NEWS TICKER ===== -->
<div class="news-ticker">
    <div class="ticker-content">
        <div class="ticker-item">
            @forelse($news as $new)
                <span class="ticker-label">{{$new->category->fa_name}}</span>
                <span>{{$new->title}}</span>
            @empty
                <span>خبری موجود نیست</span>
            @endforelse
        </div>
    </div>
</div>
