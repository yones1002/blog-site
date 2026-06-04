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

## 📑 Table of Contents

- [Project Overview](#-project-overview)
- [Tech Stack](#-tech-stack)
- [System Architecture](#-system-architecture)
- [Database Schema](#-database-schema)
- [Key Features](#-key-features)
- [AI Integration](#-ai-integration)
- [RSS Pipeline](#-rss-pipeline)
- [Email Notification System](#-email-notification-system)
- [Admin Dashboard](#-admin-dashboard)
- [Frontend](#-frontend)
- [API Endpoints](#-api-endpoints)
- [Installation](#-installation)
- [Seeding Order](#-seeding-order)
- [Environment Variables](#-environment-variables)
- [Artisan Commands](#-artisan-commands)
- [Project Structure](#-project-structure)
- [Performance & Security](#-performance--security)
- [Developer](#-developer)

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

### Backend
| Technology | Version | Purpose |
|------------|---------|---------|
| **Laravel** | 13.x | Core Framework |
| **PHP** | 8.4 | Runtime |
| **Filament** | 5.6 | Admin Panel |
| **MySQL** | 8.0 | Primary Database |
| **Laravel Lang** | 6.8 | Persian Localization |

### DevOps & Tools
| Technology | Purpose |
|------------|---------|
| **Docker** | Containerization (PHP-FPM + Nginx + MySQL) |
| **PHPUnit** | 12.5 Testing |
| **Laravel Pint** | Code Style |
| **GitLab CI** | CI/CD Ready |

### External APIs
| Service | Integration |
|---------|-------------|
| **OpenRouter AI** | DeepSeek V3 for content generation |
| **RSS Feeds** | XML aggregation and import |

---

## 🏗 System Architecture

```
┌─────────────────────────────────────────────────────────────┐
│                      PRESENTATION LAYER                     │
│  ┌──────────────┐  ┌───────────────┐  ┌──────────────────┐  │
│  │  Blade Views │  │ Filament Admin│  │   API Routes     │  │
│  │   (RTL/FA)   │  │   /admin      │  │   (web.php)      │  │
│  └──────────────┘  └───────────────┘  └──────────────────┘  │
├─────────────────────────────────────────────────────────────┤
│                      CONTROLLER LAYER                       │
│  ┌──────────┐ ┌──────────┐ ┌──────────┐ ┌──────────────┐    │
│  │  Home    │ │  Blog    │ │ Category │ │   Authors    │    │
│  │Controller│ │Controller│ │Controller│ │  Controller  │    │
│  └──────────┘ └──────────┘ └──────────┘ └──────────────┘    │
├─────────────────────────────────────────────────────────────┤
│                      SERVICE LAYER                          │
│  ┌────────────┐ ┌────────────┐ ┌────────────┐ ┌──────────┐  │
│  │BlogService │ │CategorySvc │ │CommentSvc  │ │DetailSvc │  │
│  │(CRUD/Store)│ │(Management)│ │(Moderation)│ │(SEO/FAQ) │  │
│  └────────────┘ └────────────┘ └────────────┘ └──────────┘  │
├─────────────────────────────────────────────────────────────┤
│                      ACTION LAYER                           │
│  ┌──────────────┐  ┌───────────────────┐  ┌──────────────┐  │
│  │  GptAction   │  │ SocialDetailAction│  │DetailGenerate│  │
│  │ (OpenRouter) │  │ (SEO/FAQ Logic)   │  │ (AI Prompts) │  │
│  └──────────────┘  └───────────────────┘  └──────────────┘  │
├─────────────────────────────────────────────────────────────┤
│                      DOMAIN LAYER                           │
│  ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐ ┌────────┐     │
│  │  Blog  │ │Category│ │  User  │ │Comment │ │Hashtag │     │
│  │ Model  │ │ Model  │ │ Model  │ │ Model  │ │ Model  │     │
│  └────────┘ └────────┘ └────────┘ └────────┘ └────────┘     │
│  ┌──────────────────────────────────────────────────────┐   │
│  │              BlogObserver (Event-Driven)             │   │
│  │         Auto-dispatch SendRss on create/update       │   │
│  └──────────────────────────────────────────────────────┘   │
├─────────────────────────────────────────────────────────────┤
│                      QUEUE LAYER                            │
│  ┌─────────────┐  ┌────────────────┐  ┌────────────────┐    │
│  │  RssJob     │  │RssCategoriesJob│  │    SendRss     │    │
│  │(Import Item)│  │(Import Cats)   │  │ (Email Notify) │    │
│  └─────────────┘  └────────────────┘  └────────────────┘    │
└─────────────────────────────────────────────────────────────┘
```

### Design Patterns Implemented
- **Service Layer Pattern**: Business logic isolated in `BlogService`, `CategoryService`, etc.
- **Action Pattern**: Single-responsibility classes (`GptAction`, `SocialDetailAction`)
- **Observer Pattern**: `BlogObserver` triggers email notifications on model events
- **Command Pattern**: Artisan commands for scheduled operations
- **Repository Pattern**: Eloquent scopes (`Active`, `Search`, `Authors`) act as query repositories
- **Polymorphic Relations**: Comments and Hashtags attach to any model type

---

## 🗄 Database Schema

### Entity Relationship Overview

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
                             │                     │
                             │         ┌───────────┴────────────┐
                             │         │   model_has_hashtag    │
                             │         ├────────────────────────┤
                             │         │ hashtags_id (FK)       │
                             │         │ model_id, model_type   │
                             │         └────────────────────────┘
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

| Table | Records | Description |
|-------|---------|-------------|
| `blogs` | Articles & News | Core content with JSON SEO/FAQ, soft deletes, view counter |
| `categories` | Taxonomy | Bilingual names (EN/FA), polymorphic pivot support |
| `hashtag` | Tags | Polymorphic tagging via `model_has_hashtag` |
| `comments` | User Comments | Polymorphic, pin-able, status-controlled |
| `menus` | Navigation | Self-referencing tree (header/footer) |
| `users` | Authors & Admins | Type-based separation (`authors` scope) |

### JSON Fields
- `blogs.seo` → `[{meta_title, meta_description, meta_keywords, og_title, twitter_title, ...}]`
- `blogs.faq` → `[{question, answer}, ...]`
- `categories.json` → Metadata storage

---

## ✨ Key Features

### 📝 Content Management
- **Dual Content Types**: `news` (auto-imported) and `article` (editorial)
- **Smart SEO**: Auto-generated meta tags, Open Graph, Twitter Cards via AI
- **FAQ Generator**: Extracts 3 comprehensive Q&A pairs from article content
- **View Analytics**: Real-time view counter with popular/oldest sorting
- **Soft Delete**: Safe content removal with recovery option
- **Bilingual Support**: Content in Persian (FA) and English (EN)

### 🏷️ Taxonomy System
- **Hierarchical Categories**: Parent-child relationships with blog counting
- **Polymorphic Hashtags**: Tag any model type via `model_has_hashtag` pivot
- **Polymorphic Categories**: Flexible categorization via `model_has_category`
- **Random Discovery**: `inRandomOrder()` for tags and related content

### 👤 Author System
- **Author Profiles**: Blog count, total views, latest articles
- **Leaderboards**: Sort by popularity (views) or productivity (article count)
- **Related Authors**: Discover similar writers
- **Random Assignment**: RSS imports auto-assign to random authors

### 💬 Comment System
- **Pinned Comments**: Highlight important discussions
- **Polymorphic Attachments**: Comments on blogs, articles, or future models
- **Validation**: Laravel FormRequest with custom rules
- **Moderation Ready**: Status field for approval workflow

### 📡 RSS Automation Pipeline
```
RSS Feed URL
    ↓
[ImportNewsCommand] → Parse XML (simplexml + LIBXML_NOCDATA)
    ↓
Duplicate Check (rss_link + title)
    ↓
[RssJob dispatched to Queue]
    ↓
Download Image from enclosure → Storage::disk('public')
    ↓
Match/Create Category (fa_name matching)
    ↓
Random Author Assignment
    ↓
[BlogService::store()] → Persist to DB
    ↓
[BlogObserver] → Dispatch SendRss Email Job
    ↓
Email Notification Sent
```

---

## 🤖 AI Integration

> ⚠️ **Note**: The two AI content generation commands (`seo:generate` and `app:category-content-generate` and `faq:generate`) require a **VPN/Proxy** to connect to OpenRouter API, as the service may be restricted in some regions.

### OpenRouter + DeepSeek V3
```php
// app/Actions/GptAction.php
$response = Http::withHeaders([
    'Authorization' => 'Bearer ' . env('OPENROUTER_API_KEY'),
    'Content-Type' => 'application/json',
])->post('https://openrouter.ai/api/v1/chat/completions', [
    'model' => 'deepseek/deepseek-chat-v3',
    'messages' => [['role' => 'user', 'content' => $prompt]]
]);
```

### AI Capabilities

| Feature | Class | Output |
|---------|-------|--------|
| **SEO Generation** | `SocialDetailAction` + `DetailGenerate::makeSeo()` | JSON with meta_title, meta_description, meta_keywords, og/twitter tags |
| **FAQ Generation** | `DetailGenerate::makeFaq()` | Array of 3 Persian Q&A pairs |
| **Persian Summary** | `DetailGenerate::makeFa()` | 3-4 line concise summary |
| **English Summary** | `DetailGenerate::makeEn()` | 3-4 line English summary |
| **Category Content** | `SocialDetailCategoryAction` | AI-generated category descriptions |

### AI Commands
```bash
php artisan seo:generate          # Generate SEO for articles
php artisan faq:generate          # Generate FAQs for articles
php artisan category:content:generate  # Generate category descriptions
```

---

## 📡 RSS Pipeline

### Architecture
```
┌──────────────────┐
│  RSS Source URL  │
└────────┬─────────┘
         │
┌────────▼─────────┐     ┌────────────┐
│ Artisan Command  │────▶│RssJob Queue│
│ import:news      │     │(Background)│
└──────────────────┘     └────┬───────┘
                              │
              ┌───────────────┼───────────────┐
              ▼               ▼               ▼
        ┌─────────┐    ┌──────────┐    ┌──────────┐
        │ Download│    │  Match   │    │  Store   │
        │  Image  │    │ Category │    │  Blog    │
        └─────────┘    └──────────┘    └────┬─────┘
                                            │
                                   ┌────────▼────────┐
                                   │ BlogObserver    │
                                   │ dispatch SendRss│
                                   └─────────────────┘
```

### Key Classes
- `ImportNewsCommand`: CLI entry point, parses XML, deduplicates, dispatches jobs
- `RssJob`: Processes individual RSS items (image download, category matching, storage)
- `RssCategoriesJob`: Handles category extraction from RSS feeds
- `BlogObserver`: Watches Blog model, triggers `SendRss` on create/update
- `RssMail`: Mailable for new article notifications
- `SendRss`: Queue job for email delivery

---

## 📧 Email Notification System

### Auto-Subscribe & Notify
When a user registers as a **member** via the newsletter signup form, they are automatically subscribed. From that point forward:

- **Every new blog post** that is created or updated triggers an automatic email notification
- **Observer-driven**: The `BlogObserver` watches `created` and `updated` events on the Blog model
- **Queue-based**: `SendRss` job is dispatched with a 5-second delay to ensure the post is fully persisted
- **Template**: Uses `resources/views/mail/rss.blade.php` with post title, excerpt, and link

### How It Works
```php
// app/Observers/BlogObserver.php
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

### Filament 5.6 Panel
**URL**: `/admin`

| Resource | Features |
|----------|----------|
| **Blogs** | Custom Form/Table/Infolist schemas, status toggle, SEO preview |
| **Categories** | Relation Manager for blogs, bilingual fields, image upload |
| **Comments** | Pin/unpin, status filter, polymorphic source tracking |
| **Hashtags** | Bulk management, status control, usage statistics |
| **Menus** | Drag-sort, header/footer toggle, parent-child tree |
| **Users** | Author management, role separation, activity tracking |

### Dashboard Widgets
- `BlogStats`: Total articles, news vs article ratio, view trends
- `CategoryStats`: Category distribution, most active categories

### Panel Configuration
```php
// AdminPanelProvider.php
->id('admin')
->path('admin')
->login()
->colors(['primary' => Color::Amber])
->discoverResources(in: app_path('Filament/Resources'))
```

---

## 🎨 Frontend

### Public Routes

| Method | Route | Controller | Description |
|--------|-------|------------|-------------|
| GET | `/` | `HomeController` | Hero slider, latest articles, authors |
| GET | `/blog` | `BlogController@index` | Paginated articles with sort & search |
| GET | `/blog/{type}/{slug}` | `BlogController@show` | Article detail + comments + related |
| GET | `/categories` | `CategoryController@index` | Category listing with stats |
| GET | `/categories/{slug}` | `CategoryController@show` | Category articles + author stats |
| GET | `/authors` | `AuthorsController@index` | Author directory with rankings |
| GET | `/authors/{id}` | `AuthorsController@show` | Author profile + articles |
| POST | `/comment/{blogId}` | `CommentController@store` | Submit comment |
| POST | `/auth/newsletter/register` | `AuthController` | Newsletter signup |

### Blade Layout
```
master.blade.php
├── header.blade.php      → Navigation + Menu
├── subheader.blade.php   → Breadcrumbs/Alerts
├── @yield('content')     → Page-specific content
└── footer.blade.php     → Links + Newsletter
```

### RTL Features
- Full Persian (Farsi) interface
- RTL CSS direction
- Persian date formatting
- Jalali calendar support (via Laravel Lang)

---

## 🔌 API Endpoints

### Web Routes (`routes/web.php`)
```php
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'auth'], function () {
    Route::post('/newsletter/register', [AuthController::class, 'registerMember'])
        ->name('auth.register.member');
});

Route::group(['prefix' => 'blog'], function () {
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('/{type}/{slug}', [BlogController::class, 'show'])->name('blogs.show');
});

Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/{slug}', [CategoryController::class, 'show'])->name('category.show');
});

Route::group(['prefix' => 'authors'], function () {
    Route::get('/', [AuthorsController::class, 'index'])->name('author.index');
    Route::get('/{id}', [AuthorsController::class, 'show'])->name('author.show');
});

Route::post('comment/{blogId}', [CommentController::class, 'store'])
    ->name('comment.store');
```

---

## 🚀 Installation

### Prerequisites
- PHP >= 8.3 with extensions: `pdo_mysql`, `mbstring`, `exif`, `pcntl`, `bcmath`, `gd`, `zip`, `intl`, `libxml`, `simplexml`
- Composer 2.x
- MySQL 8.0
- Node.js 20+

### Docker Setup (Recommended)
```bash
# Clone repository
git clone https://gitlab.com/younes8102/blog.git
cd blog

# Start containers
docker-compose up -d --build

# Run migrations
docker-compose exec app php artisan migrate

# Install dependencies
docker-compose exec app composer install
docker-compose exec app npm install && npm run build
```

Services:
| Service | Container | Port | Description |
|---------|-----------|------|-------------|
| **app** | `blog_app` | - | PHP 8.4-FPM |
| **web** | `blog_nginx` | `8181:80` | Nginx reverse proxy |
| **db** | `blog_mysql` | `3307:3306` | MySQL 8.0 |

### Manual Setup
```bash
# 1. Clone
git clone https://gitlab.com/younes8102/blog.git
cd blog

# 2. Dependencies
composer install
npm install

# 3. Environment
cp .env.example .env
php artisan key:generate

# 4. Database
php artisan migrate

# 5. Build assets
npm run build

# 6. Serve
php artisan serve
```

---

## 🌱 Seeding Order

> ⚠️ **Important**: Seeders must be executed in the following order due to foreign key dependencies:

### Step 1: Import Categories
```bash
php artisan import:categories
```
> Blogs depend on categories existing first.

### Step 2: Import Blogs (via RSS)
```bash
php artisan import:news {rss-url}
```
> This populates the blogs table with actual content.

### Step 3: Run Seeders
```bash
php artisan db:seed --class=HashtagSeeder
php artisan db:seed --class=UserSeeder
```
> These seeders depend on the blog list already existing:
> - `HashtagSeeder` attaches hashtags to existing blogs via `model_has_hashtag`
> - `UserSeeder` creates authors and assigns them to existing blogs

### Full Seeding Sequence
```bash
# 1. Categories first
php artisan import:categories

# 2. Blogs second (via RSS import)
php artisan import:news https://example.com/feed.xml

# 3. Seeders last (depend on blogs existing)
php artisan db:seed --class=HashtagSeeder
php artisan db:seed --class=UserSeeder
php artisan db:seed --class=FilamentAdminSeeder
```

---

## 🔐 Environment Variables

```env
APP_NAME="Fyrre Magazine"
APP_URL=http://localhost

# Database
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=blog_dashboard
DB_USERNAME=younes
DB_PASSWORD=Blog81Dashboard

# Queue & Cache
QUEUE_CONNECTION=database
CACHE_STORE=database
SESSION_DRIVER=database

# AI (OpenRouter) — requires VPN in some regions
OPENROUTER_API_KEY=sk-or-v1-xxxxxxxxxxxxxxxx

# Mail
MAIL_MAILER=log
MAIL_FROM_ADDRESS=hello@example.com
```

> ⚠️ **Security Note**: Replace the default `OPENROUTER_API_KEY` before production deployment.

---

## 🖥 Artisan Commands

### Custom Commands (Auto-Scheduled via `console.php`)
All custom commands are automatically registered in `routes/console.php` and can be scheduled via Laravel's task scheduler:

| Command | Description | Scheduling |
|---------|-------------|------------|
| `php artisan import:news {url}` | Import RSS feed articles | Manual / Scheduled |
| `php artisan import:categories` | Import categories from source | Manual / Scheduled |
| `php artisan seo:generate` | AI-generate SEO metadata | Manual (requires VPN) |
| `php artisan faq:generate` | AI-generate FAQ sections | Manual (requires VPN) |
| `php artisan category:content:generate` | AI-generate category descriptions | Manual (requires VPN) |

### Development Commands
| Command | Description |
|---------|-------------|
| `php artisan serve` | Development server |
| `php artisan queue:listen` | Process queue jobs |
| `php artisan migrate` | Run database migrations |
| `php artisan db:seed` | Seed sample data |
| `php artisan filament:upgrade` | Upgrade Filament assets |
| `php artisan pail` | Real-time log monitoring |

---

## 📁 Project Structure

```
blog/
├── app/
│   ├── ActionModels/              # AI prompt models
│   │   └── DetailGenerate.php     # SEO/FAQ/Content generators
│   ├── Actions/                   # Business actions
│   │   ├── GptAction.php          # OpenRouter API client
│   │   ├── SocialDetailAction.php # SEO & FAQ orchestration
│   │   └── SocialDetailCategoryAction.php
│   ├── Console/Commands/          # CLI commands
│   │   ├── CategoryContentGenerate.php
│   │   ├── FaqGenerate.php
│   │   ├── ImportCategoriesCommand.php
│   │   ├── ImportNewsCommand.php
│   │   └── SeoGenerate.php
│   ├── Contracts/                 # Interfaces
│   │   ├── AiCategoryDataGenerate.php
│   │   └── AiDataGenerate.php
│   ├── Filament/                  # Admin panel
│   │   ├── Pages/Dashboard.php
│   │   ├── Resources/
│   │   │   ├── Blogs/             # BlogResource, BlogForm, BlogInfolist, BlogsTable
│   │   │   ├── Categories/        # CategoryResource, Forms, Tables, RelationManager
│   │   │   ├── Comments/
│   │   │   ├── Hashtags/
│   │   │   ├── Menus/
│   │   │   └── Users/
│   │   └── Widgets/               # BlogStats, CategoryStats
│   ├── Http/Controllers/          # Frontend controllers
│   │   ├── AuthController.php
│   │   ├── AuthorsController.php
│   │   ├── BlogController.php
│   │   ├── CategoryController.php
│   │   ├── CommentController.php
│   │   └── HomeController.php
│   ├── Http/Requests/             # Form validation
│   │   ├── CommentRequest.php
│   │   └── RegisterMemberRequest.php
│   ├── Jobs/                      # Queue jobs
│   │   ├── RssCategoriesJob.php
│   │   ├── RssJob.php
│   │   └── SendRss.php
│   ├── Mail/                      # Mailables
│   │   └── RssMail.php
│   ├── Models/                    # Eloquent models
│   │   ├── Blog.php               # Scopes: Active, Search
│   │   ├── Category.php           # Scopes: Active, Search
│   │   ├── Comment.php            # Polymorphic
│   │   ├── Hashtag.php            # Polymorphic
│   │   ├── Menu.php               # Self-referencing tree
│   │   └── User.php               # Scopes: Authors, Search
│   ├── Observers/                 # Model observers
│   │   └── BlogObserver.php       # Auto-dispatch email jobs
│   ├── Providers/
│   │   ├── AppServiceProvider.php
│   │   └── Filament/AdminPanelProvider.php
│   ├── Services/                  # Business logic layer
│   │   ├── BlogService.php        # Store/import logic
│   │   ├── CategoryService.php
│   │   ├── CommentService.php
│   │   └── DetailService.php      # SEO/FAQ persistence
│   └── Traits/
│       └── HasSearch.php          # Reusable search trait
├── database/
│   ├── migrations/                # 8 migration files
│   └── seeders/                   # Database seeders
│       ├── DatabaseSeeder.php
│       ├── FilamentAdminSeeder.php
│       ├── HashtagSeeder.php      # Attaches hashtags to blogs
│       └── UserSeeder.php         # Creates authors, assigns to blogs
├── resources/
│   ├── views/                     # Blade templates (RTL)
│   │   ├── layout/                # master, header, footer, subheader
│   │   ├── blog/                  # index, show
│   │   ├── categories/            # index, show
│   │   ├── authors/               # index, show
│   │   └── Home.blade.php
│   ├── css/
│   └── js/
├── routes/
│   ├── console.php                # Scheduled commands
│   └── web.php                    # Web routes
├── docker-compose.yml             # 3-service orchestration
├── Dockerfile                     # PHP 8.4-FPM image
├── nginx/default.conf             # Nginx vhost
├── composer.json                  # PHP dependencies
└── .env.example                   # Environment variables
```

---

## ⚡ Performance & Security

### Performance Optimizations
- **Eager Loading**: `with(['category', 'user'])` on all index queries
- **Pagination**: `paginate(10/12/15)` with `withQueryString()`
- **Queue Processing**: RSS imports and emails processed asynchronously
- **Database Indexing**: Slug and status columns optimized
- **Image Storage**: Public disk with ULID naming
- **Cache**: Database-driven cache and session store

### Security Measures
- **CSRF Protection**: All POST routes protected
- **XSS Prevention**: Blade auto-escaping (`{{ }}` syntax)
- **SQL Injection**: Eloquent ORM with parameter binding
- **File Upload**: ULID naming, public disk isolation
- **Form Validation**: Dedicated FormRequest classes
- **Soft Deletes**: Prevents accidental data loss
- **Environment Isolation**: Sensitive keys in `.env` only

---

## 👨‍💻 Developer

**Younes Sahraei**

[![GitLab](https://img.shields.io/badge/GitLab-@younes8102-FC6D26?style=flat&logo=gitlab)](https://gitlab.com/younes8102)
[![Project](https://img.shields.io/badge/Project-Fyrre%20Magazine-181717?style=flat&logo=gitlab)](https://gitlab.com/younes8102/blog)

---

## 📄 License

This project is open-source and available under the **MIT License**.

---

<div align="center">

**Built with ❤️ using Laravel 13 & Filament 5.6**

</div>
