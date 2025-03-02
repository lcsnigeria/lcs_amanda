# **Amanda - PHP Routing Library**  

🚀 **Amanda** is a lightweight and flexible PHP routing library that dynamically maps website URLs to template files **without requiring manual route definitions or directory structures**.  

### **📌 Key Features**
- **Zero Configuration Routing** – Just place `.php` or `.html` templates inside `amanda_templates/`, and Amanda will serve them automatically.  
- **Flexible Template Management** – Easily override default templates, such as home and 404 pages.  
- **Lightweight & Fast** – No unnecessary complexity—Amanda is optimized for speed.  
- **Customizable Routing** – Define custom template mappings via `amanda_routers/artd.php`.  

---

## **📥 Installation**
Amanda requires **PHP 8.3+**. You can install it via Composer:  
```sh
composer require lcsng/amanda
```

---

## **🚀 Getting Started**
### **1️⃣ Place Your Templates**
Simply put your `.php` or `.html` files inside the `amanda_templates/` directory, and Amanda will automatically match URLs to the correct templates.  

For example:  
```
amanda_templates/
├── home.php       → Access via `/home`
├── about.html     → Access via `/about`
├── contact.php    → Access via `/contact`
└── 404.html       → Default 404 error page
```

### **2️⃣ Customize Routes (Optional)**
You can override settings in `amanda_routers/artd.php`:  
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
For detailed usage and customization, please refer to the [official documentation](https://lcs.ng/amanda).

---

## **🤝 Contributing**
Contributions are welcome! To contribute:  
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
🌐 **Website**: [lcs.ng](https://lcs.ng/amanda)