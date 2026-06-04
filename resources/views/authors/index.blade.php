@extends('layout.master')

@section('content')

    <!-- ===== AUTHORS PAGE ===== -->
    <link href="{{ asset('css/front/author/author-list.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/blog/list-blog.css') }}" rel="stylesheet">

    <div class="authors-page">

        <!-- Page Header -->
        <section class="page-header">
            <div class="page-header__inner">
                <nav class="breadcrumb" aria-label="breadcrumb">
                    <a target="_self" href="/" class="breadcrumb__link">صفحه اصلی</a>
                    <span class="breadcrumb__divider">/</span>
                    <span class="breadcrumb__current">نویسندگان</span>
                </nav>
                <h1 class="page-title">نویسندگان ما</h1>
                <p class="page-subtitle">
                    با تیم حرفه‌ای نویسندگان مجله فایر در حوزه هنر، طراحی و معماری آشنا شوید.
                </p>
            </div>
        </section>

        <!-- Search & Filter Bar -->
        <section class="filter-bar">
            <div class="filter-bar__inner">
                <div class="filter-bar__left">
                    <div class="filter-group">
                        <span class="filter-group__label">مرتب‌سازی:</span>

                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                           class="filter-btn {{ request('sort', 'newest') == 'newest' ? 'filter-btn--active' : '' }}">
                            جدیدترین
                        </a>

                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}"
                           class="filter-btn {{ request('sort') == 'popular' ? 'filter-btn--active' : '' }}">
                            محبوب‌ترین
                        </a>

                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'articles']) }}"
                           class="filter-btn {{ request('sort') == 'articles' ? 'filter-btn--active' : '' }}">
                            بیشترین مقاله
                        </a>
                    </div>

                    <form action="{{ route('author.index') }}" method="GET" class="bl-29">
                        <input type="text" name="search" value="{{ request('search') ?? '' }}"
                               placeholder="جستجو نویسنده..." class="bl-30">

                        <button type="submit" class="bl-31">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>

                        @if(request('search'))
                            <a target="_self" href="{{ route('author.index') }}" class="bl-31-clear">✕</a>
                        @endif
                    </form>
                </div>

                <div class="filter-bar__results">
                    نمایش <strong>{{ $authors->firstItem() ?? 0 }}</strong>
                    تا <strong>{{ $authors->lastItem() ?? 0 }}</strong>
                    از <strong>{{ $authors->total() ?? 0 }}</strong> نویسنده
                </div>
            </div>
        </section>

        <!-- Authors Grid -->
        <section class="authors-section">
            <div class="authors-grid" id="authorsGrid">

                @forelse($authors as $index => $author)
                    <div class="author-card" data-name="{{ $author->name ?? 'موجود نیست' }}">

                        <div class="author-card__header">
                            <div class="author-card__avatar">
                                @php
                                    $name = $author->name ?? 'N';
                                    $avatarUrl = $author->avatar;

                                    if (empty($avatarUrl)) {
                                        $firstChar = mb_substr($name, 0, 1);
                                        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($firstChar) . '&background=ff6b6b&color=fff&size=200';
                                    }
                                @endphp

                                <img src="{{ $avatarUrl ?? '' }}"
                                     alt="{{ $author->name ?? 'موجود نیست' }}"
                                     loading="lazy"
                                     onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(mb_substr($author->name ?? 'N', 0, 1)) }}&background=ff6b6b&color=fff&size=200'">
                            </div>
                        </div>

                        <div class="author-card__body">
                            <h3 class="author-card__name">{{ $author->name ?? 'موجود نیست' }}</h3>
                            <p class="author-card__role">{{ $author->role ?? 'نویسنده' }}</p>

                            @if(!empty($author->specialties))
                                <div class="author-card__tags">
                                    @foreach($author->specialties as $spec)
                                        <span class="tag">{{ $spec ?? 'موجود نیست' }}</span>
                                    @endforeach
                                </div>
                            @endif

                            <div class="author-card__stats">
                                <div class="mini-stat">
                                    <div class="mini-stat__value">{{ $author->blogs_count ?? 0 }}</div>
                                    <div class="mini-stat__label">مقاله</div>
                                </div>
                                <div class="mini-stat">
                                    <div class="mini-stat__value">{{ $author->total_views ?? 0 }}</div>
                                    <div class="mini-stat__label">بازدید</div>
                                </div>
                                <div class="mini-stat">
                                    <div class="mini-stat__value">{{ $author->comments_count ?? 0 }}</div>
                                    <div class="mini-stat__label">نظر</div>
                                </div>
                            </div>

                            <p class="author-card__bio">
                                {{ $author->bio ?? 'موجود نیست' }}
                            </p>

                            <div class="author-card__social">
                                @if(!empty($author->twitter))
                                    <a target="_self" href="{{ $author->twitter }}" class="social-icon">
                                        Twitter
                                    </a>
                                @endif

                                @if(!empty($author->instagram))
                                    <a target="_self" href="{{ $author->instagram }}" class="social-icon">
                                        Instagram
                                    </a>
                                @endif

                                @if(!empty($author->website))
                                    <a target="_self" href="{{ $author->website }}" class="social-icon">
                                        Website
                                    </a>
                                @endif
                            </div>

                            <a target="_self" href="/authors/{{ $author->id ?? 0 }}" class="author-card__cta">
                                مشاهده پروفایل
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="empty-state" id="emptyState">
                        <div class="empty-state__icon">👥</div>
                        <h3 class="empty-state__title">هنوز نویسنده‌ای وجود ندارد</h3>
                        <p class="empty-state__text">به زودی نویسندگان جدید به تیم ما ملحق می‌شوند.</p>
                    </div>
                @endforelse

            </div>

            @if($authors->hasPages())
                <div class="pagination">
                    @if ($authors->onFirstPage())
                        <span class="pagination__arrow--disabled">‹</span>
                    @else
                        <a target="_self" href="{{ $authors->previousPageUrl() }}" class="pagination__link">‹</a>
                    @endif

                    @foreach ($authors->getUrlRange(1, $authors->lastPage()) as $page => $url)
                        @if ($page == $authors->currentPage())
                            <span class="pagination__current">{{ $page }}</span>
                        @else
                            <a target="_self" href="{{ $url }}" class="pagination__link">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($authors->hasMorePages())
                        <a target="_self" href="{{ $authors->nextPageUrl() }}" class="pagination__link">›</a>
                    @else
                        <span class="pagination__arrow--disabled">›</span>
                    @endif
                </div>
            @endif
        </section>

    </div>

@endsection
