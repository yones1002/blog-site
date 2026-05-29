@extends('layout.master')

@section('content')

    <link href="{{ asset('css/front/category/list-category.css') }}" rel="stylesheet">

    <div class="author-page">

        <!-- HEADER -->
        <section class="bl-1">
            <div class="bl-2">

                <nav class="bl-3">
                    <a href="/" class="bl-4">صفحه اصلی</a>
                    <span class="bl-5">/</span>
                    <a href="/authors" class="bl-4">نویسندگان</a>
                    <span class="bl-5">/</span>
                    <span class="bl-4">{{ $author->name }}</span>
                </nav>

                <div class="bc-1">

                    <div class="bc-2">
                        <img src="{{ $author->avatar }}" class="author-avatar" alt="">
                    </div>

                    <div>
                        <h1 class="bc-3">{{ $author->name }}</h1>
                        <p class="bc-4">{{ $author->bio ?? 'نویسنده مقالات سایت' }}</p>
                    </div>

                </div>

                <div class="bc-5">
                    <div class="bc-6">
                        <div class="bc-7">✍️</div>
                        <div>
                            <div class="bc-9">{{ $author->blogs_count }}</div>
                            <div class="bc-10">مقاله</div>
                        </div>
                    </div>

                    <div class="bc-6">
                        <div class="bc-7">👁</div>
                        <div>
                            <div class="bc-9">{{ $author->views_count ?? 0 }}</div>
                            <div class="bc-10">بازدید</div>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- MAIN -->
        <section class="bc-21">

            <!-- POSTS -->
            <div class="bc-22">

                @forelse($blogs as $index => $blog)
                    <article class="bc-23" style="animation-delay: {{ $index * 0.08 }}s">

                        <div class="bc-24">
                            <div class="bc-24-icon">📝</div>
                            <div class="bc-24-gradient"></div>
                        </div>

                        <div class="bc-27">

                            <div class="bc-28">
                                <a href="/categories/{{ $blog->category->slug }}" class="bc-31">
                                    <span class="bc-28-badge">📌 {{ $blog->category->fa_name ?? 'بدون دسته' }}</span>
                                </a>
                                <span class="bc-28-hot">{{ $blog->created_at->diffForHumans() }}</span>
                            </div>

                            <h2 class="bc-30">
                                <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="bc-31">
                                    {{ $blog->title }}
                                </a>
                            </h2>

                            <p class="bc-32">
                                {{ $blog->excerpt }}
                            </p>

                            <div class="bc-33">
                                <a target="_self" href="/blog/{{ $blog->type }}/{{ $blog->slug }}" class="bc-34">
                                    مطالعه مقاله
                                    <span class="bc-35">←</span>
                                </a>
                            </div>

                        </div>

                    </article>
                @empty
                    <div class="bc-38">
                        <div class="bc-39">📭</div>
                        <div class="bc-40">مقاله‌ای پیدا نشد</div>
                    </div>
                @endforelse

                <div class="bc-42">
                    {{ $blogs->links() }}
                </div>

            </div>

            <!-- SIDEBAR -->
            <aside class="bc-45">

                <div class="bc-49">
                    <h3 class="bc-50">درباره نویسنده</h3>
                    <p style="color:rgba(255,255,255,.6);line-height:1.8">
                        {{ $author->bio ?? '—' }}
                    </p>
                </div>

                <div class="bc-49">
                    <h3 class="bc-50">آخرین مقالات</h3>
                    @foreach($latestBlogs as $b)
                        <a target="_self" href="/blog/{{ $b->type }}/{{ $b->slug }}" class="bc-52">
                            <span class="bc-52-name">{{ $b->title }}</span>
                        </a>
                    @endforeach
                </div>

                <div class="bc-49">
                    <h3 class="bc-50">سایر نویسندگان</h3>
                    @foreach($otherAuthor as $a)
                        <a target="_self" href="/authors/{{ $a->id }}" class="bc-52">
                            <span class="bc-52-name">{{ $a->name }}</span>
                        </a>
                    @endforeach
                </div>

            </aside>

        </section>

    </div>

@endsection
