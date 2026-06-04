<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    <style>
        /* استایل‌های کمکی برای کلاینت‌هایی که تگ style را پشتیبانی می‌کنند */
        @import url('https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;700&display=swap');

        body, table, td, a {
            font-family: 'Vazirmatn', Tahoma, Geneva, Verdana, sans-serif !important;
        }
        @media screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                max-width: 100% !important;
                padding: 10px !important;
            }
            .content-padding {
                padding: 24px 16px !important;
            }
        }
    </style>
</head>
<body style="margin: 0; padding: 0; background-color: #0a0a0a; color: #ffffff; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; direction: rtl; text-align: right;">

<!-- جدول پس‌زمینه کل صفحه -->
<table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color: #0a0a0a; width: 100%; margin: 0; padding: 40px 0;">
    <tr>
        <td align="center">

            <!-- باکس اصلی ایمیل (Container) -->
            <table class="container" role="presentation" width="600" cellspacing="0" cellpadding="0" border="0" style="width: 600px; max-width: 600px; background-color: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.08); border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.5);">

                <!-- بخش هدر با گرادینت شبیه‌سازی شده -->
                <tr>
                    <td style="padding: 35px 40px; background: #121212; border-bottom: 1px solid rgba(255,255,255,0.05); text-align: center;">
                        <span style="font-size: 13px; font-weight: 700; color: #ff6b6b; letter-spacing: 2px; text-transform: uppercase;">مـجـلـه دیـجـیـتـال</span>
                        <h2 style="font-size: 16px; color: rgba(255,255,255,0.5); margin: 8px 0 0 0; font-weight: 400;">سلام {{ $user->name }} عزیز! مقاله جدید منتشر شد 🔥</h2>
                    </td>
                </tr>

                <!-- تصویر کاور مقاله (در صورت وجود) -->
                @if(!empty($blog->cover_url))
                    <tr>
                        <td style="padding: 0; overflow: hidden;">
                            <img src="{{ $blog->cover_url }}" alt="{{ $title }}" width="600" style="width: 100%; max-width: 100%; height: auto; display: block; border-bottom: 1px solid rgba(255,255,255,0.05);">
                        </td>
                    </tr>
                @endif

                <!-- بدنه اصلی محتوا -->
                <tr>
                    <td class="content-padding" style="padding: 40px;">

                        <!-- عنوان مقاله -->
                        <h1 style="font-size: 26px; font-weight: 800; line-height: 1.5; color: #ffffff; margin: 0 0 16px 0; text-align: right;">
                            {{ $title }}
                        </h1>

                        <!-- متادیتای کوتاه (نویسنده و تاریخ) -->
                        <p style="margin: 0 0 24px 0; font-size: 13px; color: rgba(255,255,255,0.4);">
                            نویسنده: {{ $blog->user->name }} | زمان مطالعه: ۱ دقیقه
                        </p>

                        <!-- خلاصه متن مقاله -->
                        <p style="font-size: 15px; line-height: 1.8; color: rgba(255,255,255,0.7); margin: 0 0 35px 0; text-align: justify;">
                            {{ $body }}
                        </p>

                        <!-- دکمه ادامه مطلب (با گرادینت راست‌به‌چپ تم وبلاگ) -->
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="right" style="margin-bottom: 20px;">
                            <tr>
                                <td style="border-radius: 12px; background: #ff6b6b; text-align: center;">
                                    <!-- شبیه‌سازی گرادینت با بک‌گراند خطی برای ایمیل کلاینت‌های مدرن -->
                                    <a href="{{ url('/blog/' . $blog->type . '/' . $blog->slug) }}" target="_blank" style="background: linear-gradient(135deg, #feca57 0%, #ff6b6b 100%); border: 1px solid transparent; border-radius: 12px; font-weight: 700; font-size: 15px; color: #000000; text-decoration: none; padding: 14px 32px; display: inline-block; transition: all 0.3s;">
                                        مطالعه کامل مقاله
                                    </a>
                                </td>
                            </tr>
                        </table>

                    </td>
                </tr>

                <!-- فوتر ایمیل -->
                <tr>
                    <td style="padding: 30px 40px; background-color: #060606; border-top: 1px solid rgba(255,255,255,0.05); text-align: center;">
                        <p style="margin: 0 0 10px 0; font-size: 13px; color: rgba(255,255,255,0.4);">
                            این ایمیل به دلیل عضویت شما در خبرنامه صادر شده است.
                        </p>
                        <p style="margin: 0; font-size: 12px; color: rgba(255,255,255,0.3);">
                            © {{ date('Y') }} وبلاگ ما. تمامی حقوق محفوظ است.
                        </p>
                    </td>
                </tr>

            </table>
            <!-- / باکس اصلی ایمیل -->

        </td>
    </tr>
</table>

</body>
</html>
