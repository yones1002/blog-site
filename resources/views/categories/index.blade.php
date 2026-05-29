@extends('layout.master')

@section('content')

    <link href="{{ asset('css/front/category/list-category.css') }}" rel="stylesheet">

    <div class="category-page">

        <!-- HEADER -->
        <section class="bl-1">
            <div class="bl-2">

                <nav class="bl-3">
                    <a target="_self" href="/" class="bl-4">صفحه اصلی</a>
                    <span class="bl-5">/</span>
                    <span class="bl-4">دسته‌بندی‌ها</span>
                </nav>

                <div class="bc-1">
                    <div class="bc-2">📚</div>

                    <div>
                        <h1 class="bc-3">دسته‌بندی‌ها</h1>
                        <p class="bc-4">تمام موضوعات و دسته‌بندی‌های سایت</p>
                    </div>
                </div>

                <div class="bc-5">
                    <div class="bc-6">
                        <div class="bc-7">📄</div>
                        <div>
                            <div class="bc-9">{{ $categories->total() }}</div>
                            <div class="bc-10">دسته‌بندی</div>
                        </div>
                    </div>
                    <div class="bc-6">
                        <div class="bc-7 bc-7-articles">✍️</div>
                        <div>
                            <div class="bc-9">{{ $totalBlogs ?? 10 }}</div>
                            <div class="bc-10">مقاله</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- FILTER -->
        <section class="bc-13">
            <div class="bc-14">

                <div class="bc-15">
                    <span class="bc-16">مرتب‌سازی:</span>
                    <a target="_self" href="?sort=newest{{ request('search') ? '&search='.request('search') : '' }}"
                       class="filter-btn {{ request('sort', 'newest') == 'newest' ? 'active' : '' }}">
                        جدیدترین
                    </a>
                    <a target="_self" href="?sort=popular{{ request('search') ? '&search='.request('search') : '' }}"
                       class="filter-btn {{ request('sort') == 'popular' ? 'active' : '' }}">
                        محبوب‌ترین
                    </a>
                    <a target="_self" href="?sort=oldest{{ request('search') ? '&search='.request('search') : '' }}"
                       class="filter-btn {{ request('sort') == 'oldest' ? 'active' : '' }}">
                        قدیمی‌ترین
                    </a>
                </div>

                <form method="GET" class="bc-46">
                    <input type="text" name="search" value="{{ request('search') }}" class="bc-47" placeholder="جستجو در دسته‌بندی‌ها...">
                    <button type="submit" class="bc-48">🔍</button>
                    @if(request('search'))
                        <a target="_self" href="{{ url()->current() }}" class="bc-48-clear">✕</a>
                    @endif
                </form>

            </div>
        </section>

        <!-- MAIN -->
        <section class="bc-21">

            <!-- LIST -->
            <div class="bc-22">

                @forelse($categories as $index => $category)
                    <article class="bc-23" style="animation-delay: {{ $index * 0.08 }}s">

                        <div class="bc-24">
                            <div class="bc-24-icon">
                                {{ $category->icon ?? substr($category->fa_name, 0, 1) }}
                            </div>
                            <div class="bc-24-gradient"></div>
                        </div>

                        <div class="bc-27">

                            <div class="bc-28">
                                <span class="bc-28-badge">📌 {{ $category->blogs_count }} مقاله</span>
                                @if($category->blogs_count > 10)
                                    <span class="bc-28-hot">🔥 محبوب</span>
                                @endif
                            </div>

                            <h2 class="bc-30">
                                <a target="_self" href="/categories/{{ $category->slug }}" class="bc-31">{{ $category->fa_name }}</a>
                            </h2>

                            <p class="bc-32">
                                {{ $category->description ?? 'مقالات مرتبط با ' . $category->fa_name }}
                            </p>

                            <div class="bc-33">
                                <a target="_self" href="/categories/{{ $category->slug }}" class="bc-34">
                                    مشاهده مقالات
                                    <span class="bc-35">←</span>
                                </a>
                                <span class="bc-36">
                                    <span class="bc-37">آخرین: {{ $category->updated_at ? $category->updated_at->diffForHumans() : '—' }}</span>
                                </span>
                            </div>

                        </div>

                    </article>
                @empty
                    <div class="bc-38">
                        <div class="bc-39">📭</div>
                        <div class="bc-40">دسته‌بندی‌ای پیدا نشد</div>
                        <p class="bc-41">عبارت دیگری را امتحان کنید</p>
                        <a target="_self" href="{{ url()->current() }}" class="bc-41-btn">پاک کردن فیلتر</a>
                    </div>
                @endforelse

                <div class="bc-42">
                    {{ $categories->links() }}
                </div>

            </div>

            <!-- SIDEBAR -->
            <aside class="bc-45">

                <!-- POPULAR CATEGORIES -->
                <div class="bc-49">
                    <h3 class="bc-50">دسته‌بندی‌های محبوب</h3>
                    <div class="bc-51">
                        @foreach($categories->sortByDesc('blogs_count')->take(5) as $cat)
                            <a target="_self" href="/categories/{{ $cat->slug }}" class="bc-52">
                                <span class="bc-52-name">{{ $cat->fa_name }}</span>
                                <span class="bc-54">{{ $cat->blogs_count }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- TAGS -->
                <div class="bc-49">
                    <h3 class="bc-50">تگ‌های پرطرفدار</h3>
                    <div class="bc-51 bc-51-tags">
                        @foreach($tags as $tag)
                            <a target="_self" href="/tag/{{ $tag->slug }}" class="bc-52-tag">
                                <span>{{ $tag->fa_name }}</span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- AUTHORS -->
                <div class="bc-49">
                    <h3 class="bc-50">نویسندگان برتر</h3>
                    <div class="bc-55">
                        @foreach($topAuthors as $author)
                            <a target="_self" href="/author/{{ $author->id }}" class="bc-56">
                                <div class="bc-57">
                                    <img src="{{ $author->avatar ?? 'https://placehold.co/100x100/333/fff?text='.substr($author->name,0,1) }}" class="bc-58" alt="{{ $author->name }}">
                                </div>
                                <div class="bc-59">
                                    <div class="bc-60">{{ $author->name }}</div>
                                    <div class="bc-61">{{ $author->blogs_count }} مقاله</div>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- NEWSLETTER -->
                <div class="bc-62">
                    <div class="bc-63">خبرنامه</div>
                    <div class="bc-64">از جدیدترین مقالات مطلع شوید</div>
                    <form action="/newsletter" method="POST">
                        @csrf
                        <input type="email" name="email" class="bc-65" placeholder="ایمیل شما..." required>
                        <button type="submit" class="bc-66">عضویت</button>
                    </form>
                </div>

            </aside>

        </section>

    </div>

@endsection
