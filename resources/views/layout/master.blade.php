<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجله فایر - هنر، طراحی و معماری</title>
    <link href="{{ asset('css/front/main.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap"
          rel="stylesheet">
    <base target="_blank">
</head>
<body>
@include('layout.header')

@include('layout.subheader')

@include('layout.slider')

@yield('content')
<!-- ===== ARTICLES SECTION ===== -->
<section id="magazine">
    <div class="section-header">
        <h2 class="section-title">مجله</h2>
        <a href="#" class="section-link">
            همه مقالات
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="articles-grid">
        <div class="articles-list">
            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/397x264/ff6b6b/fff?text=Art" alt="Hope dies last">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">امید آخرین چیزی است که می‌میرد</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">هنر</span>
                    </div>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/256x384/feca57/333?text=Museum" alt="The best art museums">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">بهترین موزه‌های هنری</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">مجسمه‌سازی</span>
                    </div>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/263x390/48dbfb/fff?text=Details" alt="The devil is the details">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">شیطان در جزئیات است</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">هنر</span>
                    </div>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/247x247/ff9ff3/333?text=Hope" alt="An indestructible hope">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">امیدی نابودنشدنی</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">هنر</span>
                    </div>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/307x460/54a0ff/fff?text=Street" alt="Street art festival">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">جشنواره هنر خیابانی</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">هنر خیابانی</span>
                    </div>
                </div>
            </article>

            <article class="article-card">
                <div class="article-image">
                    <img src="https://placehold.co/285x380/5f27cd/fff?text=Eyes" alt="Through the eyes">
                </div>
                <div class="article-content">
                    <div>
                        <h3 class="article-title">از دید هنرمندان خیابانی</h3>
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با
                            استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم
                            است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
                            </div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span>
                            </div>
                        </div>
                        <span class="article-tag">هنر خیابانی</span>
                    </div>
                </div>
            </article>
        </div>

        <aside class="sidebar">
            <div class="sidebar-section">
                <h3 class="sidebar-title">مجله چاپی</h3>
                <div style="font-size: 42px; font-weight: 800; margin-bottom: 20px; color: #fff;">03/2022</div>
                <div class="magazine-cover">
                    <img src="https://placehold.co/391x488/ff6b6b/fff?text=FYRRE+MAGAZINE" alt="Magazine Cover">
                </div>
                <button class="btn-primary">دریافت نسخه</button>
            </div>

            <div class="sidebar-section">
                <h3 class="sidebar-title">محبوب‌ترین‌ها</h3>
                <div class="popular-list">
                    <div class="popular-item">
                        <div class="popular-number">01</div>
                        <div class="popular-text">
                            <div class="popular-title">جشنواره هنر خیابانی</div>
                            <div class="popular-author">کریستوفر واکارو</div>
                        </div>
                    </div>
                    <div class="popular-item">
                        <div class="popular-number">02</div>
                        <div class="popular-text">
                            <div class="popular-title">امید آخرین چیزی است که می‌میرد</div>
                            <div class="popular-author">آن هنری</div>
                        </div>
                    </div>
                    <div class="popular-item">
                        <div class="popular-number">03</div>
                        <div class="popular-text">
                            <div class="popular-title">هنرمندانی که می‌خواهند برتر باشند</div>
                            <div class="popular-author">آنا نیلسن</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="sidebar-section newsletter-box">
                <h3 class="sidebar-title">خبرنامه</h3>
                <div class="newsletter-title">اخبار طراحی در صندوق ایمیل شما</div>
                <input type="email" class="newsletter-input" placeholder="ایمیل">
                <button class="btn-primary">ثبت‌نام</button>
            </div>
        </aside>
    </div>
</section>

