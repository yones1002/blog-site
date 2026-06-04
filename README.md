<div align="center">

<h1>🔥 Fyrre Magazine</h1>
<p><strong>AI-Powered Persian Content Management Platform</strong></p>
<p>Modern Laravel 13 CMS with intelligent content automation, RSS aggregation, and advanced admin analytics</p>

<p>
  <img src="https://img.shields.io/badge/Laravel%2013-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" />
  <img src="https://img.shields.io/badge/PHP%208.4-777BB4?style=for-the-badge&logo=php&logoColor=white" />
  <img src="https://img.shields.io/badge/Filament%20v5-FFB400?style=for-the-badge" />
  <img src="https://img.shields.io/badge/MySQL%208.0-4479A1?style=for-the-badge&logo=mysql&logoColor=white" />
  <img src="https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white" />
  <img src="https://img.shields.io/badge/AI-OpenRouter-8A2BE2?style=for-the-badge" />
  <img src="https://img.shields.io/badge/RTL-Persian%20Magazine-2E8B57?style=for-the-badge" />
</p>

</div>

---

## ⚡ Quick Start

```bash
# 1. Clone
git clone https://gitlab.com/younes8102/blog.git && cd blog

# 2. Environment
cp .env.example .env

# 3. Docker Up
docker-compose up -d

# 4. Migrate & Seed
docker-compose exec app php artisan migrate
docker-compose exec app php artisan import:categories
docker-compose exec app php artisan import:news {rss-url}

# 5. Open http://localhost:8181
# Admin: http://localhost:8181/admin
```

---

## 📸 Screenshots

<table>
  <tr>
    <td align="center"><b>🏠 Home Page</b></td>
    <td align="center"><b>📝 Article Detail</b></td>
  </tr>
  <tr>
    <td><img src="https://gitlab.com/younes8102/blog/-/raw/main/public/images/screenshots/home.png" width="100%" /></td>
    <td><img src="https://gitlab.com/younes8102/blog/-/raw/main/public/images/screenshots/news-page.png" width="100%" /></td>
  </tr>
  <tr>
    <td align="center"><b>🎛️ Filament Admin</b></td>
    <td align="center"><b>🤖 AI SEO Panel</b></td>
  </tr>
  <tr>
    <td><img src="https://gitlab.com/younes8102/blog/-/raw/main/public/images/screenshots/panel.png" width="100%" /></td>
    <td><img src="https://gitlab.com/younes8102/blog/-/raw/main/public/images/screenshots/seo.png" width="100%" /></td>
  </tr>
</table>

---

## 🎯 Project Overview

**Fyrre Magazine** is a production-grade, AI-enhanced Content Management System built for Persian (RTL) art, design, and architecture publications. It demonstrates modern Laravel architecture patterns including **Service Layer**, **Action Classes**, **Observer Pattern**, **Queue Jobs**, and **Polymorphic Relations** — all orchestrated through a sleek **Filament 5.6** admin panel.

### What Makes This Special
- 🤖 **AI Content Automation**: Auto-generates SEO metadata, FAQs, and bilingual summaries using DeepSeek V3 via OpenRouter
- 📡 **RSS Intelligence**: Automated news ingestion pipeline with duplicate detection, image downloading, and email notifications
- 🏗️ **Clean Architecture**: Strict separation between Controllers, Services, Actions, and Models
- 🎛️ **Advanced Admin Panel**: Custom Filament resources with relation managers, widgets, and form schemas
- 🌍 **Full RTL Support**: Complete Persian localization with Laravel Lang

---

## 🛠 Tech Stack

| Layer | Technology | Version |
|-------|------------|---------|
| **Backend** | Laravel | 13.x |
| **PHP** | PHP | 8.4 |
| **Admin Panel** | Filament | 5.6 |
| **Database** | MySQL | 8.0 |
| **Localization** | Laravel Lang | 6.8 |
| **Containerization** | Docker | Latest |
| **Testing** | PHPUnit | 12.5 |
| **AI API** | OpenRouter | DeepSeek V3 |

---

