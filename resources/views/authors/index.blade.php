@extends('layout.master')

@section('content')

    <!-- ===== AUTHORS PAGE ===== -->
    <link href="{{ asset('css/front/author/author-list.css') }}" rel="stylesheet">
    <!-- Page Header -->
    <section class="bl-1">
        <div class="bl-2">
            <nav class="bl-3">
                <a href="/" class="bl-4">صفحه اصلی</a>
                <span class="bl-5">/</span>
                <span class="bl-6">نویسندگان</span>
            </nav>
            <h1 class="au-1">
                نویسندگان ما
            </h1>
            <p class="au-2">
                با تیم حرفه‌ای نویسندگان مجله فایر در حوزه هنر، طراحی و معماری آشنا شوید.
            </p>
        </div>
    </section>

    <!-- Authors Stats -->
    <section class="au-3">
        <div class="au-4">
            <div class="au-5">
                <div class="au-6">{{$totalAuthors}}</div>
                <div class="au-7">نویسنده فعال</div>
            </div>
            <div class="au-5">
                <div class="au-6">{{$totalArticles}}</div>
                <div class="au-7">مقاله منتشر شده</div>
            </div>
            <div class="au-5">
                <div class="au-6">{{$totalViews}}</div>
                <div class="au-7">بازدید کل</div>
            </div>
            <div class="au-5">
                <div class="au-6">{{$avgArticles}}</div>
                <div class="au-7">میانگین مقاله</div>
            </div>
        </div>
    </section>

    <!-- Filter Bar -->
    <section class="au-8">
        <div class="au-9">
            <div class="au-10">
                <span class="au-11">مرتب‌سازی:</span>
                <a href="{{request()->fullUrlWithQuery(['sort' => 'newest'])}}" class="au-12">
                    جدیدترین
                </a>
                <a href="{{request()->fullUrlWithQuery(['sort' => 'popular'])}}" class="au-13">
                    محبوب‌ترین
                </a>
                <a href="{{request()->fullUrlWithQuery(['sort' => 'articles'])}}" class="au-14">
                    بیشترین مقاله
                </a>
            </div>
            <div class="au-15">
                نمایش <strong class="au-16">{{$authors->firstItem() ?? 0}}</strong> تا <strong class="au-16">{{$authors->lastItem() ?? 0}}</strong> از <strong class="au-16">{{$authors->total()}}</strong> نویسنده
            </div>
        </div>
    </section>

    <!-- Authors Grid -->
    <section class="au-17">
        <div class="au-18">

            @forelse($authors as $author)
                <div class="au-19">
                    <!-- Cover Image -->
                    <div class="au-20">
                        <div class="au-21"></div>
                        <div class="au-22">
                            <img src="{{$author->avatar ?? 'https://placehold.co/200x200/333/fff?text=' . mb_substr($author->name, 0, 1)}}" alt="{{$author->name}}" class="au-23">
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="au-24">
                        <h3 class="au-25">{{$author->name}}</h3>
                        <p class="au-26">{{$author->role ?? 'نویسنده'}}</p>

                        <!-- Stats -->
                        <div class="au-27">
                            <div class="au-28">
                                <div class="au-29">{{$author->blogs_count ?? 0}}</div>
                                <div class="au-30">مقاله</div>
                            </div>
                            <div class="au-28">
                                <div class="au-29">{{$author->total_views ?? 0}}</div>
                                <div class="au-30">بازدید</div>
                            </div>
                            <div class="au-28">
                                <div class="au-29">{{$author->comments_count ?? 0}}</div>
                                <div class="au-30">نظر</div>
                            </div>
                        </div>

                        <!-- Bio -->
                        <p class="au-31">
                            {{$author->bio ?? 'روزنامه نگار و نویسنده'}}
                        </p>

                        <!-- Social Links -->
                        <div class="au-32">
                            @if($author->twitter)
                                <a href="{{$author->twitter}}" target="_blank" class="au-33">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                                </a>
                            @endif
                            @if($author->instagram)
                                <a href="{{$author->instagram}}" target="_blank" class="au-33">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                                </a>
                            @endif
                            @if($author->website)
                                <a href="{{$author->website}}" target="_blank" class="au-33">
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 014 10 15.3 15.3 0 01-4 10 15.3 15.3 0 01-4-10 15.3 15.3 0 014-10z"></path></svg>
                                </a>
                            @endif
                        </div>

                        <!-- Latest Articles -->
                        @if($latestBlogs && $latestBlogs->count() > 0)
                            <div class="au-34">
                                <div class="au-35">آخرین مقالات</div>
                                <div class="au-36">
                                    @foreach($latestBlogs as $blog)
                                        <a href="/blog/{{$blog->slug}}" class="au-37">
                                            <div class="au-38">
                                                <img src="{{$blog->cover_url}}" alt="{{$blog->title}}" class="au-23">
                                            </div>
                                            <div class="au-39">
                                                <div class="au-40">{{$blog->title}}</div>
                                                <div class="au-41">{{$blog->created_at}}</div>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- View Profile Button -->
                        <a href="/authors/{{$author->id}}" class="au-42">
                            مشاهده پروفایل
                        </a>
                    </div>
                </div>
            @empty
                <div class="au-43">
                    <div class="au-44">👥</div>
                    <h3 class="au-45">هنوز نویسنده‌ای وجود ندارد</h3>
                    <p class="au-46">به زودی نویسندگان جدید به تیم ما ملحق می‌شوند.</p>
                </div>
            @endforelse

        </div>

        <!-- Pagination -->
        @if($authors->hasPages())
            <div class="au-47">
                @if ($authors->onFirstPage())
                    <span class="au-48">‹</span>
                @else
                    <a href="{{ $authors->previousPageUrl() }}" class="au-page-link">‹</a>
                @endif

                @foreach ($authors->getUrlRange(1, $authors->lastPage()) as $page => $url)
                    @if ($page == $authors->currentPage())
                        <span class="au-49">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="au-page-link">{{ $page }}</a>
                    @endif
                @endforeach

                @if ($authors->hasMorePages())
                    <a href="{{ $authors->nextPageUrl() }}" class="au-page-link">›</a>
                @else
                    <span class="au-48">›</span>
                @endif
            </div>
        @endif
    </section>

    <!-- Become an Author CTA -->
    <section class="au-50">
        <div class="au-51">
            <div class="au-52"></div>
            <div class="au-53"></div>

            <div class="au-54">
                <div class="au-55">✍️</div>
                <h2 class="au-56">نویسنده ما شوید!</h2>
                <p class="au-57">
                    اگر در حوزه هنر، طراحی یا معماری تخصص دارید، دانش خود را با هزاران مخاطب به اشتراک بگذارید.
                </p>
                <div class="au-58">
                    <a href="/register" class="au-59">
                        ثبت‌نام نویسنده
                    </a>
                    <a href="/contact" class="au-60">
                        تماس با ما
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
