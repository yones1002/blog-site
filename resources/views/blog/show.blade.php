@extends('layout.master')

@section('content')

    <!-- ===== BLOG SINGLE / SLUG PAGE ===== -->
    <link href="{{ asset('css/front/blog/show-blog.css') }}" rel="stylesheet">
    <link href="{{ asset('css/front/blog/list-blog.css') }}" rel="stylesheet">
    <!-- Article Header -->
    <section class="bl-1">
        <div class="bl-2">
            <nav class="bl-3">
                <a target="_self" href="/" class="bl-4">صفحه اصلی</a>
                <span class="bl-5">/</span>
                <a target="_self" href="/blog" class="bl-4">مجله</a>
                <span class="bl-5">/</span>
                <span class="bl-6">
                    {{$blog->title}}</span>
            </nav>

            <!-- Category Badge -->
            <div class="bs-1">
                دسته بندی :
            <span class="bs-2">
                <a target="_self" href="/categories/{{$blog->category->slug}}" class="bl-4" style="color: #0a0a0a">{{$blog->category->fa_name}}</a>
            </span>
            </div>

            <!-- Title -->
            <h1 class="bs-3">
                {{$blog->title}}
            </h1>

            <!-- Meta Info -->
            <div class="bs-4">
            <span class="bs-5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg>
                {{$blog->created_at}}
            </span>
                <span class="bs-5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 00-4-4H8a4 4 0 00-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                {{$blog->user->name}}
            </span>
                <span class="bs-5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                1 دقیقه
            </span>
                <span class="bs-5">
                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                {{$blog->view}} بازدید
            </span>
            </div>
        </div>
    </section>

    <!-- Featured Image -->
    <section class="bs-6">
        <div class="bs-7">
            <img src="{{$blog->cover_url}}" alt="{{$blog->title}}" class="bs-8">
        </div>
    </section>

    <!-- Article Content + Sidebar -->
    <section class="bs-9">

        <!-- Main Content -->
        <article class="bs-10">

            <!-- Short Detail / Lead -->
            <div class="bs-11">
                {{$blog->short_detail}}
            </div>

            <!-- Full Content -->
            <div class="article-body bs-12">
                {!! $blog->long_detail !!}
            </div>

            <!-- Tags -->
            <div class="bs-13">
                <h3 class="bs-14">برچسب‌ها</h3>
                <div class="bs-15">
                    @foreach($blog->hashtags as $tag)
                        <a target="_self" href="#" class="bs-16">
                            {{$tag->fa_name}}
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- Share Buttons -->
            <div class="bs-17">
                <h3 class="bs-14">اشتراک‌گذاری</h3>
                <div class="bs-18">
                    <a target="_self" href="https://twitter.com/share?url={{url()->current()}}"  class="bs-19">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a target="_self" href="https://t.me/share/url?url={{url()->current()}}"  class="bs-19">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/></svg>
                    </a>
                    <a target="_self" href="https://wa.me/?text={{url()->current()}}" class="bs-19">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                    </a>
                    <button onclick="navigator.clipboard.writeText(window.location.href); this.innerHTML='<svg width=\'18\' height=\'18\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'#4ade80\' stroke-width=\'2\'><polyline points=\'20 6 9 17 4 12\'></polyline></svg>'; setTimeout(()=>this.innerHTML='<svg width=\'18\' height=\'18\' viewBox=\'0 0 24 24\' fill=\'none\' stroke=\'currentColor\' stroke-width=\'2\'><rect x=\'9\' y=\'9\' width=\'13\' height=\'13\' rx=\'2\' ry=\'2\'></rect><path d=\'M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1\'></path></svg>', 2000);" class="bs-20">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect><path d="M5 15H4a2 2 0 01-2-2V4a2 2 0 012-2h9a2 2 0 012 2v1"></path></svg>
                    </button>
                </div>
            </div>

            <!-- Comments Section -->
            <div class="bs-28">
                <h3 class="bs-29">
                    نظرات <span class="bs-30">(0)</span>
                </h3>

                <!-- Comment Form -->
                <form action="#" method="POST" class="bs-31">
                    @csrf
                    <div class="bs-32">
                        <input type="text" name="name" placeholder="نام شما" required class="bs-33">
                        <input type="email" name="email" placeholder="ایمیل" required class="bs-33">
                    </div>
                    <textarea name="body" rows="5" placeholder="نظر خود را بنویسید..." required class="bs-34"></textarea>
                    <button type="submit" class="bs-35">
                        ارسال نظر
                    </button>
                </form>

                <!-- Comments List -->
{{--                @foreach($blog->comments as $comment)--}}
{{--                    <div class="bs-36">--}}
{{--                        <div class="bs-37">--}}
{{--                            <div class="bs-38">--}}
{{--                                <div class="bs-39">--}}
{{--                                    {{mb_substr($comment->name, 0, 1)}}--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <div class="bs-40">{{$comment->name}}</div>--}}
{{--                                    <div class="bs-41">{{$comment->created_at->diffForHumans()}}</div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                        <p class="bs-42">--}}
{{--                            {{$comment->body}}--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
            </div>

        </article>

        <!-- Sidebar -->
        <aside class="bs-43">

            <!-- Author Profile Card -->
            <div class="bs-44">
                <div class="bs-45">
                    <img src="{{$blog->user->avatar}}" alt="{{$blog->user->name}}" class="bs-23">
                </div>
                <a target="_self" href="{{route('author.show',[$blog->id])}}" >
                    <h4 class="bs-46">{{$blog->user->name}}</h4>
                </a>
                <p class="bs-47">نویسنده و روزنامه‌نگار</p>
                <div class="bs-48">
                    <a target="_self" href="#" class="bs-49">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                    </a>
                    <a target="_self" href="#" class="bs-49">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/></svg>
                    </a>
                </div>
            </div>

            <!-- Related Articles -->
            <div class="bs-50">
                <h3 class="bs-14">مقالات مرتبط</h3>
                <div class="bs-51">
                    @foreach($relatedBlogs as $related)
                        <a target="_self" href="/blog/{{$related->type}}/{{$related->slug}}" class="bs-52">
                            <div class="bs-53">
                                <img src="{{$related->cover_url}}" alt="{{$related->title}}" class="bs-23">
                            </div>
                            <div class="bs-24">
                                <div class="bs-54">
                                    {{$related->title}}
                                </div>
                                <div class="bs-55">{{$related->created_at}}</div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>

            <!-- tags -->
            <div
                class="bl-32">
                <h3 class="bl-33">
                    برچسب‌های مرتبط</h3>
                <div class="bl-44">
                    @foreach($relatedTags as $relatedTag)
                        <a target="_self" href="#"
                           class="bl-45">{{$relatedTag->fa_name}}</a>
                    @endforeach
                </div>
            </div>

        </aside>

    </section>

    <!-- Next/Prev Navigation -->
    <section class="bs-60">
        <div class="bs-61">
            @if($prevBlog)
                <a target="_self" href="/blog/{{$prevBlog->type}}/{{$prevBlog->slug}}" class="bs-62">
                    <div class="bs-63">مقاله قبلی</div>
                    <div class="bs-64">{{$prevBlog->title}}</div>
                </a>
            @else
                <div></div>
            @endif

            @if($nextBlog)
                <a target="_self" href="/blog/{{$nextBlog->type}}/{{$nextBlog->slug}}" class="bs-62">
                    <div class="bs-63">مقاله بعدی</div>
                    <div class="bs-64">{{$nextBlog->title}}</div>
                </a>
            @else
                <div></div>
            @endif
        </div>
    </section>

@endsection
