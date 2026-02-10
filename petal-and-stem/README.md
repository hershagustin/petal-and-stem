# Flower Shop Website (petal & stem)

## Overview

**petal & stem** is a web-based flower shop form application that generates custom quotes for floral arrangements.  

The main goal of this lab is **server-side form validation using PHP** for multiple data types, without relying on HTML5 form validation attributes.  

> **Important:** HTML5 validation attributes (`required`, `pattern`, `maxlength`, `email`, etc.) are intentionally **not used** to allow strict assessment of **back-end validation techniques**.

---

## Features

- Separate **header.php** and **footer.php** included on every page for consistent layout.  
- Custom **order form** with server-side validation.  
- **Thank-you page** displayed after successful form submission.  
- **User-friendly error messages** guide users to fix invalid inputs.  
- **Form retains all previous values** if validation fails.  
- Protection against **XSS attacks**.  
- Responsive design with **Bootstrap 5**.

---

## Form Fields & Validation Requirements

 **Recipient's Name**           - Must contain a space between first and last name. 
 **Recipient's Phone Number**   - Must match a specific pattern using a regular expression. 
 **Card Message**               - Maximum 255 characters. 
 **Delivery Date**              - Must be at least 72 hours (3 days) from the current date. 
 **Occasion**                   - Dropdown select with at least 8 options; previous choice retained if form is returned. 
 **Size**                       - Single selection; previous choice retained if form is returned. 
 **Add-Ons**                    - Optional; multiple selections allowed. 
 **Presentation Options**       - Single selection; previous choice retained if form is returned. 
 **User's Name**                - Must contain a space and be unique (different from recipient). 
 **User's Email Address**       - Must match a valid email format using a regular expression. 
 **User's Phone Number**        - Must match a specific pattern and be unique. 

> **Hint for Delivery Date:** Convert the date to seconds since Unix Epoch (January 1, 1970). There are 86,400 seconds in a day, so 3 days = 259,200 seconds.

---

## How to Use

1. Open `index.php` via a PHP-enabled server (e.g., XAMPP, MAMP, or local PHP server).  
2. Fill out the flower order form.  
3. Submit the form.  
4. If validation fails:  
   - User-friendly error messages are displayed.  
   - Previously entered values are retained.  
5. If validation passes:  
   - The user is redirected to the **thank-you page**.

---

## Technologies Used

- **PHP** – Server-side validation and page logic  
- **HTML5** – Page structure inside `.php` files  
- **CSS3** – Custom styling and layout  
- **Bootstrap 5** – Responsive design, grid system, spacing, and utility classes  
- **Regular Expressions** – Validation for email, phone number, and other inputs  

- GitHub: [hershagustin](https://github.com/hershagustin)


