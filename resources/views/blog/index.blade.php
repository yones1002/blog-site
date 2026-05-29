@extends('layout.master')

@section('content')

    <!-- ===== BLOG LIST PAGE ===== -->
    <link href="{{ asset('css/front/blog/list-blog.css') }}" rel="stylesheet">

    <div class="blog-list-page">

        <!-- Page Header -->
        <section class="page-header bl-1">
            <div class="bl-2">
                <nav class="bl-3">
                    <a target="_self" href="/" class="bl-4">صفحه اصلی</a>
                    <span class="bl-5">/</span>
                    <span class="bl-6">مجله</span>
                </nav>
                <h1 class="bl-7">همه مقالات</h1>
                <p class="bl-8">جدیدترین مطالب درباره هنر، طراحی و معماری</p>
            </div>
        </section>

        <!-- Filter Bar -->
        <section class="bl-filter">
            <div class="bl-filter-inner">
                <div class="bl-filter-left">
                    <span class="bl-filter-label">مرتب‌سازی:</span>
                    <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'newest']) }}"
                       class="filter-btn {{ request('sort', 'newest') == 'newest' ? 'active' : '' }}">
                        🕐 جدیدترین
                    </a>
                    <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'popular']) }}"
                       class="filter-btn {{ request('sort') == 'popular' ? 'active' : '' }}">
                        🔥 محبوب‌ترین
                    </a>
                    <a target="_self" href="{{ request()->fullUrlWithQuery(['sort' => 'oldest']) }}"
                       class="filter-btn {{ request('sort') == 'oldest' ? 'active' : '' }}">
                        📅 قدیمی‌ترین
                    </a>
                </div>
                <div class="bl-filter-right">
                    <span class="bl-filter-count">
                        <strong>{{ $blogs->total() }}</strong> مقاله
                    </span>
                </div>
            </div>
        </section>

        <!-- Blog Grid + Sidebar -->
        <section class="bl-9">

            <!-- Blog Posts Grid -->
            <div class="blog-grid bl-10">

                @forelse($blogs as $index => $blog)
                    <article class="blog-card bl-11" style="animation-delay: {{ $index * 0.06 }}s">
                        <div class="blog-image bl-12">
                            <img src="{{ $blog->cover_url }}" alt="{{ $blog->title }}" class="bl-13" loading="lazy">
                            <div class="bl-14">{{ $blog->category->fa_name ?? 'عمومی' }}</div>
                            <div class="bl-12-overlay"></div>
                        </div>
                        <div class="blog-content bl-15">
                            <div>
                                <div class="bl-16">
                                    <span class="bl-17">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                            <line x1="16" y1="2" x2="16" y2="6"></line>
                                            <line x1="8" y1="2" x2="8" y2="6"></line>
                                            <line x1="3" y1="10" x2="21" y2="10"></line>
                                        </svg>
                                        {{ $blog->created_at->diffForHumans() ?? $blog->created_at }}
                                    </span>
                                    <span class="bl-17">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        {{ $blog->user->name ?? 'نویسنده' }}
                                    </span>
                                    <span class="bl-17">
                                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg>
                                        {{ $blog->read_time ?? 5 }} دقیقه
                                    </span>
                                </div>
                                <h2 class="bl-18">
                                    <a target="_self" href="{{ route('blogs.show', ['type' => $blog->type, 'slug' => $blog->slug]) }}" class="bl-19">
                                        {{ $blog->title }}
                                    </a>
                                </h2>
                                <p class="bl-20">{{ Str::limit($blog->short_detail, 180) }}</p>
                            </div>
                            <div class="bl-21">
                                <a target="_self" href="{{ route('blogs.show', ['type' => $blog->type, 'slug' => $blog->slug]) }}" class="bl-22">
                                    ادامه مطلب
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="bl-23">
                                        <path d="M5 12h14M12 5l7 7-7 7"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </article>
                @empty
                    <div class="bl-empty">
                        <div class="bl-empty-icon">📭</div>
                        <h3 class="bl-empty-title">مقاله‌ای پیدا نشد</h3>
                        <p class="bl-empty-text">عبارت دیگری را جستجو کنید یا فیلترها را پاک کنید</p>
                        <a target="_self" href="{{ route('blogs.index') }}" class="bl-empty-btn">مشاهده همه مقالات</a>
                    </div>
                @endforelse

                <!-- Pagination -->
                @if($blogs->hasPages())
                    <div class="bl-24">
                        @if ($blogs->onFirstPage())
                            <span class="bl-25">‹</span>
                        @else
                            <a target="_self" href="{{ $blogs->previousPageUrl() }}" class="bl-26" aria-label="صفحه قبل">‹</a>
                        @endif

                        @foreach ($blogs->getUrlRange(max(1, $blogs->currentPage()-2), min($blogs->lastPage(), $blogs->currentPage()+2)) as $page => $url)
                            @if ($page == $blogs->currentPage())
                                <span class="bl-27" aria-current="page">{{ $page }}</span>
                            @else
                                <a target="_self" href="{{ $url }}" class="bl-26">{{ $page }}</a>
                            @endif
                        @endforeach

                        @if ($blogs->hasMorePages())
                            <a target="_self" href="{{ $blogs->nextPageUrl() }}" class="bl-26" aria-label="صفحه بعد">›</a>
                        @else
                            <span class="bl-25">›</span>
                        @endif
                    </div>
                @endif

            </div>

            <!-- Sidebar -->
            <aside class="blog-sidebar bl-28">

                <!-- Search Box -->
                <form action="{{ route('blogs.index') }}" method="GET" class="bl-29">
                    <input type="text" name="search" value="{{ request('search') }}"
                           placeholder="جستجو در مقالات..." class="bl-30">
                    <button type="submit" class="bl-31">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                        </svg>
                    </button>
                    @if(request('search'))
                        <a target="_self" href="{{ route('blogs.index') }}" class="bl-31-clear">✕</a>
                    @endif
                </form>

                <!-- Categories -->
                <div class="bl-32">
                    <h3 class="bl-33">دسته‌بندی‌ها</h3>
                    <div class="bl-34">
                        @foreach($categories as $category)
                            <a target="_self" href="{{ route('category.show', ['slug' => $category->slug]) }}" class="bl-35">
                                <span class="bl-35-name">{{ $category->fa_name }}</span>
                                <span class="bl-36">{{ $category->blogs_count ?? 0 }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Recent Posts -->
                <div class="bl-32">
                    <h3 class="bl-33">محبوب‌ترین مقالات</h3>
                    <div class="bl-37">
                        @foreach($favorites as $favorite)
                            <a target="_self" href="{{ route('blogs.show', ['type' => $favorite->type, 'slug' => $favorite->slug]) }}" class="bl-38">
                                <div class="bl-39">
                                    <img src="{{ $favorite->cover_url }}" alt="{{ $favorite->title }}" class="bl-40" loading="lazy">
                                </div>
                                <div class="bl-41">
                                    <div class="bl-42">{{ Str::limit($favorite->title, 40) }}</div>
                                    <div class="bl-43">{{ $favorite->share_time ?? $favorite->created_at->diffForHumans() }}</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Tags Cloud -->
                <div class="bl-32">
                    <h3 class="bl-33">برچسب‌ها</h3>
                    <div class="bl-44">
                        @foreach($tags as $tag)
                            <a target="_self" href="" class="bl-45">{{ $tag->fa_name }}</a>
                        @endforeach
                    </div>
                </div>

                <!-- Newsletter -->
                <div class="bl-newsletter">
                    <div class="bl-newsletter-title">خبرنامه</div>
                    <div class="bl-newsletter-text">از جدیدترین مقالات مطلع شوید</div>
                    <form action="/newsletter" method="POST">
                        @csrf
                        <input type="email" name="email" class="bl-newsletter-input" placeholder="ایمیل شما..." required>
                        <button type="submit" class="bl-newsletter-btn">عضویت</button>
                    </form>
                </div>

            </aside>

        </section>

    </div>

@endsection
