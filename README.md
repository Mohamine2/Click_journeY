# 🌵 Dunes Seekers – Desert Travel Platform

**Dunes Seekers** is a web application developed as part of an academic project. It provides a comprehensive platform for users to discover, customize, and book desert expeditions.

Key user features include:
- Secure account creation and authentication.
- Advanced search and exploration of desert travel itineraries.
- Dynamic trip customization with various add-on options.
- Real-time dynamic pricing calculated based on user selections.
- Seamless online booking and purchase simulation.

A dedicated **Admin Dashboard** is also integrated to manage travel packages, bookings, and user accounts.

---

## 🚀 Key Features
- **Account Management:** Secure registration, login, and logout functionalities.
- **Travel Search Engine:** Intuitive filtering and display of available travel offers.
- **Dynamic Customization:** Real-time price updates driven by JavaScript and AJAX based on selected trip options.
- **Booking & Purchase:** Simulates an online checkout process and records orders directly in the database.
- **Admin Dashboard:** Full CRUD capabilities (Create, Read, Update, Delete) for travel packages and user management.
- **Asynchronous Requests (AJAX):** Enhanced User Experience (UX) allowing seamless pricing and data updates without page reloads.

---

## 🛠️ Tech Stack
- **Frontend:** HTML5, CSS3, JavaScript
- **Backend:** PHP
- **Database:** JSON flat files
- **Asynchronicity:** AJAX (Asynchronous JavaScript and XML)
- **Session Management:** Native PHP Sessions

---

## ⚙️ Installation & Setup

1. **Clone the repository:**
   ```bash
   git clone [https://github.com/Mohamine2/Click_journeY.git](https://github.com/Mohamine2/Click_journeY.git)
   ```

2. **Deployment**
* Move the project folder to your local server directory (e.g., htdocs for XAMPP, www for WampServer).
* Start your Apache server.
* Access the application through your browser at `http://localhost/Click_journeY`.

## 🛡️ Security (Academic Implementation)
Note: Designed for educational purposes with simplified yet essential security layers.

* **Session Security:** Native PHP sessions ensure strict user state management and access control.
* **Credential Protection:** Passwords are securely processed using industry-standard hashing `password_hash`.
* **Access Control:** Server-side route verification blocks unauthorized users from accessing administrative folders and dashboards.