## 🏗 System Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                      PRESENTATION LAYER                     │
│    Blade Views (RTL)  │  Filament Admin  │  API Routes      │
├─────────────────────────────────────────────────────────────┤
│                      CONTROLLER LAYER                       │
│    Home │ Blog │ Category │ Authors │ Comment │ Auth        │
├─────────────────────────────────────────────────────────────┤
│                      SERVICE LAYER                          │
│ BlogService │ CategoryService │ CommentService │ DetailSvc  │
├─────────────────────────────────────────────────────────────┤
│                      ACTION LAYER                           │
│   GptAction (OpenRouter) │ SocialDetailAction │ DetailGen   │
├─────────────────────────────────────────────────────────────┤
│                      DOMAIN LAYER                           │
│   Blog │ Category │ User │ Comment │ Hashtag │ Menu         │
│              BlogObserver (Event-Driven Email)              │
├─────────────────────────────────────────────────────────────┤
│                      QUEUE LAYER                            │
│    RssJob │ RssCategoriesJob │ SendRss (Email Notify)       │
└─────────────────────────────────────────────────────────────┘
```

### Design Patterns
- **Service Layer** — Business logic isolation
- **Action Pattern** — Single-responsibility AI operations
- **Observer Pattern** — Auto email on blog create/update
- **Command Pattern** — Scheduled Artisan operations
- **Repository Pattern** — Eloquent scopes as query builders
- **Polymorphic Relations** — Comments & Hashtags attach to any model

---

## 🗄 Database Schema

### Entity Relationship

```
┌─────────────┐       ┌─────────────┐       ┌─────────────┐
│    users    │       │    blogs    │       │  categories │
├─────────────┤       ├─────────────┤       ├─────────────┤
│ id (PK)     │──┐    │ id (PK)     │    ┌──│ id (PK)     │
│ name        │  │    │ title       │    │  │ name        │
│ email       │  │    │ slug        │    │  │ fa_name     │
│ type        │  └───>│ author_id   │    │  │ slug        │
│ avatar      │       │ category_id │<───┘  │ status      │
│ password    │       │ type        │       │ description │
└─────────────┘       │ status      │       │ fa_desc     │
                      │ seo (JSON)  │       └─────────────┘
                      │ faq (JSON)  │
                      │ view        │       ┌─────────────┐
                      │ lang        │       │   hashtags  │
                      │ softDeletes │       ├─────────────┤
                      └─────────────┘       │ id (PK)     │
                             │              │ name        │
                             │              │ fa_name     │
                             │              │ slug        │
                             │              │ status      │
                             │              └─────────────┘
                             │                      │
                             │         ┌────────────┴────────────┐
                             │         │   model_has_hashtag     │
                             │         ├─────────────────────────┤
                             │         │ hashtags_id (FK)        │
                             │         │ model_id, model_type    │
                             │         └─────────────────────────┘
                             │
                    ┌────────┴────────┐
                    │    comments     │
                    ├─────────────────┤
                    │ id (PK)         │
                    │ model_id        │
                    │ model_type      │
                    │ name, email     │
                    │ body            │
                    │ pinned          │
                    │ status          │
                    └─────────────────┘
```

### Key Tables

| Table | Description | Relations |
|-------|-------------|-----------|
| `blogs` | Articles & News | belongsTo category, user; belongsToMany hashtags |
| `categories` | Taxonomy | hasMany blogs; bilingual EN/FA |
| `hashtag` | Tags | Polymorphic via `model_has_hashtag` |
| `comments` | User Comments | Polymorphic, pin-able |
| `menus` | Navigation | Self-referencing tree |
| `users` | Authors & Members | Type-based (`authors` scope) |

### JSON Fields
- `blogs.seo` → `[{meta_title, meta_description, og_title, twitter_title, ...}]`
- `blogs.faq` → `[{question, answer}, ...]`

---

## 🤖 AI Content Generation Flow

```
┌─────────────────────────────────────────────────────────────┐
│                    AI GENERATION PIPELINE                   │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  ┌─────────────┐    ┌─────────────┐    ┌─────────────┐      │
│  │  Blog Text  │───>│  GptAction  │───>│ OpenRouter  │      │
│  │  (Persian)  │    │  (Prompt)   │    │  DeepSeekV3 │      │
│  └─────────────┘    └─────────────┘    └──────┬──────┘      │
│                                               │             │
│                           ┌───────────────────┘             │
│                           │                                 │
│                           ▼                                 │
│                  ┌─────────────────┐                        │
│                  │  JSON Response  │                        │
│                  │  {meta_title,   │                        │
│                  │   meta_desc,    │                        │
│                  │   keywords,     │                        │
│                  │   og_title,     │                        │
│                  │   twitter_title}│                        │
│                  └────────┬────────┘                        │
│                           │                                 │
│                           ▼                                 │
│                  ┌───────────────────┐                      │
│                  │ SocialDetailAction│                      │
│                  │ (Parse & Validate)│                      │
│                  └────────┬──────────┘                      │
│                           │                                 │
│                           ▼                                 │
│                  ┌─────────────────┐                        │
│                  │  DetailService  │                        │
│                  │  (Update Blog)  │                        │
│                  └────────┬────────┘                        │
│                           │                                 │
│                           ▼                                 │
│                  ┌─────────────────┐                        │
│                  │   blogs.seo     │                        │
│                  │   (JSON Column) │                        │
│                  └─────────────────┘                        │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│  Commands:                                                  │
│    php artisan seo:generate      → SEO for all articles     │
│    php artisan faq:generate      → FAQ for all articles     │
│    php artisan category:content:generate → Category desc    │
├─────────────────────────────────────────────────────────────┤
│  ⚠️  Requires VPN to connect to OpenRouter API              │
└─────────────────────────────────────────────────────────────┘
```

### AI Commands

| Command | What It Does | Needs VPN |
|---------|-------------|-----------|
| `seo:generate` | Meta tags, Open Graph, Twitter Cards | ✅ Yes |
| `faq:generate` | 3 Persian Q&A pairs from article | ✅ Yes |
| `category:content:generate` | Category descriptions | ✅ Yes |

**Example — How SEO is Generated:**
```php
// 1. Grab article text
$text = Blog::find($id)->long_detail;

