@extends('layout.master')

@section('content')

    <!-- ===== BLOG LIST PAGE ===== -->
    <link href="{{ asset('css/front/list-blog.css') }}" rel="stylesheet">
    <!-- Page Header / Breadcrumb -->
    <section class="page-header bl-1">
        <div class="bl-2">
            <nav
                class="bl-3">
                <a href="/" class="bl-4">صفحه
                    اصلی</a>
                <span class="bl-5">/</span>
                <span class="bl-6">مجله</span>
            </nav>
            <h1 class="bl-7">
                همه مقالات
            </h1>
            <p class="bl-8">
                جدیدترین مطالب درباره هنر، طراحی و معماری
            </p>
        </div>
    </section>

    <!-- Blog Grid + Sidebar -->
    <section
        class="bl-9">

        <!-- Blog Posts Grid -->
        <div class="blog-grid bl-10">

            @foreach($blogs as $blog)
                <article class="blog-card bl-11">
                    <div class="blog-image bl-12">
                        <img src="{{$blog->cover_url}}" alt="{{$blog->title}}"
                             class="bl-13">
                        <div
                            class="bl-14">
                            {{$blog->category->fa_name}}
                        </div>
                    </div>
                    <div class="blog-content bl-15">
                        <div>
                            <div
                                class="bl-16">
                        <span class="bl-17">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line
                                    x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line
                                    x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{$blog->created_at}}
                        </span>
                                <span class="bl-17">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle
                                    cx="12" cy="7" r="4"></circle></svg>
                            {{$blog->user->name}}
                        </span>
                                <span class="bl-17">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline
                                    points="12 6 12 12 16 14"></polyline></svg>
                            ۵ دقیقه
                        </span>
                            </div>
                            <h2 class="bl-18">
                                <a href="#" class="bl-19">{{$blog->title}}</a>
                            </h2>
                            <p class="bl-20">
                                {{$blog->short_detail}}
                            </p>
                        </div>
                        <div class="bl-21">
                            <a href="{{ route('blogs.show', ['type' => $blog->type, 'slug' => $blog->slug]) }}"
                               class="bl-22">
                                ادامه مطلب
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" class="bl-23">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach

            <!-- Pagination -->
            <div class="bl-24">

                {{-- Previous --}}
                @if ($blogs->onFirstPage())
                    <span
                        class="bl-25">
            ‹
        </span>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}"
                       class="bl-26"
                       onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                        ‹
                    </a>
                @endif

                {{-- Pages --}}
                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)

                    @if ($page == $blogs->currentPage())
                        <span
                            class="bl-27">
                {{ $page }}
            </span>
                    @else
                        <a href="{{ $url }}"
                           class="bl-26"
                           onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                           onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                            {{ $page }}
                        </a>
                    @endif

                @endforeach

                {{-- Next --}}
                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}"
                       class="bl-26"
                       onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                        ›
                    </a>
                @else
                    <span
                        class="bl-25">
            ›
        </span>
                @endif

            </div>

        </div>

        <!-- Sidebar -->
        <aside class="blog-sidebar bl-28">

            <!-- Search Box -->
            <form action="{{ route('blogs.index') }}" method="GET" class="bl-29">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="جستجو در مقالات..."
                       class="bl-30">

                <button type="submit"
                        class="bl-31">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>

            <!-- Categories -->
            <div
                class="bl-32">
                <h3 class="bl-33">
                    دسته‌بندی‌ها</h3>
                <div class="bl-34">
                    @foreach($categories as $category)
                        <a href="#"
                           class="bl-35">

                            <span>{{ $category->fa_name }}</span>

                            <span
                                class="bl-36">
                                {{ $category->blogs_count }}
                            </span>

                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Recent Posts -->
            <div
                class="bl-32">
                <h3 class="bl-33">
                    محبوب ترین مقالات</h3>
                <div class="bl-37">
                    @foreach($favorites as $favorite)
                        <a href="#" class="bl-38">
                            <div class="bl-39">
                                <img src="{{$blog->cover_url}}" alt="{{$blog->title}}"
                                     class="bl-40">
                            </div>
                            <div class="bl-41">
                                <div
                                    class="bl-42">
                                    {{$favorite->title}}
                                </div>
                                <div class="bl-43">{{$favorite->share_time}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Tags Cloud -->
            <div
                class="bl-32">
                <h3 class="bl-33">
                    برچسب‌ها</h3>
                <div class="bl-44">
                    @foreach($tags as $tag)
                        <a href="#"
                           class="bl-45">{{$tag->fa_name}}</a>
                    @endforeach
                </div>
            </div>

        </aside>

    </section>

@endsection
