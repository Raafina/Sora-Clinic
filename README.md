<p align="center">
  <img src="https://github.com/Raafina/Sora-Clinic/blob/main/public/images/logo/primary.svg" alt="CMS Lokapath Dashboard" width="30%">
</p>

## Sora Clinic
Sora Clinic is a web-based polyclinic management system designed to streamline patient queue handling and doctor scheduling. It offers an intuitive interface for administrators, doctors, and patients to manage appointments efficiently. Built for scalability and ease of use, Sora Clinic helps healthcare providers deliver better, faster service.

## 🚀 Key Feature
<ul>
    <li>Multirole Auth (Admin, Doctor, and Patient)</li>
    <li>Doctor, Polyclinic, Medicine, and Patient Management</li>
    <li>Checkup schedule, appointment, and checking up feature</li>
    <li>Online consultation feature</li>
    <li>Restore feature</li>
    <li>Update profile, password, and forgot password via SMTP email</li>
</ul>

## 🛠️ Tech Stack
<ol>
    <li>Laravel</li>
    <li>Tailwind</li>
    <li>Flowbite Plugin</li>
    <li>MySQL/SQLite</li>
</ol>

## 🎯How To Use
<ol>
    <li>
        <p>Clone this repository</p>
        <p><pre>git clone https://github.com/Raafina/Sora-Clinic</pre></p>
    </li>
    <li>
        <p>Navigate to the project directory</p>
        <p><pre>cd Sora-Clinic</pre></p>
    </li>
    <li>
        <p>Install dependencies</p>
        <p><pre>composer install</pre></p>
        <p><pre>npm install</pre></p>
    </li>
    <li>
        <p>Configure the .env file/SQLite</p>
        <ul>
            <li>Duplicate .env.example and rename it to .env</li>
            <li>Adjust the database and environment configurations</li>
        </ul>
        <p><pre>php artisan key:generate</pre></p>
    </li>
    <li>
        <p>Run database migrations</p>
        <p><pre>php artisan migrate --seed</pre></p>
    </li>
    <li>
        <p>Start the application</p>
        <p><pre>npm run dev</pre></p>
        <p><pre>php artisan serve</pre></p>
    </li>
</ol>

## 🔐 Login Credentials

Use the following credentials to access the application after running the seeders:

### 🛠️ Admin
- **Email:** `admin@example.com`  
- **Password:** `123`

### 🩺 Doctor
- **Email:** `anisa_farida@example.com`  
- **Password:** `123`

### 🧑‍⚕️ Patient
- **Email:** `andi.prasetyo@example.com`  
- **Password:** `123`

> ⚠️ Make sure to run the database seeders before using these credentials.