// 2. Build prompt (Persian)
$prompt = "Generate SEO metadata for this article...
{$text}";

// 3. Call OpenRouter (DeepSeek V3)
$response = GptAction::ask($prompt);

// 4. Parse JSON
$seo = json_decode($response, true);
// => ["meta_title" => "...", "meta_description" => "...", ...]

// 5. Save to DB
DetailService::updateSeo($blogId, $seo);
// => blogs.seo = JSON string
```

---

## 📡 RSS Import Flow

```
┌─────────────────────────────────────────────────────────────┐
│                    RSS IMPORT PIPELINE                      │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  ┌─────────────────┐                                        │
│  │  RSS Feed URL   │                                        │
│  │  (XML Source)   │                                        │
│  └────────┬────────┘                                        │
│           │                                                 │
│           ▼                                                 │
│  ┌─────────────────┐     ┌─────────────────┐                │
│  │ImportNewsCommand│     │  Parse XML      │                │
│  │  (Artisan CLI)  │────>│  simplexml_load │                │
│  │  php artisan    │     │  LIBXML_NOCDATA │                │
│  │  import:news    │     └────────┬────────┘                │
│  └─────────────────┘              │                         │
│                                   │                         │
│                                   ▼                         │
│                           ┌─────────────────┐               │
│                           │  Deduplicate    │               │
│                           │  Check rss_link │               │
│                           │  + title combo  │               │
│                           └────────┬────────┘               │
│                                    │                        │
│                           ┌────────┴──────────┐             │
│                           │  Exists?          │             │
│                           │  ├─ Yes → Skip    │             │
│                           │  └─ No  → Continue│             │
│                           └────────┬──────────┘             │
│                                    │                        │
│                                    ▼                        │
│  ┌─────────────────┐    ┌─────────────────┐                 │
│  │   RssJob        │<───│  Dispatch to    │                 │
│  │   (Queue)       │    │  Queue          │                 │
│  └────────┬────────┘    └─────────────────┘                 │
│           │                                                 │
│           ▼                                                 │
│  ┌─────────────────┐    ┌─────────────────┐                 │
│  │  Download Image │    │  Match Category │                 │
│  │   from enclosure│    │  by fa_name     │                 │
│  │   → Storage::   │    │  → Category::   │                 │
│  │   disk('public')│    │    firstOrCreate│                 │
│  └────────┬────────┘    └────────┬────────┘                 │
│           │                      │                          │
│           └──────────┬───────────┘                          │
│                      │                                      │
│                      ▼                                      │
│             ┌─────────────────┐                             │
│             │  BlogService::  │                             │
│             │  store($data,   │                             │
│             │ $image, $author,│                             │
│             │  $category)     │                             │
│             └────────┬────────┘                             │
│                      │                                      │
│                      ▼                                      │
│             ┌─────────────────┐                             │
│             │   Blog Created  │                             │
│             │   (Observer     │                             │
│             │    Triggered)   │                             │
│             └────────┬────────┘                             │
│                      │                                      │
│                      ▼                                      │
│             ┌─────────────────┐                             │
│             │  BlogObserver:: │                             │
│             │  created()      │                             │
│             └────────┬────────┘                             │
│                      │                                      │
│                      ▼                                      │
│             ┌─────────────────┐                             │
│             │SendRss::dispatch│                             │
│             │  ($blog->id)    │                             │
│             │  delay(5s)      │                             │
│             └────────┬────────┘                             │
│                      │                                      │
│                      ▼                                      │
│             ┌─────────────────┐                             │
│             │  RssMail::send  │                             │
│             │  to subscribers │                             │
│             └─────────────────┘                             │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│  Result: Blog saved + Image stored + Category linked        │
│          + Email sent to all newsletter subscribers         │
└─────────────────────────────────────────────────────────────┘
```

### Key Classes

| Class | Role |
|-------|------|
| `ImportNewsCommand` | CLI entry, parses XML, deduplicates, dispatches jobs |
| `RssJob` | Processes each RSS item (image, category, storage) |
| `BlogService::store()` | Persists blog to DB |
| `BlogObserver` | Triggers `SendRss` on create/update |
| `SendRss` | Queue job for email delivery |
| `RssMail` | Mailable template |

---

## 📊 Category Import Flow

```
┌─────────────────────────────────────────────────────────────┐
│                 CATEGORY IMPORT PIPELINE                    │
├─────────────────────────────────────────────────────────────┤
│                                                             │
│  ┌─────────────────┐                                        │
│  │ Category Source │                                        │
│  │ (External API   │                                        │
│  │  or RSS Feed)   │                                        │
│  └────────┬────────┘                                        │
│           │                                                 │
│           ▼                                                 │
│  ┌──────────────────┐     ┌─────────────────┐               │
│  │ ImportCategories │     │  Fetch & Parse  │               │
│  │  Command         │────>│  Category Data  │               │
│  │  php artisan     │     └────────┬────────┘               │
│  │ import:categories│              │                        │
│  └──────────────────┘              │                        │
│                                    │                        │
│                                    ▼                        │
│                          ┌───────────────────┐              │
│                          │  For Each Category│              │
│                          │  ├─ name (EN)     │              │
│                          │  ├─ fa_name (FA)  │              │
│                          │  ├─ slug          │              │
│                          │  ├─ type          │              │
│                          │  └─ status        │              │
│                          └────────┬──────────┘              │
│                                   │                         │
│                                   ▼                         │
│                          ┌───────────────────┐              │
│                          │  Category::       │              │
│                          │  firstOrCreate(   │              │
│                          │ ['slug' => $slug],│              │
│                          │    $categoryData  │              │
│                          │  )                │              │
│                          └────────┬──────────┘              │
│                                   │                         │
│                                   ▼                         │
│                          ┌─────────────────┐                │
│                          │  Category Saved │                │
│                          │  or Updated     │                │
│                          └─────────────────┘                │
│                                                             │
├─────────────────────────────────────────────────────────────┤
│  Result: Categories ready for blog assignment               │
└─────────────────────────────────────────────────────────────┘
```

---

## 📧 Email Notification System

**Auto-Subscribe & Notify:**

When a user registers via the newsletter form, they are automatically subscribed. From that point:

- **Every new/updated blog** triggers an automatic email
- **Observer-driven**: `BlogObserver` watches `created` and `updated` events
- **Queue-based**: `SendRss` job dispatched with 5s delay
- **Template**: `resources/views/mail/rss.blade.php`

```php
// BlogObserver.php
public function created(Blog $blog): void
{
    SendRss::dispatch($blog->id)->delay(now()->addSeconds(5));
}

