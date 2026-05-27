@extends('layout.master')

@section('content')

    <!-- ===== BLOG LIST PAGE ===== -->

    <!-- Page Header / Breadcrumb -->
    <section class="page-header"
             style="padding: 60px 5% 40px; background: linear-gradient(135deg, rgba(255,107,107,0.05), rgba(254,202,87,0.05)); border-bottom: 1px solid rgba(255,255,255,0.05);">
        <div style="max-width: 1400px; margin: 0 auto;">
            <nav
                style="font-size: 14px; color: rgba(255,255,255,0.5); margin-bottom: 20px; direction: rtl; text-align: right;">
                <a href="/" style="color: rgba(255,255,255,0.5); text-decoration: none; transition: color 0.3s;">صفحه
                    اصلی</a>
                <span style="margin: 0 10px;">/</span>
                <span style="color: #ff6b6b;">مجله</span>
            </nav>
            <h1 style="font-size: clamp(32px, 5vw, 56px); font-weight: 800; text-transform: uppercase; letter-spacing: -1px; background: linear-gradient(135deg, #fff, #666); -webkit-background-clip: text; -webkit-text-fill-color: transparent; background-clip: text; text-align: right; direction: rtl;">
                همه مقالات
            </h1>
            <p style="font-size: 18px; color: rgba(255,255,255,0.6); margin-top: 15px; text-align: right; direction: rtl;">
                جدیدترین مطالب درباره هنر، طراحی و معماری
            </p>
        </div>
    </section>

    <!-- Blog Grid + Sidebar -->
    <section
        style="padding: 60px 5%; max-width: 1400px; margin: 0 auto; display: grid; grid-template-columns: 1fr 350px; gap: 50px; direction: rtl;">

        <!-- Blog Posts Grid -->
        <div class="blog-grid" style="display: flex; flex-direction: column; gap: 40px;">

            @foreach($blogs as $blog)
                <article class="blog-card"
                         style="display: grid; grid-template-columns: 300px 1fr; gap: 30px; background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.06); border-radius: 20px; overflow: hidden; transition: all 0.4s ease; direction: rtl;">
                    <div class="blog-image" style="position: relative; overflow: hidden; min-height: 250px;">
                        <img src="{{$blog->cover_url}}" alt="{{$blog->title}}"
                             style="width: 100%; height: 100%; object-fit: cover; display: block; transition: transform 0.5s ease;">
                        <div
                            style="position: absolute; top: 20px; right: 20px; background: linear-gradient(135deg, #ff6b6b, #feca57); color: #000; padding: 6px 16px; border-radius: 50px; font-size: 12px; font-weight: 700; text-transform: uppercase;">
                            {{$blog->category->fa_name}}
                        </div>
                    </div>
                    <div class="blog-content"
                         style="padding: 30px; display: flex; flex-direction: column; justify-content: space-between; text-align: right;">
                        <div>
                            <div
                                style="display: flex; gap: 20px; font-size: 13px; color: rgba(255,255,255,0.5); margin-bottom: 15px; flex-wrap: wrap;">
                        <span style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line
                                    x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line
                                    x1="3" y1="10" x2="21" y2="10"></line></svg>
                            {{$blog->created_at}}
                        </span>
                                <span style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle
                                    cx="12" cy="7" r="4"></circle></svg>
                            {{$blog->user->name}}
                        </span>
                                <span style="display: flex; align-items: center; gap: 6px;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                 stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline
                                    points="12 6 12 12 16 14"></polyline></svg>
                            ۵ دقیقه
                        </span>
                            </div>
                            <h2 style="font-size: 26px; font-weight: 700; line-height: 1.4; margin-bottom: 15px; color: #fff; transition: color 0.3s;">
                                <a href="#" style="color: inherit; text-decoration: none;">{{$blog->title}}</a>
                            </h2>
                            <p style="font-size: 15px; line-height: 1.8; color: rgba(255,255,255,0.6);">
                                {{$blog->short_detail}}
                            </p>
                        </div>
                        <div style="margin-top: 20px;">
                            <a href="#"
                               style="display: inline-flex; align-items: center; gap: 8px; color: #ff6b6b; font-size: 14px; font-weight: 600; text-decoration: none; transition: gap 0.3s;">
                                ادامه مطلب
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                     stroke-width="2" style="transform: rotate(180deg);">
                                    <path d="M5 12h14M12 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            @endforeach

            <!-- Pagination -->
            <div style="display:flex;justify-content:center;gap:10px;margin-top:40px;direction:rtl;">

                {{-- Previous --}}
                @if ($blogs->onFirstPage())
                    <span
                        style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);color:rgba(255,255,255,0.2);cursor:not-allowed;">
            ‹
        </span>
                @else
                    <a href="{{ $blogs->previousPageUrl() }}"
                       style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:rgba(255,255,255,0.7);text-decoration:none;transition:all .3s;"
                       onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                        ‹
                    </a>
                @endif

                {{-- Pages --}}
                @foreach ($blogs->getUrlRange(1, $blogs->lastPage()) as $page => $url)

                    @if ($page == $blogs->currentPage())
                        <span
                            style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:linear-gradient(135deg,#ff6b6b,#feca57);color:#000;font-weight:700;box-shadow:0 10px 25px rgba(255,107,107,0.2);">
                {{ $page }}
            </span>
                    @else
                        <a href="{{ $url }}"
                           style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:rgba(255,255,255,0.7);text-decoration:none;transition:all .3s;"
                           onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                           onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                            {{ $page }}
                        </a>
                    @endif

                @endforeach

                {{-- Next --}}
                @if ($blogs->hasMorePages())
                    <a href="{{ $blogs->nextPageUrl() }}"
                       style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.05);border:1px solid rgba(255,255,255,0.1);color:rgba(255,255,255,0.7);text-decoration:none;transition:all .3s;"
                       onmouseover="this.style.background='linear-gradient(135deg,#ff6b6b,#feca57)';this.style.color='#000';"
                       onmouseout="this.style.background='rgba(255,255,255,0.05)';this.style.color='rgba(255,255,255,0.7)';">
                        ›
                    </a>
                @else
                    <span
                        style="width:45px;height:45px;display:flex;align-items:center;justify-content:center;border-radius:12px;background:rgba(255,255,255,0.03);border:1px solid rgba(255,255,255,0.05);color:rgba(255,255,255,0.2);cursor:not-allowed;">
            ›
        </span>
                @endif

            </div>

        </div>

        <!-- Sidebar -->
        <aside class="blog-sidebar" style="display: flex; flex-direction: column; gap: 30px;">

            <!-- Search Box -->
            <form action="{{ route('blogs.index') }}" method="GET" style="position: relative;">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="جستجو در مقالات..."
                       style="width: 100%; padding: 15px 45px 15px 15px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; color: #fff; font-size: 14px; outline: none; transition: all 0.3s; font-family: inherit;">

                <button type="submit"
                        style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); background: none; border: none; color: rgba(255,255,255,0.5); cursor: pointer; padding: 5px;">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </form>

            <!-- Categories -->
            <div
                style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; padding: 25px; direction: rtl; text-align: right;">
                <h3 style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.5); margin-bottom: 20px;">
                    دسته‌بندی‌ها</h3>
                <div style="display: flex; flex-direction: column; gap: 5px;">
                    @foreach($categories as $category)
                        <a href="#"
                           style="display: flex; justify-content: space-between; align-items: center; padding: 12px 0; color: rgba(255,255,255,0.7); text-decoration: none; border-bottom: 1px solid rgba(255,255,255,0.05); transition: all 0.3s; font-size: 15px;">

                            <span>{{ $category->fa_name }}</span>

                            <span
                                style="background: rgba(255,255,255,0.08); padding: 4px 10px; border-radius: 20px; font-size: 12px; color: rgba(255,255,255,0.5);">
                                {{ $category->blogs_count }}
                            </span>

                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Recent Posts -->
            <div
                style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; padding: 25px; direction: rtl; text-align: right;">
                <h3 style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.5); margin-bottom: 20px;">
                    محبوب ترین مقالات</h3>
                <div style="display: flex; flex-direction: column; gap: 18px;">
                    @foreach($favorites as $favorite)
                        <a href="#" style="display: flex; gap: 15px; text-decoration: none; color: inherit;">
                            <div style="width: 70px; height: 70px; border-radius: 12px; overflow: hidden; flex-shrink: 0;">
                                <img src="{{$blog->cover_url}}" alt="{{$blog->title}}"
                                     style="width: 100%; height: 100%; object-fit: cover;">
                            </div>
                            <div style="flex: 1;">
                                <div
                                    style="font-size: 14px; font-weight: 600; color: #fff; line-height: 1.5; margin-bottom: 6px;">
                                    {{$favorite->title}}
                                </div>
                                <div style="font-size: 12px; color: rgba(255,255,255,0.5);">{{$favorite->share_time}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Tags Cloud -->
            <div
                style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 20px; padding: 25px; direction: rtl; text-align: right;">
                <h3 style="font-size: 14px; font-weight: 700; text-transform: uppercase; letter-spacing: 2px; color: rgba(255,255,255,0.5); margin-bottom: 20px;">
                    برچسب‌ها</h3>
                <div style="display: flex; flex-wrap: wrap; gap: 8px;">
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">هنر</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">طراحی</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">معماری</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">عکاسی</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">نقاشی</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">خیابانی</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">مدرن</a>
                    <a href="#"
                       style="padding: 8px 16px; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 50px; color: rgba(255,255,255,0.7); text-decoration: none; font-size: 13px; transition: all 0.3s;">مجسمه</a>
                </div>
            </div>

        </aside>

    </section>

@endsection
