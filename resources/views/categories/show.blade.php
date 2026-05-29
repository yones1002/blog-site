@extends('layout.master')

@section('content')

    <!-- ===== SINGLE CATEGORY PAGE ===== -->
    <link href="{{ asset('css/front/category/show-category.css') }}" rel="stylesheet">

    <div class="single-category-page">

        <!-- Category Hero Header -->
        <section class="bl-1">
            <div class="bl-2">
                <nav class="bl-3">
                    <a target="_self" href="/" class="bl-4">صفحه اصلی</a>
                    <span class="bl-5">/</span>
                    <a target="_self" href="/categories" class="bl-4">دسته‌بندی‌ها</a>
                    <span class="bl-5">/</span>
                    <span class="bl-6">{{ $category->fa_name }}</span>
                </nav>

                <div class="sc-1">
                    <div class="sc-2">
                        {{ $category->icon ?? '🎨' }}
                    </div>
                    <div class="sc-3">
                        <h1 class="sc-4">{{ $category->fa_name }}</h1>
                        <p class="sc-5">
                            {{ $category->description ?? 'مقالات منتخب و جدیدترین مطالب در زمینه ' . $category->fa_name . ' را در این صفحه مطالعه کنید.' }}
                        </p>
                    </div>
                </div>

                <div class="sc-6">
                    <div class="sc-7">
                        <div class="sc-8" data-count="{{ $category->blogs_count }}">{{ $category->blogs_count }}</div>
                        <div class="sc-9">مقاله منتشر شده</div>
                    </div>
                    <div class="sc-7">
                        <div class="sc-8" data-count="{{ $authors->count() ?? 4 }}">{{ $authors->count() ?? 4 }}</div>
                        <div class="sc-9">نویسنده فعال</div>
                    </div>
                    <div class="sc-7">
                        <div class="sc-8">{{ $lastPostDate ?? 'امروز' }}</div>
                        <div class="sc-9">آخرین بروزرسانی</div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Featured Post -->
        @if($featuredBlog)
            <section class="sc-10">
                <div class="sc-11">✨ مقاله ویژه</div>
                <a target="_self" href="/blog/{{ $featuredBlog->type }}/{{ $featuredBlog->slug }}" class="sc-12">
                    <div class="sc-13">
                        <img src="{{ $featuredBlog->cover_url }}" alt="{{ $featuredBlog->title }}" class="sc-14" loading="eager">
                        <div class="sc-15">ویژه</div>
                        <div class="sc-13-overlay"></div>
                    </div>
                    <div class="sc-16">
                        <div class="sc-17">
                            <span class="sc-18">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                                {{ $featuredBlog->created_at->diffForHumans() ?? $featuredBlog->created_at }}
                            </span>
                            <span class="sc-18">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                {{ $featuredBlog->user->name ?? 'نویسنده' }}
                            </span>
                            <span class="sc-18">
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                                {{ $featuredBlog->time ?? 5 }} دقیقه
                            </span>
                        </div>
                        <h2 class="sc-19">{{ $featuredBlog->title }}</h2>
                        <p class="sc-20">{{ $featuredBlog->short_detail }}</p>
                        <div class="sc-21">
                            ادامه مطلب
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sc-22"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </div>
                    </div>
                </a>
            </section>
        @endif

        <!-- Filter Bar -->
        <section class="sc-23">
            <div class="sc-24">
                <div class="sc-25">
                    <span class="sc-26">مرتب‌سازی:</span>
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
                <div class="sc-30">
                    نمایش <strong class="sc-31">{{ $blogs->firstItem() ?? 0 }}</strong> تا <strong class="sc-31">{{ $blogs->lastItem() ?? 0 }}</strong> از <strong class="sc-31">{{ $blogs->total() }}</strong> مقاله
                </div>
            </div>
        </section>

        <!-- Masonry Blog Grid -->
        <section class="sc-32">
            <div class="sc-33">

                @forelse($blogs as $index => $blog)
                    @if($index == 0 && !$featuredBlog)
                        <!-- First item large -->
                        <article class="sc-34">
                            <div class="sc-35">
                                <img src="{{ $blog->cover_url }}" alt="{{ $blog->title }}" class="sc-36" loading="lazy">
                                <div class="sc-37">{{ $blog->category->fa_name ?? $category->fa_name }}</div>
                            </div>
                            <div class="sc-38">
                                <div class="sc-39">
                                    <span class="sc-18">{{ $blog->created_at->diffForHumans() ?? $blog->created_at }}</span>
                                    <span class="sc-18">{{ $blog->user->name ?? 'نویسنده' }}</span>
                                    <span class="sc-18">{{ $blog->time ?? 5 }} دقیقه</span>
                                </div>
                                <h2 class="sc-40">
                                    <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="sc-41">{{ $blog->title }}</a>
                                </h2>
                                <p class="sc-42">{{ Str::limit($blog->short_detail, 150) }}</p>
                                <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="sc-43">
                                    ادامه مطلب
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sc-22"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </article>
                    @else
                        <!-- Normal card -->
                        <article class="sc-44">
                            <div class="sc-45">
                                <img src="{{ $blog->cover_url }}" alt="{{ $blog->title }}" class="sc-36" loading="lazy">
                                <div class="sc-37 sc-37-small">{{ $blog->category->fa_name ?? $category->fa_name }}</div>
                            </div>
                            <div class="sc-46">
                                <div class="sc-47">
                                    <span>{{ $blog->created_at->diffForHumans() ?? $blog->created_at }}</span>
                                    <span>{{ $blog->time ?? 5 }} دقیقه</span>
                                </div>
                                <h3 class="sc-48">
                                    <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="sc-41">{{ $blog->title }}</a>
                                </h3>
                                <p class="sc-49">{{ Str::limit($blog->short_detail, 100) }}</p>
                                <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="sc-43 sc-43-small">
                                    ادامه
                                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sc-22"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                                </a>
                            </div>
                        </article>
                    @endif
                @empty
                    <div class="sc-50">
                        <div class="sc-51">📂</div>
                        <h3 class="sc-52">هنوز مقاله‌ای وجود ندارد</h3>
                        <p class="sc-53">به زودی مقالات جدیدی در این دسته‌بندی منتشر خواهد شد.</p>
                        @if(auth()->check() && auth()->user()->can('write'))
                            <a target="_self" href="/write?categories={{ $category->id }}" class="sc-53-btn">اولین مقاله را بنویسید ✍️</a>
                        @endif
                    </div>
                @endforelse

            </div>

            <!-- Pagination -->
            @if($blogs->hasPages())
                <div class="sc-54">
                    @if ($blogs->onFirstPage())
                        <span class="sc-55">‹</span>
                    @else
                        <a target="_self" href="{{ $blogs->previousPageUrl() }}" class="sc-page-link" aria-label="صفحه قبل">‹</a>
                    @endif

                    @foreach ($blogs->getUrlRange(max(1, $blogs->currentPage()-2), min($blogs->lastPage(), $blogs->currentPage()+2)) as $page => $url)
                        @if ($page == $blogs->currentPage())
                            <span class="sc-56" aria-current="page">{{ $page }}</span>
                        @else
                            <a target="_self" href="{{ $url }}" class="sc-page-link">{{ $page }}</a>
                        @endif
                    @endforeach

                    @if ($blogs->hasMorePages())
                        <a target="_self" href="{{ $blogs->nextPageUrl() }}" class="sc-page-link" aria-label="صفحه بعد">›</a>
                    @else
                        <span class="sc-55">›</span>
                    @endif
                </div>
            @endif
        </section>

        <!-- Authors Section -->
        @if($authors->count() > 0)
            <section class="sc-57">
                <div class="sc-58">
                    <div class="sc-59">
                        <h2 class="sc-60">نویسندگان این دسته</h2>
                        <p class="sc-61">با نویسندگان فعال در حوزه {{ $category->fa_name }} آشنا شوید</p>
                    </div>
                    <div class="sc-62">
                        @foreach($authors as $author)
                            <a target="_self" href="/authors/{{ $author->id }}" class="sc-63 author-card">
                                <div class="sc-64">
                                    <img src="{{ $author->avatar ?? 'https://placehold.co/150x150/222/fff?text='.mb_substr($author->name, 0, 1) }}" alt="{{ $author->name }}" class="sc-65" loading="lazy">
                                </div>
                                <h4 class="sc-66">{{ $author->name }}</h4>
                                <p class="sc-67">{{ $author->role ?? 'نویسنده' }}</p>
                                <div class="sc-68">{{ $author->blogs_count ?? 5 }} مقاله</div>
                            </a>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <!-- Related Categories -->
        @if($relatedCategories->count() > 0)
            <section class="sc-69">
                <div class="sc-70">
                    <h2 class="sc-71">دسته‌بندی‌های مرتبط</h2>
                    <p class="sc-61">موضوعات مشابه که ممکن است علاقه‌مند باشید</p>
                </div>
                <div class="sc-72">
                    @foreach($relatedCategories as $cat)
                        <a target="_self" href="/categories/{{ $cat->slug }}" class="sc-73 cat-card">
                            <div class="sc-74">
                                {{ $cat->image ?? '📁' }}
                            </div>
                            <div class="sc-75">
                                <h4 class="sc-76">{{ $cat->fa_name }}</h4>
                                <p class="sc-77">{{ $cat->blogs_count ?? 5 }} مقاله</p>
                            </div>
                            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="sc-78"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

    </div>

@endsection