public function updated(Blog $blog): void
{
    SendRss::dispatch($blog->id)->delay(now()->addSeconds(5));
}
```

---

## 🎛️ Admin Dashboard

**URL**: `/admin`

| Resource | Features |
|----------|----------|
| **Blogs** | Custom Form/Table/Infolist, status toggle, SEO preview |
| **Categories** | Relation Manager, bilingual fields, image upload |
| **Comments** | Pin/unpin, status filter |
| **Hashtags** | Bulk management, usage stats |
| **Menus** | Header/footer toggle, parent-child tree |
| **Users** | Author management, role separation |

### Dashboard Widgets
- `BlogStats` — Total articles, view trends
- `CategoryStats` — Category distribution

---

## 🎨 Frontend Routes

| Route | Description |
|-------|-------------|
| `/` | Home — Hero slider, latest articles, authors |
| `/blog` | Article listing with sort & search |
| `/blog/{type}/{slug}` | Article detail + comments + related |
| `/categories` | Category directory |
| `/categories/{slug}` | Category articles + stats |
| `/authors` | Author directory with rankings |
| `/authors/{id}` | Author profile + articles |
| `/comment/{blogId}` | Submit comment (POST) |
| `/auth/newsletter/register` | Newsletter signup (POST) |

---

## 🚀 Installation

### Docker (Recommended)
```bash
git clone https://gitlab.com/younes8102/blog.git && cd blog
cp .env.example .env
docker-compose up -d
docker-compose exec app php artisan migrate
```

### Manual
```bash
git clone https://gitlab.com/younes8102/blog.git && cd blog
composer install && npm install
cp .env.example .env && php artisan key:generate
php artisan migrate
npm run build
php artisan serve
```

---

## 🌱 Seeding Order

> **Must follow this order** — dependencies matter:

```bash
# 1. Categories first (blogs need them)
php artisan import:categories

