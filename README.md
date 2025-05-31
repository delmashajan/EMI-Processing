Here’s a clean and structured `README.md` file tailored to your EMI Processing Laravel application, covering all the steps you've implemented based on the task:

---

````markdown
# 💸 EMI Processing System - Laravel Application

This is a Laravel-based admin application that processes EMI (Equated Monthly Installment) data based on dynamic loan details. It uses repository-service pattern and includes dynamic table creation using raw SQL.

---

## 📁 Features

- Username-based authentication (`developer`)
- Loan details stored and seeded in the database
- Dynamic EMI table generation with month-wise breakdown
- Admin dashboard to:
  - View loan data
  - Process EMI data dynamically
  - View calculated EMI results

---

## 🚀 Tech Stack

- Laravel 10+
- MySQL
- Blade Templates
- Laravel UI/Auth (for login)
- Repository-Service Pattern

---

## ✅ Setup Instructions

### 1. Clone the repository
```bash
git clone https://github.com/delmashajan/EMI-Processing.git
cd emi-processing
````

### 2. Install dependencies

```bash
composer install
npm install && npm run dev
```

### 3. Environment setup

Create `.env` file:

```bash
cp .env.example .env
```

Update your `.env` file with database credentials.

### 4. Generate keys and migrate

```bash
php artisan key:generate
php artisan migrate --seed
```

This will:

* Create `users` and `loan_details` tables
* Seed the default user (`developer`) and loan data

---

## 👤 Default Login Credentials

| Field    | Value              |
| -------- | ------------------ |
| Username | developer          |
| Password | Test\@Password123# |

Login at: `/login`

---

## 📄 Database Structure

### `loan_details` Table

| Field                | Type    |
| -------------------- | ------- |
| clientid             | Integer |
| num\_of\_payment     | Integer |
| first\_payment\_date | Date    |
| last\_payment\_date  | Date    |
| loan\_amount         | Decimal |

### `emi_details` Table (Created Dynamically)

| Field     | Description                                                    |
| --------- | -------------------------------------------------------------- |
| clientid  | Client ID                                                      |
| YYYY\_MMM | One column per month dynamically added, filled with EMI values |

---

## ⚙️ How EMI Processing Works

1. Click the **Process Data** button from the Loan Details Page.
2. The system:

   * Creates (or recreates) the `emi_details` table using raw SQL.
   * Determines dynamic month columns from min start and max end dates.
   * Calculates EMI = `loan_amount / num_of_payment`.
   * Adjusts last EMI amount to match total exactly.
3. Displays data in tabular format.

---



## 🧪 Example Loan Data (Seeded)

| Client ID | Payments | First Date | Last Date  | Loan Amount |
| --------- | -------- | ---------- | ---------- | ----------- |
| 1001      | 12       | 2018-06-29 | 2019-05-29 | 1550.00     |
| 1003      | 7        | 2019-02-15 | 2019-08-15 | 6851.94     |
| 1005      | 17       | 2017-11-09 | 2019-03-09 | 1800.01     |




