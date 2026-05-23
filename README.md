# Worknoon Chat WordPress Integration Engine

A high-performance real-time chat interface architecture built as a secure custom child theme extending the WooCommerce **Storefront** parent framework. It hooks asynchronously into the native PHP WordPress core layer via non-blocking AJAX infrastructure.

---

## 🛠️ Technology Specification Stack

- **Parent Layer Engine:** Storefront Framework Theme Hierarchy  
- **Core Languages:** PHP 8.x, Vanilla JavaScript (ECMAScript 6), jQuery Core Core Map  
- **Data Transit Pipelines:** Asynchronous WP AJAX Admin Core Callbacks  
- **Security Layer:** Dynamic Cryptographic Nonces (`wp_create_nonce`) & Field Sanitization Engines  
- **Context Hooks Integration:** Native WooCommerce Core Hooks (`wc_get_orders` / Global `$product` data mappings)

---

## 🚀 Architectural Blueprint Features

### Context-Aware Floating Chat Widget
Seamlessly hooks directly into the WordPress theme lifecycle (`wp_footer`) to spin up an interactive messaging layout container automatically.

### Product-Based Chat Context Maps
Detects single product viewport configurations (`is_product()`) dynamically to capture and bundle relevant inventory item contexts into real-time payload definitions.

### WooCommerce Live Order Sync Loops
Pulls authenticated customer purchase logs asynchronously on AJAX execution loops, allowing contextual administrative visibility over recent order objects.

### Defense-in-Depth Layering
Validates state referers dynamically on every event transaction string using token validation checks to block cross-site execution attacks.

---

## 📦 File Ecosystem Tree

```text
├── assets/
│   ├── css/
│   │   └── chat-widget.css       # Floating widget positioning and styling layout
│   └── js/
│       └── chat-core.js          # Asynchronous event handling and DOM manipulation
├── functions.php                 # Theme hooks queue, AJAX pipelines, and WooCommerce integrations
├── README.md                     # System configuration and structural architecture maps
└── style.css                     # Critical Storefront child theme link bindings
```

---

# Local Installation & Verification Guide

## Clone the Asset Package

Clone this directory straight into your working WordPress themes repository subfolder:

```bash
cd wp-content/themes
git clone https://github.com/anthonyagughasi/worknoon-chat-wordpress.git
```

---

## Activate the Integration Layer

Navigate to your WordPress Administrative Dashboard panel interface.

Go to:

```text
Appearance → Themes
```

Locate the **Worknoon Chat Storefront Child** card and click **Activate**.

---

## Verify Runtime Pipelines

1. Load any public product catalog page.
2. Click the floating widget token icon in the lower corner of the viewport screen.
3. Send a test inquiry string.
4. Verify live payload logs inside your browser’s Network Console tab.

---

# 🛡️ Engineering Challenges & Optimizations Resolved

## 1. Eliminating Race Conditions in Asynchronous Cart Synchronization

### Problem
Standard AJAX configuration execution hooks often drop active session cookies when firing calls, stripping user contextual details from administrative queries.

### Solution
Tied client data loops securely into the internal structural action pipeline listeners (`wp_ajax_` and `wp_ajax_nopriv_`).

This ensures active user sessions are mounted dynamically before inventory validation engines read structural user data records.

---

## 2. Guarding Database Performance Bottlenecks Against Frequent Inquiries

### Problem
Pulling heavy order database listings sequentially on every raw message dispatch loop risks throwing critical timeouts under heavy simultaneous usage.

### Solution
Limited metadata processing strictly to the last 3 historical logs using optimized cached search arrays via the specialized `wc_get_orders` schema engine.

This bypasses structural heavy metadata joins completely.

---

# ⚙️ Runtime Processing Flow

User Interaction
      ↓
Floating Chat Widget Event
      ↓
AJAX Request Dispatch
      ↓
Nonce Verification Layer
      ↓
WooCommerce Context Resolution
      ↓
Customer Order Sync
      ↓
Sanitized Payload Response
      ↓
DOM Live Render Update
```

---

# 🔐 Security Architecture

- Nonce token verification on all asynchronous transactions
- Full field sanitization before database interaction
- Escaped frontend output rendering
- Protected authenticated and guest AJAX endpoints
- WooCommerce contextual validation checks

---

# 📈 Performance Optimization Notes

- Cached lightweight WooCommerce order queries
- Non-blocking asynchronous frontend execution
- Minimal DOM repaint operations
- Storefront-native hook compatibility
- Reduced database join dependency chains

---

# 🧩 Compatibility Layer

| Component        | Supported |
|-----------------|------------|
| WordPress 6.x   | ✅ |
| WooCommerce 8.x | ✅ |
| PHP 8.x         | ✅ |
| Storefront Theme| ✅ |

---

# 📄 License

This project architecture is distributed for educational and developmental implementation purposes.
