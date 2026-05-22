<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>مجله فایر - هنر، طراحی و معماری</title>
    <link href="{{ asset('css/front/main.css') }}" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
    <base target="_blank">
</head>
<body>

<!-- ===== COOL MODERN HEADER ===== -->
<header>
    <div class="logo-container">
        <div class="logo-icon">F</div>
        <div class="logo-text">فایر</div>
    </div>

    <nav>
        <ul class="nav-links">
            <li><a href="#magazine">مجله</a></li>
            <li><a href="#authors">نویسندگان</a></li>
            <li><a href="#podcast">پادکست</a></li>
        </ul>

        <div class="social-icons">
            <a href="#" aria-label="Twitter">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                </svg>
            </a>
            <a href="#" aria-label="YouTube">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                </svg>
            </a>
            <a href="#" aria-label="Instagram">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                </svg>
            </a>
            <a href="#" aria-label="RSS">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415a3.3 3.3 0 013.293 3.295A3.303 3.303 0 013.283 24 3.3 3.3 0 010 20.71a3.293 3.293 0 013.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.182 15.909 15.91z"/>
                </svg>
            </a>
        </div>

        <div class="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </nav>
</header>

<!-- ===== NEWS TICKER ===== -->
<div class="news-ticker">
    <div class="ticker-content">
        <div class="ticker-item">
            <span class="ticker-label">فوری</span>
            <span>نمایشگاه هنر خیابانی جدید این آخر هفته در برلین افتتاح می‌شود +++</span>
        </div>
        <div class="ticker-item">
            <span class="ticker-label">پرطرفدار</span>
            <span>مصاحبه اختصاصی با مجسمه‌ساز معاصر لوئیز جنسن +++</span>
        </div>
        <div class="ticker-item">
            <span class="ticker-label">اختصاصی</span>
            <span>تازه‌ترین اخبار دنیای طراحی و معماری را از دست ندهید +++</span>
        </div>
        <div class="ticker-item">
            <span class="ticker-label">فوری</span>
            <span>نمایشگاه هنر خیابانی جدید این آخر هفته در برلین افتتاح می‌شود +++</span>
        </div>
        <div class="ticker-item">
            <span class="ticker-label">پرطرفدار</span>
            <span>مصاحبه اختصاصی با مجسمه‌ساز معاصر لوئیز جنسن +++</span>
        </div>
        <div class="ticker-item">
            <span class="ticker-label">اختصاصی</span>
            <span>تازه‌ترین اخبار دنیای طراحی و معماری را از دست ندهید +++</span>
        </div>
    </div>
</div>

<!-- ===== HERO SECTION ===== -->
<section class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">چشمانت را نبند</h1>
        <p class="hero-excerpt" style="font-size: 18px; line-height: 1.8; color: rgba(255,255,255,0.6); margin-top: 20px;">
            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.
        </p>
        <div class="hero-meta">
            <div class="meta-item">
                <span class="meta-label">متن</span>
                <span class="meta-value">Jakob Gronberg</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">تاریخ</span>
                <span class="meta-value">۲۵ اسفند ۱۴۰۰</span>
            </div>
            <div class="meta-item">
                <span class="meta-label">مدت</span>
                <span class="meta-value">۱ دقیقه</span>
            </div>
        </div>
        <span class="hero-badge">ویژه</span>
    </div>
    <div class="hero-image">
        <img src="https://placehold.co/1540x1026/1a1a1a/333?text=Hero+Image" alt="Featured Article">
    </div>
</section>

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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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
                        <p class="article-excerpt">لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است.</p>
                    </div>
                    <div class="article-meta">
                        <div class="article-meta-left">
                            <div class="meta-item"><span class="meta-label">متن</span><span class="meta-value">Jakob Gronberg</span></div>
                            <div class="meta-item"><span class="meta-label">تاریخ</span><span class="meta-value">۲۵ اسفند ۱۴۰۰</span></div>
                            <div class="meta-item"><span class="meta-label">خواندن</span><span class="meta-value">۱ دقیقه</span></div>
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

<!-- ===== FOOTER ===== -->
<footer>
    <div class="footer-content">
        <div class="footer-top">
            <h2 class="footer-title">اخبار طراحی در صندوق ایمیل شما</h2>
            <div class="footer-subscribe">
                <input type="email" class="footer-input" placeholder="ایمیل">
                <button class="footer-btn">ثبت‌نام</button>
            </div>
        </div>

        <div class="footer-links">
            <div class="footer-column">
                <h4>دسته‌بندی‌ها</h4>
                <a href="#">هنر</a>
                <a href="#">طراحی</a>
                <a href="#">معماری</a>
            </div>
            <div class="footer-column">
                <h4>محتوا</h4>
                <a href="#">مجله</a>
                <a href="#">پادکست</a>
                <a href="#">نویسندگان</a>
            </div>
            <div class="footer-column">
                <h4>اطلاعات</h4>
                <a href="#">راهنمای استایل</a>
                <a href="#">مجوز</a>
                <a href="#">تغییرات</a>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-copyright">© ساخته شده توسط پاول گولا - قدرت گرفته از وب‌فلو</div>
            <div class="footer-social">
                <a href="#" aria-label="Twitter">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
                <a href="#" aria-label="YouTube">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
                <a href="#" aria-label="Instagram">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zM12 0C8.741 0 8.333.014 7.053.072 2.695.272.273 2.69.073 7.052.014 8.333 0 8.741 0 12c0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98C8.333 23.986 8.741 24 12 24c3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98C15.668.014 15.259 0 12 0zm0 5.838a6.162 6.162 0 100 12.324 6.162 6.162 0 000-12.324zM12 16a4 4 0 110-8 4 4 0 010 8zm6.406-11.845a1.44 1.44 0 100 2.881 1.44 1.44 0 000-2.881z"/>
                    </svg>
                </a>
                <a href="#" aria-label="RSS">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M19.199 24C19.199 13.467 10.533 4.8 0 4.8V0c13.165 0 24 10.835 24 24h-4.801zM3.291 17.415a3.3 3.3 0 013.293 3.295A3.303 3.303 0 013.283 24 3.3 3.3 0 010 20.71a3.293 3.293 0 013.291-3.295zM15.909 24h-4.665c0-6.169-5.075-11.245-11.244-11.245V8.09c8.727 0 15.909 7.182 15.909 15.91z"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
