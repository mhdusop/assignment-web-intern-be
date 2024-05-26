# Laravel Backend Project Setup Guide

## Description
This is a brief guide to setting up a Laravel project using PostgreSQL and migration after cloning the repository.

## Setup

### Installation

1. **Clone the repository:**

    ```bash
    git clone https://github.com/mhdusop/assignment-web-intern-be
    ```

2. **Navigate to the project directory:**

    ```bash
    cd assignment-web-intern-be
    ```

3. **Install PHP dependencies using Composer:**

    ```bash
    composer install
    ```

4. **Copy the `.env.example` file to `.env`:**

    ```bash
    cp .env.example .env
    ```

5. **Configure your `.env` file with your PostgreSQL credentials:**

    ```dotenv
    DB_CONNECTION=pgsql
    DB_HOST=127.0.0.1
    DB_PORT=5432
    DB_DATABASE=your_database_name
    DB_USERNAME=your_database_username
    DB_PASSWORD=your_database_password
    ```

6. **Generate a new application key:**

    ```bash
    php artisan key:generate
    ```

7. **Run the database migrations:**

    ```bash
    php artisan migrate
    ```

8. **Run the server:**

    ```bash
    php artisan serve
    ```

# API Endpoints

## User Management Endpoints

The following endpoints are available under the `/api/v1` prefix for managing users:

### Get All Users

- **Endpoint:** `GET /api/v1/get/users`
- **Description:** Retrieve a list of all users.
- **Response:** Returns a JSON array of user objects.
- **Example Request:**

  ```bash
  curl -X GET http://127.0.0.1:8000/api/v1/get/users
  ```

  **Example Response:**
  ```json
  [
    {
      "id": 1,
      "name": "John Doe",
      "email": "john@example.com",
      "phone": "081299847682",
      "address": "Shinjuku Gyoen"
    },
    {
      "id": 2,
      "name": "Jane Smith",
      "email": "jane@example.com",
      "phone": "081234567890",
      "address": "Central Park"
    }
  ]
  ```

### Get User by ID

- **Endpoint:** `GET /api/v1/get/user/{id}`
- **Description:** Retrieve a single user by their ID.
- **Path Parameters:**
    - `id` (integer): The ID of the user to retrieve.
- **Response:** Returns a JSON object of the user.
- **Example Request:**

  ```bash
  curl -X GET http://127.0.0.1:8000/api/v1/get/user/1
  ```

  **Example Response:**
  ```json
  {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "081299847682",
    "address": "Shinjuku Gyoen"
  }
  ```

### Create a New User

- **Endpoint:** `POST /api/v1/create/user`
- **Description:** Create a new user.
- **Request Body:**
    - `name` (string): The name of the user.
    - `email` (string): The email of the user.
    - `phone` (string): The phone number of the user.
    - `address` (string): The address of the user.
- **Response:** Returns a JSON object of the created user.
- **Example Request:**

  ```bash
  curl -X POST http://127.0.0.1:8000/api/v1/create/user \
  -H "Content-Type: application/json" \
  -d '{
      "name": "John Doe",
      "email": "john@example.com",
      "phone": "081299847682",
      "address": "Shinjuku Gyoen"
  }'
  ```

  **Example Response:**
  ```json
  {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "081299847682",
    "address": "Shinjuku Gyoen"
  }
  ```

### Update an Existing User

- **Endpoint:** `POST /api/v1/update/user/{id}`
- **Description:** Update an existing user's details.
- **Path Parameters:**
    - `id` (integer): The ID of the user to update.
- **Request Body:**
    - `name` (string): The name of the user.
    - `email` (string): The email of the user.
    - `phone` (string): The phone number of the user.
    - `address` (string): The address of the user.
- **Response:** Returns a JSON object of the updated user.
- **Example Request:**

  ```bash
  curl -X POST http://127.0.0.1:8000/api/v1/update/user/1 \
  -H "Content-Type: application/json" \
  -d '{
      "name": "John Doe",
      "email": "john@example.com",
      "phone": "081299847682",
      "address": "Shinjuku Gyoen"
  }'
  ```

  **Example Response:**
  ```json
  {
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "phone": "081299847682",
    "address": "Shinjuku Gyoen"
  }
  ```

### Soft Delete a User

- **Endpoint:** `DELETE /api/v1/delete/user/{id}`
- **Description:** Soft delete a user by their ID.
- **Path Parameters:**
    - `id` (integer): The ID of the user to delete.
- **Response:** Returns a JSON object with a success message.
- **Example Request:**

  ```bash
  curl -X DELETE http://127.0.0.1:8000/api/v1/delete/user/1
  ```

## Contribution

Feel free to contribute by submitting pull requests.

## License

This project is licensed under the [Your License Name] License. See the LICENSE file for details.
