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

        <!-- Authors Stats -->

        <!-- Search & Filter Bar -->
        <section class="filter-bar">
            <div class="filter-bar__inner">
                <div class="filter-bar__left">
                    <div class="filter-group">
                        <span class="filter-group__label">مرتب‌سازی:</span>
                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}" class="filter-btn {{ request('sort', 'newest') == 'newest' ? 'filter-btn--active' : '' }}">
                            جدیدترین
                        </a>
                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}" class="filter-btn {{ request('sort') == 'popular' ? 'filter-btn--active' : '' }}">
                            محبوب‌ترین
                        </a>
                        <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'articles']) }}" class="filter-btn {{ request('sort') == 'articles' ? 'filter-btn--active' : '' }}">
                            بیشترین مقاله
                        </a>
                    </div>

                    <form action="{{ route('author.index') }}" method="GET" class="bl-29">
                        <input type="text" name="search" value="{{ request('search') }}"
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
                    نمایش <strong>{{ $authors->firstItem() ?? 0 }}</strong> تا <strong>{{ $authors->lastItem() ?? 0 }}</strong> از <strong>{{ $authors->total() }}</strong> نویسنده
                </div>
            </div>
        </section>

        <!-- Authors Grid -->
        <section class="authors-section">
            <div class="authors-grid" id="authorsGrid">

                @forelse($authors as $index => $author)
                    <div class="author-card" data-name="{{ $author->name }}">

                        <!-- Cover & Avatar -->
                        <div class="author-card__header">
                            <div class="author-card__avatar">
                                @php
                                    $avatarUrl = $author->avatar;
                                    if (empty($avatarUrl)) {
                                        $firstChar = mb_substr($author->name, 0, 1);
                                        $avatarUrl = 'https://ui-avatars.com/api/?name=' . urlencode($firstChar) . '&background=ff6b6b&color=fff&size=200';
                                    }
                                @endphp
                                <img src="{{ $avatarUrl }}" alt="{{ $author->name }}" loading="lazy" onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode(mb_substr($author->name, 0, 1)) }}&background=ff6b6b&color=fff&size=200'">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="author-card__body">
                            <h3 class="author-card__name">{{ $author->name }}</h3>
                            <p class="author-card__role">{{ $author->role ?? 'نویسنده' }}</p>

                            @if(!empty($author->specialties))
                                <div class="author-card__tags">
                                    @foreach($author->specialties as $spec)
                                        <span class="tag">{{ $spec }}</span>
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
                                {{ $author->bio ?? 'روزنامه‌نگار و نویسنده فعال در حوزه هنر و طراحی.' }}
                            </p>

                            <div class="author-card__social">
                                @if(!empty($author->twitter))
                                    <a target="_self" href="{{ $author->twitter }}" target="_blank" class="social-icon" aria-label="Twitter">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                    </a>
                                @endif
                                @if(!empty($author->instagram))
                                    <a target="_self" href="{{ $author->instagram }}" target="_blank" class="social-icon" aria-label="Instagram">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                    </a>
                                @endif
                                @if(!empty($author->website))
                                    <a target="_self" href="{{ $author->website }}" target="_blank" class="social-icon" aria-label="Website">
                                        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path></svg>
                                    </a>
                                @endif
                            </div>

                            <a target="_self" href="/authors/{{ $author->id }}" class="author-card__cta">
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

        <!-- Become an Author CTA -->
        <section class="cta-section">
            <div class="cta-section__inner">
                <div class="cta-section__glow--top"></div>
                <div class="cta-section__glow--bottom"></div>

                <div class="cta-section__content">
                    <div class="cta-section__icon">✍️</div>
                    <h2 class="cta-section__title">نویسنده ما شوید!</h2>
                    <p class="cta-section__text">
                        اگر در حوزه هنر، طراحی یا معماری تخصص دارید، دانش خود را با هزاران مخاطب به اشتراک بگذارید.
                    </p>
                    <div class="cta-section__actions">
                        <a target="_self" href="/register" class="btn-primary">ثبت‌نام نویسنده</a>
                        <a target="_self" href="/contact" class="btn-secondary">تماس با ما</a>
                    </div>
                </div>
            </div>
        </section>

    </div>

@endsection
