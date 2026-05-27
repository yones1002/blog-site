<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">{{$slider->title}}</h1>
        <p class="hero-excerpt"
           style="font-size: 18px; line-height: 1.8; color: rgba(255,255,255,0.6); margin-top: 20px;">
            {{$slider->short_detail}}
        </p>
        <div class="hero-meta">
            <div class="meta-item">
                <span class="meta-label">نویسنده</span>
                <span class="meta-value">{{$slider->user->name}}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">تاریخ</span>
                <span class="meta-value">{{$slider->share_time}}</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">مدت</span>
                <span class="meta-value">۱ دقیقه</span>
            </div>
        </div>
        <span class="hero-badge">{{$slider->category->fa_name}}</span>
    </div>
    <div class="hero-image">
        <img src="{{'http://localhost:8181/storage/'.$slider->cover}}" alt="Featured Article">
    </div>
</section>