# 2. Blogs second (seeders need them)
php artisan import:news https://example.com/feed.xml

# 3. Seeders last (attach to existing blogs)
php artisan db:seed --class=HashtagSeeder   # attaches hashtags to blogs
php artisan db:seed --class=UserSeeder      # creates authors, assigns to blogs
php artisan db:seed --class=FilamentAdminSeeder
```

---

## 🔐 Environment Variables

```env
APP_NAME="Fyrre Magazine"
APP_URL=http://localhost

DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=blog_dashboard
DB_USERNAME=younes
DB_PASSWORD=Blog81Dashboard

QUEUE_CONNECTION=database
CACHE_STORE=database
SESSION_DRIVER=database

# AI — requires VPN in some regions
OPENROUTER_API_KEY=sk-or-v1-xxxxxxxxxxxxxxxx

MAIL_MAILER=log
MAIL_FROM_ADDRESS=hello@example.com
```

---

## 🖥 Artisan Commands

### Custom Commands
| Command | Description |
|---------|-------------|
| `php artisan import:news {url}` | Import RSS feed |
| `php artisan import:categories` | Import categories |
| `php artisan seo:generate` | AI SEO (needs VPN) |
| `php artisan faq:generate` | AI FAQ (needs VPN) |
| `php artisan category:content:generate` | AI category content (needs VPN) |

### Dev Commands
| Command | Description |
|---------|-------------|
| `php artisan serve` | Dev server |
| `php artisan queue:listen` | Process queues |
| `php artisan migrate` | Run migrations |
| `php artisan db:seed` | Seed data |
| `php artisan pail` | Real-time logs |

---

## 📁 Project Structure

```
blog/
├── app/
│   ├── ActionModels/        # AI prompt generators
│   ├── Actions/             # OpenRouter client, SEO/FAQ logic
│   ├── Console/Commands/    # RSS import, AI generation
│   ├── Filament/            # Admin resources, widgets
│   ├── Http/Controllers/    # Frontend controllers
│   ├── Http/Requests/       # Form validation
│   ├── Jobs/                # Queue: RssJob, SendRss
│   ├── Mail/                # RssMail notification
│   ├── Models/              # Blog, Category, User, etc.
│   ├── Observers/           # BlogObserver (email trigger)
│   ├── Services/            # Business logic layer
│   └── Traits/              # HasSearch reusable trait
├── database/
│   ├── migrations/          # 8 tables
│   └── seeders/             # HashtagSeeder, UserSeeder, etc.
├── resources/views/         # Blade templates (RTL)
├── routes/
│   ├── console.php          # Scheduled commands
│   └── web.php              # Web routes
├── docker-compose.yml       # PHP-FPM + Nginx + MySQL
├── Dockerfile               # PHP 8.4-FPM
└── nginx/default.conf       # Nginx config
```

---

## ⚡ Performance & Security

- **Eager Loading**: `with(['category', 'user'])` on all lists
- **Pagination**: `paginate()` with `withQueryString()`
- **Queue Processing**: Async RSS + email
- **CSRF**: All POST routes protected
- **XSS**: Blade auto-escaping
- **SQL Injection**: Eloquent ORM only
- **File Upload**: ULID naming, isolated disk

---

## 👨‍💻 Developer

**Younes Sahraei**

[![GitLab](https://img.shields.io/badge/GitLab-@younes8102-FC6D26?style=flat&logo=gitlab)](https://gitlab.com/younes8102)
[![Project](https://img.shields.io/badge/Project-Fyrre%20Magazine-181717?style=flat&logo=gitlab)](https://gitlab.com/younes8102/blog)

---

## 📄 License

MIT License

---

<div align="center">

**Built with ❤️ using Laravel 13 & Filament 5.6**

</div>
