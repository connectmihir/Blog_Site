# BlogSpace – PHP Blog Management System

BlogSpace is a simple Blog Management System built using PHP, MySQL, HTML, and CSS.

The project allows users to register, log in, create blog posts, manage categories, upload images, and add comments to posts.

## Video Demo

Watch the complete project demo here:

https://youtu.be/9t-sDu2XbuM

Repo link: https://github.com/connectmihir/Blog_Site

## Features

* User Registration and Login System
* Session-Based Authentication
* Role-Based Access Control
* Admin, Author, and Subscriber Roles
* Create Blog Posts
* Update Blog Posts
* Delete Blog Posts
* Upload Featured Images for Posts
* Add and Manage Categories
* Delete Categories
* Add Comments on Blog Posts
* Display Comments Under Each Post
* Admin Dashboard
* Responsive User Interface
* Logout System
* MySQL Database Integration
* I am working on the MYSQL injection prevention so that i can improve effeciency.

## User Roles

### Admin

Admin users can:

* Create blog posts
* Update blog posts
* Delete blog posts
* Add categories
* Delete categories
* View all blog posts
* Add comments

### Author

Author users can:

* Create blog posts
* Update blog posts
* Delete blog posts
* View blog posts
* Add comments

### Subscriber

Subscriber users can:

* View blog posts
* Read full blog posts
* Add comments

## Technologies Used

* PHP
* MySQL
* HTML5
* CSS3
* XAMPP
* Apache Server

## Project Structure

```text
Blog_Site/
│
├── addPost.php
├── category.php
├── deletecategory.php
├── deletepost.php
├── dashboard.php
├── database.php
├── header.php
├── header.css
├── insertcomment.php
├── login.php
├── login.css
├── logout.php
├── postdisplay.php
├── register.php
├── register.css
├── singlepost.php
├── singlepost.css
├── updatepost.php
├── updatepost.css
├── Image/
└── README.md
```

## Database Tables

The project uses the following tables:

### `user`

Stores user information.

| Column   | Description                                    |
| -------- | ---------------------------------------------- |
| id       | User ID                                        |
| name     | User name                                      |
| email    | User email                                     |
| password | User password                                  |
| role     | User role such as admin, author, or subscriber |

### `categories`

Stores blog categories.

| Column | Description   |
| ------ | ------------- |
| id     | Category ID   |
| name   | Category name |

### `post`

Stores blog posts.

| Column      | Description           |
| ----------- | --------------------- |
| id          | Post ID               |
| title       | Post title            |
| content     | Post content          |
| image       | Post image            |
| category_id | Connected category ID |
| author_id   | Connected author ID   |

### `comment`

Stores comments for blog posts.

| Column    | Description       |
| --------- | ----------------- |
| id        | Comment ID        |
| post_id   | Connected post ID |
| email     | Commenter email   |
| user_name | Commenter name    |
| comment   | Comment content   |

## Installation Steps

1. Install XAMPP on your computer.

2. Start Apache and MySQL from the XAMPP Control Panel.

3. Copy the project folder into:

```text
C:\xampp\htdocs\
```

4. Open phpMyAdmin:

```text
http://localhost/phpmyadmin
```

5. Create a database named:

```text
blog_site
```

6. Create the required tables:

* user
* categories
* post
* comment

7. Update your database connection details inside:

```text
database.php
```

Example:

```php
<?php
$connection = mysqli_connect("localhost", "root", "", "blog_site");

if (!$connection) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
```

8. Open the project in your browser:

```text
http://localhost/Blog_Site/login.php
```

## Important Learning Outcomes

This project helped me practise:

* PHP Sessions
* User Authentication
* CRUD Operations
* MySQL Queries
* Foreign Keys
* Database Relationships
* File Uploads
* Form Handling
* Role-Based Access Control
* HTML and CSS Styling

## Future Improvements

* Password hashing using `password_hash()`
* Search blog posts
* Pagination
* Edit and delete comments
* User profile page
* Better validation
* Rich text editor for blog content
* Like and share feature
* Admin analytics dashboard

## Author

Created by Naman

## Licence

This project is created for learning and educational purposes.
