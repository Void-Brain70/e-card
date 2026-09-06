# E-Card Platform — Product & Feature Documentation

> **Stack:** PHP 8.4 · Laravel 13 · Vue 3 · Inertia.js · Tailwind CSS v4 · MySQL

---

## Table of Contents

1. [Project Overview](#1-project-overview)
2. [Welcome Page Design Concept](#2-welcome-page-design-concept)
3. [Authentication — Register & Login](#3-authentication--register--login)
4. [User Dashboard](#4-user-dashboard)
5. [Card Types & Designer](#5-card-types--designer)
6. [Draft System](#6-draft-system)
7. [Auto-Generated Shareable Links](#7-auto-generated-shareable-links)
8. [Modern E-Card Features (Suggestions)](#8-modern-e-card-features-suggestions)
9. [Monetization Strategy](#9-monetization-strategy)
10. [Database Schema Overview](#10-database-schema-overview)
11. [Tech Stack Summary](#11-tech-stack-summary)

---

## 1. Project Overview

**E-Card** is a modern web platform that lets users design, personalize, and instantly share digital greeting cards for any occasion — wedding, birthday, business, or celebration. Cards are created in a rich visual editor, saved as drafts, and shared via auto-generated public links — no app download required for the recipient.

---

## 2. Welcome Page Design Concept

### Purpose
Convert visitors into registered users by showcasing the platform's beauty, simplicity, and social proof.

### Sections

#### Hero Section
- Full-screen gradient background (deep purple → rose → gold tones)
- Animated floating card mockups (wedding, birthday, business) cycling in a 3D carousel
- Headline: **"Create Cards That Feel Personal. Share in Seconds."**
- Subheadline: *"Design stunning digital cards for every occasion — no design skills needed."*
- Two CTAs: **[Start for Free]** (primary) · **[Browse Templates]** (ghost)
- Subtle animated confetti or floating petals in the background

#### Features Strip (3-column)
| Icon | Title | Description |
|------|-------|-------------|
| 🎨 | Beautiful Templates | 100+ premium designs across 10+ categories |
| ⚡ | Instant Sharing | One link — share anywhere, no app needed |
| 💾 | Save as Draft | Come back and perfect it before sending |

#### Live Template Gallery
- Masonry grid of card previews with hover animation (tilt + glow)
- Filter tabs: Wedding · Birthday · Business · Gift · Festival
- "Use This Template" button on hover — routes to register/login

#### How It Works (3 Steps)
1. **Choose a Template** — Pick from curated categories
2. **Personalize It** — Add your text, photo, music, and colors
3. **Share the Link** — Copy your unique link and send anywhere

#### Social Proof
- User count badge: *"50,000+ cards created"*
- 3–4 testimonial cards (avatar + quote)
- Logo strip of "As featured in" (optional)

#### Pricing Teaser
- Simple 3-tier card: Free · Pro · Business
- "Start Free, Upgrade Anytime" CTA

#### Footer
- Links: About · Pricing · Blog · Templates · Privacy · Terms
- Social icons
- Newsletter signup: *"Get design tips & new templates weekly"*

---

## 3. Authentication — Register & Login

### Register Page
- Fields: Full Name · Email · Password · Confirm Password
- Social login: Google OAuth (optional, Phase 2)
- On success: redirect to onboarding → choose first card type
- Email verification (optional, configurable)

### Login Page
- Email + Password
- "Remember me" checkbox
- "Forgot password" link → email reset flow
- Social login (Google)
- On success: redirect to User Dashboard

### Onboarding (Post-Register, 1 Screen)
- "What will you create first?" — pick card category
- Sets first session context, shows relevant templates

---

## 4. User Dashboard

### Layout
- Left sidebar: navigation links
- Top bar: user avatar, notifications bell, "Create New Card" button
- Main content area: card grid / list toggle

### Sidebar Navigation
```
📊 Overview
🎨 My Cards
   ├── All Cards
   ├── Drafts
   ├── Published
   └── Archived
📁 Templates (saved favorites)
🔗 Shared Links
📈 Analytics
💳 Billing / Plan
⚙️  Settings
```

### Overview Panel (Stats)
| Metric | Description |
|--------|-------------|
| Total Cards Created | Count of all cards ever made |
| Active Shared Links | Links currently live |
| Total Views | How many times recipients opened cards |
| Drafts | Incomplete cards |

### My Cards Grid
- Card thumbnail, title, type badge, last edited date
- Actions per card: **Edit · Share · Duplicate · Archive · Delete**
- Status badges: `Draft` · `Published` · `Archived`
- Search & filter: by type, date, status

---

## 5. Card Types & Designer

### Supported Card Types

#### 1. Wedding Card
- Occasion: Invitation, Save-the-Date, Thank You
- Special fields: Couple names, wedding date, venue, RSVP link, countdown timer
- Style options: Floral, Minimalist, Vintage, Royal, Boho, Rustic
- Extras: Photo gallery slot (up to 5 photos), background music embed

#### 2. Visiting / Business Card
- Occasion: Professional introduction, networking
- Fields: Name, Job Title, Company, Email, Phone, Website, LinkedIn/Socials
- Layouts: Horizontal, Vertical, QR-code-first
- Style options: Corporate, Creative, Startup, Dark Mode, Pastel
- Extras: Digital vCard download button, QR code pointing to profile

#### 3. Gift Card
- Occasion: Birthday, Anniversary, Holiday, Thank You, General Gift
- Fields: Recipient name, sender name, personal message, value/amount (if monetized)
- Styles: Playful, Elegant, Fun, Festive, Minimal
- Extras: Confetti animation, scratch-to-reveal message effect

#### 4. (Future) Festival / Seasonal Card
- Eid, Christmas, Diwali, New Year, Holi
- Pre-built full-page animated templates

#### 5. (Future) Birthday Card
- Balloon animations, age highlight, song embed

---

### Card Designer UI

The designer is a drag-and-drop visual editor with the following panels:

#### Toolbar (Top)
```
[← Back]  [Card Title: "Untitled"]          [Save Draft]  [Preview]  [Publish & Share]
```

#### Left Panel — Layers & Elements
- Add Text Block
- Add Image (upload or stock library via Unsplash API)
- Add Shape (rectangle, circle, divider)
- Add Icon (Lucide icon picker)
- Add Sticker / Emoji
- Background (solid color, gradient, pattern, photo)

#### Center Canvas
- Responsive card canvas (A5 / standard postcard / custom size)
- Real-time preview
- Click-to-edit inline text
- Drag to reposition elements
- Resize handles on every element

#### Right Panel — Properties
- For selected text: font family, size, color, alignment, bold/italic/underline, letter spacing, line height
- For selected image: crop, border radius, opacity, shadow
- For canvas: background, card size, orientation

#### Design Toolbar (Bottom)
- Undo / Redo
- Zoom In / Out
- Grid toggle
- Alignment guides

---

## 6. Draft System

### How It Works
- "Save Draft" button saves the current canvas state as JSON to the database
- Draft auto-save triggers every 60 seconds while the editor is open (no data loss)
- Draft cards appear in the **Drafts** section of the dashboard with a grey badge
- A draft can be resumed at any time — the canvas restores exactly

### Draft States
| State | Description |
|-------|-------------|
| `draft` | Created but not published — only the owner can see it |
| `published` | Has an active shareable link — visible to anyone with the link |
| `archived` | Hidden from dashboard, not deleted, recoverable |

---

## 7. Auto-Generated Shareable Links

### Link Format
```
https://ecard.app/c/{unique-slug}
```
Example: `https://ecard.app/c/sarah-tom-wedding-2026`

- Slug is auto-generated from card title + random 6-char token
- User can customize the slug (Pro plan)
- Link is created when user clicks **"Publish & Share"**

### Share Options (on the Share Modal)
- Copy link button (clipboard)
- WhatsApp direct share
- Facebook share
- Email share (opens mail client)
- QR code download (PNG)
- Embed code (iframe snippet for websites)

### Public Card View Page
- Clean, distraction-free full-page card render
- Recipient sees the card exactly as designed
- Optional: "Create your own card" CTA in the footer (drives new signups)
- View count tracked anonymously

### Link Controls (for card owner)
| Control | Description |
|---------|-------------|
| Link active/inactive toggle | Disable the link without deleting the card |
| Expiry date | Set a date after which link stops working (Pro) |
| Password protection | Require a PIN to view (Pro) |
| View count | See how many times the link was opened |

---

## 8. Modern E-Card Features (Suggestions)

These features would make the platform stand out from competitors:

### Core Differentiators

| Feature | Description |
|---------|-------------|
| **Animated Cards** | CSS/Lottie animations built into templates (floating petals, confetti, sparkles) |
| **Background Music** | Embed a short audio clip that plays when the card opens (uploaded MP3 or YouTube link) |
| **Video Message** | Record or upload a short video message embedded inside the card |
| **Countdown Timer** | Live countdown (e.g., "Wedding in 12 days 4 hours") on the card |
| **RSVP Form** | Embedded RSVP inside wedding/event cards — responses go to owner's dashboard |
| **Photo Gallery Slot** | Carousel of up to 10 photos inside the card |
| **Scratch-to-Reveal** | Interactive "scratch card" effect reveals a message or gift code |
| **3D Flip Card** | Classic folding card animation on open — front and back design |
| **Dark Mode Card** | Cards auto-adapt to recipient's system dark/light preference |
| **AI Message Generator** | User describes the vibe, AI writes the card message (OpenAI/Claude API) |
| **Template Remix** | Start from any public card and remix it as your own template |

### Collaboration Features
| Feature | Description |
|---------|-------------|
| **Group Card** | Multiple people sign/contribute messages to one card (e.g., office farewell) |
| **Reaction Emojis** | Recipients react to the card (heart, wow, laugh) — owner sees reactions |
| **Comment Thread** | Recipients leave a comment reply visible to the sender |

### Personalization
| Feature | Description |
|---------|-------------|
| **AI Background Remover** | Upload a photo and the platform removes the background automatically |
| **AI Color Palette** | User uploads a photo — AI suggests a matching card color palette |
| **Font Pairing Suggestions** | Pick a style (elegant, fun, minimal) and get font pair recommendations |
| **Seasonal Themes** | Auto-surfaced templates based on upcoming holidays (Eid in 3 days, etc.) |

### Business / Professional
| Feature | Description |
|---------|-------------|
| **Digital Business Card** | QR code, vCard download, NFC-ready link — shareable everywhere |
| **Team Cards** | Companies create branded cards with consistent style for all employees |
| **White Label** | Business plan lets companies host cards on their own domain |
| **Analytics per Card** | Open rate, unique views, geographic map, device breakdown |

---

## 9. Monetization Strategy

### Tier 1 — Freemium Model (Core Revenue Engine)

| Plan | Price | Limits |
|------|-------|--------|
| **Free** | $0/month | 5 cards total, 3 templates, basic features, e-card.app branding on share page |
| **Pro** | $5/month or $45/year | Unlimited cards, all templates, custom slug, music, video, no branding |
| **Business** | $19/month or $170/year | Everything in Pro + team seats (5), analytics, white label, priority support |

**Psychology:** Free plan is generous enough to hook users, but the "no branding" upgrade is a strong pull once users share publicly.

---

### Tier 2 — Template Marketplace

- Designers (third-party or in-house) sell premium templates
- Pricing: $2–$10 per template (one-time purchase)
- Platform takes 30% commission
- This creates a community ecosystem and passive income

---

### Tier 3 — Gift Card Monetization

- Users can issue real monetary gift cards (e.g., BDT 500 gift card)
- Recipients redeem them on partner stores or via a voucher code system
- Platform charges a 3–5% transaction fee
- Integration with local payment gateways (SSLCommerz, bKash, Nagad for BD market)

---

### Tier 4 — API Access (Developer Plan)

- Expose a card generation API for developers and businesses
- Pay-per-use: $0.01 per card generated via API, or $49/month for 10,000 cards
- Use case: automated birthday cards from CRM, bulk invitation sending

---

### Tier 5 — Sponsored Templates

- Brands pay to have their logo/name on seasonal template collections
- Example: A wedding venue sponsors the "Royal Wedding" template collection
- Price: $200–$1,000/month depending on traffic

---

### Tier 6 — Premium Add-ons (Micro-transactions)

| Add-on | Price | Description |
|--------|-------|-------------|
| Custom Domain | $5/year | cards.yourname.com |
| Extra Storage | $1/month | Upload up to 2 GB of media |
| Password-Protected Link | $1/card | One-time fee to lock a card |
| Priority Support | $3/month | 1-hour response SLA |

---

### Tier 7 — Affiliate & Referral Program

- User gets 1 month Pro free for every paid referral
- Influencer affiliate links: 20% recurring commission for first 3 months of referred users
- This drives organic growth with zero ad spend

---

### Revenue Projection (Conservative, Month 6)

| Source | Monthly Users | Conversion | Revenue |
|--------|--------------|------------|---------|
| Pro subscriptions | 10,000 | 3% = 300 | $1,500 |
| Business plans | 10,000 | 0.5% = 50 | $950 |
| Template purchases | 10,000 | 5% = 500 | $1,500 |
| API usage | — | — | $400 |
| **Total** | | | **~$4,350/mo** |

---

## 10. Database Schema Overview

```
users
  id, name, email, password, plan (free|pro|business), email_verified_at, created_at

cards
  id, user_id, title, type (wedding|visiting|gift|birthday|festival), status (draft|published|archived)
  canvas_json (TEXT — stores the full designer state as JSON)
  thumbnail_url, created_at, updated_at

card_links
  id, card_id, slug (unique), is_active, expires_at, password_hash, view_count, created_at

card_views
  id, card_link_id, ip_hash, country, device, viewed_at

templates
  id, name, category, thumbnail_url, canvas_json, is_premium, price, author_id, created_at

user_templates
  id, user_id, template_id, purchased_at

rsvp_responses (for wedding/event cards)
  id, card_id, guest_name, email, attending (yes|no|maybe), guests_count, message, created_at

group_card_messages (for group/farewell cards)
  id, card_id, contributor_name, message, signature_image_url, created_at
```

---

## 11. Tech Stack Summary

| Layer | Technology |
|-------|-----------|
| **Language** | PHP 8.4 |
| **Framework** | Laravel 13 |
| **Frontend** | Vue 3 + Inertia.js |
| **Styling** | Tailwind CSS v4 |
| **Auth** | Laravel Fortify (email/password) |
| **DB** | MySQL |
| **File Storage** | Laravel Storage (local dev) / S3 (production) |
| **Queue** | Laravel Queue (database driver) |
| **Cache** | Database / Redis (production) |
| **API** | Wayfinder (typed route helpers) |
| **Icons** | Lucide Vue |
| **UI Components** | Reka UI (headless) |
| **Build Tool** | Vite 8 + vite-plus |
| **Testing** | PHPUnit 12 + Laravel Pail |
| **Code Quality** | Laravel Pint + PHPStan (Larastan) |

---

## Development Phases

### Phase 1 — Foundation (Weeks 1–3)
- Welcome / landing page
- Register, Login, Email verification
- User dashboard shell
- Basic card CRUD (create, list, delete)

### Phase 2 — Core Designer (Weeks 4–6)
- Drag-and-drop card editor
- Text, image, background elements
- Wedding card + Business card types
- Save draft + auto-save
- Shareable link generation

### Phase 3 — Gift & More (Weeks 7–8)
- Gift card type
- Share modal (WhatsApp, QR, copy link)
- Public card view page
- View count tracking

### Phase 4 — Monetization (Weeks 9–11)
- Subscription plans (Free/Pro/Business)
- Payment gateway integration
- Template marketplace (buy/sell)
- Pro feature gates (custom slug, music, password link)

### Phase 5 — Growth Features (Weeks 12+)
- AI message generator
- Group card
- RSVP form
- Analytics dashboard
- Referral & affiliate program

---

*Last updated: September 2026 — Pre-implementation planning document.*