<!-- ===== PODCAST SECTION ===== -->
<section id="podcast">
    <div class="section-header">
        <h2 class="section-title">پادکست</h2>
        <a href="#" class="section-link">
            همه قسمت‌ها
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="podcast-grid">
        <div class="podcast-card">
            <div class="podcast-cover">
                <img src="https://placehold.co/410x521/1a1a1a/444?text=Ep+05" alt="Episode 5">
                <div class="podcast-overlay">
                    <div class="podcast-brand">Podcast</div>
                    <div class="podcast-episode">Ep 05</div>
                    <div class="podcast-play">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#000">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="podcast-title">مشکل توسعه فرهنگی امروز</h3>
            <div class="podcast-meta">
                <span><strong>تاریخ:</strong> ۲۵ خرداد ۱۴۰۱</span>
                <span><strong>مدت:</strong> ۱ ساعت ۲۰ دقیقه</span>
            </div>
        </div>

        <div class="podcast-card">
            <div class="podcast-cover">
                <img src="https://placehold.co/451x540/222/555?text=Ep+04" alt="Episode 4">
                <div class="podcast-overlay">
                    <div class="podcast-brand">Podcast</div>
                    <div class="podcast-episode">Ep 04</div>
                    <div class="podcast-play">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#000">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="podcast-title">پیام‌های پنهان جک نیلسون</h3>
            <div class="podcast-meta">
                <span><strong>تاریخ:</strong> ۲۵ خرداد ۱۴۰۱</span>
                <span><strong>مدت:</strong> ۶۰ دقیقه</span>
            </div>
        </div>

        <div class="podcast-card">
            <div class="podcast-cover">
                <img src="https://placehold.co/739x1108/333/666?text=Ep+03" alt="Episode 3">
                <div class="podcast-overlay">
                    <div class="podcast-brand">Podcast</div>
                    <div class="podcast-episode">Ep 03</div>
                    <div class="podcast-play">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="#000">
                            <path d="M8 5v14l11-7z"/>
                        </svg>
                    </div>
                </div>
            </div>
            <h3 class="podcast-title">پشت صحنه فرهنگ هنر خیابانی</h3>
            <div class="podcast-meta">
                <span><strong>تاریخ:</strong> ۲۵ خرداد ۱۴۰۱</span>
                <span><strong>مدت:</strong> ۴۵ دقیقه</span>
            </div>
        </div>
    </div>
</section>

<!-- ===== AUTHORS SECTION ===== -->
<section id="authors">
    <div class="section-header">
        <h2 class="section-title">نویسندگان</h2>
        <a href="#" class="section-link">
            همه نویسندگان
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M5 12h14M12 5l7 7-7 7"/>
            </svg>
        </a>
    </div>

    <div class="authors-grid">
        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/150x253/ff6b6b/fff?text=JG" alt="Jakob Grønberg">
            </div>
            <div class="author-info">
                <h3>یاکوب گرونبرگ</h3>
                <div class="author-meta">
                    <span><strong>شغل:</strong> هنرمند</span>
                    <span><strong>شهر:</strong> برلین</span>
                </div>
            </div>
        </div>

        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/200x250/feca57/333?text=LJ" alt="Louise Jensen">
            </div>
            <div class="author-info">
                <h3>لوئیز جنسن</h3>
                <div class="author-meta">
                    <span><strong>شغل:</strong> هنرمند</span>
                    <span><strong>شهر:</strong> استکهلم</span>
                </div>
            </div>
        </div>

        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/200x300/48dbfb/fff?text=AH" alt="Anne Henry">
            </div>
            <div class="author-info">
                <h3>آن هنری</h3>
                <div class="author-meta">
                    <span><strong>شغل:</strong> عکاس</span>
                    <span><strong>شهر:</strong> نیویورک</span>
                </div>
            </div>
        </div>

        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/150x225/ff9ff3/333?text=AN" alt="Anna Nielsen">
            </div>
            <div class="author-info">
                <h3>آنا نیلسن</h3>
                <div class="author-meta">
                    <span><strong>Job:</strong> Columnist</span>
                    <span><strong>شهر:</strong> کپنهاگ</span>
                </div>
            </div>
        </div>

        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/200x301/54a0ff/fff?text=JC" alt="Jane Cooper">
            </div>
            <div class="author-info">
                <h3>جین کوپر</h3>
                <div class="author-meta">
                    <span><strong>شغل:</strong> هنرمند</span>
                    <span><strong>شهر:</strong> برلین</span>
                </div>
            </div>
        </div>

        <div class="author-card">
            <div class="author-avatar">
                <img src="https://placehold.co/150x226/5f27cd/fff?text=CV" alt="Cristofer Vaccaro">
            </div>
            <div class="author-info">
                <h3>کریستوفر واکارو</h3>
                <div class="author-meta">
                    <span><strong>شغل:</strong> هنرمند</span>
                    <span><strong>شهر:</strong> لیسبون</span>
                </div>
            </div>
        </div>
    </div>
</section>

@include('layout.footer')

</body>
</html>
