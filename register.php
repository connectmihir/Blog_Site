<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="/Blog_Site/registerStyle.css">
</head>
<body>

    <div class="container">
        <form class="contact-form">
            <h2>Contact Form</h2>

            <div class="form-group">
                <label for="name">Name</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    placeholder="Enter your name"
                    required
                >
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    placeholder="Enter your email"
                    required
                >
            </div>

            <div class="form-group">
                <label for="role">Role</label>
                <select id="role" name="role" required>
                    <option value="">Select Role</option>
                    <option value="subscriber">Subscriber</option>
                    <option value="admin">Admin</option>
                    <option value="author">Author</option>
                </select>
            </div>

            <button type="submit">Submit</button>
        </form>
    </div>

</body>
</html>