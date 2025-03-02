# **Amanda - A Lightweight PHP Routing Library**  

🚀 **Amanda** is a powerful and flexible PHP routing library that dynamically maps URLs to template files **without requiring manual route definitions**. It provides a simple yet robust way to handle requests, making web development faster and more efficient.  

---

## **📌 Key Features**
✅ **Auto-routing** – No need to manually define routes; Amanda maps URLs to templates automatically.  
✅ **Customizable & Lightweight** – Easily modify template paths and routing logic.  
✅ **Dedicated Public Directory** – Follows best practices by keeping core files separate from publicly accessible assets.  
✅ **Seamless Integration** – Works with both existing PHP projects and new installations.  

---

## **📥 Installation**  

### **1️⃣ Install Amanda as a Full Project**  
Amanda should be installed in a **server directory** that is **not publicly accessible**. You can install it using:  
```sh
composer create-project lcsng/amanda my-site
```
This will create a `my-site/` directory containing all necessary files and folders.  

---

## **📂 Folder Structure**  
Amanda follows this directory setup:  
```
my-site/                 # Server directory (not public)
├── amanda/              # Core framework files (configs, functions, templates, etc.)
│   ├── amanda_templates/   # User templates (PHP/HTML)
│   ├── amanda_routers/     # Routing logic
│   └── ... (other core files)
│
├── public_html/         # The document root (publicly accessible files)
│   ├── index.php          # Handles all requests
│   ├── amanda_ajax.php    # For AJAX requests
│   ├── amanda_assets/     # Public assets (CSS, JS, images, etc.)
│   └── ... (other public files)
│
└── composer.json        # Project dependencies
```  

**Folder Placement Notes:**  
🔹 `my-site/` is **not** the document root—it is the server directory.  
🔹 `public_html/` is the **document root**, where web requests are directed.  
🔹 Users **can place Amanda anywhere** that fits their project structure.  

---

## **🚀 Getting Started**
### **1️⃣ Place Your Templates**  
Simply put your `.php` or `.html` files inside the `amanda/amanda_templates/` directory. Amanda will automatically route them based on the requested URL.  

For example:  
```
amanda_templates/
├── home.php       → Access via `/home`
├── about.html     → Access via `/about`
├── contact.php    → Access via `/contact`
└── 404.html       → Default 404 error page
```  

### **2️⃣ Configure Routing (Optional)**  
Modify the `amanda_routers/artd.php` file to override defaults:  
```php
$amanda_router->template_dir = AMANDA_TEMPLATE_DIR;
$amanda_router->error_404 = AMANDA_TEMPLATE_DIR . '/404.html';

// Custom template overrides
$amanda_router->home = AMANDA_TEMPLATE_DIR . '/home2.php';
$amanda_router->add_template = [
    'cart' => AMANDA_TEMPLATE_DIR . '/cart.php'
];
```  

---

## **📚 Documentation**  
For full documentation, visit [lcs.ng/amanda](https://lcs.ng/amanda).  

---

## **🤝 Contributing**  
1. Fork the repository.  
2. Make your changes.  
3. Submit a pull request.  

---

## **📜 License**  
Amanda is licensed under **GPL-3.0-or-later**, meaning it is **free to use, modify, and distribute** while ensuring derivatives remain open-source.  

---

## **📧 Contact & Support**  
📌 **Author**: [Chinonso Frewen Justice (JCFuniverse)](https://lcs.ng/jcfuniverse)  
📧 **Email**: amanda@lcs.ng  
🌐 **Website**: [lcs.ng/amanda](https://lcs.ng/amanda)