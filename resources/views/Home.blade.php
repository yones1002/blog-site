@extends('layout.master')

@section('content')
    <link href="{{ asset('css/front/blog/list-blog.css') }}" rel="stylesheet">
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
            <a href="{{ route('blogs.show',[$slider->type,$slider->slug]) }}" class="btn-primary">نمایش</a>
        </div>
        <div class="hero-image">
            <img src="{{ $slider->cover_url }}" alt="{{ $slider->title }}">
        </div>
    </section>
    <!-- ===== ARTICLES SECTION ===== -->
    <section id="magazine">
        <div class="section-header">
            <h2 class="section-title">مجله</h2>
            <a target="_self" href="{{route('blogs.index')}}" class="section-link">
                همه مقالات
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="articles-grid">
            <div class="articles-list">
                @foreach($articles as $article)
                    <article class="article-card">
                        <div class="article-image">
                            <img src="{{ $article->cover_url }}" alt="{{ $article->title }}">
                        </div>
                        <div class="article-content">
                            <div>
                                <a target="_self" href="{{ route('blogs.show', ['type' => $article->type, 'slug' => $article->slug]) }}" class="bl-19">
                                    <h3 class="article-title">{{$article->title}}</h3>
                                </a>
                                <p class="article-excerpt">{{$article->short_detail}}</p>
                            </div>
                            <div class="article-meta">
                                <div class="article-meta-left">
                                    <div class="meta-item"><span class="meta-label">نویسنده</span><span
                                            class="meta-value">{{$article->user->name}}</span>
                                    </div>
                                    <div class="meta-item"><span class="meta-label"> تاریخ انتشار</span><span
                                            class="meta-value">{{$article->share_time}}</span>
                                    </div>
                                    <a href="{{ route('blogs.show',[$slider->type,$slider->slug]) }}" class="meta-item">
                                        <span class="article-tag">نمایش</span>
                                    </a>
                                </div>
                                <span class="article-tag">{{$article->category->fa_name}}</span>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>

            <aside class="sidebar">
                <div class="sidebar-section">
                    <h3 class="sidebar-title"> دسته بندی های محبوب</h3>
                    <div class="magazine-cover">
                        @foreach($categories as $index => $category)
                            <div class="popular-item">
                                <div class="popular-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="popular-text">
                                    <a target="_self" href="{{ route('category.show', ['slug' => $category->slug]) }}" class="bl-19">
                                        {{ $category->fa_name }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <a href="{{route('category.index')}}" class="btn-primary">نمایش</a>
                </div>

                <div class="sidebar-section">
                    <h3 class="sidebar-title">محبوب‌ترین‌ها</h3>
                    <div class="popular-list">
                        @foreach($favorites as $index => $favorite)
                            <div class="popular-item">
                                <div class="popular-number">
                                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}
                                </div>

                                <div class="popular-text">
                                    <a target="_self" href="{{ route('blogs.show', ['type' => $favorite->type, 'slug' => $favorite->slug]) }}" class="bl-19">
                                        {{ $favorite->title }}
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="sidebar-section newsletter-box">
                    <h3 class="sidebar-title">خبرنامه</h3>
                    <div class="newsletter-title">اخبار طراحی در صندوق ایمیل شما</div>
                    <input type="email" class="newsletter-input" placeholder="ایمیل">
                    <button class="btn-primary">ثبت‌نام</button>
                </div>
            </aside>
        </div>
    </section>

    <!-- ===== AUTHORS SECTION ===== -->
    <section id="authors">
        <div class="section-header">
            <h2 class="section-title">نویسندگان</h2>
            <a target="_self" href="{{route('author.index')}}" class="section-link">
                همه نویسندگان
                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <path d="M5 12h14M12 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="authors-grid">
            @foreach($authors as $author)
                <div class="author-card">
                    <div class="author-avatar">
                        <img src="{{$author->avatar}}" alt="{{$author->name}}">
                    </div>
                    <div class="author-info">
                        <h3>{{$author->name}}</h3>
                    </div>
                    <div class="author-info">
                        <a style="float: left" href="{{ route('author.show',[$author->id]) }}"
                           class="btn-primary">نمایش</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
@endsection
